<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Http\Requests\ThreadPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('threads.index', [
        'threads' => Thread::with('user')->latest()->get(),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(ThreadPostRequest $request)
    {

      $user_id = Auth::id();
      
      // The incoming request is valid...
  
      // Retrieve the validated input data...
      $validated = $request->validated();

      //dd($validated);


      $thread = new Thread;

      $thread->user_id = $user_id;
      $thread->title = $validated['title'];
      $thread->visibility = $validated['visibility'];

      if (isset($validated['end_date'])) {
        // Mutate the input to match what the database expects
        $hour = "00";
        $minute = "00";
        $second = "00";
        $meridiem = "AM";
        if (isset($validated['end_time_hour'])) {
          $hour = $validated['end_time_hour'];
        }
        if (isset($validated['end_time_minute'])) {
          $minute = $validated['end_time_minute'];
        }
        if (isset($validated['end_time_meridiem'])) {
          $meridiem = $validated['end_time_meridiem'];
        }
        if ($meridiem == "PM" && $hour != "12") {
          $hour = $hour + 12;
        }
        // TIMESTAMP = 1970-01-01 00:00:01
        $end_date = $validated['end_date'] . " " . $hour . ":" . $minute . ":" . $second;
        $thread->ended_at = $end_date;
      }

      if ($thread->save()) {
        // Get the Thread ID
        $thread_id = $thread->id;

        // Store the Post for the thread
        $post = new Post;
        
        $post->user_id = $user_id;
        $post->thread_id = $thread_id;
        $post->visibility = $validated['visibility'];
        $post->body = $validated['message'];
        $post->type = $validated['type'];
        
        if ($post->save()) {
          return redirect()->route('threads.index');
        } else {
          return redirect()->route('threads.create')->with('error', 'There was an error creating the thread post.');
        }
        
      } else {
        return redirect()->route('threads.create')->with('error', 'There was an error creating the thread.');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
