<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_directors', function (Blueprint $table) {
            $table->id();
             $table->string('company_name', 150)->nullable('false');
             $table->unsignedBigInteger('company_id');
             $table->unsignedBigInteger('director_id');
             $table->foreign('company_id')->references('id')->on('companies')->nullable('false');
             $table->string('director_name', 150)->nullable('false');
             $table->foreign('director_id')->references('id')->on('directors')->nullable('false');
             $table->string('ned_type', 50)->nullable();//dropdown
             $table->string('independent_type', 50)->nullable();//dropdown
             $table->string('status', 150)->nullable('false');//dropdown active former
             $table->string('board')->nullable();//dropdown chairman/member            
             $table->date('joining_date')->nullable();//dropdown            
             $table->date('leaving_date')->nullable();//dropdown             
             $table->unsignedBigInteger('director_fee')->nullable();//dropdown             
             $table->unsignedBigInteger('superannuation')->nullable();//dropdown             
             $table->unsignedBigInteger('other_fee')->nullable();//dropdown             
             $table->unsignedBigInteger('vested_share')->nullable();//dropdown             
             $table->unsignedBigInteger('unvested_share')->nullable();//dropdown             
             $table->unsignedBigInteger('committee_fee')->nullable();//dropdown             
             $table->unsignedBigInteger('total_fee')->nullable();//dropdown             
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
        Schema::dropIfExists('company_directors');
    }
}
