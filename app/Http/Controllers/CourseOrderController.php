<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\CourseOrder;
use App\Models\Material;
use App\Models\MaterialOrder;
use App\Models\Course;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Http;
use Midtrans\Transaction;
use Midtrans\Notification;
use GuzzleHttp\Client;

class CourseOrderController extends Controller
{
    public function registerCourse(Request $request, $course)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $data_slug = Course::where('slug', $course)->first();
        if (!$data_slug) {
            return response()->json([
                'message' => 'Course Not Found',
            ], 404);
        };

        $data_order = CourseOrder::where('users_id', $checkauth->id)
            ->where('courses_id', $data_slug->id)
            ->with('payment', 'user')
            ->first();
        if ($data_order) {
            return response()->json([
                'message' => 'Course Order in progress',
                'data' => $data_order
            ], 201);
        }


        // Initialize Midtrans configuration with your MIDTRANS_SERVER_KEY
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = true; // Set to false for sandbox environment, true for production

        $orderId = 'ORDER-' . uniqid();

        $items = [
            [
                'name' => $data_slug->name,
                'price' => $data_slug->price,
                'quantity' => 1,
            ],
        ];

        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => $data_slug->price,
        ];

        $customerDetails = [
            'first_name' => $checkauth->name,
            'email' => $checkauth->email,
            'address' => $checkauth->address
        ];

        $transactionToken = Snap::getSnapToken([
            'transaction_details' => $transactionDetails,
            'item_details' => $items,
            'customer_details' => $customerDetails,
        ]);

        $redirectUrl = 'https://app.sandbox.midtrans.com/snap/v3/redirection/' . $transactionToken;
        if ($redirectUrl) {
            $payment = new Payment();
            $payment->order_id = $orderId;
            $payment->transaction_id = $transactionToken;
            $payment->price = $data_slug->price;
            $payment->url = $redirectUrl;
            $payment->status = "pending";
            $payment->save();

            $course_order = new CourseOrder();
            $course_order->users_id = $checkauth->id;
            $course_order->courses_id = $data_slug->id;
            $course_order->payments_id = $payment->id;
            $course_order->save();

            return response()->json([
                'message' => 'Course registered',
                'url' => $redirectUrl,
                'transaction_id' => $transactionToken,
            ], 201);
        } else {
            return response()->json([
                'message' => 'Registration Failed'
            ], 400);
        }
    }

    public function startCourse(Request $request, $course)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $data_slug = Course::where('slug', $course)->first();
        if ($data_slug) {
            // cek user sudah pernah akses atau belom
            $user_access = MaterialOrder::where('courses_id', $data_slug->id)->where('user_id', $checkauth->id)->first();

            if ($user_access) {
                // tampilkan semua data material dan status
                $materialOrders = MaterialOrder::where('courses_id', $data_slug->id)
                    ->where('status', '!=', 'locked') // Exclude 'locked' material orders
                    ->with('materials') // Load associated materials
                    ->get();

                $all_material_order = Material::select('name', 'slug')->get();

                $partner_name = Course::where('id', $data_slug->id)->with('partner')->first();

                return response()->json([
                    'partner' => $partner_name->partner->name,
                    'message' => 'Success',
                    'data' => $materialOrders,
                    'material' => $all_material_order
                ], 200);
            } else {
                //buat baru semua material order
                $all_material = Material::where('courses_id', $data_slug->id)->get();

                // buat semua material order dengan status locked kecuali data pertama
                if ($all_material->count() > 0) {
                    // flag first material
                    $firstMaterial = true;

                    // Iterate through the materials
                    foreach ($all_material as $material) {
                        // Create a material order with 'locked' status for all materials except the first one
                        $status = $firstMaterial ? 'unlocked' : 'locked';

                        // Create the material order
                        MaterialOrder::create([
                            'courses_id' => $data_slug->id,
                            'user_id' => $checkauth->id, // Assuming you have user authentication
                            'material_id' => $material->id,
                            'status' => $status,
                        ]);

                        // Set the flag to false after processing the first material
                        $firstMaterial = false;
                    }
                }

                // tampilkan semua data material dan status
                $materialOrders = MaterialOrder::where('courses_id', $data_slug->id)
                    ->where('status', '!=', 'locked') // Exclude 'locked' material orders
                    ->with('materials') // Load associated materials
                    ->get();

                $all_material_order = Material::select('name', 'slug')->get();

                $partner_name = Course::where('id', $data_slug->id)->with('partner')->first();

                return response()->json([
                    'partner' => $partner_name->partner->name,
                    'message' => 'Success',
                    'data' => $materialOrders,
                    'material' => $all_material_order
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'Course Not Found',
            ], 404);
        }
    }

    public function webhook(Request $request)
    {
        $data_payment = Payment::where("order_id", $request->order_id)->first();
        if ($data_payment) {
            $data_payment->status = $request->transaction_status;
            $data_payment->transaction_id = $request->transaction_id;
            $data_payment->payment_type = $request->payment_type;
            $data_payment->expiry_time = $request->expiry_time;
            $data_payment->save();

            return response()->json([
                'status' => 'Data Payment Updated',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Data Not Found'
            ], 404);
        }
        // return response()->json(['status' => $allRequestData]);
    }

    public function getAllCoursetOrder(Request $request)
    {
        $perPage = $request->query('per_page', 10); // Number of packets per page (default: 10)
        $page = $request->query('page', 1); // Page number to retrieve (default: 1)

        $course_order = CourseOrder::with('payment', 'user', 'course')->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'status' => 'success',
            'data' => $course_order,
        ], 200);
    }

    public function getUserByCourse(Request $request, $course)
    {
        $perPage = $request->query('per_page', 10); // Number of packets per page (default: 10)
        $page = $request->query('page', 1); // Page number to retrieve (default: 1)

        $data_slug = Course::where('slug', $course)->first();

        $course_order = CourseOrder::where('courses_id', $data_slug->id)->with('payment', 'user')->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'status' => 'success',
            'data' => $course_order,
        ], 200);
    }

    public function deleteCourseOrder(Request $request, $course_order)
    {
        $data = CourseOrder::where('id', $course_order)->first();
        if ($data) {
            $data_payment = Payment::where('id', $data->payments_id);
            if ($data_payment) {
                $data_payment->delete();
            }
            $data->delete();
            return response()->json([
                'message' => 'Delete Success'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data Not Found'
            ], 400);
        }
    }
}
