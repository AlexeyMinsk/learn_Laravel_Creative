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
            $table->string('title');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('content');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('like')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();

            $table->softDeletes();

            $table->index('category_id', 'post_categiry_idx');
            $table->foreign('category_id', 'post_category_fk')
                ->on('categories')->references('id');
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
