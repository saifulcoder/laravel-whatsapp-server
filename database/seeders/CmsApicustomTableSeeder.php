<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsApicustomTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_apicustom')->delete();
        
        \DB::table('cms_apicustom')->insert(array (
            0 => 
            array (
                'id' => 2,
                'permalink' => 'whatsappwebhook',
                'tabel' => 'whatsapp_log',
                'aksi' => 'save_add',
                'kolom' => NULL,
                'orderby' => NULL,
                'sub_query_1' => NULL,
                'sql_where' => NULL,
                'nama' => 'whatsappwebhook',
                'keterangan' => NULL,
                'parameter' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'method_type' => 'post',
                'parameters' => 'a:3:{i:0;a:5:{s:4:"name";s:6:"number";s:4:"type";s:6:"string";s:6:"config";N;s:8:"required";s:1:"1";s:4:"used";s:1:"1";}i:1;a:5:{s:4:"name";s:7:"message";s:4:"type";s:6:"string";s:6:"config";N;s:8:"required";s:1:"1";s:4:"used";s:1:"1";}i:2;a:5:{s:4:"name";s:10:"session_id";s:4:"type";s:6:"string";s:6:"config";N;s:8:"required";s:1:"1";s:4:"used";s:1:"1";}}',
                'responses' => 'a:6:{i:0;a:4:{s:4:"name";s:2:"id";s:4:"type";s:3:"int";s:8:"subquery";N;s:4:"used";s:1:"1";}i:1;a:4:{s:4:"name";s:6:"number";s:4:"type";s:6:"string";s:8:"subquery";N;s:4:"used";s:1:"1";}i:2;a:4:{s:4:"name";s:7:"message";s:4:"type";s:6:"string";s:8:"subquery";N;s:4:"used";s:1:"1";}i:3;a:4:{s:4:"name";s:10:"session_id";s:4:"type";s:7:"integer";s:8:"subquery";N;s:4:"used";s:1:"1";}i:4;a:4:{s:4:"name";s:6:"status";s:4:"type";s:6:"string";s:8:"subquery";N;s:4:"used";s:1:"1";}i:5;a:4:{s:4:"name";s:3:"tgl";s:4:"type";s:23:"date_format:Y-m-d H:i:s";s:8:"subquery";N;s:4:"used";s:1:"1";}}',
            ),
        ));
        
        
    }
}