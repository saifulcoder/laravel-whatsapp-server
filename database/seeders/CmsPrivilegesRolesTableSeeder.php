<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsPrivilegesRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_privileges_roles')->delete();
        
        \DB::table('cms_privileges_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'is_visible' => 1,
                'is_create' => 0,
                'is_read' => 0,
                'is_edit' => 0,
                'is_delete' => 0,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 1,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 2,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'is_visible' => 0,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 3,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 4,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 5,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 6,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 7,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 8,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 9,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 10,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'is_visible' => 1,
                'is_create' => 0,
                'is_read' => 1,
                'is_edit' => 0,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 11,
                'created_at' => '2022-02-04 09:46:11',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'is_visible' => 1,
                'is_create' => 1,
                'is_read' => 1,
                'is_edit' => 1,
                'is_delete' => 1,
                'id_cms_privileges' => 1,
                'id_cms_moduls' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}