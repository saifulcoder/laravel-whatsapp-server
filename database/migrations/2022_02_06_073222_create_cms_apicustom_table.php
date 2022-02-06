<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsApicustomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_apicustom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('permalink')->nullable();
            $table->string('tabel')->nullable();
            $table->string('aksi')->nullable();
            $table->string('kolom')->nullable();
            $table->string('orderby')->nullable();
            $table->string('sub_query_1')->nullable();
            $table->string('sql_where')->nullable();
            $table->string('nama')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('parameter')->nullable();
            $table->timestamps();
            $table->string('method_type', 25)->nullable();
            $table->longText('parameters')->nullable();
            $table->longText('responses')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_apicustom');
    }
}
