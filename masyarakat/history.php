<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masyarakat</title>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger p-2">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold fs-4" href="#">Kantor LOORAH</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="masyarakat.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="tambah_laporan.php">Laporan Pengaduan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php">History Laporan</a>
          </li>
        </ul>
        <a href="../logout.php" class="btn btn-light text-dark">
          Logout
        </a>
      </div>
    </div>
  </nav>

  <?php
        session_start();
        $nik = $_SESSION['nik'];
        include '../koneksi.php';

        $sql = "SELECT * FROM pengaduan_farhan INNER JOIN masyarakat_farhan ON pengaduan_farhan.nik_farhan = masyarakat_farhan.nik_farhan WHERE pengaduan_farhan.nik_farhan = $nik";
        $laporan = mysqli_query($conn, $sql);
      ?>

  <div class="table-responsive-sm container-fluid border p-4">
    <table border="1" cellpadding="5px" class="table text-center table-bordered border-danger table-hover">
      <caption class="caption-top">Riwayat laporan</caption>
      <thead class="sticky-top">
        <tr>
          <th style="width: 10px">ID </th>
          <th class="align-middle">Nama</th>
          <th class="align-middle">Tanggal</th>
          <th class="align-middle">Isi Laporan</th>
          <th class="align-middle">Foto</th>
          <th class="align-middle">Status</th>
          <th class="align-middle" style="width: 170px">Aksi</th>
        </tr>
      </thead>

      <!-- jika belum ada laporan  -->
      <?php
      if (mysqli_num_rows($laporan)===0) :?>
      <h1>Belum ada laporan</h1>
      <?php endif ?>

      <!-- ada laporan -->
      <form action="" method="post">
        <tbody>
          <?php foreach ($laporan as $row) : ?>
          <tr>
            <td class="align-middle">
              <?= $row["id_pengaduan_farhan"]; ?>
            </td>
            <td class="align-middle">
              <?= $row["nama_farhan"]; ?>
            </td>
            <td class="align-middle">
              <?= $row["tgl_pengaduan_farhan"]; ?>
            </td>
            <td class="align-middle">
              <?= $row["isi_laporan_farhan"]; ?>
            </td>
            <td class="align-middle">
              <?= "<img src='../img/$row[foto_farhan]' width='70' height='70' />";?>
            </td>
            <td class="align-middle">
              <?= $row["status_farhan"]; ?>
            </td>
            <?php if ($row['status_farhan']=='selesai') : ?>
            <td class="align-middle">
              <button type="button" name="lihat" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#myModal<?php echo $row['id_pengaduan_farhan'];?>">
                Lihat tanggapan
              </button>
              <?php else :{
              
            } endif ?>
      </form>
      <?php
        include '../koneksi.php';
        $sql = "SELECT * FROM tanggapan_farhan INNER JOIN petugas_farhan ON tanggapan_farhan.id_petugas_farhan = petugas_farhan.id_petugas_farhan WHERE tanggapan_farhan.id_pengaduan_farhan"; 
        $laporan = mysqli_query($conn, $sql);
      ?>

      <!-- Modal -->
      <?php while($row = $laporan->fetch_array()) : ?>
      <div class="modal fade" id="myModal<?php echo $row['id_pengaduan_farhan'];?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger text-light">
              <h5 class="modal-title" id="exampleModalLabel">Tanggapan</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12">
                  <h5>
                    <?php echo $row['nama_petugas_farhan']?> :
                  </h5></br>
                </div>
                <div class="col-sm-12">
                  <h5>
                    <?php echo $row['tanggapan_farhan']?>
                  </h5></br>
                </div>
                <div class="col-11 border-top">
                  <p class="mb-0 pt-2">
                    <?php echo $row['tgl_tanggapan_farhan']?>
                  </p>
                </div>
                <div class="col-1 border-top mb-0 pt-2 fs-6">
                  <?php echo $row['id_tanggapan_farhan']?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </td>
      </tr>
      <?php endwhile?>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>
<script src="../bootstrap/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

</html>