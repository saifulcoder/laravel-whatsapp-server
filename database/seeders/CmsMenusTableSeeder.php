<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_menus')->delete();
        
        \DB::table('cms_menus')->insert(array (
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
        
        
    }
}