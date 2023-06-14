<?php
    require '../koneksi.php';
    session_start();
    if (isset($_POST['simpan'])) {
        date_default_timezone_set("Asia/Jakarta");

        $id_pengaduan = $_GET['id'];
        $id_petugas = $_SESSION['id_petugas'];
        $tanggal = date("Y-m-d");
        $tanggapan = $_POST['tanggapan'];
    
    $insert = "INSERT INTO tanggapan_farhan VALUES(NULL, '$id_pengaduan', '$tanggal', '$tanggapan', '$id_petugas')";
    $update = "UPDATE pengaduan_farhan SET `status_farhan` = 'Selesai' WHERE `id_pengaduan_farhan` = '$id_pengaduan'";

    $sql1 = mysqli_query($conn, $insert);
    $sql2 = mysqli_query($conn, $update);

    if($sql1 && $sql2) {
        echo
        "
            <script>alert('Berhasil melakukan tanggapan');</script>
        ";
        header("location:laporan.php");
    }
}