<?php

class RoleTableSeeder extends Seeder {

    public function run()
    {
        Role::create([
            'name'=>'Quản lý hệ thống',
        ]);
        Role::create([
            'name'=>'Sale',
        ]);
        Role::create([
            'name'=>'Manager cấp trung',
        ]);
       
        
    }

}