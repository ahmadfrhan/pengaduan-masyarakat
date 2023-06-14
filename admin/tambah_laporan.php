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
    <?php
        include '../koneksi.php';

        $sql = "SELECT * FROM pengaduan_farhan";
        $level = mysqli_query($conn, $sql);
    ?>
     <form action="simpan_laporan.php" method="post">   
         <div class="container-fluid p-4 d-flex justify-content-center">
            <div class="card shadow shadow-m" style="width: 25rem;">
            <div class="card-header text-center bg-danger mb-3 text-light p-3">
            Tambah Laporan
        </div>
            <label>NIK</label>
            <input type="number" name="nik">
            <input type="text" name="status" value="Proses" hidden>
            <label>Nama</label>
                <input type="date" name="tanggal"  value="">
            <label>Isi Laporan</label>
                <textarea name="laporan" cols="44" rows="5" class=" m-auto"></textarea><br>
            <label >Foto</label>
                <input type="file" name="foto">
            <input type="submit" name="simpan" value="Kirim" class="bg-primary border-0 text-light p-2 mt-3 mb-2">
           <a href="masyarakat/laporan.php" class="mx-2 p-1 pb-3 text-decoration-underline">Kembali</a>
    </div>
</div>
</form>
</body>
</html>