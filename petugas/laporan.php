<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-2 shadow">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold fs-4" href="#">Kantor LOORAH</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="petugas.php">Home</a>
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
        include '../koneksi.php';

        $sql = "SELECT * FROM pengaduan_farhan INNER JOIN masyarakat_farhan ON pengaduan_farhan.nik_farhan = masyarakat_farhan.nik_farhan WHERE status_farhan = 'baru'";
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
        <option value="baru">Baru</option>
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
        <td class="align-middle"><?= $row["isi_laporan_farhan"]; ?></td>
        <td class="align-middle"><?= "<img src='../img/$row[foto_farhan]' width='70' height='70' />";?></td>
        <td class="align-middle"><?= $row["status_farhan"]; ?></td>
        <td class="align-middle">
          <?php
            if ($row['status_farhan'] === 'proses') {
              echo "<a href='../admin/tanggapan.php?id=" . $row['id_pengaduan_farhan'] . "' class='btn btn-danger'>Tanggapi</a>";
            } elseif ($row['status_farhan'] === 'baru') {
              echo "<div class='btn-group'>
                      <button type='button' class='btn btn-danger dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
                        Validasi
                      </button>
                      <ul class='dropdown-menu'>
                        <li>
                          <a href='../admin/validasi.php?id=" . $row['id_pengaduan_farhan'] . "' class='dropdown-item'>Valid</a>
                        </li>
                        <li>
                          <a href='tidakValid.php?id=" . $row['id_pengaduan_farhan'] . "' class='dropdown-item' onclick = 'return confirm('yakin?');>Tidak Valid</a>
                        </li>
                      </ul>
                    </div>";
            } else {
              
            }
          ?>
        </td>
      </tr>

      <?php endforeach; ?>
    </tbody>

  </table>
  </div>
  </div>
  </div>
</body>
<script src="../bootstrap/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
