<?php
    session_start();
    include('bar-header-pasien.php');

?>

<div class="card">
<div class="card-header">Formulir Pendaftaran Konsultasi</div>
<div class="card-body">

<form method="POST" autocomplete="on">
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="form-group">
        <label for="notelp">No. Telp:</label>
        <input type="text" class="form-control" id="notelp" name="notelp">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" class="form-control" id="alamat" name="alamat">
    </div>
    <div class="form-group">
        <label for="jadwal">Jadwal Konsultasi:</label>
        <input type="text" class="form-control" id="jadwal" name="jadwal">

    </div>
    <br>
    <button type="button" class="btn btn-primary" onclick="">Submit</button>
    <a href=".php" class="btn btn-secondary">Cancel</a>
</form>
<br>
<div id="add_response"></div>
</div>
</div>
</body>
</html>
