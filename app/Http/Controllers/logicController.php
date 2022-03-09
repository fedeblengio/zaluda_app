<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\requests;
use App\Models\response;
use App\Models\sales;
use Illuminate\Support\Facades\DB;
class logicController extends Controller
{
    public function requestsStore(Request $request)
    {
        try {
                $requests = new requests;
                $requests->id_google = $request->id_google;
                $requests->id_idols = $request->id_idols;
                $requests->message = $request->message;
                $requests->save();
                return response()->json(['status' => 'Success'], 200);
                   
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Bad Request'], 400);
        }  
    }
    public function responseStore(Request $request)
    {
        try {
                $response = new response;
                $response->id_requests = $request->id_requests;
                $response->link_yt = $request->link_yt;
                $response->save();
                return response()->json(['status' => 'Success'], 200);
                   
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Bad Request'], 400);
        }  
    }

    public function saleStore(Request $request)
    {
        try {
                $sales = new sales;
                $sales->id_idols = $request->id_idols;
                $sales->id_google = $request->id_google;
                $sales->price = $request->price;
                $sales->save();
                return response()->json(['status' => 'Success'], 200);
                   
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Bad Request'], 400);
        }  
    }

    public function showResponse(Request $request)
    {
      
       $response_link_yt = DB::select("select link_yt from responses;");

       $request_id_idols = DB::select("select id_idols from requests;");
       $request_goolge = DB::select("select id_google from requests;");
       $array = [
        "link_yt" => $response_link_yt,
        "id_idols" => $request_id_idols,
        "id_google" => $request_goolge,
    ];
    
      
       return response()->json($array);
    } 
}
