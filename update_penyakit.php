<?php 
$idpenyakit=$_GET['id'];

if(isset($_POST['update'])){
    $namapenyakit=$_POST['namapenyakit'];
    $keterangan=$_POST['keterangan'];
    $solusi=$_POST['solusi'];

    // proses update
    $sql = "UPDATE penyakit SET namapenyakit='$namapenyakit', keterangan='$keterangan', solusi='$solusi' WHERE idpenyakit='$idpenyakit'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}

$sql = "SELECT * FROM penyakit WHERE idpenyakit='$idpenyakit'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>TAMBAH DATA PENYAKIT</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Penyakit</label>
                            <input type="text" class="form-control" name="namapenyakit" value="<?php echo $row['namapenyakit']; ?>" maxlength="" required>
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="<?php echo $row['keterangan']; ?>" maxlength="" required>
                            <label for="">Solusi</label>
                            <input type="text" class="form-control" name="solusi" value="<?php echo $row['solusi']; ?>" maxlength="" required>
                        </div>

                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                        <a class="btn btn-danger" href="?page=penyakit">Batal</a>

                    </div>
                </div>
        </form>
    </div>
</div>