<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Device',
            'device' => Device::where('user_id', auth()->user()->id)->get()
        ];
        return view('home.pages.table', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => 'Non-Active',
            'user_id' => auth()->user()->id
        ];
        Device::create($data);
        return back()->with('success', 'Device Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Device $device)
    {
        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->user()->id
        ];
        Device::where('id', $request->id)->update($data);

        return back()->with('success', 'Device Berhasil diedit');
    }

    public function destroy(Request $request, Device $device)
    {
        Device::where('id', $request->id)->delete();
        return back()->with('success', 'Device Berhasil dihapus ');
    }
    public function controll()
    {
        $data = [
            'title' => 'Controll',
            'device' => Device::where('user_id', auth()->user()->id)->get()
        ];
        return view('home.pages.controll', $data);
    }
    public function switchon($id)
    {
        $data = [
            'status' => 'Non-Active',
        ];

        Device::where('id', $id)->update($data);
    }
    public function switchoff($id)
    {
        $data = [
            'status' => 'Active',
        ];

        Device::where('id', $id)->update($data);
    }
}
