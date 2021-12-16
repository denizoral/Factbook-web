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
            $table->foreignId('author')->unsigned()->onDelete('cascade');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->boolean('edited')->nullable();
            $table->timestamps();

            $table->foreign('author')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('comment_author')->references('id')->on('comments')
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
        Schema::dropIfExists('posts');
    }
}
