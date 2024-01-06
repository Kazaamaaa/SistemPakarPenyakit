<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPFC</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- choosen css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-primary navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?page=gejala">Gejala</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?page=penyakit">Penyakit</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?page=aturan">Basis Aturan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Konsultasi</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </nav>
    <!-- END NAVBAR -->

    <!-- container -->
    <div class="container mt-2">
        <!-- setting menu -->
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page == "") {
            include "welcome.php";
        } elseif ($page == "gejala") {
            if ($action == "") {
                include "tampil_gejala.php";
            } elseif ($action == "tambah") {
                include "tambah_gejala.php";
            } elseif ($action == "update") {
                include "update_gejala.php";
            } else {
                include "hapus_gejala.php";
            }
        } elseif ($page == "penyakit") {
            if ($action == "") {
                include "tampil_penyakit.php";
            } elseif ($action == "tambah") {
                include "tambah_penyakit.php";
            } elseif ($action == "update") {
                include "update_penyakit.php";
            } else {
                include "hapus_penyakit.php";
            }
        } elseif ($page == "aturan") {
            if ($action == "") {
                include "tampil_aturan.php";
            } elseif ($action == "tambah") {
                include "tambah_aturan.php";
            } elseif ($action == "detail") {
                include "detail_aturan.php";
            } elseif ($action == "update") {
                include "update_aturan.php";
            } else {
                include "hapus_penyakit.php";
            }
        } else {
            include "NAMA_HALAMAN";
        }
        ?>
    </div>
    <!-- END CONTAINER -->

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- datatable js -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        })
    </script>

    <!-- font awesome js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <!-- choosen js -->
    <script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.min.js"></script>
    <script>
        $(function() {
            $('.chosen').chosen();
        });
    </script>
</body>

</html>