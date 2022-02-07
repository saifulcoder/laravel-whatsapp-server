<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLaravelWaServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('whatsapp_log');

        Schema::dropIfExists('users');

        Schema::dropIfExists('personal_access_tokens');

        Schema::dropIfExists('password_resets');

        Schema::dropIfExists('outbox');

        Schema::dropIfExists('failed_jobs');

        Schema::dropIfExists('device');

        Schema::dropIfExists('contact');

        Schema::dropIfExists('cms_users');

        Schema::dropIfExists('cms_statistics');

        Schema::dropIfExists('cms_statistic_components');

        Schema::dropIfExists('cms_settings');

        Schema::dropIfExists('cms_privileges_roles');

        Schema::dropIfExists('cms_privileges');

        Schema::dropIfExists('cms_notifications');

        Schema::dropIfExists('cms_moduls');

        Schema::dropIfExists('cms_menus_privileges');

        Schema::dropIfExists('cms_menus');

        Schema::dropIfExists('cms_logs');

        Schema::dropIfExists('cms_email_templates');

        Schema::dropIfExists('cms_email_queues');

        Schema::dropIfExists('cms_dashboard');

        Schema::dropIfExists('cms_apikey');

        Schema::dropIfExists('cms_apicustom');
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

        Schema::create('cms_apikey', function (Blueprint $table) {
            $table->increments('id');
            $table->string('screetkey')->nullable();
            $table->integer('hit')->nullable();
            $table->string('status', 25)->default('active');
            $table->timestamps();
        });

        Schema::create('cms_dashboard', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('id_cms_privileges')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_email_queues', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('send_at')->nullable();
            $table->string('email_recipient')->nullable();
            $table->string('email_from_email')->nullable();
            $table->string('email_from_name')->nullable();
            $table->string('email_cc_email')->nullable();
            $table->string('email_subject')->nullable();
            $table->text('email_content')->nullable();
            $table->text('email_attachments')->nullable();
            $table->boolean('is_sent')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_email_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('subject')->nullable();
            $table->longText('content')->nullable();
            $table->string('description')->nullable();
            $table->string('from_name')->nullable();
            $table->string('from_email')->nullable();
            $table->string('cc_email')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ipaddress', 50)->nullable();
            $table->string('useragent')->nullable();
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->text('details')->nullable();
            $table->integer('id_cms_users')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('type')->default('url');
            $table->string('path')->nullable();
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->integer('parent_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_dashboard')->default(false);
            $table->integer('id_cms_privileges')->nullable();
            $table->integer('sorting')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_menus_privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cms_menus')->nullable();
            $table->integer('id_cms_privileges')->nullable();
        });

        Schema::create('cms_moduls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('path')->nullable();
            $table->string('table_name')->nullable();
            $table->string('controller')->nullable();
            $table->boolean('is_protected')->default(false);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cms_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cms_users')->nullable();
            $table->string('content')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_read')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->boolean('is_superadmin')->nullable();
            $table->string('theme_color')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_privileges_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_visible')->nullable();
            $table->boolean('is_create')->nullable();
            $table->boolean('is_read')->nullable();
            $table->boolean('is_edit')->nullable();
            $table->boolean('is_delete')->nullable();
            $table->integer('id_cms_privileges')->nullable();
            $table->integer('id_cms_moduls')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->string('content_input_type')->nullable();
            $table->string('dataenum')->nullable();
            $table->string('helper')->nullable();
            $table->timestamps();
            $table->string('group_setting')->nullable();
            $table->string('label')->nullable();
        });

        Schema::create('cms_statistic_components', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cms_statistics')->nullable();
            $table->string('componentID')->nullable();
            $table->string('component_name')->nullable();
            $table->string('area_name', 55)->nullable();
            $table->integer('sorting')->nullable();
            $table->string('name')->nullable();
            $table->longText('config')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        Schema::create('cms_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('id_cms_privileges')->nullable();
            $table->timestamps();
            $table->string('status', 50)->nullable();
        });

        Schema::create('contact', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->nullable();
            $table->string('number', 50)->nullable();
            $table->integer('id_users')->nullable();
            $table->integer('id_device')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::create('device', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_users')->nullable();
            $table->string('number', 100)->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('status')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('outbox', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('number')->nullable();
            $table->text('text')->nullable();
            $table->string('status', 5)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->integer('id_device')->nullable();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tokenable_type');
            $table->unsignedBigInteger('tokenable_id');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();

            $table->index(['tokenable_type', 'tokenable_id']);
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

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

        Schema::dropIfExists('users');

        Schema::dropIfExists('personal_access_tokens');

        Schema::dropIfExists('password_resets');

        Schema::dropIfExists('outbox');

        Schema::dropIfExists('failed_jobs');

        Schema::dropIfExists('device');

        Schema::dropIfExists('contact');

        Schema::dropIfExists('cms_users');

        Schema::dropIfExists('cms_statistics');

        Schema::dropIfExists('cms_statistic_components');

        Schema::dropIfExists('cms_settings');

        Schema::dropIfExists('cms_privileges_roles');

        Schema::dropIfExists('cms_privileges');

        Schema::dropIfExists('cms_notifications');

        Schema::dropIfExists('cms_moduls');

        Schema::dropIfExists('cms_menus_privileges');

        Schema::dropIfExists('cms_menus');

        Schema::dropIfExists('cms_logs');

        Schema::dropIfExists('cms_email_templates');

        Schema::dropIfExists('cms_email_queues');

        Schema::dropIfExists('cms_dashboard');

        Schema::dropIfExists('cms_apikey');

        Schema::dropIfExists('cms_apicustom');
    }
}
