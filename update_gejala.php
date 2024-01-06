<?php 
$idgejala=$_GET['id'];

if(isset($_POST['update'])){
    $namagejala=$_POST['namagejala'];

    // proses update
    $sql = "UPDATE gejala SET namagejala='$namagejala' WHERE idgejala='$idgejala'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
}

$sql = "SELECT * FROM gejala WHERE idgejala='$idgejala'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>TAMBAH DATA GEJALA</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Gejala</label>
                            <input type="text" class="form-control" name="namagejala" value="<?php echo $row['namagejala']; ?>" maxlength="" required>
                        </div>

                        <input class="btn btn-primary" type="submit" name="update" value="update">
                        <a class="btn btn-danger" href="?page=gejala">Batal</a>

                    </div>
                </div>
        </form>
    </div>
</div>