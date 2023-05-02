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
        if(auth()->user() == null || auth()->user()->position != 'user'){
            abort(403);
        }
        $data = Helpdesk::withTrashed()->where('helpdesks.user_id', request()->user()->id)->get();
        return view('customer.helpdesk.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user() == null || auth()->user()->position != 'user'){
            abort(403);
        }

        return view('customer.helpdesk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $helpdesk           = new Helpdesk;
        $helpdesk->user_id  = request()->user()->id;
        $helpdesk->title    = $request->title;
        $helpdesk->details  = $request->details;
        $helpdesk->images   = $request->file('file_upload')->storePublicly('images/', ['disk' => 'public']);;
        $helpdesk->status   = 'pending';

        if($helpdesk->save()){
            return redirect()->route('helpdesk.index');
        }
            return redirect()->route('helpdesk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Helpdesk $helpdesk)
    {
        $tech = Helpdesk::join('technicians','helpdesks.technician_id','=','technicians.id')->where('helpdesks.id',$helpdesk->id)->first();

        return view('customer.helpdesk.show',['data' => $helpdesk,'tech' => $tech]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Helpdesk $helpdesk)
    {
        if(auth()->user() == null || auth()->user()->position != 'user'){
            abort(403);
        }
        return view('customer.helpdesk.edit',['data' => $helpdesk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Helpdesk $helpdesk)
    {
        //update image?
        if ($request->file('file_upload')) {
            $image = $request->file('file_upload')->storePublicly('images/', ['disk' => 'public']);
        } else {
            $image = $request->old_img;
        }

        $helpdesk           = Helpdesk::where('id',$helpdesk->id)->first();
        $helpdesk->user_id  = request()->user()->id;
        $helpdesk->title    = $request->title;
        $helpdesk->details  = $request->details;
        $helpdesk->images   = $image;
        $helpdesk->status   = 'pending';

        if($helpdesk->save()){
            return redirect()->route('helpdesk.index');
        }
            return redirect()->route('helpdesk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Helpdesk $helpdesk)
    {
        Helpdesk::where('id', $helpdesk->id)->update(['status' => 'cancel']);
        $helpdesk->delete();

        return redirect()->route('helpdesk.index');
    }
}
