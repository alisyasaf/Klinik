<?php
//File      : edit_customer.php
//Deskripsi : menampilkan form edit data customer dan mengupdate ke database

require_once('../../core/database/db_connect.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
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
    $nama = $db -> real_escape_string($_POST['nama']);
    $notelp = $db -> real_escape_string($_POST['notelp']);

    //update data into database
    //if ($nama != '' && $notelp != '' && $dokter != '' && $notelp != '' && $email != ''){
        $query = " UPDATE dokter SET nama_lengkap='".$nama."', no_telp='".$notelp."' WHERE dokterid=".$id." ";

        //execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
            $db->close();
            header('Location: view_dokter.php');
        }
    //}else{
     //   alert("Please fill all the fields");
     include('bar-header.php');
    
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">Edit Customers Data</div>
        <div class="card-body">
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id=' .$id; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>" >
            </div>
            <div class="form-group">
                <label for="notelp">notelp:</label>
                <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $notelp;?>" >
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_dokter.php" class="btn btn-secondary">Cancel</a>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
<?php
$db->close();
?>