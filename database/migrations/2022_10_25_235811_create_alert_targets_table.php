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
        // DONE
        Schema::create('alert_targets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('name');
            $table->text('description');
            $table->text('type'); // email/text/webhook/slack/rocketchat/teams
            $table->text('target');
            $table->json('configuration')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            
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
        Schema::dropIfExists('alert_targets');
    }
};
