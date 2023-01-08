<!doctype html>
<html lang="en">
<?php
include 'components/head.php';
?>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <?php
        include 'components/sidebar.php';
        ?>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <?php
            include 'components/navbar.php';
            ?>

            <section id="main-content">
                <section class="wrapper">
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li><i class="fa fa-edit"></i><a href=""> Edit</a></li>
                            </ol>
                        </div>
                    </div>

                    <!--START SCRIPT UPDATE-->
                    <?php
                    include 'koneksi.php';

                    if (isset($_POST['edit'])) {
                        $first_namawisata = $_GET['namawisata'];
                        $namawisata = $_POST['namawisata'];
                        $kode = $_POST['kode'];
                        if (($namawisata == "") or ($kode == "")) {
                            echo "<script>
                            alert('Tolong lengkapi data yang ada!');
                            </script>";
                        } else {
                            $sql = "UPDATE saw_aplikasi SET namawisata='$namawisata',kode='$kode'
                                    WHERE namawisata='$first_namawisata'";
                            $hasil = $conn->query($sql);
                            if ($hasil) {
                                echo "<script>
                                alert('berhasil di update !');
                                window.location.href='index.php'; 
                                </script>";
                            }
                        }
                    }
                    ?>
                    <!-- END SCRIPT UPDATE-->

                    <!--start inputan-->
                    <form method="POST" action="">
                        <?php
                        $namawisata= $_GET['namawisata'];
                        $sql = "SELECT * FROM saw_wisata WHERE namawisata = '$namawisata'";
                        $hasil = $conn->query($sql);
                        $rows = $hasil->num_rows;
                        if ($rows > 0) {
                            $row = $hasil->fetch_row();
                            $namawisata = $row[0];
                            $kode = $row[1];
                        ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Wisata</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="namawisata" value="<?= $namawisata ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="kode" value="<?= $kode ?>">
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-danger mr-3"><a href="index.php"><i class="fa fa-close"></i> Cancel</a></button>
                                <button type="edit" name="edit" class="btn btn-outline-primary"><i class="fa fa-edit"></i> Edit</button>
                            </div>
                    </form>
                <?php } ?>
                </section>
            </section>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>