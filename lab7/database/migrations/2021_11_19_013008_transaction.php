<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaction extends Migration
{

    public function up()
    {
        Schema::create('transaction',function(Blueprint $table){
            $table->increments('id');
            $table->integer('transaction_form');
            $table->integer('transaction_to');
            $table->integer('transaction_amount');
            $table->string('transaction_description');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
        Schema::dropIfExists('transaction');
    }
}
