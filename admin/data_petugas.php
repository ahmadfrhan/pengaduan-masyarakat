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
        <ul class="navbar-nav">
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
      </ul>
        <li class="nav-item">
          <a class="nav-link" href="registrasi.php">Registrasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="log_tanggapan_farhan.php">Log</a>
        </li>
      </ul> 
      <ul class="navbar-nav mx-3">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../img/person-circle.svg" class="w-100">
          </a>
          <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class='dropdown-item' href='data_masyarakat.php'>Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="../logout.php" class="dropdown-item">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <?php
        include '../koneksi.php';

        $sql = "SELECT * FROM petugas_farhan";
        $laporan = mysqli_query($conn, $sql);
    ?>


    <br>
    <div class="container p-0 pt-3">
      <div class="table-responsive container-fluid col-12">
        <table border="1" cellpadding="5px" class="table table-bordered border-danger table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporan as $row) : ?>
                    <td class="align-middle"><?= $row["id_petugas_farhan"]; ?></td>
                    <td class="align-middle"><?= $row["nama_petugas_farhan"]; ?></td>
                    <td class="align-middle"><?= $row["username_petugas_farhan"]; ?></td>
                    <td class="align-middle"><?= $row["password_petugas_farhan"]; ?></td>
                    <td class="align-middle"><?= $row["level_farhan"]; ?></td>
                </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
</body>
<script src="../bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>