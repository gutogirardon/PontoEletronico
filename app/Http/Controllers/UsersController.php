<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function create()
    {

    }

    public function retrieve()
    {
        $users = User::all();
        return view('panel.collaborator.show', compact('users', $users));
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function profile()
    {
        return view('panel.collaborator.profile');
    }


}
