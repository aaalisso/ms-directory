<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_password', 255);
            $table->string('user_state', 50);
            $table->unsignedInteger('user_type_id');
            $table->unsignedInteger('person_id')->unique();
            $table->timestamp("user_created_at")->useCurrent();
            $table->timestamp("user_updated_at")->useCurrent()->useCurrentOnUpdate();
            $table->foreign('person_id')->references('person_id')->on('person');
            $table->foreign('user_type_id')->references('user_type_id')->on('user_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
