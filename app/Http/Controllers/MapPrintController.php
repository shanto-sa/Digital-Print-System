<?php

namespace App\Http\Controllers;

use App\Models\Dag;
use App\Models\Location;
use App\Models\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MapPrintController extends Controller
{
    public function map_search(Request $request)
    {
        $locations = Location::where('status', 1)->latest()->get();

        $searchNumber = $request->dag_no; // The number you want to search


        $dags = [];
        $query = Dag::with(['location', 'mouza', 'newmouza', 'creator']);
        if (!empty($request->location_id)) {
            $query->where('location_id', $request->location_id);
        }

        if (!empty($request->mouza_id)) {
            $query->where('mouza_id', $request->mouza_id);
        }

        if (!empty($request->new_mouza_id)) {
            $query->where('new_mouza_id', $request->new_mouza_id);
        }

        if (!empty($request->map_type)) {
            $query->where('map_type', $request->map_type);
        }

        if (!empty($request->jalno)) {
            $query->where('jalno', $request->jalno);
        }

        if (!empty($request->dag_no)) {
            $query->where(function ($q) use ($request) {
                $q->whereRaw('? >= CAST(SUBSTRING_INDEX(dag_no, "-", 1) AS UNSIGNED)', [$request->dag_no])
                    ->whereRaw('? <= CAST(SUBSTRING_INDEX(dag_no, "-", -1) AS UNSIGNED)', [$request->dag_no]);
            });
        }

        if (!empty($request->location_id)) {
            $dags = $query->get();
        }
        return view('map_print.map_search', compact('locations', 'dags'));
    }



    public function map_print_show($id)
    {
        $dag = Dag::with(['location', 'mouza', 'newmouza', 'creator'])->where('id', $id)->first();
        return view('map_print.map_search_show', compact('dag'));
    }

    public function print_map($id)
    {
        $dag = Dag::find($id);

        Transaction::create([
            'location_id' => $dag->location_id,
            'mouza_id' => $dag->mouza_id,
            'new_mouza_id' => $dag->new_mouza_id,
            'dag_id' => $dag->id,
            'map_type' => $dag->map_type,
            'jalno' => $dag->jalno,
            'dag_no' => $dag->dag_no,
            'sit_no' => $dag->sit_no,
            'status' => 1,
            'created_by' => auth()->user()->id

        ]);

        $file_path = public_path('images/maps/' . $dag->map_image);
        return response()->file($file_path, [
            'Content-Disposition' => 'inline; filename="' . $dag->map_image . '"'
        ]);
    }


    public function send_map(Request $request)
    {
        
        // dd($request);
        
        $dag = Dag::find($request->map_id);

        $file = public_path('images/maps/' . $dag->map_image);


        $data["email"] = $request->email;
        $data["title"] = "Arafat Computer Map Print";


        try {

            
            Mail::send('mail.mail_text', $data, function ($message) use ($data, $file) {
                $message->to($data["email"])
                    ->subject($data["title"]);

                $message->attach($file);
            });
            

            Transaction::create([
                'location_id' => $dag->location_id,
                'mouza_id' => $dag->mouza_id,
                'new_mouza_id' => $dag->new_mouza_id,
                'dag_id' => $dag->id,
                'map_type' => $dag->map_type,
                'jalno' => $dag->jalno,
                'dag_no' => $dag->dag_no,
                'sit_no' => $dag->sit_no,
                'email' => $request->email,
                'status' => 1,
                'created_by' => auth()->user()->id

            ]);

            return redirect()->route('map_search')->with(Toastr::success('সফলভাবে ইমেইলে ম্যাপ পাঠানো হয়েছে!'));
        } catch (Exception $e) {

            return $e->getMessage();
            return redirect()->route('map_search')->with(Toastr::error('সঠিক তথ্য দিন !'));
        }
    }
}
