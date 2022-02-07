<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsApikeyTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_apikey')->delete();
        
        \DB::table('cms_apikey')->insert(array (
            0 => 
            array (
                'id' => 2,
                'screetkey' => '33dc013371c4fa4a3eab797fca6c4e71',
                'hit' => 0,
                'status' => 'active',
                'created_at' => '2022-02-04 10:13:36',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}