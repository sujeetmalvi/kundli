<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersbluetoothtokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersbluetoothtoken', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('bluetoothtoken')->nullable();
            $table->decimal('distance', 6, 4);
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
        Schema::dropIfExists('usersbluetoothtoken');
    }
}
