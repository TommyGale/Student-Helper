<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dashboard;

class ProfilesController extends Controller
{
   public function show(User $user) {

   	return view('profiles.show', [
            'profileUser' => $user,
            'dashboards' => Dashboard::feed($user)
        ]);

   }
}
