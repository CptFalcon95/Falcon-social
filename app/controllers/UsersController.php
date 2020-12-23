<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Response;

use App\User;

class UsersController 
{
    public function index()
    {
        $users = App::get('database')->selectAll('names');
        return view('users', ['users' => $users]);
    }

    public function store()
    {
        $user = new User(
            $_POST['name'], 
            $_POST['email'], 
            $_POST['password'],
            $_POST['password_repeat']
        );
        if(!$user->validate()) {
            Response::json([
                'success' => 'false', 
                'errors' => $user->getErrors()
            ]);
        }
        if($user->save()) {
            Response::json([
                'success' => 'true', 
                'user' => [
                    'email' => $user->email, 
                    'name' => $user->name
                ]
            ]);
        }
    }
}