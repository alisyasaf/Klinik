<?php
    include('../templates/header.php');
    require_once('../../core/database/DB_Connect.php');
    $keyword = $_POST['keyword'];    
?>
                
                <table class="table table-stripped" id="tabel">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>E-mail</th>
                    </tr>

                    <?php
                    require_once('../../core/database/db_connect.php');
                    $query = " SELECT * FROM pasien WHERE nama_lengkap LIKE '%".$keyword."%' ORDER BY pasienid ";
                    $result = $db->query($query);
                    if(!$result){
                        die("could not query the database: <br />".$db->error."<br>Query:".$query);
                    }

                    $i = 1;
                    while($row = $result->fetch_object()){
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row->nama_lengkap.'</td>';
                        echo '<td>'.$row->umur.'</td>';
                        echo '<td>'.$row->alamat.'</td>';
                        echo '<td>'.$row->no_telp.'</td>';
                        echo '<td>'.$row->email.'</td>';
                        echo '<td><a class = "btn btn-warning btn-sm" href=edit_customer.php?id='.$row->pasienid.'">Edit</a>&nbsp;&nbsp;
                            <a class = "btn btn-danger btn-sm" href="confirm_delete_customer.php?id='.$row->pasienid.'">Delete</a>
                            </td>';
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