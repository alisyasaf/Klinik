<?php
    include('../templates/header.php');
    require_once('../../core/database/DB_Connect.php');
    $keyword = $_POST['keyword'];    
?>
    <table class="table table-stripped" id="tabel">
        <tr>
        <th>No</th>
        <th>Hari</th>
        <th>Waktu (WIB)</th>
        <th>Nama Dokter</th>
    </tr>

    <?php
    require_once('../../core/database/db_connect.php');
    $query = " SELECT * FROM jadwal WHERE hari LIKE '%".$keyword."%' OR nama_dokter LIKE '%".$keyword."%' ORDER BY idjadwal";
    $result = $db->query($query);
    if(!$result){
        die("could not query the database: <br />".$db->error."<br>Query:".$query);
    }

    $i = 1;
    while($row = $result->fetch_object()){
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row->hari.'</td>';
        echo '<td>'.$row->waktu.'</td>';
        echo '<td>'.$row->nama_dokter.'</td>';
        echo '<tr>';
        $i++;
    }
    echo '</table>';
    echo '<br />';
    echo 'total rows = '.$result->num_rows;
    $result->free();
    $db->close();
    ?>
</table>