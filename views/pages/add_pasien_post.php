<?php
    include('../templates/header.php');
    require_once('../../core/database/DB_Connect.php');
    $nama = $db -> real_escape_string($_POST['nama']);
    $umur = $db -> real_escape_string($_POST['umur']);
    $alamat = $db -> real_escape_string($_POST['alamat']);
    $notelp= $db -> real_escape_string($_POST['notelp']);
    $email = $db -> real_escape_string($_POST['email']);

    $query = " INSERT INTO pasien (nama_lengkap, umur, alamat, no_telp, email) VALUES ('".$nama."','".$umur."','".$alamat."', '".$notelp."','".$email."') ";
    $result = $db->query($query);
    if(!$result){
        echo '<div class ="alert alert-danger alert-dismissible">
            <strong>Error!</strong>Couldnt query the database<br>'.
            $db->error.'<br>query = '.$query.
            '</div>';
    }else{
        echo '<div class ="alert alert-success alert-dismissible">
        <strong>Success!</strong>Data has been added.<br>
            Name: '.$_POST['nama'].'<br>
            Umur: '.$_POST['umur'].'<br>
            Alamat: '.$_POST['alamat'].'<br>
            No. telp: '.$_POST['notelp'].'<br>
            E-mail: '.$_POST['email'].'<br>
        </div>';
    }

    $db->close();
?>