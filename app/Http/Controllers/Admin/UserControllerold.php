<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::paginate(5));
        
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($this->validateRequest());
        
        $email = request('email');
        $password = bcrypt(request('password'));
        DB::table('users')->where('email', $email)->update(array('password' => $password));

        $adminRole = Role::where('id', request('role'))->first();
        $user->roles()->attach($adminRole);

        $this->storeImage($user);
        $pass = ['users' => User::paginate(5), 'success' => 'A new employee have been added'];
        return redirect()->route('admin.users.index')->with($pass);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        return view('auth.show')->with(['user' => User::findorfail($id), 'roles' => Role::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You cannot edit yourself.');
        }

        return view('admin.users.edit')->with(['user' => User::findorfail($id), 'roles' => Role::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edituser($id)
    {
        
        return view('admin.users.edituser')->with(['user' => User::findorfail($id), 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($this->validateUserUpdate());
        
        $this->storeImage($user);

        $pass = ['users' => User::paginate(5), 'success' => 'A user data have been updated'];
        return redirect()->route('admin.users.index')->with($pass);



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
        if (Auth::user()->id == $id) {

            return redirect()->route('admin.users.index')->with('warning', 'You cannot update yourself.');
        }

        $user = User::findorfail($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('success', 'User has been updated.');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(Request $request, $id)
    {
        
        $user = User::findorfail($id);

        $user->update($this->validatePUpdate());
        $this->storeImage($user);

        return redirect()->route('auth.show', $id)->with(['user' => User::findorfail($id), 'roles' => Role::all(), 'success' => 'You have updated your data']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You cannot delete yourself.');
        } 

        $user = User::findorfail($id);
        if ($user) {
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User has been deleted.');
        }
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('warning', 'This user cannot be deleted.');
    }


    private function validateRequest()
    {
        return tap(request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string', 'max:6'],
            'role' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:255'],
            'bdate' => ['required', 'date'],
            'mstatus' => ['required', 'string', 'max:10'],
            'emplydate' => ['required', 'date'],
            'salary' => ['required', 'numeric'],
            
        ]), function(){

            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:2000',
                ]);
            }
        });
    }

    private function validatePUpdate()
    {
        return tap(request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required', 'string', 'max:6'],
            'phone' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:255'],
            'bdate' => ['required', 'date'],
            'mstatus' => ['required', 'string', 'max:10'],
            
        ]), function(){

            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:2000',
                ]);
            }
        });
    }

    private function validateUserUpdate()
    {
        return tap(request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required', 'string', 'max:6'],
            'phone' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:255'],
            'bdate' => ['required', 'date'],
            'mstatus' => ['required', 'string', 'max:10'],
            'emplydate' => ['required', 'date'],
            'salary' => ['required', 'numeric'],
            
        ]), function(){

            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:2000',
                ]);
            }
        });
    }

    private function storeImage($user){
        if (request()->has('image')) {
            $user->update([
                'image' => request()->image->store('uploads'), 'public']);
        }
    }
}
