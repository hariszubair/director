<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable('false');
            $table->string('gender', 10)->nullable('false');//dropdown
            $table->date('dob', 10)->nullable();
            $table->smallInteger('age')->nullable();
            $table->string('qualification', 255)->nullable();
            $table->string('Institute', 255)->nullable();
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
        Schema::dropIfExists('directors');
    }
}
