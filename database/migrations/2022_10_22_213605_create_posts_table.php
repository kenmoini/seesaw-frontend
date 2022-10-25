<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('thread_id');
            $table->foreign('thread_id')->references('id')->on('threads');

            $table->text('title')->nullable();
            $table->longtext('body');
            $table->enum('visibility', ['public', 'authenticated', 'private']);
            $table->text('type'); // ['informational', 'identified', 'scheduled', 'in-progress', 'completed', 'resolved']

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
};
