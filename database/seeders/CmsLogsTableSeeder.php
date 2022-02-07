<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsLogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_logs')->delete();
        
        \DB::table('cms_logs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4840.0 Safari/537.36',
                'url' => 'http://localhost/admin/login',
                'description' => 'admin@crudbooster.com login with IP Address 127.0.0.1',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-04 09:47:47',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4840.0 Safari/537.36',
                'url' => 'http://localhost/admin/users/edit-save/1',
                'description' => 'Update data Super Admin at Users Management',
                'details' => '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>photo</td><td></td><td>uploads/1/2022-02/738px_laravelsvg.png</td></tr><tr><td>email</td><td>admin@crudbooster.com</td><td>saiful.coder@gmail.com</td></tr><tr><td>password</td><td>$2y$10$keNqH1vRqSp9XMnAQ6mnheJRN5Z/0W97.p8vNGgdDdrBxfYQ4oijm</td><td>$2y$10$ilfUda.wbdcsLNpJEHwPK.V76hnJ9X3duaSIKT6nHEoOV9dbWDpeO</td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>',
                'id_cms_users' => 1,
                'created_at' => '2022-02-04 09:48:53',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/login',
                'description' => 'saiful.coder@gmail.com login with IP Address 127.0.0.1',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 02:24:00',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/add-save',
                'description' => 'Add New Data nomer simpati at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 03:04:53',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/delete/1',
                'description' => 'Delete data nomer simpati at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 03:05:52',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/add-save',
                'description' => 'Add New Data test at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 03:07:31',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/contact/add-save',
                'description' => 'Add New Data saiful anwar at Contact',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 05:57:15',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/contact/edit-save/1',
                'description' => 'Update data saiful anwar at Contact',
                'details' => '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>id_users</td><td></td><td></td></tr><tr><td>id_device</td><td></td><td></td></tr><tr><td>deleted_at</td><td></td><td></td></tr></tbody></table>',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 05:59:56',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/outbox/add-save',
                'description' => 'Add New Data  at Outbox',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 06:58:14',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/outbox/add-save',
                'description' => 'Add New Data  at Outbox',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 07:01:08',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/contact/delete/1',
                'description' => 'Delete data saiful anwar at Contact',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 07:01:49',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/delete/2',
                'description' => 'Delete data test at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 07:16:43',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/add-save',
                'description' => 'Add New Data nomer im 3 at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 07:20:21',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/outbox/add-save',
                'description' => 'Add New Data  at Outbox',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 07:22:17',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/outbox/add-save',
                'description' => 'Add New Data  at Outbox',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 08:58:04',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/users/edit-save/1',
                'description' => 'Update data Super Admin at Users Management',
                'details' => '<table class="table table-striped"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>email</td><td>saiful.coder@gmail.com</td><td>admin@crudbooster.com</td></tr><tr><td>password</td><td>$2y$10$ilfUda.wbdcsLNpJEHwPK.V76hnJ9X3duaSIKT6nHEoOV9dbWDpeO</td><td>$2y$10$ZKd2ktzQft.K1VR/RCn25uY2BQpC5WkPV44kHQzhlcLtABKUpME6C</td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 09:57:29',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/outbox/add-save',
                'description' => 'Add New Data  at Outbox',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 10:05:32',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/delete/3',
                'description' => 'Delete data nomer im 3 at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 10:05:50',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/add-save',
                'description' => 'Add New Data nomer im 3 at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 10:13:17',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/delete/4',
                'description' => 'Delete data nomer im 3 at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 10:13:50',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/add-save',
                'description' => 'Add New Data nomer im 3 at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 10:14:22',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'ipaddress' => '127.0.0.1',
            'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4867.0 Safari/537.36',
                'url' => 'http://localhost/admin/device/delete/5',
                'description' => 'Delete data nomer im 3 at Device',
                'details' => '',
                'id_cms_users' => 1,
                'created_at' => '2022-02-06 10:17:06',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}