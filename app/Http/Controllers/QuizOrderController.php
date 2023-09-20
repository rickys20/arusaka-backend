<?php

namespace App\Http\Controllers;

use App\Models\QuizOrder;
use App\Models\QuizItem;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\MaterialOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class QuizOrderController extends Controller
{
    public function listQuiz(Request $request, $course)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $dataCourse = Course::where('slug', $course)->first();
        if ($dataCourse) {
            $list = Quiz::where('courses_id', $dataCourse->id)->get();
            return response()->json([
                'message' => $list
            ], 200);
        } else {
            return response()->json([
                'message' => 'Quiz Not Found'
            ], 400);
        }
    }

    public function getQuiz(Request $request, $quiz)
    {
        $dataQuiz = Quiz::where('slug', $quiz)->first();
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        if ($dataQuiz) {
            // cek materialnya sudah memenuhi minimum syarat belum
            $dataMaterialOrder = MaterialOrder::where('courses_id', $dataQuiz->courses_id)
                ->where('user_id', $checkauth->id)
                ->where('status', 'unlocked')
                ->get();
            $jumlahData = $dataMaterialOrder->count();
            if ($jumlahData >= $dataQuiz->minimum_material) {
                // cek data jawab soal ini sudah ada belom ?
                $dataQuizOrderExist = QuizOrder::where('quiz_id', $dataQuiz->id)->where('user_id', $checkauth->id)->first();
                if ($dataQuizOrderExist) {
                    return response()->json([
                        'status' => 'Old data',
                        'message' => $dataQuizOrderExist
                    ], 200);
                } else {
                    $new_order = new QuizOrder();
                    $new_order->user_id = $checkauth->id;
                    $new_order->quiz_id = $dataQuiz->id;

                    // dapatkan id soal dalam array
                    $dataNoSoal = QuizItem::where('quiz_id', $dataQuiz->id)->pluck('id')->toArray();
                    $jumlahData = count($dataNoSoal);
                    $SoalString = '[' . implode(',', $dataNoSoal) . ']';
                    $new_order->question = $SoalString;

                    $answers = array_fill(0, $jumlahData, "0");
                    $StringAnswer = '[' . implode(',', $answers) . ']';
                    $new_order->answers = $StringAnswer;
                    $new_order->save();

                    return response()->json([
                        'message' => $new_order
                    ], 200);
                }
            } else {
                return response()->json([
                    // harus menyelesaikan minimum material
                    'message' => 'Quiz not available'
                ], 400);
            }
        } else {
            return response()->json([
                'message' => 'Data Quiz not found'
            ], 400);
        }
    }

    // akses data quiz per soal
    public function getQuizPerNum(Request $request, $quiz, $number)
    {
        $dataQuiz = Quiz::where('slug', $quiz)->first();
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $dataQuizOrderExist = QuizOrder::where('quiz_id', $dataQuiz->id)->where('user_id', $checkauth->id)->first();
        if ($dataQuizOrderExist) {
            $id_item = $dataQuizOrderExist->question;
            $numbers_data = array_map('intval', explode(',', trim($id_item, '[]')));
            $data_persoal = QuizItem::select('content', 'a', 'b', 'c', 'd')->where('id', $numbers_data[$number - 1])->first();
            return response()->json([
                'message' => $data_persoal
            ], 200);
        } else {
            return response()->json([
                'message' => 'Quiz Not Found'
            ], 400);
        }
    }

    public function submitAnswer(Request $request, $quiz, $number)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        };
        $data_slug = Quiz::where('slug', $quiz)->first();
        if (!$data_slug) {
            return response()->json([
                'message' => 'Quiz Not Found'
            ], 400);
        }

        $data_order = QuizOrder::where('user_id', $checkauth->id)
            ->where('quiz_id', $data_slug->id)
            ->first();
        $id_item = $data_order->answers;

        // ubah data text jadi array
        $jawaban = json_decode($id_item);
        $jawaban[$number - 1] = $request->answers;

        $data_order->update([
            'answers' => $jawaban
        ]);
        return response()->json([
            'data_item_change' => $jawaban,
        ]);
    }

    public function finishQuiz(Request $request, $quiz)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        };
        $dataQuiz = Quiz::where('slug', $quiz)->first();
        $data_order = QuizOrder::where('user_id', $checkauth->id)
            ->where('quiz_id', $dataQuiz->id)
            ->first();
        $data_order->update(['finish_at' => now()]);
        $array_question = json_decode($data_order->question, true);
        $array_answers = json_decode($data_order->answers, true);


        $benar = 0;
        $salah = 0;
        $kosong = 0;

        // cek score
        for ($q = 0; $q < count($array_question); $q++) {
            $solution = QuizItem::select('id', 'solution')->where('id', $array_question[$q])->get();
            if ($array_answers[$q] == '0') {
                $kosong++;
            } else if ($array_answers[$q] == $solution->first()->solution) {
                $benar++;
            } else {
                $salah++;
            }
        }

        $score = $benar / count($array_question) * 100;
        $data_order->update(['score' => $score]);

        return response()->json([
            'message' => 'Data Sumbitted',
            'finish_at' => $data_order->finish_at,
            'score' => $score,
            'benar' => $benar,
            'salah' => $salah,
            'kosong' => $kosong,
        ]);
    }

    public function report(Request $request, $quiz)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        };
        $dataQuiz = Quiz::where('slug', $quiz)->first();
        $data_order = QuizOrder::where('user_id', $checkauth->id)
            ->where('quiz_id', $dataQuiz->id)
            ->get();

        return response()->json([
            'message' => $data_order
        ]);
    }
}
