<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_users')->delete();
        
        \DB::table('cms_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'photo' => 'uploads/1/2022-02/738px_laravelsvg.png',
                'email' => 'admin@crudbooster.com',
                'password' => '$2y$10$ZKd2ktzQft.K1VR/RCn25uY2BQpC5WkPV44kHQzhlcLtABKUpME6C',
                'id_cms_privileges' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => '2022-02-06 09:57:29',
                'status' => 'Active',
            ),
        ));
        
        
    }
}