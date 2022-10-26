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
        Schema::create('agent_metadata', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->text('key'); // ip/hostname/last-check-in/inventory/uuid/fingerprint/{service-name}/{container-name}/{process-name}/{logfile-name}/etc
            $table->text('type'); // agent-info/service/container/process/log/etc
            $table->text('friendly_name');
            $table->text('description');
            $table->longtext('value');

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
        Schema::dropIfExists('agent_metadata');
    }
};
