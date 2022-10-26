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
        Schema::create('alert_group_alert_target', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('alert_group_id');
            $table->foreign('alert_group_id')->references('id')->on('alert_groups');

            $table->unsignedBigInteger('alert_target_id');
            $table->foreign('alert_target_id')->references('id')->on('alert_targets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alert_group_alert_target');
    }
};
