<?php
//File      : delete_customer.php
//Deskripsi : menghapus data customer dari database
session_start();
require_once('../../core/database/db_connect.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["confirm"])){
    $query = " SELECT * FROM pasien ORDER BY pasienid";
    //execute the query
    $result = $db->query($query);
    if (!$result){
        die ("Could not the query database: <br />" . $db->error);
    } else {
        while ($row = $result->fetch_object()){
            $nama = $row->nama_lengkap;
            $umur = $row->umur;
            $alamat = $row->alamat;
            $notelp = $row->no_telp;
            $email = $row->email;
        }
       
    }
}else{
   //asign a query
    $query = " DELETE FROM pasien WHERE pasienid=" .$id. " ";
    //execute the query
    $result = $db->query($query);
    if (!$result){
        die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
    } else{
        //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
        $db->close();
        header('Location: view_pasien.php');
    }
}
include('bar-header.php')
    
?>

<div class="container">
    <div class="card">
        <div class="card-header text-danger">Confirm Delete Customer Data</div>
        <div class="card-body">
            <form method="POST" autocomplete="on" action="">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>" disabled>
            </div>
            <div class="form-group">
                <label for="umur">Umur:</label>
                <input type="text" class="form-control" id="umur" name="umur" value="<?php echo $umur;?>" disabled>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat;?>" disabled>
            </div>
            <div class="form-group">
                <label for="notelp">No. Telp:</label>
                <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $notelp;?>" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>" disabled>
            </div>
            <br>
            <button type="confirm" class="btn btn-danger" name="confirm" value="confirm">Confirm</button>
            <a href="view_pasien.php" class="btn btn-secondary">Cancel</a>
        </form>
        </div>
    </div>
</div>

