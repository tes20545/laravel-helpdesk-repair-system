<?php

namespace App\Http\Controllers;

use App\Models\Helpdesk;
use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->position == null || auth()->user()->position != 'user'){
            abort(403);
        }
        $data = Helpdesk::where('helpdesks.user_id', request()->user()->id)->get();
        return view('customer.helpdesk.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.helpdesk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Helpdesk $helpdesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Helpdesk $helpdesk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Helpdesk $helpdesk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Helpdesk $helpdesk)
    {
        //
    }
}
