<?php

    //panggil koneksi database
    include "DB_Connect.php";

    if(isset($_POST["login"])){
        $username = mysqli_escape_string($db, $_POST['username']);
        $password = mysqli_escape_string($db, $_POST['password']);
    }
    //cek username, terdaftar atau tidak
    $cek_user = mysqli_query($db, "SELECT * FROM user WHERE username = '$username' ");
    $user_valid = mysqli_fetch_array($cek_user);
    //uji jika username terdaftar
    if ($user_valid) {
        $level = $user_valid['level'];
        //jika username terdaftar
        //cek password sesuai atau tidak
        if ($password == $user_valid['password']) {
            //jika password sesuai
            //buat session
            session_start();
            $_SESSION['username'] = $user_valid['username'];
            $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
            $_SESSION['level'] = $user_valid['level'];

            //uji level user
            if ($level == "admin") {
                header('location:../../views/pages/home_admin.php');
            } elseif ($level == "pasien") {
                header('location:../../views/pages/home_pasien.php');
            }
        } else {
            echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='index.php'</script>";
        }
    } else {
        echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='index.php'</script>";
    }
    
?>
