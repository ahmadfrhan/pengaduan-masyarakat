<?php
    require 'koneksi.php';
    
    if (isset($_POST['simpan'])) {
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
            header('Location: index.php'); 
    
        } else{
            echo "
            <script>
            alert('data gagal ditambahkan');
            </script> ";
        }
    }
?>