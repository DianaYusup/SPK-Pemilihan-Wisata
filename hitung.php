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
                                <li><i class="fa fa-cogs"></i><a href="hitung.php"> Hitung</a></li>
                            </ol>
                        </div>
                    </div>
                    <div>
                        <b>
                            <h6><b>MATRIX X</b></h6>
                        </b>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-arrow-down"></i> No</th>
                                    <th><i class="fa fa-arrow-down"></i> Nama Wisata</th>
                                    <th><i class="fa fa-arrow-down"></i> Harga Tiket</th>
                                    <th><i class="fa fa-arrow-down"></i> Jarak Tempuh</th>
                                    <th><i class="fa fa-arrow-down"></i> Banyak Pengunjung</th>
                                    <th><i class="fa fa-arrow-down"></i> Fasilitas</th>
                                    <th><i class="fa fa-arrow-down"></i> Keamanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include 'koneksi.php';

                                $b = 0;
                                $sql = "SELECT*FROM saw_penilaian ORDER BY namawisata ASC";
                                $hasil = $conn->query($sql);
                                $rows = $hasil->num_rows;
                                if ($rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[0] ?></td>
                                            <td align="center"><?= $row[1] ?></td>
                                            <td align="center"><?= $row[2] ?></td>
                                            <td align="center"><?= $row[3] ?></td>
                                            <td align="center"><?= $row[4] ?></td>
                                            <td align="center"><?= $row[5] ?></td>
                                        </tr>
                                <?php }
                                } else {
                                    echo "<tr>
                                        <td>Data Tidak Ada</td>
                                    <tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <b>
                            <h6><b>NORMALISASI</b></h6>
                        </b>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-arrow-down"></i> No</th>
                                    <th><i class="fa fa-arrow-down"></i> Nama Wisata</th>
                                    <th><i class="fa fa-arrow-down"></i> Harga Tiket</th>
                                    <th><i class="fa fa-arrow-down"></i> Jarak Tempuh</th>
                                    <th><i class="fa fa-arrow-down"></i> Banyak Pengunjung</th>
                                    <th><i class="fa fa-arrow-down"></i> Fasilitas</th>
                                    <th><i class="fa fa-arrow-down"></i> Keamanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT*FROM saw_penilaian";
                                $hasil = $conn->query($sql);
                                $rows = $hasil->num_rows;
                                if ($rows > 0) {
                                    $b = 0;
                                    $C1 = '';
                                    $C2 = '';
                                    $C3 = '';
                                    $C4 = '';
                                    $C5 = '';
                
                                    $sql = "SELECT*FROM saw_penilaian ORDER BY hargatiket DESC";
                                    $hasil = $conn->query($sql);
                                    $row = $hasil->fetch_row();
                                    $C1 = $row[1];
                                    // Biaya
                                    $sql = "SELECT*FROM saw_penilaian ORDER BY jaraktempuh ASC";
                                    $hasil = $conn->query($sql);
                                    $row = $hasil->fetch_row();
                                    // End Biaya
                                    $C2 = $row[2];
                                    $sql = "SELECT*FROM saw_penilaian ORDER BY banyakpengunjung DESC";
                                    $hasil = $conn->query($sql);
                                    $row = $hasil->fetch_row();
                                    $C3 = $row[3];
                                    $sql = "SELECT*FROM saw_penilaian ORDER BY fasilitas DESC";
                                    $hasil = $conn->query($sql);
                                    $row = $hasil->fetch_row();
                                    $C4 = $row[4];
                                    $sql = "SELECT*FROM saw_penilaian ORDER BY keamanan DESC";
                                    $hasil = $conn->query($sql);
                                    $row = $hasil->fetch_row();
                                    $C5 = $row[5];
                                } else {
                                    echo "<tr>
                                        <td>Data Tidak Ada</td>
                                    <tr>";
                                }

                                $sql = "SELECT*FROM saw_penilaian";
                                $hasil = $conn->query($sql);
                                $rows = $hasil->num_rows;
                                if ($rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td align="center"><?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[0] ?></td>
                                            <td align="center"><?= round($row[1] / $C1, 2) ?></td>
                                            <td align="center"><?= round($C2 / $row[2], 2) ?></td>
                                            <td align="center"><?= round($row[3] / $C3, 2) ?></td>
                                            <td align="center"><?= round($row[4] / $C4, 2) ?></td>
                                            <td align="center"><?= round($row[5] / $C5, 2) ?></td>
                                        </tr>
                                <?php }
                                }  ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <b>
                            <h6><b>NILAI PREFERENSI</b></h6>
                        </b>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-arrow-down"></i> No</th>
                                    <th><i class="fa fa-arrow-down"></i> Nama Wisata</th>
                                    <th><i class="fa fa-arrow-down"></i> Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $b = 0;
                                $B1 = '';
                                $B2 = '';
                                $B3 = '';
                                $B4 = '';
                                $B5 = '';
                                $B6 = '';
                               
                                $nilai = '';
                                $nama = '';
                                $x = 0;
                                $sql = "SELECT * FROM saw_kriteria";
                                $hasil = $conn->query($sql);
                                $rows = $hasil->num_rows;
                                if ($rows > 0) {
                                    $row = $hasil->fetch_row();
                                    $B1 = $row[1];
                                    $B2 = $row[2];
                                    $B3 = $row[3];
                                    $B4 = $row[4];
                                    $B5 = $row[5];
                                }
                                $sql = "TRUNCATE TABLE saw_perangkingan";
                                $hasil = $conn->query($sql);

                                $sql = "SELECT * FROM saw_penilaian";
                                $hasil = $conn->query($sql);
                                $rows = $hasil->num_rows;
                                if ($rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                        $nilai = round((($row[1] / $C1) * $B1) +
                                            (($C2 / $row[2]) * $B2) +
                                            (($row[3] / $C3) * $B3) +
                                            (($row[4] / $C4) * $B4) +
                                            (($row[5] / $C5) * $B5), 3);
                                        $nama = $row[0];
                                        $sql1 = "INSERT INTO saw_perangkingan (namawisata,nilai_akhir) VALUES ('" . $nama . "','" . $nilai . "')";
                                        $hasil1 = $conn->query($sql1);
                                    }
                                }
                                $sql = "SELECT * FROM saw_perangkingan";
                                $hasil = $conn->query($sql);
                                $rows = $hasil->num_rows;
                                if ($rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td>&nbsp&nbsp <?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                        </tr>
                                <?php }
                                } else {
                                    echo "<tr>
                                        <td>Data Tidak Ada</td>
                                    <tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <b>
                            <h6><b>PERANKINGAN</b></h6>
                        </b>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-arrow-down"></i> No</th>
                                    <th><i class="fa fa-arrow-down"></i> Nama Wisata</th>
                                    <th><i class="fa fa-arrow-down"></i> Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $b = 0;
                                $sql = "SELECT*FROM saw_perangkingan ORDER BY nilai_akhir DESC";
                                $hasil = $conn->query($sql);
                                if ($hasil->num_rows > 0) {
                                    while ($row = $hasil->fetch_row()) {
                                ?>
                                        <tr>
                                            <td>&nbsp&nbsp <?php echo $b = $b + 1; ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                        </tr>
                                <?php }
                                } else {
                                    echo "<tr>
                                        <td>Data Tidak Ada</td>
                                    <tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
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
