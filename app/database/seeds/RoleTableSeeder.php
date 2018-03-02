<?php

class RoleTableSeeder extends Seeder {

    public function run()
    {
        Role::create([
            'name'=>'Quản lý hệ thống',
            'slug'=>'admin'
        ]);
        Role::create([
            'name'=>'Webmaster',
            'slug'=>'webmaster'
        ]);
        Role::create([
            'name'=>'Sale',
            'slug'=>'sale'
        ]);
        Role::create([
            'name'=>'Giáo viên',
            'slug'=>'teacher'
        ]);
    }

}