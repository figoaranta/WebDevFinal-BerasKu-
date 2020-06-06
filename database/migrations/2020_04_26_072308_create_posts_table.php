<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('accounts')->onDelete('cascade');
            $table->bigInteger('productId')->unsigned();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->string('postTitle');
            $table->string('postDescription');
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
        Schema::dropIfExists('posts');
    }
}
