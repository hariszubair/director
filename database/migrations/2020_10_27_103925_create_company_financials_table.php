<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_financials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
             $table->foreign('company_id')->references('id')->on('companies')->nullable('false');
            $table->smallInteger('year')->nullable('false'); //by default2020
            $table->integer('sale_revenue')->nullable('false');
            $table->integer('underlying_profit')->nullable('false');
            $table->integer('a_c_i')->nullable('false');
            $table->float('roci')->nullable('false');
            $table->integer('weight_share')->nullable('false');
            $table->float('basic_eps')->nullable('false');
            $table->integer('free_cashflow')->nullable('false');
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
        Schema::dropIfExists('company_financials');
    }
}
