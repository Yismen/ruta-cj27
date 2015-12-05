<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_number')->unique()->index(); //Ficha
            $table->string('full_name', 250);
            $table->string('main_image', 250);
            $table->string('personal_id', 250);
            $table->timestamp('dob'); //Date of birth
            $table->string('cellphone', 15);
            $table->string('phone', 15)->nullable(); // House number
            $table->string('address', 150);
            $table->text('city');
            $table->string('card_number', 15);
            $table->string('car_id', 15); // Matricula
            $table->string('plate_number', 15);
            $table->string('reference', 15);
            $table->string('reference_phone', 15);

            $table->timestamps();

            // $table->foreign('ciudad_id')->references('id')->on('cities')
            //     ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drivers');
    }
}
