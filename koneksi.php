<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "pengaduan_masyarakat_farhan";
    $conn = new mysqli($host, $username, $password, $db);

    if ($conn) {
        //berhasil konek;
    }else {
        echo "koneksi gagal";
    }