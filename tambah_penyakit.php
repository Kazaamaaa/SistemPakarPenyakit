<?php

if (isset($_POST['simpan'])) {
    //mengambil data dari form 
    $namapenyakit = $_POST['namapenyakit'];
    $keterangan = $_POST['keterangan'];
    $solusi = $_POST['solusi'];

    //proses simpan
    $sql = "INSERT INTO penyakit VALUES (Null,'$namapenyakit','$keterangan','$solusi')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}
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
                            <input type="text" class="form-control" name="namapenyakit" maxlength="" required>
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" maxlength="" required>
                            <label for="">Solusi</label>
                            <input type="text" class="form-control" name="solusi" maxlength="" required>
                        </div>

                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=penyakit">Batal</a>

                    </div>
                </div>
        </form>
    </div>
</div>