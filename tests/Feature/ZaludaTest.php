<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\idol;
use App\Http\Controllers\idolController;


class ZaludaTest extends TestCase
{
   
    public function test_idols_create()
    {
        $request = new Request([
            'name'   => 'FedeTest',
            'last_name' => 'FedeTest',
            'country'=> 'uy',
            'age'=> 21,
            'profession'=> 'Profesor',
            'description'=> 'Profesor',
            'price'=> 2000
        ]);

        $user = new idolController();
        $res = $user->store($request);
        $output = json_encode($res);
        var_dump($output);
        $this->assertEquals($output , '{"headers":{},"original":{"status":"Success"},"exception":null}');
    }
 

   public function test_idols_update()
    {    
        $request = new Request([
            'name'   => 'FedeTest',
            'last_name' => 'FedeTest',
            'country'=> 'ar',
            'age'=> 222,
            'profession'=> 'Profesor',
            'description'=> 'Profesor',
            'price'=> 2000,
            "photo"=> "FedeTest-FedeTest"
        ]);
        $id = DB::select("select id from idols where name='FedeTest'");

        $user = new idolController();
        $res = $user->update($request, $id[0]->id);
        $output = json_encode($res);
        var_dump($output);
        $this->assertEquals($output , '{"headers":{},"original":{"status":"Success"},"exception":null}');
    }   

     public function test_idols_show_all()
    {
        $response = $this->get('/api/idols');
        $response->assertStatus(200);
    } 
    public function test_idols_show_only()
    {
        $response = $this->get('/api/idols/2');
        $response->assertStatus(200);
    } 

    public function test_idols_delate()
    {
    
        $user = new idolController();
        $id = DB::select("select id from idols where name='FedeTest'");
        $res = $user->destroy($id[0]->id);
        $output = json_encode($res);
        var_dump($output);
        $this->assertEquals($output , '{"headers":{},"original":{"status":"Success"},"exception":null}');
    }   
}
