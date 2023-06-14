<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent p-2 shadow">
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data
          </a>
          <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="data_masyarakat.php">Data Masyarakat</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="data_petugas.php">Data Petugas</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registrasi.php">Registrasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="log_tanggapan_farhan.php">Log</a>
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
        include '../koneksi.php';
        $id_pengaduan = $_SESSION['id_petugas'];
        $sql = "SELECT * FROM pengaduan_farhan INNER JOIN masyarakat_farhan ON pengaduan_farhan.nik_farhan = masyarakat_farhan.nik_farhan WHERE status_farhan = 'selesai'";
        $laporan = mysqli_query($conn, $sql);
      ?>
      <?php
      if (isset($_GET['cari'])) {
        require '../koneksi.php';
        $status = $_GET['status'];
        $query = "SELECT * FROM `pengaduan_farhan` INNER JOIN masyarakat_farhan ON pengaduan_farhan.nik_farhan = masyarakat_farhan.nik_farhan WHERE status_farhan LIKE '%$status%'";
        $laporan = mysqli_query($conn, $query);
      }
    ?>

  <form method="get">
    <div class="container-fluid mt-5">
      <div class="col-3">
        <span>Filter :</span>
      <select name="status" style="width: 6rem; outline:none;" class="border-danger">
        <option value="baru">baru</option>
        <option value="proses">Proses</option>
        <option value="selesai">Selesai</option>
        <option value="Tidak valid">Tidak valid</option>
      </select>
    <input type="submit" value="Cari" name="cari" class="btn btn-danger w-25">
      </div>
      <div class="col-9">
      </div>
    </div>
    <a href="cetak_laporan.php">Cetak Laporan</a>
  </form>
<div class="table-responsive container-fluid overflow-auto border" style="height: 30rem">
  <table border="1" cellpadding="5px" class="table text-center table-bordered border-danger table-hover mt-3 w-100">
      <caption class="caption-top">Laporan pengaduan</caption>
    <?php if (mysqli_num_rows($laporan) === 0) :?>
          <h1 class="text-center">Tidak ada data :(</h1>
        <?php endif ?>
        <thead>
            <tr class="sticky-top">
                <th>No.</th>  
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan as $row) : ?>
            <tr>
                <td class="align-middle"><?= $row["id_pengaduan_farhan"]; ?></td>
                <td class="align-middle"><?= $row["nik_farhan"]; ?></td>
                <td class="align-middle"><?= $row["nama_farhan"]; ?></td>
                <td class="align-middle"><?= $row["tgl_pengaduan_farhan"]; ?></td>
                <td class="align-middle text-wrap"><?= $row["isi_laporan_farhan"]; ?></td>
                <td class="align-middle"><?= "<img src='../img/$row[foto_farhan]' width='70' height='70' />";?></td>
                <td class="align-middle"><?= $row["status_farhan"]; ?></td>
                <td class="align-middle">
                  <?php
                      if ($row['status_farhan'] === 'proses') : ?>
                        <button type="button" name="lihat" class="btn btn-danger" data-bs-toggle="modal"
                          data-bs-target="#myModal<?php echo $row['id_pengaduan_farhan'];?>">
                          Tanggapi
                        </button>
                      <?php elseif ($row['status_farhan'] === 'baru') :?>
                              <div class='btn-group'>
                                <button type='button' class='btn btn-danger dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
                                  Validasi
                                </button>
                                <ul class='dropdown-menu'>
                                  <li>
                                    <?= "<a href='validasi.php?id=" . $row['id_pengaduan_farhan'] . "' class='dropdown-item'>Valid</a>" ?>
                                  </li>
                                  <li>
                                    <?= "<a href='tidakValid.php?id=" . $row['id_pengaduan_farhan'] . "' class='dropdown-item' onclick = 'return confirm('yakin?');>Tidak Valid</a>" ?>
                                  </li>
                                </ul>
                              </div>
                      <?php else :?>
                      <?php endif ?>
                    </td>
      <div class="modal fade" id="myModal<?php echo $row['id_pengaduan_farhan'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger text-light">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Tanggapan</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
          </div>
            <div class="container mb-4 p-2 w-100">
              <form action="../admin/tanggapan.php" method="post">
              <input type="number" name="id_petugas" value="<?= $_SESSION['id_petugas'];?>" hidden>
              <input type="number" name="id_pengaduan" value="<?= $row['id_pengaduan_farhan']; ?>" hidden>
              <label>Tanggal</label>
                  <input type="text" name="tanggal" value=" <?=date("d-m-Y"); ?>" disabled>
              <label>Tanggapan</label></br>
              <textarea name="laporan" cols="54" rows="5" class=""></textarea>
              
            </div>
            <div class="modal-footer">
              <input type="submit" name="simpan" value="Kirim" class="btn btn-primary text-light w-25">
            </div>
        </div>
      </div>
              </tr>
              <?php endforeach; ?>
        </tbody>
    </table>
  </div>
</div>

</body>
<script src="../bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

