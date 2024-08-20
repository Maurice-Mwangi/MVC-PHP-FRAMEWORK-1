<?php

class User 
{
    
    use Model;

    protected $table = 'users';

    // columns that are editeable or writable
    protected $allowedColumns = [
        'user_names', 'email_address'
    ];
}