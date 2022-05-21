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
        Schema::create('available_vacines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spot_id')->nullable();
            $table->boolean('sinovac')->default(1)->comment('1=tersedia, 0=tidak tersedia');
            $table->boolean('astrazeneca')->default(1)->comment('1=tersedia, 0=tidak tersedia');
            $table->boolean('moderna')->default(1)->comment('1=tersedia, 0=tidak tersedia');
            $table->boolean('pfizer')->default(1)->comment('1=tersedia, 0=tidak tersedia');
            $table->boolean('sinnopharm')->default(1)->comment('1=tersedia, 0=tidak tersedia');
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
        Schema::dropIfExists('available_vacines');
    }
};
