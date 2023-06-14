<?php
    session_start();
    include 'koneksi.php';
     $username = $_POST['username'];
     $password = $_POST['password'];
     $sql ="SELECT * FROM petugas_farhan where username_petugas_farhan = '$username' and password_petugas_farhan = '$password'";
     $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query)!=0){
            echo "<br>Login berhasil";
            $data = mysqli_fetch_array($query);
            if ($data['level_farhan'] == "Petugas"){
                $_SESSION['username'] = $data['farhan_username'];
                $_SESSION['password'] = $data['password_farhan'];
                $_SESSION['id_petugas'] = $data['id_petugas_farhan'];
                $_SESSION['nama_petugas'] = $data['nama_petugas_farhan'];
                $_SESSION['LOGIN'] = "LOGIN";
                header("location:petugas/petugas.php");
            }elseif($data['level_farhan'] == "Admin"){
                $_SESSION['username'] = $data['farhan_username'];
                $_SESSION['password'] = $data['password_farhan'];
                $_SESSION['id_petugas'] = $data['id_petugas_farhan'];
                $_SESSION['nama_petugas'] = $data['nama_petugas_farhan'];
                $_SESSION['LOGIN'] = "LOGIN";
                header("location:admin/admin.php");
            }else {}
        }else {
            echo "Login Gagal";
            echo "<a href=admin/index.php>Kembali</a>";
        }
