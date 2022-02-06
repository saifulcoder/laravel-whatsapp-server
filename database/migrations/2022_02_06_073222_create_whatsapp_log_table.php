<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_log', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('number')->nullable();
            $table->string('message')->nullable();
            $table->string('session_id')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('tgl')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp_log');
    }
}
