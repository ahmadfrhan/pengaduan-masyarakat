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
            Registrasi Masyarakat
        </div>
            <label>NIK</label>
            <input type="number" name="nik" autocomplete="off" maxlength="16" required>
            <label>Nama</label>
            <input type="text" name="nama" autocomplete="off" required>
            <label>Username</label>
                <input type="username" name="username" autocomplete="off" required>
            <label>Password</label> 
                <input type="password" name="password" required>
            <label>No. Telpon</label>
                <input type="number" name="telp" required maxlength="16">
            <input type="submit" value="Daftar" name="simpan" class="btn btn-primary mt-2">
           <a href="masyarakat/laporan.php" class="mx-2 p-1 pb-3 text-decoration-underline">Kembali</a>
    </div>
</div>
</form>
<?php
    require '../koneksi.php';
    
    if (isset($_POST['simpan'])) {
        
        if (strlen($nik) == 16) {
            
        }else{
            echo'<script>alert("Harus 16 digit")</script>';
        }
        
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];
        $query = "INSERT INTO `masyarakat_farhan`(`nik_farhan`, `nama_farhan`, `username_farhan`, `password_farhan`, `telp_farhan`) VALUES ('$nik','$nama','$username','$password','$telp')";
        $proses = mysqli_query($conn, $query);
        if ($proses) {
            echo"<script>
            alert('Data berhasil disimpan');
            </script>
            ";
            header('Location: ../index.php'); 
    
        } else{
            echo "
            <script>
            alert('data gagal ditambahkan');
            </script> ";
        }
    }
    
    
?>
</html>