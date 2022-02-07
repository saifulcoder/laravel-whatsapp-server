<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OutboxTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('outbox')->delete();
        
        \DB::table('outbox')->insert(array (
            0 => 
            array (
                'id' => 1,
                'number' => '6281276010209',
                'text' => 'test aja',
                'status' => '1',
                'created_at' => '2022-02-06 06:58:13',
                'id_device' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'number' => '6281276010209',
                'text' => 'cobain lagi test aja',
                'status' => '1',
                'created_at' => '2022-02-06 07:01:06',
                'id_device' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'number' => '6281276010209',
                'text' => 'cobain lagi nomer im 3',
                'status' => '1',
                'created_at' => '2022-02-06 07:22:16',
                'id_device' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'number' => '081276010209',
                'text' => 'cobain lagi',
                'status' => '0',
                'created_at' => '2022-02-06 08:58:03',
                'id_device' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'number' => '081276010209',
                'text' => 'cobain test',
                'status' => '0',
                'created_at' => '2022-02-06 10:05:31',
                'id_device' => 3,
            ),
        ));
        
        
    }
}