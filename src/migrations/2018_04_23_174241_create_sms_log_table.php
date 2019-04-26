<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('type');
            $table->string('code', 20);
            $table->string('mobile', 20);
            $table->string('ip', 20);
            $table->string('expires', 50);
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
        Schema::dropIfExists('sms_log');
    }
}
