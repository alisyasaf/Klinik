<?php
    session_start();
    include('bar-header.php');

?>

<div class="card">
<div class="card-header">Add Dokter</div>
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
    <br>
    <button type="button" class="btn btn-primary" onclick="add_dokter_post()">Add</button>
    <a href="view_dokter.php" class="btn btn-secondary">Cancel</a>
</form>
<br>
<div id="add_response"></div>
</div>
</div>
</body>
</html>
