<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('newTypeLog');
            $table->char('oldTypeLog');
            $table->timestamp('dateLog');
            $table->string('description')->nullable();
            $table->unsignedInteger('edited_by');
            $table->unsignedInteger('record_id');
            $table->unsignedInteger('owner');
            $table->timestamps();
            $table->foreign('edited_by')
                ->references('id')->on('users');
            $table->foreign('owner')
                ->references('id')->on('users');
            $table->foreign('record_id')
                ->references('record_id')->on('records');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
}
