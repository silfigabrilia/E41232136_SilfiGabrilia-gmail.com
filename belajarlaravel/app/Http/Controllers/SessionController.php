<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // membuat session
    public function create(Request $request) {
        $request->session()->put('Nama','Politeknik Negeri Jember');
        echo "Data telah ditambahkan ke session.";
    }
    public function show(Request $request) {
        if($request->session()->has('nama')){
            echo $request->session()->get('nama');
        } else{
            echo "Tidak ada data dalam session.";
        }
    }
    public function delete(Request $request) {
        $request->session()->forget('Nama');
        echo "Data telah dihapus dari session.";
    }
}
