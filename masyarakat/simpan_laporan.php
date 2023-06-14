<?php 
require '../koneksi.php';

if (isset($_POST['simpan'])) {
    $tgl = $_POST['tanggal'];
    $laporan = $_POST['laporan'];
    $nik = $_POST['nik'];
    $foto = $_POST['foto'];
    $status = $_POST['status'];


    $query = "INSERT INTO `pengaduan_farhan` (`id_pengaduan_farhan`, `tgl_pengaduan_farhan`, `nik_farhan`, `isi_laporan_farhan`, `foto_farhan`, `status_farhan`) VALUES (NULL, `$tgl`, `$nik`, `$laporan`, `$foto`, `$status`)";
    $proses = mysqli_query($conn, $query);

    if ($proses) {
        echo"<script>
        alert('Data berhasil disimpan');
        </script>
        ";
        header('Location: paket.php'); 

    } else{
        echo "
        <script>
        alert('data gagal ditambahkan');
        </script> ";
    }
}
