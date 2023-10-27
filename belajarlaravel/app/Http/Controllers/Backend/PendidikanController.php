<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Pendidikan;
use App\Http\Controllers\Controller;

class PendidikanController extends Controller
{
    //
    public function index() 
    {
        $pendidikan = Pendidikan::get();
        return view('backend.pendidikan.index', compact('pendidikan'));
    }
    public function create()
    {
        $pendidikan = null;
        return view('backend.pendidikan.create', compact('pendidikan'));
    }
    public function store(Request $request)
    {
        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')
                        ->with('success','Data Pendidikan baru telah berhasil disimpan');
    }
    public function edit(Pendidikan $pendidikan)
    {
        return view('backend.pendidikan.create', compact('pendidikan'));
    }
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $pendidikan->update($request->all());

        return redirect()->route('pendidikan.index')
        ->with('success','Data Pendidikan baru telah berhasil disimpan');
    }
    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();

        return redirect()->route('pendidikan.index')
        ->with('success','Data Pendidikan baru telah berhasil disimpan');
    }
}


// use Illuminate\Http\Request,
//     App\Models\Pendidikan,
//     App\Http\Controllers\Controller;

// class PendidikanController extends Controller
// {
//     //
//     public function index() 
//     {
//         return view('backend.pendidikan.index');
//     }
//     public function create()
//     {
//         $pendidikan = null;
//         return view('backend.pendidikan.create', compact('pendidikan'));
//     }
//     public function store(Request $request)
//     {
//         Pendidikan::create($request->all());

//         return redirect()->route('pendidikan.index')
//                         ->with('success','Data Pendidikan baru telah berhasil disimpan');
//     }
// }