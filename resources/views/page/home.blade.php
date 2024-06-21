@extends('frame.frame')

@section('content')
  <!-- CONTENT 1 -->
        <section class="site-tittle">
            <div class="site-background">
                <h1 style="color:whitesmoke;"><b>MIDA COLLECTION</b></h1>
                <h1 style="color:whitesmoke;">Seni di Setiap Jahitan</h1>
                <div class="container">
              </div>
            </div>
        </section>
        
        <!-- CONTENT 2 -->
        <div class="text-center">
          <div class="card-header">
          </div>
          <div class="card-body">
            <h2 class="card-title"><b>TENTANG KAMI</b></h2>
            <h4><br><br>SELAMAT DATANG DI MIDA COLLECTION!</h4>
            <h4><br><br>Tempat di mana keindahan dan keunikan kerajinan tangan bertemu. Kami adalah sebuah usaha menengah yang berdedikasi untuk membawa seni jahitan tangan tradisional ke dalam kehidupan modern Anda. Setiap produk yang kami tawarkan dibuat dengan cinta dan perhatian oleh ibu rumah tangga yang memiliki kreatifitas tinggi, menggunakan bahan-bahan berkualitas tinggi dan teknik yang telah dipelajari sedalam mungkin.
                Kami percaya bahwa setiap item yang kami hasilkan bukan hanya barang, tetapi juga sebuah cerita—cerita tentang budaya, keterampilan, dan dedikasi. Dengan membeli dari kami, Anda tidak hanya mendapatkan produk yang unik dan berkualitas tinggi, tetapi juga turut mendukung pengrajin lokal dan pelestarian warisan budaya yang berharga.
                Terima kasih telah memilih Mida Collection. Kami berharap Anda menemukan sesuatu yang spesial yang dapat menjadi bagian dari hidup Anda.</h4>
            <h4><br><br>BUATAN TANGAN DENGAN CINTA, DIBUAT DENGAN SEMANGAT !</h4>
          </div>
          <div class="card-footer text-muted">
          </div>
        </div>

        <div class="row">
          <p align = "center" style="color : black;"><font size="6"><b>Keuntungan Bersama Kami!</b></font></p>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card"> 
              <div class="card-body">
                <h5 class="card-title"><p align = "center" style="color : black;"><font size="5"><b>Keunikan dan Eksklusivitas Produk</b></font></p></h5>
                <p class="card-text">"Produk kerajinan tangan dibuat secara manual, sehingga setiap item unik dan berbeda dari produk massal."</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><p align = "center" style="color : black;"><font size="5"><b>Kualitas dan Keterampilan Tinggi</b></font></p></h5>
                <p class="card-text">"Kerajinan tangan diproduksi dengan perhatian tinggi terhadap detail dan teknik tradisional, menjamin kualitas tinggi dan daya tahan."</p>
              </div>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card"> 
            <div class="card-body">
              <h5 class="card-title"><p align = "center" style="color : black;"><font size="5"><b>Mendukung Pengrajin Lokal dan Tradisi Budaya</b></font></p></h5>
              <p class="card-text">"Membeli kerajinan tangan mendukung ekonomi lokal dan pelestarian tradisi serta keterampilan budaya."</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><p align = "center" style="color : black;"><font size="5"><b>Ramah Lingkungan dan Berkelanjutan</b></font></p></h5>
              <p class="card-text">"Kerajinan tangan sering menggunakan bahan alami atau daur ulang, serta teknik produksi yang lebih ramah lingkungan."</p>
            </div>
          </div>
        </div>
      </div>
        <div class="container"></div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php foreach ($product as $key => $value): ?>
            <div class="col-6 col-md-4">
              <div class="card h-100">
                <img src="{{ $value->url_gambar_produk }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text"><b>{{$value->deskripsi_produk}}</b></p>
                </div>
                <div class="card-footer">
                  <a href="tambahkan_keranjang/{{ $value->id }}" class="btn btn-dark btn-lg">Rp.{{ number_format($value->harga_produk) }}</a>
                </div>
                <div>
                <h4><span class="badge text-bg-light">stock : {{$value->stock}}</span></h4>
                </div>
                <h2><a class="btn btn-warning disabled placeholder" aria-disabled="true">KLIK HARGA UNTUK MEMBELI ! </a></h2>
              </div>
            </div>
          <?php endforeach ?>
        </div>
          <?php if ($request->session()->has("alert")): ?>
          <script type="text/javascript">alert("{{$request->session()->get("alert")}}")</script>
          <?php endif ?>
@endsection