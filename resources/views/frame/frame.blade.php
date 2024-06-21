<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mida Collection</title>
        <link rel="stylesheet" href="mida.css" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="font.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </head>
  <body> 
    <!-- NAVIGATION BAR -->
    <div class="container"></div>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #dadada">
        <div class="container-fluid">
          <a class="navbar-brand" href="/"><img src="images/logomc.jpeg" alt="Logo" width="50" height="50" class="me-1"><strong>MidaCollection</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/"><h4>Home</h4></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="keranjang"><h4>Keranjang</h4></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kontak"><h4>Kontak</h4></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="produk">Produk</a>
              </li>
              <?php if ($request->session()->get("nama_pengguna") != null): ?>
                <li class="nav-item">
                  <a class="nav-link" href="keluar"><h4>Logout</h4></a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="masuk"><h4>Login</h4></a>
                </li>
              <?php endif ?>
            </ul>
          </div>
            <?php if ($request->session()->get("nama_pengguna") != null): ?>
              <div class="d-flex">
                <h3>Hi <?php echo $request->session()->get('nama_pengguna'); ?></h3>
              </div>
            <?php endif ?>
        </div>
      </nav>
    </div>

      <!-- NAVIGATION BAR SELESAI -->
            
      @yield('content')

        
  <!-- FOOTER -->
    <div class="footer">
      <footer class="bg-light">
        <div class="row mt=2">
          <div class="col md-6 ">
            <a href="#"></a>
            <img src="images/logomc.jpeg" style="width : 40px;">
            <span> Copyright @2024 | Created with sprit by <a href="https://www.instagram.com/auliya.bm/" class="text-decoration-none text-dark fw-bold">Auliya Balindra</a></span>
          </div>
          <div class="col md-6 text-md-end text- right">
          <a href="https://www.instagram.com/auliya.bm/">
            <img src="images/instagram.png"class="ms-4" style="width : 32px;">
          </a>
          <a href="https://www.facebook.com/auliya.balindra">
            <img src="images/facebook.png"class="ms-4" style="width : 32px;">
          </a>
          <a href="https://www.tiktok.com/@o0owll?_t=8nMSCs9snsF&_r=1">
            <img src="images/tiktok.svg"class="ms-4" style="width : 30px;">
          </a>
          </div>
        </div> 
        </div> 
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--FOOTER SELESAI-->
    </body>


        <a href="https://wa.wizard.id/a32f31" target="_blank">
       <!--Jquery Library FIle-->
       <script src="tugasakhir.js"></script>

       <!--OWL CAROSUSEK JS-->
       <script src="owl.carousel.min.js"></script>