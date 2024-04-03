<?php

namespace App\Http\Controllers;

use App\Models\Dag;
use App\Models\Location;
use App\Models\Mouza;
use App\Models\MouzaNew;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dags = Dag::with(['location', 'mouza', 'newmouza', 'creator'])->latest()->paginate(10);
        return view('dags.index', compact('dags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::where('status', 1)->latest()->get();
        return view('dags.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'location_id' => 'required',
            'mouza_id' => 'required',
            'new_mouza_id' => 'required',
            'map_type' => 'required|string',
            'jalno' => 'required|string',
            'dag_no' => 'nullable',
            'map_image' => 'required|mimes:png,jpg,pdf',
            'sit_no' => 'nullable',
            'status' => 'nullable'
        ]);
        $validatedData['created_by'] = auth()->user()->id;

        if ($request->file('map_image') != null) {
            $map_image = $request->file('map_image');
            $filename = Str::random(10) . '.' . $map_image->getClientOriginalExtension();
            $map_image->move(public_path('images/maps'), $filename);

            $validatedData['map_image'] = $filename;
        }

        $validatedData['created_by'] = auth()->user()->id;

        Dag::create($validatedData);
        return redirect()->route('dags.index')->with(Toastr::success('ম্যাপ সফল ভাবে যুক্ত করেছেন!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Dag $dag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dag $dag)
    {
        $locations = Location::where('status', 1)->get();
        $mouzas = Mouza::where('location_id', $dag->location_id)->where('status', 1)->get();
        $newmouzas = MouzaNew::where('mouzas_id', $dag->mouza_id)->where('status', 1)->get();
        return view('dags.edit', compact('dag', 'locations', 'mouzas', 'newmouzas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dag $dag)
    {
        $validatedData = $request->validate([
            'location_id' => 'required',
            'mouza_id' => 'required',
            'new_mouza_id' => 'required',
            'map_type' => 'required|string',
            'jalno' => 'required|string',
            'dag_no' => 'nullable',
            'map_image' => 'required|mimes:png,jpg',
            'sit_no' => 'nullable',
            'status' => 'nullable'
        ]);
        $validatedData['status'] = $request->status ?? 0;

        if ($request->file('map_image') != null) {
            $map_image = $request->file('map_image');
            $filename = Str::random(10) . '.' . $map_image->getClientOriginalExtension();
            $map_image->move(public_path('images/maps'), $filename);

            $validatedData['map_image'] = $filename;

            $old_map = $dag->map_image;
            if ($old_map) {
                $old_map = public_path('images/maps/' . $old_map);

                if (file_exists($old_map)) {
                    unlink($old_map);
                }
            }
        }

        $dag->update($validatedData);
        return redirect()->route('dags.index')->with(Toastr::success('ম্যাপ সফল ভাবে আপডেট করেছেন !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dag $dag)
    {
        $old_map = $dag->map_image;
        if ($old_map) {
            $old_map = public_path('images/maps/' . $old_map);

            if (file_exists($old_map)) {
                unlink($old_map);
            }
        }

        $dag->delete();
        return redirect()->route('dags.index')->with(Toastr::success('ম্যাপ সফল ভাবে মুছে ফেলেছেন!'));
    }
}
