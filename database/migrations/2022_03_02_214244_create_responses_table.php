<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_requests');
            $table->string('id_google');
            $table->string('video_name');
            $table->timestamps();
        });
        Schema::table('responses', function(Blueprint $table) {
            $table->foreign('id_requests')->references('id')->on('requests');
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
        Schema::dropIfExists('responses');
    }
}
