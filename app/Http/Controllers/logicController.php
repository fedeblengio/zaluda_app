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
                $response->id_google = $request->id_google;
                $response->video_name = $request->video_name;
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

  

    public function showResponseFinal(Request $request)
    {
        $data = DB::table('requests')
            ->select('idols.photo', 'idols.name' , 'idols.last_name' , 'idols.id AS id_idols' , 'idols.country','requests.id_google','responses.video_name' )
            ->join('idols', 'idols.id', '=','requests.id_idols')
            ->join('responses', 'requests.id', '=','responses.id_requests')
            ->whereNotNull('responses.video_name')
            ->where('requests.id_google', $request->id)
            
            ->get();
        return response()->json($data);     
    }
}
