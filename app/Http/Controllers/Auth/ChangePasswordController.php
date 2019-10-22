<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use DB;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (Auth::user()->id == $id) {
        //     return redirect()->route('admin.users.index')->with('warning', 'You cannot edit yourself.');
        // }

        return view('auth.passwords.changepass')->with(['user' => User::findorfail($id), 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $old_pas = $user->password;


        $oldpass = request('older_pass');
        $newpass = request('new_pass');
        $confpass = request('conf_pass');
        // $passwordold = bcrypt(request('old_pass'));
        // dd(Hash::check($oldpass, $old_pas));


        if (!Hash::check($oldpass, $old_pas)) {
            return redirect()->route('passwords.edit', Auth::user()->id)->with('warning', 'Sorry your old password is wrong.');
        }
        elseif ($newpass != $confpass) {
            return redirect()->route('passwords.edit', Auth::user()->id)->with('warning', "Sorry new and confirm password don't match");
        }
        elseif(Hash::check($oldpass, $old_pas) and $newpass == $confpass) {

            $password = bcrypt(request('new_pass'));

            DB::table('users')->where('id', Auth::user()->id)->update(array('password' => $password));

            return redirect()->route('home')->with('success', "Your password has been change");
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
