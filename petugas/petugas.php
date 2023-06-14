<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admint</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body{
        overflow: hidden; 
      }
  
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-2 shadow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold fs-4" href="#">Kantor LOORAH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="laporan.php">Laporan</a>
        </li>
      </ul>
      <a href="../logout.php" class="btn btn-danger text-light">
        Logout
        </a>
    </div>
  </div>
</nav>
<?php 
  session_start();
    require '../koneksi.php';
    $sql = "SELECT * FROM masyarakat_farhan";
    $query = mysqli_query($conn, $sql);
  ?>
  <div class="bg-image" style="background-image: url('../img/bg-masyarakat2.png');">
  <div class="container-fluid justify-content-between d-flex p-5 flex-row-reverse align-self-center" id="hero">
    <div class="hero col-6">
    </div>
    <div class="header col-6" style="color: #eee;">
      <h1 class="fs-1 fw-bolder text-light">Halo, <?php echo"$_SESSION[nama_petugas]"; ?></h1>
      <h2 class="fs-4">Selamat datang di <b>Kantor LOORAH</b>,<br>Mau cek lapor pengaduan? Langsung klik tombol dibawah aja cuy</h2>
      <a href="tambah_laporan.php" class="btn btn-outline-light mt-5">Laporan pengaduan</a>
      <footer class="position-absolute bottom-0">
          <p class="fs-6" style="color: #ccc">Created by Ahmad Farhan</p>
      </footer> 
    </div>
  </div>
</body>
<script src="../bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>