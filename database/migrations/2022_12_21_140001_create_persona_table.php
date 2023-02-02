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
        Schema::create('person', function (Blueprint $table) {
            $table->increments('person_id');
            $table->string('person_name', 80);
            $table->string('person_surname', 80);
            $table->string('person_email', 100)->unique();
            $table->string('person_identity_document', 20)->unique();
            $table->string('person_address', 100);
            $table->integer('person_phone')->lenght(9);
            $table->string('person_web_page', 100);
            $table->string('person_profile_picture',255);
            $table->date('person_birthday_date');
            $table->unsignedInteger('ubigeo_id');
            $table->timestamp('person_created_at')->useCurrent();
            $table->timestamp('person_updated_at')->useCurrent()->useCurrentOnUpdate();
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
        Schema::dropIfExists('person');
    }
};
