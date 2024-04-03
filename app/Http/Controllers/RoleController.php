<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->user()->can('role-view')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }

        $roles = Role::orderBy('name')->whereNot('id', 1)->paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!request()->user()->can('role-create')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!request()->user()->can('role-create')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name',
            'description' => 'nullable|max:40',
            'status' => 'boolean'
        ]);

        Role::create($validatedData);
        return redirect()->route('roles.index')->with(Toastr::success('Role Created Successfully!'));
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
    public function edit(string $id)
    {
        if (!request()->user()->can('role-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!request()->user()->can('role-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'description' => 'nullable|max:40'
        ]);

        Role::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('roles.index')->with(Toastr::success('Role Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!request()->user()->can('role-delete')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        Role::findOrFail($id)->delete();
        return redirect()->route('roles.index')->with(Toastr::success('Role Deleted Successfully!'));
    }


    /**
     * Show the form for editing the permissions of specified resource.
     */
    public function edit_permission(string $id)
    {
        if (!request()->user()->can('role-give-permission')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $role = Role::findOrFail($id);
        return view('roles.edit_permission', compact('role'));
    }

    /**
     * Update the permissions of specified resource.
     */
    public function update_permission(Request $request, string $id)
    {

        if (!request()->user()->can('role-give-permission')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $role = Role::findOrFail($id);

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with(Toastr::success('Permissions added Successfully!'));
    }
}
