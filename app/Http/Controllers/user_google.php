<?php

namespace App\Http\Controllers;
use App\Models\google_id;
use Illuminate\Http\Request;

class user_google extends Controller
{
    public function store(Request $request)
    {
        $user = google_id::where('id_google', $request->id_google)->first();
        try {
            if(!$user){
                $google_id = new google_id;
                $google_id->id_google = $request->id_google;
                $google_id->full_name = $request->full_name;
                $google_id->mail = $request->mail;
                $google_id->save();
                return response()->json(['status' => 'Success'], 200);
            }          
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Bad Request'], 400);
        }  
    }
}
