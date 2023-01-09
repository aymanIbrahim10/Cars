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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cus_nam');
            $table->string('first_address');
            $table->string('secund_address');
            $table->string('license_num');
            $table->string('phone_num');
            $table->string('nationality');
            $table->string('place_of_issue');
            $table->string('blood_group');
            $table->date('date_of_issue')->nullable();
            $table->date('expire_date')->nullable();
            $table->enum('type_lic', ['general', 'private']);
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
        Schema::dropIfExists('customers');
    }
};
