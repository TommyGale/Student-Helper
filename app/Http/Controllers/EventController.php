<?php

namespace App\Http\Controllers;


use App\Event;
use Illuminate\Http\Request;


class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    
    public function index()
    {

        $events = Event::paginate(9);


        return view('events.index' , compact('events'));
    }

    
    public function create()
    {
        return view('events.create');
    }

   
    public function store()
    {
        
        auth()->user()->events()->create($attributes= $this->validData());


        return redirect('/events');
    }

    
    public function show(Event $event)
    {

       return view ('events.show', compact('event'));
    }

   
    public function edit(Event $event)
    {

    if($event->user_id !== auth()->id()){
            
          return redirect()->back();
        }
        
       return view ('events.edit', compact('event')); 
    }

    public function update(Event $event)
    {
         $event->update($this->validData());

        return redirect('/events');
    }

    public function destroy(Event $event)
    {
     
      $event->delete();

      return redirect('/events');
    }



    protected function validData() {

        return request()->validate([
         'title' => ['required', 'min:4','max:50'],
        'description' => ['required', 'min:10','max:255'], 
        'start_date' => ['required',],
        '' => ['required',]
        ]);

    }


    }

