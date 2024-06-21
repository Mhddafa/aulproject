<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CRUDModel;

class HomeController extends Controller
{
    //
    public function HomeIndex(Request $request){
        $crud_model = new CRUDModel();
        $product = $crud_model->read_data($request, 'produk', []);
        return view('page.home', ['request' => $request, 'product'=>$product]);
    }
    public function contactus_get(Request $request){
        return view('page.kontak', ['request' => $request]);
    }
    public function contactus_post(Request $request){
        $validated = $request->validate([
            'email_pengirim' => 'required',
            'nama_pengirim' => 'required',
            'pesan_pengirim' => 'required',
        ]);
        $crud_model = new CRUDModel();
        $data = [
            'email_pengirim' => $request->input('email_pengirim'),
            'nama_pengirim' => $request->input('nama_pengirim'),
            'pesan_pengirim' => $request->input('pesan_pengirim'),];
        if($crud_model->create_data($request, 'kontak', $data)){
            return redirect('kontak')->with('success', 'Pesan telah kami terima');
        }else{
            return redirect('kontak')->with('error', 'Pesan gagal kami terima');
        }
    }
}
