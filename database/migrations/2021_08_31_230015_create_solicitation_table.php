<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_wepayout')->unique();
            $table->integer('user_id')->unsigned();
            $table->string('status')->nullable();
            $table->string('status_payment')->nullable();
            $table->double('payment_value', 6, 2);
            $table->string('process_bank')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitation');
    }
}
