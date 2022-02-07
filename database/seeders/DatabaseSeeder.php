<?php
// namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Please wait updating the data...');
        # User
        if (DB::table('cms_users')->count() == 0) {
            $password = Hash::make('123456');
            $cms_users = DB::table('cms_users')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'Super Admin',
                'email' => 'admin@crudbooster.com',
                'password' => $password,
                'id_cms_privileges' => 1,
                'status' => 'Active',
            ]);
            // $this->call(CmsApicustomTableSeeder::class);
        // $this->call(CmsMenusTableSeeder::class);
        // $this->call(CmsPrivilegesTableSeeder::class);
        // $this->call(CmsPrivilegesRolesTableSeeder::class);
        // $this->call(CmsSettingsTableSeeder::class);
        // $this->call(CmsUsersTableSeeder::class);
        // $this->call(CmsModulsTableSeeder::class);
        // $this->call(CmsEmailQueuesTableSeeder::class);
        // $this->call(CmsApikeyTableSeeder::class);
        // $this->call(CmsDashboardTableSeeder::class);
        // $this->call(CmsEmailTemplatesTableSeeder::class);
        // $this->call(CmsLogsTableSeeder::class);
        // $this->call(CmsMenusPrivilegesTableSeeder::class);
        // $this->call(CmsNotificationsTableSeeder::class);
        // $this->call(CmsStatisticComponentsTableSeeder::class);
        // $this->call(CmsStatisticsTableSeeder::class);
        // $this->call(ContactTableSeeder::class);
        // $this->call(DeviceTableSeeder::class);
        // $this->call(FailedJobsTableSeeder::class);
        // $this->call(OutboxTableSeeder::class);
        // $this->call(PasswordResetsTableSeeder::class);
        // $this->call(PersonalAccessTokensTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(WhatsappLogTableSeeder::class);
    }
        $this->command->info("Create users completed");
        # User End

        DB::table('cms_menus')->delete();
        
        DB::table('cms_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Device',
                'type' => 'Route',
                'path' => 'AdminDeviceControllerGetIndex',
                'color' => NULL,
                'icon' => 'fa fa-qrcode',
                'parent_id' => 0,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 1,
                'created_at' => '2022-02-06 02:49:42',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Contact',
                'type' => 'Route',
                'path' => 'AdminContactControllerGetIndex',
                'color' => NULL,
                'icon' => 'fa fa-book',
                'parent_id' => 0,
                'is_active' => 0,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 1,
                'created_at' => '2022-02-06 02:53:46',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Outbox',
                'type' => 'Route',
                'path' => 'AdminOutboxControllerGetIndex',
                'color' => NULL,
                'icon' => 'fa fa-send',
                'parent_id' => 0,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 3,
                'created_at' => '2022-02-06 02:59:55',
                'updated_at' => NULL,
            ),
        ));
		DB::table('cms_menus_privileges')->delete();
        
        DB::table('cms_menus_privileges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_cms_menus' => 1,
                'id_cms_privileges' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'id_cms_menus' => 2,
                'id_cms_privileges' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'id_cms_menus' => 3,
                'id_cms_privileges' => 1,
            ),
        ));
        # Email Templates
        DB::table('cms_email_templates')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'name' => 'Email Template Forgot Password Backend',
            'slug' => 'forgot_password_backend',
            'content' => '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>',
            'description' => '[password]',
            'from_name' => 'System',
            'from_email' => 'system@crudbooster.com',
            'cc_email' => null,
        ]);
        $this->command->info("Create email templates completed");

        # CB Modules
        $data = [
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Notifications'),
                'icon' => 'fa fa-cog',
                'path' => 'notifications',
                'table_name' => 'cms_notifications',
                'controller' => 'NotificationsController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Privileges'),
                'icon' => 'fa fa-cog',
                'path' => 'privileges',
                'table_name' => 'cms_privileges',
                'controller' => 'PrivilegesController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Privileges_Roles'),
                'icon' => 'fa fa-cog',
                'path' => 'privileges_roles',
                'table_name' => 'cms_privileges_roles',
                'controller' => 'PrivilegesRolesController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Users_Management'),
                'icon' => 'fa fa-users',
                'path' => 'users',
                'table_name' => 'cms_users',
                'controller' => 'AdminCmsUsersController',
                'is_protected' => 0,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('settings'),
                'icon' => 'fa fa-cog',
                'path' => 'settings',
                'table_name' => 'cms_settings',
                'controller' => 'SettingsController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Module_Generator'),
                'icon' => 'fa fa-database',
                'path' => 'module_generator',
                'table_name' => 'cms_moduls',
                'controller' => 'ModulsController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Menu_Management'),
                'icon' => 'fa fa-bars',
                'path' => 'menu_management',
                'table_name' => 'cms_menus',
                'controller' => 'MenusController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Email_Templates'),
                'icon' => 'fa fa-envelope-o',
                'path' => 'email_templates',
                'table_name' => 'cms_email_templates',
                'controller' => 'EmailTemplatesController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Statistic_Builder'),
                'icon' => 'fa fa-dashboard',
                'path' => 'statistic_builder',
                'table_name' => 'cms_statistics',
                'controller' => 'StatisticBuilderController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('API_Generator'),
                'icon' => 'fa fa-cloud-download',
                'path' => 'api_generator',
                'table_name' => '',
                'controller' => 'ApiCustomController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Log_User_Access'),
                'icon' => 'fa fa-flag-o',
                'path' => 'logs',
                'table_name' => 'cms_logs',
                'controller' => 'LogsController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
        ];

        foreach ($data as $k => $d) {
            if (DB::table('cms_moduls')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }
        }

        DB::table('cms_moduls')->insert($data);
        $this->command->info("Create default cb modules completed");
        # CB Modules End


        # CB Setting
        $data = [

            //LOGIN REGISTER STYLE
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'login_background_color',
                'label' => 'Login Background Color',
                'content' => null,
                'content_input_type' => 'text',
                'group_setting' => cbLang('login_register_style'),
                'dataenum' => null,
                'helper' => 'Input hexacode',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'login_font_color',
                'label' => 'Login Font Color',
                'content' => null,
                'content_input_type' => 'text',
                'group_setting' => cbLang('login_register_style'),
                'dataenum' => null,
                'helper' => 'Input hexacode',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'login_background_image',
                'label' => 'Login Background Image',
                'content' => null,
                'content_input_type' => 'upload_image',
                'group_setting' => cbLang('login_register_style'),
                'dataenum' => null,
                'helper' => null,
            ],

            //EMAIL SETTING
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'email_sender',
                'label' => 'Email Sender',
                'content' => 'support@crudbooster.com',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_driver',
                'label' => 'Mail Driver',
                'content' => 'mail',
                'content_input_type' => 'select',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => 'smtp,mail,sendmail',
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_host',
                'label' => 'SMTP Host',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_port',
                'label' => 'SMTP Port',
                'content' => '25',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => 'default 25',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_username',
                'label' => 'SMTP Username',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_password',
                'label' => 'SMTP Password',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => null,
            ],

            //APPLICATION SETTING
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'appname',
                'label' => 'Application Name',
                'group_setting' => cbLang('application_setting'),
                'content' => 'CRUDBooster',
                'content_input_type' => 'text',
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'default_paper_size',
                'label' => 'Default Paper Print Size',
                'group_setting' => cbLang('application_setting'),
                'content' => 'Legal',
                'content_input_type' => 'text',
                'dataenum' => null,
                'helper' => 'Paper size, ex : A4, Legal, etc',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'logo',
                'label' => 'Logo',
                'content' => '',
                'content_input_type' => 'upload_image',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'favicon',
                'label' => 'Favicon',
                'content' => '',
                'content_input_type' => 'upload_image',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'api_debug_mode',
                'label' => 'API Debug Mode',
                'content' => 'true',
                'content_input_type' => 'select',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => 'true,false',
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'google_api_key',
                'label' => 'Google API Key',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'google_fcm_key',
                'label' => 'Google FCM Key',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
        ];

        foreach ($data as $row) {
            $count = DB::table('cms_settings')->where('name', $row['name'])->count();
            if ($count) {
                if ($count > 1) {
                    $newsId = DB::table('cms_settings')->where('name', $row['name'])->orderby('id', 'asc')->take(1)->first();
                    DB::table('cms_settings')->where('name', $row['name'])->where('id', '!=', $newsId->id)->delete();
                }
                continue;
            }
            DB::table('cms_settings')->insert($row);
        }
        $this->command->info("Create cb settings completed");
        # CB Setting End

        # CB Privilege
        if (DB::table('cms_privileges')->where('name', 'Super Administrator')->count() == 0) {
            DB::table('cms_privileges')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'Super Administrator',
                'is_superadmin' => 1,
                'theme_color' => 'skin-red',
            ]);
        }
        if (DB::table('cms_privileges_roles')->count() == 0) {
            $modules = DB::table('cms_moduls')->get();
            $i = 1;
            foreach ($modules as $module) {

                $is_visible = 1;
                $is_create = 1;
                $is_read = 1;
                $is_edit = 1;
                $is_delete = 1;

                switch ($module->table_name) {
                    case 'cms_logs':
                        $is_create = 0;
                        $is_edit = 0;
                        break;
                    case 'cms_privileges_roles':
                        $is_visible = 0;
                        break;
                    case 'cms_apicustom':
                        $is_visible = 0;
                        break;
                    case 'cms_notifications':
                        $is_create = $is_read = $is_edit = $is_delete = 0;
                        break;
                }

                DB::table('cms_privileges_roles')->insert([
                    'created_at' => date('Y-m-d H:i:s'),
                    'is_visible' => $is_visible,
                    'is_create' => $is_create,
                    'is_edit' => $is_edit,
                    'is_delete' => $is_delete,
                    'is_read' => $is_read,
                    'id_cms_privileges' => 1,
                    'id_cms_moduls' => $module->id,
                ]);
                $i++;
            }
        }
		DB::table('cms_settings')->delete();
        
        DB::table('cms_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'login_background_color',
                'content' => NULL,
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => 'Input hexacode',
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Login Register Style',
                'label' => 'Login Background Color',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'login_font_color',
                'content' => NULL,
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => 'Input hexacode',
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Login Register Style',
                'label' => 'Login Font Color',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'login_background_image',
                'content' => NULL,
                'content_input_type' => 'upload_image',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Login Register Style',
                'label' => 'Login Background Image',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'email_sender',
                'content' => 'support@crudbooster.com',
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Email Setting',
                'label' => 'Email Sender',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'smtp_driver',
                'content' => 'mail',
                'content_input_type' => 'select',
                'dataenum' => 'smtp,mail,sendmail',
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Email Setting',
                'label' => 'Mail Driver',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'smtp_host',
                'content' => '',
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Email Setting',
                'label' => 'SMTP Host',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'smtp_port',
                'content' => '25',
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => 'default 25',
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Email Setting',
                'label' => 'SMTP Port',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'smtp_username',
                'content' => '',
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Email Setting',
                'label' => 'SMTP Username',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'smtp_password',
                'content' => '',
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Email Setting',
                'label' => 'SMTP Password',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'appname',
                'content' => 'CRUDBooster',
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Application Setting',
                'label' => 'Application Name',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'default_paper_size',
                'content' => 'Legal',
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => 'Paper size, ex : A4, Legal, etc',
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Application Setting',
                'label' => 'Default Paper Print Size',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'logo',
                'content' => '',
                'content_input_type' => 'upload_image',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Application Setting',
                'label' => 'Logo',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'favicon',
                'content' => '',
                'content_input_type' => 'upload_image',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Application Setting',
                'label' => 'Favicon',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'api_debug_mode',
                'content' => 'true',
                'content_input_type' => 'select',
                'dataenum' => 'true,false',
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Application Setting',
                'label' => 'API Debug Mode',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'google_api_key',
                'content' => '',
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Application Setting',
                'label' => 'Google API Key',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'google_fcm_key',
                'content' => '',
                'content_input_type' => 'text',
                'dataenum' => NULL,
                'helper' => NULL,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'group_setting' => 'Application Setting',
                'label' => 'Google FCM Key',
            ),
        ));
		DB::table('cms_moduls')->delete();
        
        DB::table('cms_moduls')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Notifications',
                'icon' => 'fa fa-cog',
                'path' => 'notifications',
                'table_name' => 'cms_notifications',
                'controller' => 'NotificationsController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Privileges',
                'icon' => 'fa fa-cog',
                'path' => 'privileges',
                'table_name' => 'cms_privileges',
                'controller' => 'PrivilegesController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Privileges Roles',
                'icon' => 'fa fa-cog',
                'path' => 'privileges_roles',
                'table_name' => 'cms_privileges_roles',
                'controller' => 'PrivilegesRolesController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Users Management',
                'icon' => 'fa fa-users',
                'path' => 'users',
                'table_name' => 'cms_users',
                'controller' => 'AdminCmsUsersController',
                'is_protected' => 0,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Settings',
                'icon' => 'fa fa-cog',
                'path' => 'settings',
                'table_name' => 'cms_settings',
                'controller' => 'SettingsController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Module Generator',
                'icon' => 'fa fa-database',
                'path' => 'module_generator',
                'table_name' => 'cms_moduls',
                'controller' => 'ModulsController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Menu Management',
                'icon' => 'fa fa-bars',
                'path' => 'menu_management',
                'table_name' => 'cms_menus',
                'controller' => 'MenusController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Email Templates',
                'icon' => 'fa fa-envelope-o',
                'path' => 'email_templates',
                'table_name' => 'cms_email_templates',
                'controller' => 'EmailTemplatesController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Statistic Builder',
                'icon' => 'fa fa-dashboard',
                'path' => 'statistic_builder',
                'table_name' => 'cms_statistics',
                'controller' => 'StatisticBuilderController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'API Generator',
                'icon' => 'fa fa-cloud-download',
                'path' => 'api_generator',
                'table_name' => '',
                'controller' => 'ApiCustomController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Log User Access',
                'icon' => 'fa fa-flag-o',
                'path' => 'logs',
                'table_name' => 'cms_logs',
                'controller' => 'LogsController',
                'is_protected' => 1,
                'is_active' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Device',
                'icon' => 'fa fa-qrcode',
                'path' => 'device',
                'table_name' => 'device',
                'controller' => 'AdminDeviceController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2022-02-06 02:49:42',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Contact',
                'icon' => 'fa fa-book',
                'path' => 'contact',
                'table_name' => 'contact',
                'controller' => 'AdminContactController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2022-02-06 02:53:46',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Outbox',
                'icon' => 'fa fa-send',
                'path' => 'outbox',
                'table_name' => 'outbox',
                'controller' => 'AdminOutboxController',
                'is_protected' => 0,
                'is_active' => 0,
                'created_at' => '2022-02-06 02:59:55',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        $this->command->info("Create roles completed");
        # CB Privilege End

        $this->command->info('All cb seeders completed !');
    }
}
