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
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->unsignedInteger('person_id')->unique();
            $table->timestamp("user_created_at")->useCurrent();
            $table->timestamp("user_updated_at")->useCurrent()->useCurrentOnUpdate();
            $table->string('user_state', 50);
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
