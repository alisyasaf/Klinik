<?php
//File      : edit_customer.php
//Deskripsi : menampilkan form edit data customer dan mengupdate ke database

require_once('../../core/database/db_connect.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
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
    $hari = $db -> real_escape_string($_POST['hari']);
    $waktu = $db -> real_escape_string($_POST['waktu']);
    $dokter = $db -> real_escape_string($_POST['dokter']);

    //update data into database
    //if ($nama != '' && $waktu != '' && $dokter != '' && $notelp != '' && $email != ''){
        $query = " UPDATE jadwal SET hari='".$hari."', waktu='".$waktu."', nama_dokter='".$dokter."' WHERE idjadwal=".$id." ";

        //execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
            $db->close();
            header('Location: view_jadwal.php');
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
                <label for="waktu">Hari:</label>
                <input type="text" class="form-control" id="hari" name="hari" value="<?php echo $hari;?>" >
            </div>
            <div class="form-group">
                <label for="waktu">waktu:</label>
                <input type="text" class="form-control" id="waktu" name="waktu" value="<?php echo $waktu;?>" >
            </div>
            <div class="form-group">
                <label for="dokter">dokter:</label>
                <input type="text" class="form-control" id="dokter" name="dokter" value="<?php echo $dokter;?>">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_jadwal.php" class="btn btn-secondary">Cancel</a>
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