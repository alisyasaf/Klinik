<?php
    session_start();
    include('bar-header.php');

?>

<div class="card">
<div class="card-header">Add Pasien Data</div>
<div class="card-body">

<form method="GET" autocomplete="on">
    <div class="form-group">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="form-group">
        <label for="umur">Umur:</label>
        <input type="text" class="form-control" id="umur" name="umur">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <textarea class="form-control" id="alamat" name="alamat"></textarea>
    </div>
    <div class="form-group">
        <label for="notelp">No. Telp:</label>
        <input type="text" class="form-control" id="notelp" name="notelp">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    
    <br>
    <button type="button" class="btn btn-primary" onclick="add_pasien_post()">Add</button>
    <a href="view_pasien.php" class="btn btn-secondary">Cancel</a>
</form>
<br>
<div id="add_response"></div>
</div>
</div>
</body>
</html>
