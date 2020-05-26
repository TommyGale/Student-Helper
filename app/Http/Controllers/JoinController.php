<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;


class JoinController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth')->except(['']);
    }
   
public function eventJoined(Event $event){

		$event->join();

		return back();

}


public function eventUnjoined(Event $event){

		$user = auth()->user()->id;

		$event->joins()->wherePivot('user_id' , '=', $user)->detach();

		return back();

}


}
