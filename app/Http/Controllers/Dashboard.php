<?php

namespace App\Http\Controllers;

use App\Models\Helpdesk;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $all = Helpdesk::all()->count();
        $pending = Helpdesk::where('status', 'pending')->count();
        $process = Helpdesk::where('status', 'process')->count();
        $success = Helpdesk::where('status', 'success')->count();
        return view('welcome',['all' => $all,'pending' => $pending,'process' => $process,'success' => $success]);
    }
}
