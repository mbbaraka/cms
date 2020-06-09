<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('thumbnail')->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('image_url')->nullable();
            $table->text('details');
            $table->string('post_type')->nullable();
            $table->enum('is_published', ['1', '0']);
            $table->enum('is_root', ['1', '0']);
            $table->string('root')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
