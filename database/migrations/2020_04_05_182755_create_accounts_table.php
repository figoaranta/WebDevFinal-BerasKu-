<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('userName');
            $table->string('email');
            $table->bigInteger('NIM');
            $table->string('dateOfBirth');
            $table->string('address');
            $table->bigInteger('phoneNumber');
            $table->string('userGenderType')->nullable()->index();
            $table->foreign('userGenderType')->references('genderType')->on('userGenderTypes');
            $table->string('userType')->index();
            $table->foreign('userType')->references('userTypeName')->on('userTypes');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
