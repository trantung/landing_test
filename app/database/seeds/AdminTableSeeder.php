<?php

class AdminTableSeeder extends Seeder {

    public function run()
    {
        if( Admin::where('username', 'admin')->count() == 0 ){
            Admin::create([
                'role_id' => 1,
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('123456'),
                'username'=> 'admin'
            ]);
        }
        // Admin::create([
        //     'role_id' => 1,
        //     'email'=>'tiennq@hocmai.vn',
        //     'password'=>Hash::make('123456'),
        //     'username'=> 'tiennq'
        // ]);
        // Admin::create([
        //     'role_id' => 1,
        //     'email'=>'ngadt2@hocmai.vn',
        //     'password'=>Hash::make('123456'),
        //     'username'=> 'ngadt2'
        // ]);
    }

}