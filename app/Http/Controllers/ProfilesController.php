<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfilesController extends Controller
{
    public function profiles()
    {
        return $profiles = Profile::all();
    }
}
