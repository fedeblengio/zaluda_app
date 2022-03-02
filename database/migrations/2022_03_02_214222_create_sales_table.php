<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_idols');
            $table->string('id_google');  
            $table->integer('price');
            $table->timestamps();
        });


        Schema::table('sales', function(Blueprint $table) {
            $table->foreign('id_idols')->references('id')->on('idols');
            $table->foreign('id_google')->references('id_google')->on('google_ids');
        }); 
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
