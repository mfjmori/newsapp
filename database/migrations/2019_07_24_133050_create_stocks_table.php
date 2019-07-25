<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')
              ->foreign()
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
            $table->string('url');
            $table->text('image_url')
              ->nullable();
            $table->string('title');
            $table->text('body')
              ->nullable();
            $table->string('source')
              ->nullable();
            $table->integer('likes_count')
              ->nullable();
            $table->dateTime('published_at');
            $table->timestamps();

            $table->unique(['user_id', 'url']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
