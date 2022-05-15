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
        Schema::create('societies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regional_id')->nullable();
            $table->string('id_card_number')->length(16)->comment('NIK')->unique();
            $table->string('name');
            $table->date('born_date')->nullable()->comment('tanggal lahir');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('address');
            $table->string('token')->unique()->nullable();
            $table->string('password');
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
        Schema::dropIfExists('societies');
    }
};
