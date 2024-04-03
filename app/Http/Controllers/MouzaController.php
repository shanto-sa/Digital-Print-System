<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Mouza;
use App\Models\MouzaNew;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MouzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->user()->can('mouza-view')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $mouzas = Mouza::with(['location'])->latest()->paginate(10);

        return view('mouzas.index', compact('mouzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!request()->user()->can('mouza-create')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $locations = Location::where('status', 1)->get();
        return view('mouzas.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!request()->user()->can('mouza-create')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $validatedData = $request->validate([
            'name' => 'required|string',
            'location_id' => 'required',
            'status' => 'nullable'
        ]);
        $validatedData['created_by'] = auth()->user()->id;

        Mouza::create($validatedData);
        return redirect()->route('mouzas.index')->with(Toastr::success('সফলভাবে থানা যুক্ত করেছেন!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Mouza $mouza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mouza $mouza)
    {
        if (!request()->user()->can('mouza-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }

        $locations = Location::where('status', 1)->get();
        return view('mouzas.edit', compact('locations', 'mouza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mouza $mouza)
    {

        if (!request()->user()->can('mouza-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $validatedData = $request->validate([
            'name' => 'required|string',
            'location_id' => 'required',
            'status' => 'nullable'
        ]);
        $validatedData['status'] = $request->status ?? 0;
        $mouza->update($validatedData);
        return redirect()->route('mouzas.index')->with(Toastr::success('সফলভাবে থানা আপডেট করেছেন!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mouza $mouza)
    {

        if (!request()->user()->can('mouza-delete')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $mouza->delete();
        return redirect()->route('mouzas.index')->with(Toastr::success('সফলভাবে থানা মুছে ফেলেছেন !'));
    }


    public function get_mouza(Request $request)
    {
        $mouzas = Mouza::where('location_id', $request->location_id)->where('status', 1)->get();

        return response()->json(['success' => 1, 'data' => $mouzas]);
    }

    public function get_newmouza(Request $request)
    {
        $mouzas = MouzaNew::where('mouzas_id', $request->mouza_id)->where('status', 1)->get();

        return response()->json(['success' => 1, 'data' => $mouzas]);
    }


}
