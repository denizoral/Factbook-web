<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment_content');
            $table->bigInteger('comment_author')->unsigned();
            $table->bigInteger('post_author')->unsigned();
            $table->timestamps();

            $table->foreign('comment_author')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('post_author')->references('id')
                ->on('posts')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
