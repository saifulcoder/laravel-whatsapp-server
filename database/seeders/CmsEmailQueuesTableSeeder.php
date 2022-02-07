<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsEmailQueuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_email_queues')->delete();
        
        
        
    }
}