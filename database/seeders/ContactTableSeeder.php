<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact')->delete();
        
        \DB::table('contact')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'saiful anwar',
                'number' => '085647166877',
                'id_users' => NULL,
                'id_device' => NULL,
                'created_at' => '2022-02-06 05:57:15',
                'updated_at' => '2022-02-06 05:59:56',
                'deleted_at' => '2022-02-06 07:01:49',
            ),
        ));
        
        
    }
}