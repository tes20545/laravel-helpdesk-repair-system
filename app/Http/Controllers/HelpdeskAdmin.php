<?php

namespace App\Http\Controllers;

use App\Models\Helpdesk;
use Illuminate\Http\Request;

class HelpdeskAdmin extends Controller
{
    public function index()
    {
        if(!auth()->user() || auth()->user()->position == 'user'){
            abort(403);
        }
        $data = Helpdesk::withTrashed()->get();
        return view('admin.helpdesk.index',['data' => $data]);
    }

    public function edit(Helpdesk $helpdesk)
    {
        return view('admin.helpdesk.edit',['data' => $helpdesk]);
    }
}
