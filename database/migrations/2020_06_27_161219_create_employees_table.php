<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('designation');
            $table->string('previous_station');
            $table->string('joining_date');
            $table->string('retirement_date');
            $table->string('image')->nullable();
            $table->string('nid_number');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('education');
            $table->string('dob')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
