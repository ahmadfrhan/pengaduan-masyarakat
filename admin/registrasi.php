<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

     <form action="" method="post">   
         <div class="container-fluid p-4 d-flex justify-content-center">
            <div class="card shadow shadow-m" style="width: 25rem;">
            <div class="card-header text-center bg-danger mb-3 text-light p-3">
            Registrasi
        </div>
            <label>Nama</label>
            <input type="text" name="nama" autocomplete="off">
            <label>Username</label>
                <input type="username" name="username" autocomplete="off">
            <label>Password</label>
                <input type="password" name="password">
            <label>No. Telpon</label>
                <input type="number" name="telp">
            <label>Level</label>
            <select name="level">
                <option value="Admin">Admin</option>
                <option value="Petugas">Petugas</option>
            </select>
            <input type="submit" value="Daftar" name="simpan" class="btn btn-primary">
           <a href="admin.php" class="mx-2 p-1 pb-3 text-decoration-underline">Kembali</a>
    </div>
</div>
</form>
<?php 
require '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];


    $query = "INSERT INTO `petugas_farhan`(`id_petugas_farhan`, `nama_petugas_farhan`, `username_petugas_farhan`, `password_petugas_farhan`, `telp_petugas_farhan`, `level_farhan`) VALUES ( NULL, '$nama','$username','$password','$telp','$level')";
    $proses = mysqli_query($conn, $query);

    if ($proses) {
        echo"<script>
        alert('Data berhasil disimpan');
        </script>
        ";
        header('Location: admin.php'); 

    } else{
        echo "
        <script>
        alert('data gagal ditambahkan');
        </script> ";
    }
}
?>
</body>
</html>