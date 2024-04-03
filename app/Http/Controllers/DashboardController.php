<?php

namespace App\Http\Controllers;

use App\Models\Dag;
use App\Models\Location;
use App\Models\Mouza;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $total_users = User::whereNot('id', 1)->count();
        $total_locations = Location::count();
        $total_mouza = Mouza::count();
        $total_map = Dag::count();
        $todays_map_added = Dag::whereDate('created_at', today())->count();
        $todays_map_sell = 0;
        $todays_print = Transaction::whereDate('created_at', today())->count();
        $this_months_print = Transaction::whereMonth('created_at', today()->format('m'))->count();
        return view('dashboard', compact('total_users', 'total_locations', 'total_mouza', 'total_map', 'todays_map_added', 'todays_map_sell', 'todays_print', 'this_months_print'));
    }
}
