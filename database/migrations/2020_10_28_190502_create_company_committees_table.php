<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyCommitteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_committees', function (Blueprint $table) {
             $table->id();
             $table->string('name', 150)->nullable('false');
             $table->string('company_name', 150)->nullable('false');
             $table->unsignedBigInteger('company_id');
             $table->unsignedBigInteger('director_id');
             $table->unsignedBigInteger('committee_id');
             $table->foreign('company_id')->references('id')->on('companies')->nullable('false');
             $table->string('director_name', 150)->nullable('false');

             $table->foreign('director_id')->references('id')->on('directors')->nullable('false');
             $table->foreign('committee_id')->references('id')->on('committees')->nullable('false');
            $table->integer('chair_fee')->nullable('false');
            $table->integer('member_fee')->nullable('false');
            $table->integer('no_of_meetings')->nullable('false');

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
        Schema::dropIfExists('company_committees');
    }
}
