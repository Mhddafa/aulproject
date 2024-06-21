@extends('frame.frame')

@section('content') 
  <!-- AWAL KERANJANG -->
  <script type="text/javascript">
    var total_harga_produk = 0;
    var total_harga_ongkir = 0;
  </script>
    <div class="row-prduk ">
      <?php if ($request->session()->has('checkout_fail')): ?>
        <div class="alert alert-danger">
          {{$request->session()->get('checkout_fail')}}
        </div>
      <?php endif ?>
        
        <div class="col">
        <?php if (count($mycart) > 0): ?>
          <table class="table table-responsive table-border mt-4 mx-2">
              <thead class="table-secondary" >
                <tr>
                  <th scope="col" class="th-header">NO</th>
                  <th scope="col" class="th-header">GAMBAR</th>
                  <th scope="col" class="th-header">ID PRODUK</th>
                  <th scope="col" class="th-header">NAMA PRODUK</th>
                  <th scope="col" class="th-header">HARGA</th>
                  <th scope="col" class="th-header">JUMLAH</th>
                  <th scope="col" class="th-header">TOTAL</th>
                </tr>
              </thead>
              <tbody class="align-middle">
                <?php foreach ($mycart as $key => $value): ?>
                  <tr>
                    <th scope="row">1</th>
                    <td><img src="{{ $list_product[$value->id_produk]->url_gambar_produk }}" alt="Logo" width="180" height="120" class="me-1"></td>
                    <td><strong>{{ $list_product[$value->id_produk]-> id }}</strong></td>
                    <td><strong>{{ $list_product[$value->id_produk]->deskripsi_produk }}</strong></td>
                    <td>Rp.{{ number_format($list_product[$value->id_produk]->harga_produk) }}</td>
                    <td><div class="btn-group" role="group" aria-label="Basic example">
                    <a href="kurangi_keranjang/{{ $value->id_produk }}" class="btn btn-primary">-</a>
                    <button type="button" class="btn btn-primary">{{ $value->kuantiti }}</button>
                    <a href="tambahkan_keranjang/{{ $value->id_produk }}" class="btn btn-primary">+</a>
                    </div></td> 
                    <?php $total = $value->kuantiti*$list_product[$value->id_produk]->harga_produk ?>
                    <script type="text/javascript">total_harga_produk += {{ $total }}</script>
                    <td>Rp.{{ number_format($total) }}</td>
                  </tr>
                <?php endforeach ?>
                <tr>
                  <td colspan="6" style="" id="display_tujuan">
                    Silahkan pilih tujuan pengiriman dibawah
                  </td>
                  <td colspan="6" style="" id="display_ongkir">
                  </td>
                </tr>
                <tr>
                  <td colspan="6">
                    Subtotal
                  </td>
                  <td colspan="1" style="" id="display_subtotal">
                  </td>
                </tr>
                <form method="post" action="checkout" enctype="multipart/form-data">
                  <tr>
                    <td colspan="6">
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Pilih kota tujuan pengiriman 
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="#" onclick='add_ongkir("jakarta")'>Jakarta(Rp.21.000)</a></li>
                          <li><a class="dropdown-item" href="#" onclick='add_ongkir("tangerang")'>Tangerang(Rp.21.000)</a></li>
                          <li><a class="dropdown-item" href="#" onclick='add_ongkir("depok")'>Depok(25.000)</a></li>
                          <li><a class="dropdown-item" href="#" onclick='add_ongkir("bekasi")'>Bekasi(Rp.29.000)</a></li>  
                          <li><a class="dropdown-item" href="#" onclick='add_ongkir("bogor")'>Bogor(Rp.30.000)</a></li>
                        </ul>
                        <P><img src="images/logojne.png" alt="Logo HTML" height="72"><b>Menggunakan layanan jasa kirim JNE</b></p>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5">
                      <textarea name="alamat" placeholder="Masukkan alamat lengkap beserta dengan kodepos" style="width: 100%;min-height: 150px; padding: 20px"></textarea>
                    </td>
                  </tr>
                <tr>
                  <td scope="row" colspan="6">
                    <p>Sebelum klik tombol checkout pastikan anda mengunggah bukti transfer pada form dibawah</p>
                    <P><img src="images/logodki.png" alt="Logo HTML" height="72"><b> 62823020057 </b></p>
                    <P><img src="images/logodana.png" alt="Logo HTML" height="55"><b> 085156080516</b></p>
                    <img src="" id="prv_pic" style="max-width: 200px;">
                    <input type="file" id="pict" name="bukti_transfer">
                    <input type="hidden" id="ongkir" name="ongkir">
                    <input type="hidden" id="tujuan" name="tujuan">
                    <?php if ($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <?php endif ?>
              <?php if ($request->session()->has('success')): ?>
                <p class="text-success">{{ $request->session()->get('success') }}</p>
              <?php endif ?>
              <?php if ($request->session()->has('error')): ?>
                <p class="text-danger">{{ $request->session()->get('error') }}</p>
              <?php endif ?>
                  </td>
                </tr>
                <tr>
                  <th scope="row" colspan="5"></th>
                  <input type="hidden" id="total" name="total">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <td><button type="submit" class="btn btn-dark">Check Out</button></td>
                </tr>
                </form>
              </tbody>
            </table>
          <?php else: ?>
            <center><p><font size="6">Anda belum memiliki pesanan</font><br></p></center>
        <?php endif ?>
        </div>
    </div>
</div>

<script type="text/javascript">
  pict.onchange = evt => {
  const [file] = pict.files
  if (file) {
    prv_pic.src = URL.createObjectURL(file)
  }
}
</script>
<script type="text/javascript">
  $( document ).ready(function() {
    count_total_harga();
  });
  function add_ongkir(kota){
    var daftar_ongkir = {jakarta:21000,tangerang:21000,depok:25000,bekasi:29000,bogor:30000};
    $('#ongkir').val(daftar_ongkir[kota]);
    $('#tujuan').val(kota);
    $('#display_tujuan').html('Ongkos kirim '+ kota);
    $('#display_ongkir').html(' Rp '+daftar_ongkir[kota]);
    total_harga_ongkir = daftar_ongkir[kota];
    count_total_harga();
  }
  function count_total_harga(){
    $('#display_subtotal').html('Rp '+(total_harga_produk+total_harga_ongkir)); 
    $('#total').val(total_harga_produk+total_harga_ongkir);
  }
</script>
<script type="text/javascript">
  function checkout(){
    file_pict = document.getElementById("pict").files.length;
    if(file_pict == 0){
      alert('Silahkan unggah bukti pembayaran terlebih dahulu');
    }else{
      alert('Terima kasih telah memesan.');
      window.location.href = "checkout";

    }
  }
</script>

@endsection