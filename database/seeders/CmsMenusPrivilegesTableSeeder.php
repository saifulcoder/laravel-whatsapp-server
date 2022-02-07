<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsMenusPrivilegesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_menus_privileges')->delete();
        
        \DB::table('cms_menus_privileges')->insert(array (
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
        
        
    }
}