<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Notifications\Birthday;
use Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function update(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->dob = $request->dob;
        $user->update();

        return redirect()->back();
    }

    public function birthday() {
        $i = 0;

        //Get users with birthday today
        $users = User::whereMonth('dob', '=', date('m'))->whereDay('dob', '=', date('d'))->get();

        foreach($users as $user)
        {
            $user->notify(new Birthday($user));
            // Notification::send($user->email, new Birthday($user));
            $i++;
        }

        // $this->info($i.' Birthday messages sent successfully!');
        return redirect()->back();
    }
}
