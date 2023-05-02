<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user() || auth()->user()->position == 'user'){
            abort(403);
        }
        $user_data = User::withTrashed()->wherenot('id',request()->user()->id)->get();
        $user_tech = Technician::all();
        $data = $user_data->merge($user_tech);
        return view('admin.user-management.index',['user_data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!auth()->user() || auth()->user()->position == 'user'){
            abort(403);
        }

        return view('admin.user-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->position == 'technician'){

            $data_t = new Technician;
            $data_t->name = $request->name;
            $data_t->email = $request->email;
            $data_t->position = 'technician';
            $data_t->password = Hash::make($request->password);

            if(!$data_t->save()){
                return redirect()->route('users.index');
            }else{
                return redirect()->route('users.index');
            }

        }else{
            $data = new User;
 
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->position = $request->position;
            
            if(!$data->save()){
                return redirect()->route('users.index');
            }else{
                return redirect()->route('users.index');
            }
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!auth()->user() || auth()->user()->position == 'user'){
            abort(403);
        }

        $users = User::where('id',$id)->withTrashed()->first();
        return view('admin.user-management.edit',['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
 
        $data->name = $request->name;
        $data->email = $request->email;
        $data->position = $request->position;
        
        if(!$data->save()){
            return redirect()->route('users.index');
        }else{
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
 
        if(!$data->delete()){
            return redirect()->route('users.index');
        }else{
            return redirect()->route('users.index');
        }
    }

    public function recovery(string $id)
    {
        User::withTrashed()->find($id)->restore();

        return redirect()->route('users.index');
    }
}
