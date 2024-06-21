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