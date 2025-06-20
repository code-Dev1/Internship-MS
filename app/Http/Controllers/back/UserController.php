<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10)->onEachSide(1);
        return view('admin.user.user')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|email|min:8|max:255|unique:'. User::class,
            'password' => 'required|min:8|max:32|confirmed', Rules\Password::defaults(),
            'role' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        Session::flash('success', 'Successfully Created.');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.add-user')->with('user' , $user);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|email|min:8|max:255|'.Rule::unique('users')->ignore($user->id),
            'role' => 'required'
        ]);
        if($request->filled('old_password')){
            $request->validate([
                'old_password' => 'min:8|max:32',
                'password' => 'min:8|max:32|confirmed', Rules\Password::defaults(),
            ]);
            if(!Hash::check($request->old_password, $user->password)){
                return back()->withErrors(['old_password' => 'old password is wrong.']);
            }
            $user->password = $request->password;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        Session::flash('success','Updated successfully.');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('success','Successfully deleted.');
        return redirect()->route('user.index');
    }
}
