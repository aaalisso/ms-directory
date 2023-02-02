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
        Schema::create('institution_person', function (Blueprint $table) {
            $table->id();
            $table->unsignedinteger('institution_id');
            $table->unsignedinteger('person_id');
            $table->string('occupation');
            $table->string('institutional_email');
            $table->date('incorporation_date');
            $table->timestamp('inst_pers_created_at')->useCurrent();
            $table->timestamp('inst_pers_updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution_person');
    }
};
