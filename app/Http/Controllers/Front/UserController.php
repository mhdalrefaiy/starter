<?php
namespace App\Http\Controllers\Front;

class UserController 
{
    public function showUserName(){
        return "mohamad alrefaiy";
    }

    public function getIndex(){
        return view('welcome')-> with('name','mohamad');
    }

    public function index()
    {
        return view('welcome');
    }
}