<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_memberships', function (Blueprint $table) {
             $table->id();
             $table->string('type', 150)->nullable('false');//dropdown
             $table->string('company', 150)->nullable('false');             
             $table->date('to')->nullable();             
             $table->date('from')->nullable();             
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
        Schema::dropIfExists('other_memberships');
    }
}
