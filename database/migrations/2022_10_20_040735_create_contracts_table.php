<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger( 'user_id' )->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->bigInteger( 'cus_id' )->unsigned();
            $table->foreign('cus_id')->references('id')->on('customers')->onDelete('cascade');
            $table->bigInteger( 'car_id' )->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onUpdate('cascade');
            $table->bigInteger( 'bank_id' )->nullable()->unsigned();
            // $table->foreign('bank_id')->references('id')->on('banks')->onUpdate('cascade');
            $table->bigInteger( 'driver_id' )->nullable()->unsigned();
            // $table->foreign('driver_id')->references('id')->on('drivers')->onUpdate('cascade');

            $table->date('start_date');
            $table->date('end_date');
            $table->string('state');
            $table->text('details')->nullable();
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
        Schema::dropIfExists('contracts');
    }
};
