<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title',155);
            $table->bigInteger('article_image_id')->nullable(); // Foreign Key
            $table->text('description');
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->enum('status', ['published','draft']);
            $table->integer('views')->unsigned()->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('articles');
    }
}
