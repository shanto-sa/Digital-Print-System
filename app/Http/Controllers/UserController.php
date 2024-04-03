<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->user()->can('user-view')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $users = User::where('id', '!=', 1)->latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!request()->user()->can('user-create')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $roles = Role::orderBy('name')->whereNot('id', 1)->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!request()->user()->can('user-create')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }

        $request->validate([
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'nullable'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with(Toastr::success('User Created Successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (!request()->user()->can('user-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $roles = Role::orderBy('name')->whereNot('id', 1)->get();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        if (!request()->user()->can('user-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $request->validate([
            'username' => 'required|string|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'nullable'
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);
        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with(Toastr::success('User Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (!request()->user()->can('user-delete')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $user->delete();
        return redirect()->route('users.index')->with(Toastr::success('User Deleted Successfully!'));
    }
}
