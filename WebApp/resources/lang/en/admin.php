<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'dayclass' => [
        'title' => 'Dayclass',

        'actions' => [
            'index' => 'Dayclass',
            'create' => 'New Dayclass',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'endingTime' => 'EndingTime',
            'horaireID' => 'HoraireID',
            'name' => 'Name',
            'room' => 'Room',
            'startingTime' => 'StartingTime',
            'suffix' => 'Suffix',
            'teacher' => 'Teacher',
            
        ],
    ],

    'horaire' => [
        'title' => 'Horaire',

        'actions' => [
            'index' => 'Horaire',
            'create' => 'New Horaire',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'day' => 'Day',
            'guildId' => 'GuildId',
            'month' => 'Month',
            'year' => 'Year',
            
        ],
    ],

    'config' => [
        'title' => 'Config',

        'actions' => [
            'index' => 'Config',
            'create' => 'New Config',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'guildId' => 'GuildId',
            'logchannel' => 'Logchannel',
            'prefix' => 'Prefix',
            'welcomechannel' => 'Welcomechannel',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];