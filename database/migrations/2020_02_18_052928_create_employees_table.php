<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('address');
            $table->text('age');
            $table->text('gender');
            $table->string('email');
            $table->text('phonenumber');
            $table->date('bornday');
            $table->unsignedBigInteger('positions_id');
            $table->date('joined_at');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('educations_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('positions_id')->references('id')->on('positions');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('educations_id')->references('id')->on('educations');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
