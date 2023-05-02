<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class QeueController extends Controller
{
    public function index()
    {
        $data = Technician::all();
        return view('admin.qeue.index',['data' => $data]);
    }

    public function edit(Technician $qeue)
    {
        return view('admin.qeue.edit',['data' => $qeue]);
    }

    public function update(Technician $qeue, Request $request)
    {
        $update = Technician::where('id', $qeue->id)->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'telephone' => $request->telephone,
            'qeue'      => $request->qeue,
        ]);

        return redirect()->route('qeue.index');
    }
}
