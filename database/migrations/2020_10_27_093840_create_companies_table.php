<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable('false');
            $table->string('code', 10)->nullable('false');
            $table->string('index', 10)->nullable('false');
            $table->string('industry', 50)->nullable('false');
            $table->smallInteger('no_of_employees')->nullable();
            $table->string('min_share_c_e', 50)->nullable();
            $table->smallInteger('min_share_time_c_e')->nullable();
            $table->string('min_share_o_e', 50)->nullable();
            $table->smallInteger('min_share_time_o_e')->nullable();
            $table->string('min_share_n_e', 50)->nullable();
            $table->smallInteger('min_share_time_n_e')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
