<?php

class RoleTableSeeder extends Seeder {

    public function run()
    {
        if( Role::where('slug', 'admin')->count() == 0 ){
            Role::create([
                'name'=>'Quản lý hệ thống',
                'slug'=>'admin'
            ]);
        }
        if( Role::where('slug', 'webmaster')->count() == 0 ){
            Role::create([
                'name'=>'Webmaster',
                'slug'=>'webmaster'
            ]);
        }
        if( Role::where('slug', 'gmo')->count() == 0 ){
            Role::create([
                'name'=>'Gmo',
                'slug'=>'gmo'
            ]);
        }
        if( Role::where('slug', 'sale')->count() == 0 ){
            Role::create([
                'name'=>'Sale',
                'slug'=>'sale'
            ]);
        }
        if( Role::where('slug', 'teacher')->count() == 0 ){
            Role::create([
                'name'=>'Giáo viên',
                'slug'=>'teacher'
            ]);
        }
    }

}