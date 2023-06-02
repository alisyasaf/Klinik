<?php
    include('../templates/header.php');
    require_once('../../core/database/DB_Connect.php');
    $hari = $db -> real_escape_string($_POST['hari']);
    $waktu = $db -> real_escape_string($_POST['waktu']);
    $dokter= $db -> real_escape_string($_POST['dokter']);

    $query = " INSERT INTO jadwal (hari, waktu, nama_dokter) VALUES ('".$hari."','".$waktu."','".$dokter."') ";
    $result = $db->query($query);
    if(!$result){
        echo '<div class ="alert alert-danger alert-dismissible">
            <strong>Error!</strong>Couldnt query the database<br>'.
            $db->error.'<br>query = '.$query.
            '</div>';
    }else{
        echo '<div class ="alert alert-success alert-dismissible">
        <strong>Success!</strong>Data has been added.<br>
            Hari: '.$_POST['hari'].'<br>
            Waktu: '.$_POST['waktu'].'<br>
            Dokter: '.$_POST['dokter'].'<br>
        </div>';
    }

    $db->close();
?>