<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger p-2">
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
        <li class="nav-item">
          <a class="nav-link" href="history.php">History</a>
        </li>
      </ul>
      <a href="../logout.php" class="btn btn-light text-light">
        Logout
        </a>
    </div>
  </div>
</nav>

    <?php
        include '../koneksi.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM tanggapan_farhan INNER JOIN petugas_farhan ON tanggapan_farhan.id_petugas_farhan = petugas_farhan.id_petugas_farhan WHERE id_pengaduan_farhan = $id";
        $laporan = mysqli_query($conn, $sql);

    ?>


    <br>
  
    <div class="table-responsive container-fluid">
    <h1 class="text-center">Laporan Pengaduan</h1>
    <table border="1" cellpadding="5px" class="table text-center table-bordered border-danger table-hover">
        <thead>
            <tr>
                <th style='width: 15px'>No. Laporan</th>
                <th class="align-middle" style='width: 150px'>Tanggal</th>
                <th class="align-middle" style='width: 150px'>Nama Petugas</th>
                <th class="align-middle">Tanggapan</th>
            </tr>
            
        </thead>
        <tbody>
            <?php foreach ($laporan as $row) : ?>
            <tr>
                <td class="align-middle"><?= $row["id_pengaduan_farhan"]; ?></td>
                <td class="align-middle"><?= $row["tgl_tanggapan_farhan"]; ?></td>
                <td class="align-middle"><?= $row["nama_petugas_farhan"]; ?></td>
                <td class="align-middle"><?= $row["tanggapan_farhan"]; ?></td>
                
            </tr>
                <?php endforeach; ?>
                
        </tbody>
        
    </table>
    <?php if(mysqli_num_rows($laporan) === 0 ) : ?>
        <h1 class="text-center">Belum ada tanggapan</h1>
    <?php endif; ?>
    </div>
</body>
<script src="../bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html> 