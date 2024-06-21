<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mida Collection</title>
        <link rel="stylesheet" href="login.css" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="font.css">
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
    <!-----Main Container----->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!-----Main Container----->

    <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!-----Left Box----->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #0d79f5;">
                <div class="featured-image mb-3">
                    <img src="images/login.jpg" class="img-fluid" style="width: 300px;">
                </div>
                <p class="text-white fs-2:" style="font-family: 'Courier New', Courier, monospace; font-weight: 700;"> Be Verified</p>
                <small class="text-white text-wrap text-center" style="width: 18rem;font-family: 'Courier New', Courier, monospace;">Join Experienced Designer on this platform</small>
            </div>

        <!-----Right Box----->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <form method="post" action="{{ URL::to('daftar') }}">
                    	<div class="header-text mb-4 text-center">
                    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	                        <p>Selamat datang di Mida Collection </p>
	                        <?php if ($errors->any()): ?>
							    <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							<?php endif ?>
	                    </div>
	                    <div class="input-group mb-3">
	                        <input type="text" class="form-cntrol form-control-lg bg-light fs-6 col-md-12" name="nama_pengguna" placeholder="Masukkan Username"></input>
	                    </div>
	                    <div class="input-group mb-3">
	                        <input type="text" class="form-cntrol form-control-lg bg-light fs-6 col-md-12" name="sandi_pengguna" placeholder="Masukkan password"></input>
	                    </div>
                      <div class="input-group mb-3">
	                        <input type="text" class="form-cntrol form-control-lg bg-light fs-6 col-md-12" name="resandi_pengguna" placeholder="Masukkan kembali password"></input>
	                    </div>
	                    <div class="input-group mb-3">
	                        <input type="text" class="form-cntrol form-control-lg bg-light fs-6 col-md-12" name="alamat_pengguna" placeholder="Masukkan Alamat"></input>
	                    </div>
	                    <div class="input-group mb-3">
	                        <input type="text" class="form-cntrol form-control-lg bg-light fs-6 col-md-12" name="nohp_pengguna" placeholder="Masukkan no telefon"></input>
	                    </div>
	                    </div>
	                    <div class="input-group mb-3">
	                        <button class="btn btn-lg btn-primary w-100 fs-6">Daftar</button>
	                    </div>
	                    <!-- <div class="input-group mb-3">
	                        <button class="btn btn-lg btn-light w-100 fs-6" type="submit"><img src="images/google.png"style="width: 100px;">Masuk dengan gmail</button>
	                    </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
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
</html> 