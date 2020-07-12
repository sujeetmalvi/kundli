<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserscheckinoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userscheckinout', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->date('record_date');
            $table->dateTime('checkindatetime');
            $table->string('checkinlat');
            $table->string('checkinlong');
            $table->dateTime('checkoutdatetime')->nullable();
            $table->string('checkoutlat')->nullable();
            $table->string('checkoutlong')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userscheckinout');
    }
}
