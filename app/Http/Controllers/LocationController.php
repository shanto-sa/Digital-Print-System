<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::with(['creator'])->latest()->paginate(10);
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:locations,name',
            'status' => 'nullable'
        ]);

        $validatedData['created_by'] = auth()->user()->id;

        Location::create($validatedData);
        return redirect()->route('locations.index')->with(Toastr::success('সফলভাবে বিভাগ যুক্ত করেছেন!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:locations,name,' . $location->id,
        ]);
        $validatedData['status'] = $request->status ?? 0;

        $location->update($validatedData);
        return redirect()->route('locations.index')->with(Toastr::success('সফলভাবে বিভাগ আপডেট করেছেন !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->back()->with(Toastr::success('সফলভাবে বিভাগ মুছে ফেলেছেন!'));
    }
}
