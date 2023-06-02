<?php
    session_start();
    include('bar-header.php');

?>

<div class="card">
<div class="card-header">Add Jadwal Mingguan</div>
<div class="card-body">

<form method="POST" autocomplete="on">
    <div class="form-group">
        <label for="hari">Hari:</label>
        <input type="text" class="form-control" id="hari" name="hari" required>
    </div>
    <div class="form-group">
        <label for="umur">Waktu:</label>
        <input type="text" class="form-control" id="waktu" name="waktu" required>
    </div>
    <div class="form-group">
        <label for="dokter">Nama dokter:</label>
        <input type="text" class="form-control" id="dokter" name="dokter" required>
    </div>
    <br>
    <button type="button" class="btn btn-primary" onclick="add_jadwal_post()">Add</button>
    <a href="view_jadwal.php" class="btn btn-secondary">Cancel</a>
</form>
<br>
<div id="add_response"></div>
</div>
</div>
</body>
</html>
