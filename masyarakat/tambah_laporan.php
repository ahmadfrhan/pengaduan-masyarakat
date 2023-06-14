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

<?php 
require '../koneksi.php';
session_start();
if (isset($_POST['simpan'])) {
    date_default_timezone_set("Asia/Jakarta"); 

    $tanggal = date("Y-m-d");
    $laporan = $_POST['laporan'];
    $nik = $_SESSION['nik'];
    $foto = $_POST['foto'];

    $query = "INSERT INTO `pengaduan_farhan`(`id_pengaduan_farhan`, `tgl_pengaduan_farhan`, `nik_farhan`, `isi_laporan_farhan`, `foto_farhan`, `status_farhan`) VALUES (NULL,'$tanggal','$nik','$laporan','$foto','belum selesai');";
    $proses = mysqli_query($conn, $query);

    if ($proses) {
        echo "
        <script>
        alert('data Berhasil ditambahkan');
        </script> ";
        header('Location: masyarakat.php'); 

    } else{
        echo "
        <script>
        alert('data gagal ditambahkan');
        </script> ";
    }
}
?>

    <form action="" method="post">   
         <div class="container-fluid p-4 d-flex justify-content-center w-50">
            <div class="card shadow shadow-m"  style="width: 25rem;">
            <div class="card-header text-center bg-danger mb-3 text-light p-3">
            Tambah Laporan
        </div>
            <label>NIK</label>
            <input type="number" name="nik" value="<?= $_SESSION['nik'];?>" disabled>
            <label>Tanggal</label>
                <input type="text" name="tanggal" value="<?=date("d-m-Y"); ?>" disabled>
            <label>Isi Laporan</label>
                <textarea name="laporan" cols="75" rows="5" class="ms-2 mx-2"></textarea><br>
            <label >Foto</label>
                <input type="file" name="foto">
            <input type="submit" name="simpan" value="Kirim" class="bg-primary border-0 text-light p-2 mt-3 mb-2">
           <a href="masyarakat.php" class="mx-2 p-1 pb-3 text-decoration-underline">Kembali</a>
        </div>
    </div>
</form>
</body>
</html>