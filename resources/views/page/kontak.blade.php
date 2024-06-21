<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mida Collection</title>
        <link rel="stylesheet" stype="text/css" href="style.css" >
        <script src="https://kit.fontawesome.com/17d2e7a943.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
      <!-- NAVIGATION BAR -->
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ed8726f3">
        <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="images/logomc.jpeg" alt="Logo" width="50" height="50" class="me-1"><strong>MidaCollection</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="keranjang">Keranjang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kontak">Kontak</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="produk">Produk</a>
              </li>
              <?php if ($request->session()->get("nama_pengguna") != null): ?>
                <li class="nav-item">
                  <a class="nav-link" href="keluar">Logout</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="masuk">Login</a>
                </li>
              <?php endif ?>
            </ul>
          </div>
            <?php if ($request->session()->get("nama_pengguna") != null): ?>
              <div class="d-flex">
                <p>Hi <?php echo $request->session()->get('nama_pengguna'); ?></p>
              </div>
            <?php endif ?>
        </div>
      </nav>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <!-- NAVIGATION BAR SELESAI -->
      <section class="contact">
        <div class="content">
          <h1>Kontak Kami</h1>
        </div>
        <div class ="container-fluid">
          <div class="row">
            <div class="col-6" style="background-color:#eea560f3">
              <div class="box">
              <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
              <div class="text">
                  <h3>Alamat</h3>
                  <p>Jl. Villa Tomang Baru Blok G.6/9 ,<br>Pasar Kemis, Kab. Tangerang,<br>15560</p>
                </div>
              </div>
              <div class="box">
                <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <div class="text">
                    <h3>Phone</h3>
                    <p>+62 851-5608-0516</p>
                </div>
              </div>
              <div class="box">
                <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="text">
                    <h3>Email</h3>
                    <p>auliyabalindram@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="col-6" style="background-color:#eea560f3">
              <?php if ($errors->any()): ?>
                <div class="alert alert-danger mt-3">
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
              <form action="kontak" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h1>Kirim Pesan</h1>
                <div class="inputBox">
                  <label>Nama Lengkap</label>
                  <input class="form-control" type="text" name="nama_pengirim" required="required">
                </div>
                <div class="inputBox">
                  <label>Email</label>
                  <input class="form-control" type="text" name="email_pengirim" required="required">
                </div>
                <div class="inputBox">
                  <label>Tuliskan Pesanmu</label>
                  <textarea class="form-control" name="pesan_pengirim" required="required"></textarea>
                </div>
                <div class="inputBox">
                  <input type="submit" name="" value="Kirim">
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- CONTENT 1 END -->

            <!-- FOOTER -->
<footer class="bg-light">
  <div class="row mt=2">
    <div class="col md-6 ">
      <a href="#"></a>
      <img src="images/logomc.jpeg" style="width : 40px;">
      <span> Copyright @2024 | Created with sprit by <a href="https://www.instagram.com/auliya.bm/" class="text-decoration-none text-dark fw-bold">Auliya Balindra</a></span>
    </div>
    <div class="col md-6 text-md-end text- right">
      <a href="https://www.instagram.com/auliya.bm/"></a>
      <img src="images/instagram.png"class="ms-4" style="width : 32px;">
      <a href="https://www.facebook.com/auliya.balindra"></a>
      <img src="images/facebook.png"class="ms-4" style="width : 32px;">
      <a href="https://www.tiktok.com/@o0owll?_t=8nMSCs9snsF&_r=1"></a>
      <img src="images/tiktok.svg"class="ms-4" style="width : 30px;">
    </div>
  </div> 
</div> 
</div>
</footer>
 <!--FOOTER SELESAI-->
</body>
