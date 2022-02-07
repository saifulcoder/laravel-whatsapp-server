<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WhatsappLogTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('whatsapp_log')->delete();
        
        \DB::table('whatsapp_log')->insert(array (
            0 => 
            array (
                'id' => 1,
                'number' => '55151',
                'message' => 'dadsad',
                'session_id' => 'dsds',
                'status' => NULL,
                'tgl' => '2022-02-04 17:43:41',
            ),
            1 => 
            array (
                'id' => 2,
                'number' => '55151',
                'message' => 'dadsad',
                'session_id' => 'dsds',
                'status' => NULL,
                'tgl' => '2022-02-04 17:44:13',
            ),
            2 => 
            array (
                'id' => 3,
                'number' => '6285647166877@s.whatsapp.net',
                'message' => 'sss',
                'session_id' => 'PSB',
                'status' => NULL,
                'tgl' => '2022-02-04 21:38:25',
            ),
            3 => 
            array (
                'id' => 4,
                'number' => '6285647166877@s.whatsapp.net',
                'message' => 'a',
                'session_id' => 'PSB',
                'status' => NULL,
                'tgl' => '2022-02-04 21:53:55',
            ),
            4 => 
            array (
                'id' => 5,
                'number' => '6285647166877@s.whatsapp.net',
                'message' => 'Qtes',
                'session_id' => 'PSB',
                'status' => NULL,
                'tgl' => '2022-02-04 21:54:29',
            ),
            5 => 
            array (
                'id' => 6,
                'number' => '6285647166877@s.whatsapp.net',
                'message' => 's',
                'session_id' => 'psb',
                'status' => NULL,
                'tgl' => '2022-02-06 09:05:34',
            ),
            6 => 
            array (
                'id' => 7,
                'number' => '6285647166877@s.whatsapp.net',
                'message' => 'test',
                'session_id' => 'psb',
                'status' => NULL,
                'tgl' => '2022-02-06 09:07:18',
            ),
            7 => 
            array (
                'id' => 8,
                'number' => '6285647166877@s.whatsapp.net',
                'message' => 'tes',
                'session_id' => 'psb',
                'status' => NULL,
                'tgl' => '2022-02-06 09:15:17',
            ),
            8 => 
            array (
                'id' => 9,
                'number' => '6285647166877@s.whatsapp.net',
                'message' => 'tes',
                'session_id' => 'psb',
                'status' => NULL,
                'tgl' => '2022-02-06 09:17:12',
            ),
            9 => 
            array (
                'id' => 10,
                'number' => '6285647166877@s.whatsapp.net',
                'message' => 'tes',
                'session_id' => 'psb',
                'status' => NULL,
                'tgl' => '2022-02-06 09:20:31',
            ),
            10 => 
            array (
                'id' => 11,
                'number' => '6285647166877@s.whatsapp.net',
                'message' => 'coba',
                'session_id' => 'psb',
                'status' => NULL,
                'tgl' => '2022-02-06 09:20:57',
            ),
        ));
        
        
    }
}