<?php
    require '../koneksi.php';

    $id_pengaduan = $_GET['id'];
    $update = "UPDATE pengaduan_farhan SET `status_farhan` = 'Tidak valid' WHERE `id_pengaduan_farhan` = '$id_pengaduan'";
    $query = mysqli_query($conn, $update);

    if ($query) {
        echo "<script>alert('Laporan Valid');</script>
        ";
        header("Location: laporan.php");
    }
?>