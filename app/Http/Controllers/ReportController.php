<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        $staffs = User::where('id', '!=', 1)->get();

        $query = Transaction::query();

        if (!empty($request->staff_id)) {
            $query->where('created_by', $request->staff_id);
        }

        if (!empty($request->start_date)) {
            $query->where('created_at', '>=', $request->start_date);
        }

        if (!empty($request->end_date)) {
            $query->where('created_at', '<=', $request->end_date);
        }

        if (!empty($request->print_type)) {
            if ($request->print_type == 'email') {
                $query->whereNotNull('email');
            } else {
                $query->whereNull('email');
            }
        }

        $transactions = $query->latest()->paginate(10);



        return view('reports.basic', compact('staffs', 'transactions'));
    }
}
