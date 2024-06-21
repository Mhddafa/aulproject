<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CRUDModel;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
class UserController extends Controller
{
    public function tes(Request $request){
        $crud_model = new CRUDModel();
        return $crud_model->tes($request);
    }

    public function login_get(Request $request){
        if ($request->session()->get("nama_pengguna") != null) {
            return redirect('/');
        }
        return view('form.login', ['request' => $request]);
    }

    public function login_post(Request $request){
        if ($request->session()->get("nama_pengguna") != null) {
            return redirect('/');
        }
        $crud_model = new CRUDModel();
        $where_data = array(array('nama_pengguna',"=", $request->input('nama_pengguna')), array('sandi_pengguna',"=", md5($request->input('sandi_pengguna'))));
        $cek_data = $crud_model->read_data($request, 'pengguna', $where_data);
        if(count($cek_data) > 0){
            $request->session()->put('nama_pengguna', $request->input('nama_pengguna'));
            return redirect('/');
        }else{
            return redirect('masuk')->withErrors(['msg' => 'Username atau password salah']);
        }
    }

    public function register_get(Request $request){
        if ($request->session()->get("nama_pengguna") != null) {
            return redirect('/');
        }
        return view('form.daftar', ['request' => $request]);
    }

    public function register_post(Request $request){
        if ($request->session()->get("nama_pengguna") != null) {
            return redirect('/');
        }
        $validated = $request->validate([
            'nama_pengguna' => 'required',
            'sandi_pengguna' => '|required_with:resandi_pengguna|same:resandi_pengguna',
            'resandi_pengguna' => 'required',
            'alamat_pengguna' => 'required',
            'nohp_pengguna' => 'required',
        ]);
        $crud_model = new CRUDModel();
        $data = [
            'nama_pengguna' => $request->input('nama_pengguna'),
            'sandi_pengguna' => md5($request->input('sandi_pengguna')),
            'alamat_pengguna' => $request->input('alamat_pengguna'),
            'nohp_pengguna' => $request->input('nohp_pengguna'),];
        if($crud_model->create_data($request, 'pengguna', $data)){
            $request->session()->put('nama_pengguna', $request->input('nama_pengguna'));
            return redirect('/');
        }else{
            echo "<script type='text/javascript'>alert('REGISTER GAGAL')</script>";
            redirect('daftar');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function add_to_cart(Request $request, $id){
        if ($request->session()->get("nama_pengguna") == null) {
            return redirect('/masuk');
        }
        $crud_model = new CRUDModel();
        $where_data_cek_produk = array(array('id',"=", $id));
        $cek_produk = $crud_model->read_data($request, 'produk', $where_data_cek_produk);
        if(count($cek_produk) > 0){
            $where_data_mycart = array(array('id_produk',"=", $id), array('nama_pengguna',"=", $request->session()->get('nama_pengguna')));
            $cek_mycart = $crud_model->read_data($request, 'keranjang', $where_data_mycart);
            if(count($cek_mycart) == 1){
                $crud_model->update_data($request, 'keranjang', $where_data_mycart, ['kuantiti'=>$cek_mycart[0]->kuantiti+1]);
            }else{
                $crud_model->create_data($request, 'keranjang', ['nama_pengguna'=>$request->session()->get('nama_pengguna'), 'id_produk'=>$id, 'kuantiti'=>1]);
            }
            if($crud_model){
                return redirect('keranjang');
            }
        }else{
            return redirect('/');
        }
    }

    public function remove_from_cart(Request $request, $id){
        if ($request->session()->get("nama_pengguna") == null) {
            return redirect('/masuk');
        }
        $crud_model = new CRUDModel();
        $where_data_cek_produk = array(array('id',"=", $id));
        $cek_produk = $crud_model->read_data($request, 'produk', $where_data_cek_produk);
        if(count($cek_produk) > 0){
            $where_data_mycart = array(array('id_produk',"=", $id), array('nama_pengguna',"=", $request->session()->get('nama_pengguna')));
            $cek_mycart = $crud_model->read_data($request, 'keranjang', $where_data_mycart);
            if($cek_mycart[0]->kuantiti > 1){
                $crud_model->update_data($request, 'keranjang', $where_data_mycart, ['kuantiti'=>$cek_mycart[0]->kuantiti-1]);
            }else{
                $crud_model->delete_data($request, 'keranjang', $where_data_mycart);
            }
            if($crud_model){
                return redirect('keranjang');
            }
        }else{
            return redirect('/');
        }
    }

    public function cart(Request $request){
        if ($request->session()->get("nama_pengguna") == null) {
            return redirect('/masuk');
        }
        $crud_model = new CRUDModel();
        $where_data_mycart = array(array('nama_pengguna',"=", $request->session()->get('nama_pengguna')));
        $mycart = $crud_model->read_data($request, 'keranjang', $where_data_mycart);
        $list_product = [];
        foreach ($crud_model->read_data($request, 'produk', []) as $key => $value) {
            $list_product[$value->id] = $value;
        }
        return view('page.cart', ['request' => $request, 'list_product' => $list_product, 'mycart' => $mycart]);
    }

    public function checkout(Request $request){
        $today = Carbon::now()->format('d M Y H:i:s');
        if ($request->session()->get("nama_pengguna") == null) {
            return redirect('/masuk');
        }
        $crud_model = new CRUDModel();
        $where_data = array(array('nama_pengguna',"=", $request->session()->get('nama_pengguna')));
        $get_checkout_data = $crud_model->read_data($request, 'keranjang', $where_data);
        $json_id_product = [];
        $json_kuantiti_product = [];

        foreach ($get_checkout_data as $key => $value) {
            array_push($json_kuantiti_product, $value->kuantiti);
            array_push($json_id_product, $value->id_produk);
            if($crud_model->read_data($request, 'produk', ['id'=>$value->id_produk])[0]->stock < $value->kuantiti){
                $request->session()->flash('checkout_fail', $crud_model->read_data($request, 'produk', ['id'=>$value->id_produk])[0]->deskripsi_produk.' Stock yang anda masukan tidak tersedia. Stock saat ini tersisa '.$crud_model->read_data($request, 'produk', ['id'=>$value->id_produk])[0]->stock.' pcs');
                return redirect('keranjang');
            }
        }

        $mssg_data = implode(',',$json_id_product);

        $kuantiti = implode(',',$json_kuantiti_product);

        $request->validate([
            'bukti_transfer' => 'required|mimes:jpg,jpeg,png|max:32768',
            'tujuan' => 'required',
            'ongkir' => 'required',
            'alamat' => 'required',
        ]);
        $fileName = time().$request->session()->get('nama_pengguna').'.'.$request->file('bukti_transfer')->extension();
        $request->file('bukti_transfer')->move(public_path('images'), $fileName);
        if ($request->session()->get("nama_pengguna") == null) {
            return redirect('/');
        }

        $data = ['id_produk'=>json_encode($json_id_product), 'kuantiti'=>json_encode($json_kuantiti_product), 'nama_pengguna'=>$request->session()->get("nama_pengguna"), 'url_bukti_pembayaran'=>'images/'.$fileName, 'tujuan'=>$request->input('tujuan'), 'ongkir'=>$request->input('ongkir'), 'alamat'=>$request->input('alamat')];
        $insert_data = $crud_model->create_data($request, 'transaksi', $data);
        if($insert_data){
            foreach ($get_checkout_data as $key => $value) {
                $stock_now = $crud_model->read_data($request, 'produk', ['id'=>$value->id_produk])[0]->stock - $value->kuantiti;
                $crud_model->update_data($request, 'produk', ['id'=>$value->id_produk], ['stock'=>$stock_now]);
            }
            $crud_model->delete_data($request, 'keranjang', $where_data);
            $message = 'Pesanan Baru   ' . $today . '   ID Produk dipesan   ' . $mssg_data . '  Kuantiti  ' . $kuantiti . '   '. 'Alamat : ' . $request->alamat . '   ' . '   Bukti Transfer : http://127.0.0.1:8000/images/'. $fileName . '   Sub Total : Rp ' . $request->total;

            $response = Http::withHeaders([
                'Authorization' => 'MqdBmMqguG9Ubczz#mj!'
            ])->asForm()->post('https://api.fonnte.com/send', [
                'target' =>'085156080516',
                'message' => $message,
                'typing' => false,
                'delay' => '0',
                'countryCode' => '62',
                'url' => 'http://127.0.0.1:8000/images'. $fileName,
            ]);

            $request->session()->flash("alert","Terimakasih sudah memesan");
    
            if($response){
                return redirect('/');
            }else {
                return redirect('keranjang');
            }
        }
    }
}
