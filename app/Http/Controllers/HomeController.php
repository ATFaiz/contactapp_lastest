<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userIndex()
    {
        return redirect()->route('user.index');
    }

    public function adminIndex(){
        $contacts = Contact::all();
        Auth::user()->role == 1;
        return view('admin-home',  compact('contacts'));    
    }
}
