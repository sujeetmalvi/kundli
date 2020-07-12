<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserslocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userslocations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->dateTime('locationdatetime');
            $table->string('locationlat');
            $table->string('locationlong');
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
        Schema::dropIfExists('userslocations');
    }
}
