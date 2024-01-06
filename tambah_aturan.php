<?php

if (isset($_POST['simpan'])) {
    //ambil data dari form
    $namapenyakit = $_POST['namapenyakit'];


    // validasi nama penyakit
    $sql = "SELECT basis_aturan.idaturan, basis_aturan.idpenyakit,penyakit.namapenyakit 
            FROM basis_aturan INNER JOIN penyakit ON basis_aturan.idpenyakit=penyakit.idpenyakit  
            WHERE namapenyakit='$namapenyakit'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Data Basis Aturan Penyakit Sudah Ada</strong>
        </div>
<?php
    } else {
        // Mengambil id penyakit
        $sql = "SELECT * FROM penyakit WHERE namapenyakit='$namapenyakit'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $idpenyakit = $row['idpenyakit'];

        //proses simpan basis aturan 
        $sql = "INSERT INTO basis_aturan VALUES (NULL,'$idpenyakit')";
        mysqli_query($conn, $sql);

        $idgejala = isset($_POST['idgejala']) ? $_POST['idgejala'] : [];

        // Proses mengambil data aturan
        // Retrieve the latest idaturan from the basis_aturan table:
        $sql = "SELECT * FROM basis_aturan ORDER BY idaturan DESC";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $idaturan = $row['idaturan'];

        // Process saving details of the basis rule:
        $amount = count($idgejala);
        $i = 0;
        while ($i < $amount) {
            $idgejalaValue = $idgejala[$i];
            $sql = "INSERT INTO detail_basis_aturan VALUES ($idaturan, '$idgejalaValue')";
            mysqli_query($conn, $sql);
            $i++;
        }
    }
    header("Location:?page=aturan");
}


?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="form" onsubmit="return validasiForm()">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>TAMBAH DATA BASIS ATURAN</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Penyakit</label>
                            <select class="form-control chosen" data-placeholder="Pilih Nama Penyakit" name="namapenyakit">
                                <option value=""></option>
                                <?php
                                $sql = "SELECT * FROM penyakit ORDER BY namapenyakit ASC";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row['namapenyakit']; ?>"><?php echo $row['namapenyakit']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!-- tabel data gejala-gejala -->
                        <div class="form-group">
                            <label for="">Pilih gejala-gejala berikut:</label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="30px">Action</th>
                                        <th width="30px">No</th>
                                        <th width="700px">Nama Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM gejala ORDER BY namagejala ASC";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" value="<?php echo $row['idgejala']; ?>" name="idgejala[]" class="check-item"></td>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['namagejala']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=aturan">Batal</a>

                    </div>
                </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validasiForm() {

        // Validasi Nama Penyakit
        var namapenyakit = document.forms["form"]["namapenyakit"].value;
        if (namapenyakit == "") {
            alert("Pilih Nama Penyakit");
            return false;
        }

        // validasi gejala yang belum dipilih
        var gejala = document.forms["form"]["idgejala[]"];
        var isChecked = false;

        for (var i = 0; i < gejala.length; i++) {
            if (gejala[i].checked) {
                isChecked = true;
                break;
            }
        }

        //jika belum ada yang dicheck
        if (!isChecked) {
            alert("Pilih Gejala");
            return false;
        }
        return true;
    }
</script>