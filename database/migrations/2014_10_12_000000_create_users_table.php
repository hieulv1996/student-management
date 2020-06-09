<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("userId")->unique();
            $table->string('email')->unique();
            $table->string("phoneNumber")->unique();
            $table->string('password');
            $table->string('fullName');
            $table->date("dob")->nullable(true);
            $table->boolean("gender")->default(true);
            $table->string("permanentAddress", 255)->nullable(true);
            $table->string("temporaryAddress", 255)->nullable(true);
            $table->string("identityCard")->nullable(true);
            $table->string("roleId")->default("role01");
            $table->boolean("active")->default(true);
            $table->string("classCode")->nullable(true);
            $table->integer("departmentId")->nullable(true);
            $table->integer("majorId")->nullable(true);
            $table->string("createdBy")->default("Administrator");
            $table->string("updatedBy")->default("Administrator");
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
        Schema::dropIfExists('users');
    }
}
