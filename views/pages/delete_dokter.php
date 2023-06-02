<?php
//File      : delete_customer.php
//Deskripsi : menghapus data customer dari database

require_once('../../core/database/db_connect.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["confirm"])){
    $query = " SELECT * FROM dokter WHERE dokterid=" .$id. " ";
    //execute the query
    $result = $db->query($query);
    if (!$result){
        die ("Could not the query database: <br />" . $db->error);
    } else {
        while ($row = $result->fetch_object()){
            $nama = $row->nama_lengkap;
            $notelp = $row->no_telp;
        }
       
    }
}else{
   //asign a query
    $query = " DELETE FROM dokter WHERE dokterid=" .$id. " ";
    //execute the query
    $result = $db->query($query);
    if (!$result){
        die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
    } else{
        //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
        $db->close();
        header('Location: view_dokter.php');
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
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>" disabled>
            </div>
            <div class="form-group">
                <label for="notelp">notelp:</label>
                <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $notelp;?>" disabled>
            </div>
            <br>
            <button type="confirm" class="btn btn-danger" name="confirm" value="confirm">Confirm</button>
            <a href="view_dokter.php" class="btn btn-secondary">Cancel</a>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
