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
        Schema::table('available_vacines', function (Blueprint $table) {
            $table->foreign("spot_id")->references("id")->on("spots")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('available_vacines', function (Blueprint $table) {
            $table->dropConstrainedForeignId('spot_id');
            $table->dropColumn(['spot_id']);
        });
    }
};
