<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostRelatedTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('code',50);
            $table->string('title',200);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->text('description');
            $table->string('primary_image_path');
            $table->timestamps();

            $table->foreignId('category_id')->constrained('post_categories')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('post_images', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('image_path');
            $table->timestamps();
            
            $table->foreignId('post_id')->constrained('posts')->onUpdate('cascade')->onDelete('cascade');

        });
        Schema::create('post_comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->timestamps();

            $table->foreignId('post_id')->cons€trained('posts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->cons€trained('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_related_tables');
    }
}
