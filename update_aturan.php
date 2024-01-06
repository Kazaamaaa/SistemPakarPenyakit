<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="form" onsubmit="return validasiForm()">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>UPDATE DATA BASIS ATURAN</strong></div>
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