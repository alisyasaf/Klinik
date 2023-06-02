<?php
    include('../templates/header.php');
    require_once('../../core/database/DB_Connect.php');
    $nama = $db -> real_escape_string($_POST['nama']);
    $notelp = $db -> real_escape_string($_POST['notelp']);

    $query = " INSERT INTO dokter (nama_lengkap, no_telp) VALUES ('".$nama."','".$notelp."') ";
    $result = $db->query($query);
    if(!$result){
        echo '<div class ="alert alert-danger alert-dismissible">
            <strong>Error!</strong>Couldnt query the database<br>'.
            $db->error.'<br>query = '.$query.
            '</div>';
    }else{
        echo '<div class ="alert alert-success alert-dismissible">
        <strong>Success!</strong>Data has been added.<br>
            Hari: '.$_POST['nama'].'<br>
            Waktu: '.$_POST['notelp'].'<br>
        </div>';
    }

    $db->close();
?>