<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Account extends Migration
{

    public function up()
    {
        Schema::create('accounts',function(Blueprint $table){
            $table->increments('id');
            $table->integer('account_number');
            $table->string('account_name');
            $table->integer('account_balance');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
