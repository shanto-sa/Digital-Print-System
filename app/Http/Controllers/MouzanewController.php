<?php

namespace App\Http\Controllers;

use App\Models\Mouza;
use App\Models\MouzaNew;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MouzanewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->user()->can('mouzanew-view')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $mouzas = MouzaNew::with(['mouza'])->latest()->paginate(10);


        return view('mouzasnew.index', compact('mouzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!request()->user()->can('mouzanew-create')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $locations = Mouza::where('status', 1)->get();

        return view('mouzasnew.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!request()->user()->can('mouzanew-create')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $validatedData = $request->validate([
            'name' => 'required|string',
            'mouzas_id' => 'required',
            'status' => 'nullable'
        ]);
        $validatedData['created_by'] = auth()->user()->id;

        MouzaNew::create($validatedData);
        return redirect()->route('mouzasnew.index')->with(Toastr::success('সফলভাবে মৌজা যুক্ত করেছেন!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(MouzaNew $MouzaNew)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!request()->user()->can('mouzanew-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }

        $MouzaNew = MouzaNew::findOrFail($id);

        $locations = Mouza::where('status', 1)->get();
        return view('mouzasnew.edit', compact('locations', 'MouzaNew'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        if (!request()->user()->can('mouzanew-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $validatedData = $request->validate([
            'name' => 'required|string',
            'mouzas_id' => 'required',
            'status' => 'nullable'
        ]);

        $validatedData['status'] = $request->status ?? 0;

        $MouzaNew = MouzaNew::findOrFail($id);
        $MouzaNew->update($validatedData);
        return redirect()->route('mouzasnew.index')->with(Toastr::success('সফলভাবে মৌজা আপডেট করেছেন!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        if (!request()->user()->can('mouzanew-delete')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }

        $MouzaNew = MouzaNew::findOrFail($id);
        $MouzaNew->delete();
        return redirect()->route('mouzasnew.index')->with(Toastr::success('সফলভাবে থানা মুছে ফেলেছেন !'));
    }
}
