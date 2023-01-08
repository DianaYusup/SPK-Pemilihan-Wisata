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
                <li><i class="fa fa-list-ol"></i><a href="penilaian.php"> Penilaian</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT INSERT-->
          <?php

          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $namawisata = $_POST['namawisata'];
            $hargatiket = $_POST['hargatiket'];
            $jaraktempuh = substr($_POST['jaraktempuh'], 1, 1);
            $banyakpengunjung = substr($_POST['banyakpengunjung'], 1, 1);
            $fasilitas = substr($_POST['fasilitas'], 1, 1);
            $keamanan = substr($_POST['keamanan'], 1, 1);
            if ($hargatiket == "" || $jaraktempuh == "" || $banyakpengunjung == "" || $fasilitas == "" || $hargatiket == "") {
              echo "<script>
              alert('Tolong Lengkapi Data yang Ada!');
              </script>";
            } else {
              $sql = "SELECT*FROM saw_penilaian WHERE namawisata='$namawisata'";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                $row = $hasil->fetch_row();
                echo "<script>
                alert('$namawisata sudah ada!');
                </script>";
              } else {
                //insert name
                $sql = "INSERT INTO saw_penilaian(
                namawisata,hargatiket,jaraktempuh,banyakpengunjung,fasilitas,keamanan)
                values ('" . $namawisata . "',
                '" . $hargatiket . "',
                '" . $jaraktempuh . "',
                '" . $banyakpengunjung . "',
                '" . $fasilitas . "',
                '" . $keamanan . "')";
                $hasil = $conn->query($sql);
                echo "<script>
                alert('Penilaian Berhasil di Tambahkan!');
                </script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->

          <!--start inputan-->
          <form method="POST" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Alternatif</label>
              <div class="col-sm-4">
                <select class="form-control" name="namawisata">
                  <?php
                  //load nama
                  $sql = "SELECT * FROM saw_wisata";
                  $hasil = $conn->query($sql);
                  $rows = $hasil->num_rows;
                  if ($rows > 0) {
                    while ($row = mysqli_fetch_array($hasil)) :; {
                      } ?> <option><?php echo $row[0]; ?></option>
                  <?php endwhile;
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Harga Tiket</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="hargatiket" id="hargatiket">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">jarak Tempuh</label>
              <div class="col-sm-4">
                <select class=" form-control" name="jaraktempuh">
                  <option>(1) Dekat</option>
                  <option>(3) Sedang</option>
                  <option>(5) Jauh</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Banyak Pengunjung</label>
              <div class="col-sm-4">
                <select class=" form-control" name="banyakpengunjung">
                  <option>(1) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(5) Banyak</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Fasilitas</label>
              <div class="col-sm-4">
                <select class=" form-control" name="fasilitas">
                  <option>(1) Tidak Lengkap</option>
                  <option>(3) Lengkap</option>
                  <option>(5) Sangat Lengkap</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Keamanan</label>
              <div class="col-sm-4">
                <select class=" form-control" name="keamanan">
                  <option>(1) Tidak Aman</option>
                  <option>(5) Aman</option>
                </select>
              </div>
            </div>
            <div class="mb-4">
              <button type="submit" name="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> No</th>
                <th><i class="fa fa-arrow-down"></i> Alternatif</th>
                <th><i class="fa fa-arrow-down"></i> Harga Tiket</th>
                <th><i class="fa fa-arrow-down"></i> Jarak Tempuh</th>
                <th><i class="fa fa-arrow-down"></i> Banyak Pengunjung</th>
                <th><i class="fa fa-arrow-down"></i> Fasilitas</th>
                <th><i class="fa fa-arrow-down"></i> Keamanan</th>
                <th><i class="fa fa-cogs"></i> Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
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
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" href="penilaian_hapus.php?nama=<?= $row[0] ?>">
                          <i class="fa fa-close"></i></a>
                      </div>
                    </td>
                  </tr>
              <?php }
              } else {
                echo "<tr>
                    <td>Data Tidak Ada</td>
                <tr>";
              } ?>
            </tbody>
          </table>
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