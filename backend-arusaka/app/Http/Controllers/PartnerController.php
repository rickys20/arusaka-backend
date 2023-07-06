<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function getAll()
    {
        $partners = Partner::all();
        return response()->json([
            'message' => 'Success',
            'data' => $partners
        ], 200);
    }

    public function getDetailPartner(Request $request, $slug)
    {
        $partner = Partner::where('name', $slug)->first();
        return response()->json([
            'message' => 'Success',
            'data' => $partner
        ], 200);
    }

    // public function getPartnerbyId($id)
    // {
    //     $partner = Partner::find($id);
    //     return response()->json([
    //         'message' => 'Success',
    //         'data' => $partner
    //     ], 200);
    // }

    public function store(Request $request)
    {
        // validate first
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:partners',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $partner = new Partner();

        $partner->name = $request->name;
        $partner->email = $request->email;
        $partner->contact = $request->contact;
        $partner->address = $request->address;

        $partner->save();
        return response()->json([
            'message' => 'Success',
            'data' => $partner
        ], 200);
    }

    // update partner based on id
    public function editPartner(Request $request, $slug)
    {
        $partner = Partner::where('name', $slug)->first();

        $partner->name = $request->name;
        $partner->email = $request->email;
        $partner->contact = $request->contact;
        $partner->address = $request->address;

        $partner->save();
        return response()->json([
            'message' => 'Success',
            'data' => $partner
        ], 200);
    }

    public function deletePartner($slug){
        $partner = Partner::where('name', $slug)->first();
        $partner->delete();
        return response()->json([
            'message' => 'Success',
            'data' => $partner
        ], 200);
    }
}
