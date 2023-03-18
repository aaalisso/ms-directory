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
        Schema::create('institution', function (Blueprint $table) {
            $table->increments('institution_id');
            $table->string('institution_name', 150);
            $table->string('institution_address', 100);
            $table->string('institution_phone', 9);
            $table->string('institution_web_page', 100);
            $table->string('institution_logo', 255);
            $table->unsignedInteger('ubigeo_id');
            $table->timestamp('institution_created_at')->useCurrent();
            $table->timestamp('institution_updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->foreign('ubigeo_id')->references('ubigeo_id')->on('ubigeo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution');
    }
};
