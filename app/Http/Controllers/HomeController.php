<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Customer;

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
        if (Auth::user()->hasAnyRoles(['Admin', 'Manager'])) {
            return view('admin.users.index')->with('users', User::paginate(5));
        }
        elseif (Auth::user()->hasAnyRoles(['Front Desk'])) {
            return view('customers.index')->with('customers', Customer::paginate(5));
        }
        
        return redirect('logout');
        
    }
}
