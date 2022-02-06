<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsPrivilegesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_privileges')->delete();
        
        \DB::table('cms_privileges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Administrator',
                'is_superadmin' => 1,
                'theme_color' => 'skin-red',
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}