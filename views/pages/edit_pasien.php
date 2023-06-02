<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}


require_once('../../core/database/db_connect.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
    $query = " SELECT * FROM pasien WHERE pasienid=" .$id. " ";

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
    $nama = $db -> real_escape_string($_POST['nama']);
    $umur = $db -> real_escape_string($_POST['umur']);
    $alamat = $db -> real_escape_string($_POST['alamat']);
    $notelp= $db -> real_escape_string($_POST['notelp']);
    $email = $db -> real_escape_string($_POST['email']);
    //update data into database
    //if ($nama != '' && $umur != '' && $alamat != '' && $notelp != '' && $email != ''){
        $query = " UPDATE pasien SET nama_lengkap='".$nama."', umur='".$umur."', alamat='".$alamat."', no_telp='".$notelp."', email='".$email."' WHERE pasienid=".$id." ";

        //execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
            $db->close();
            header('Location: view_pasien.php');
        }
    //}else{
     //   alert("Please fill all the fields");
    
}
    include('bar-header.php')
?>
 <div class="container">
     <div class="card">
         <div class="card-header">Edit Customers Data</div>
         <div class="card-body">
             <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id=' .$id; ?>">
             <div class="form-group">
                 <label for="nama">Nama Lengkap:</label>
                 <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>" >
             </div>
             <div class="form-group">
                 <label for="umur">Umur:</label>
                 <input type="text" class="form-control" id="umur" name="umur" value="<?php echo $umur;?>" >
             </div>
             <div class="form-group">
                 <label for="alamat">Alamat:</label>
                 <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat;?>">
             </div>
             <div class="form-group">
                 <label for="notelp">No. Telp:</label>
                 <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $notelp;?>" >
             </div>
             <div class="form-group">
                 <label for="email">Email:</label>
                 <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>" >
             </div>
             <br>
             <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
             <a href="view_pasien.php" class="btn btn-secondary">Cancel</a>
            </form>
            </div>
            </div>
    </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<?php
    $db->close();
    include('bar-footer.php')
?>
                

