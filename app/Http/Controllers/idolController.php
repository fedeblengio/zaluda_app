<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\idol;
class idolController extends Controller
{

    public function index()
    {
        return response()->json(idol::all());
    }

    public function store(Request $request)
    {
       try {
        $idol = new idol;
        $idol->name = $request->name;
        $idol->last_name = $request->last_name;
        $idol->country = $request->country;
        $idol->age = $request->age;
        $idol->country = $request->country;
        $idol->profession = $request->profession;
        $idol->description = $request->description;
        $idol->price = $request->price;
        $idol->save();
        return response()->json(['status' => 'Success'], 200);
       } catch (\Throwable $th) {
        return response()->json(['status' => 'Bad Request'], 400);
       }
    }

    public function show(Request $request)
    {
        return response()->json(idol::all()->where('id', $request->id));
    }

    
    public function update(Request $request, $id)
    {
        try {
            $idol = idol::find($id);
            $idol->update($request->all());
            $idol->save();
            return response()->json(['status' => 'Success'], 200);
           } catch (\Throwable $th) {
            return response()->json(['status' => 'Bad Request'], 400);
           }
    }

    
    public function destroy($id)
    {
        try {
            $idol = idol::destroy($id);
            return response()->json(['status' => 'Success'], 200);
           } catch (\Throwable $th) {
            return response()->json(['status' => 'Bad Request'], 400);
           }
    }
}
