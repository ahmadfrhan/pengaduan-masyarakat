<?php
    session_start();
    include 'koneksi.php';
     $username = $_POST['username'];
     $password = $_POST['password'];
     $sql ="SELECT * FROM masyarakat_farhan where username_farhan = '$username' and password_farhan = '$password'";
     $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query)!=0){
            echo "<br>Login berhasil";
            $data = mysqli_fetch_array($query);
            if ($data){
                $_SESSION['username'] = $data['farhan_username'];
                $_SESSION['password'] = $data['password_farhan'];
                $_SESSION['nik'] = $data['nik_farhan'];
                $_SESSION['nama'] = $data['nama_farhan'];
                $_SESSION['LOGIN'] = "LOGIN";
                header("location:masyarakat/masyarakat.php");
            }else {
            echo "Login gagal<br>";
            echo "<a href=index.php>Kembali</a>";
        }
    }