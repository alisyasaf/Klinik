<?php
//File      : delete_customer.php
//Deskripsi : menghapus data customer dari database

require_once('../../core/database/db_connect.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["confirm"])){
    $query = " SELECT * FROM jadwal WHERE idjadwal=" .$id. " ";
    //execute the query
    $result = $db->query($query);
    if (!$result){
        die ("Could not the query database: <br />" . $db->error);
    } else {
        while ($row = $result->fetch_object()){
            $hari = $row->hari;
            $waktu = $row->waktu;
            $dokter = $row->nama_dokter;
        }
       
    }
}else{
   //asign a query
    $query = " DELETE FROM jadwal WHERE idjadwal=" .$id. " ";
    //execute the query
    $result = $db->query($query);
    if (!$result){
        die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
    } else{
        //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
        $db->close();
        header('Location: view_jadwal.php');
    }
}
include('bar-header.php');
    
?>

<div class="container">
    <div class="card">
        <div class="card-header text-danger">Confirm Delete Customer Data</div>
        <div class="card-body">
            <form method="POST" autocomplete="on" action="">
            <div class="form-group">
                <label for="waktu">Hari:</label>
                <input type="text" class="form-control" id="hari" name="hari" value="<?php echo $hari;?>" disabled>
            </div>
            <div class="form-group">
                <label for="waktu">waktu:</label>
                <input type="text" class="form-control" id="waktu" name="waktu" value="<?php echo $waktu;?>" disabled>
            </div>
            <div class="form-group">
                <label for="dokter">dokter:</label>
                <input type="text" class="form-control" id="dokter" name="dokter" value="<?php echo $dokter;?>"disabled>
            </div>
            <br>
            <button type="confirm" class="btn btn-danger" name="confirm" value="confirm">Confirm</button>
            <a href="view_jadwal.php" class="btn btn-secondary">Cancel</a>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
