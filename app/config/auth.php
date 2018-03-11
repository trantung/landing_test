<?php

return array(

    'multi' => array(
        'admin' => array(
            'driver' => 'eloquent',
            'model' => 'Admin'
        ),
        'user' => array(
            'driver' => 'database',
            'table' => 'users'
        ),
        'teacher' => array(
            'driver' => 'database',
            'table' => 'teachers'
        ),
    ),

    'reminder' => array(

        'email' => 'emails.auth.reminder',

        'table' => 'password_reminders',

        'expire' => 60,

    ),

);
