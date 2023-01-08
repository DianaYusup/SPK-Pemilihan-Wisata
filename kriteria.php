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
                <li><i class="fa fa-sticky-note"></i><a href="kriteria.php"> Kriteria</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT HITUNG-->
          <script>
            function fungsiku() {
              var a = (document.getElementById("hargatiket_param").value).substring(0, 1);
              var b = (document.getElementById("jaraktempuh_param").value).substring(0, 1);
              var c = (document.getElementById("banyakpengunjung_param").value).substring(0, 1);
              var d = (document.getElementById("fasilitas_param").value).substring(0, 1);
              var e = (document.getElementById("keamanan_param").value).substring(0, 1);
              var total = Number(a) + Number(b) + Number(c) + Number(d) + Number(e) + Number(f);
              document.getElementById("hargatiket").value = (Number(a) / total).toFixed(2);
              document.getElementById("jaraktempuh").value = (Number(b) / total).toFixed(2);
              document.getElementById("banyakpengunjung").value = (Number(c) / total).toFixed(2);
              document.getElementById("fasilitas").value = (Number(d) / total).toFixed(2);
              document.getElementById("keamanan").value = (Number(e) / total).toFixed(2);
            }
          </script>
          <!--END SCRIPT HITUNG-->


          <!--START SCRIPT INSERT-->
          <?php

          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $hargatiket = $_POST['hargatiket'];
            $jaraktempuh= $_POST['jaraktempuh'];
            $banyakpengunjung = $_POST['banyakpengunjung'];
            $fasilitas = $_POST['fasilitas'];
            $keamanan = $_POST['keamanan'];
            if (($hargatiket == "") or
              ($jaraktempuh == "") or
              ($banyakpengunjung == "") or
              ($fasilitas == "") or
              ($keamanan == "") 
            ) {
              echo "<script>
              alert('Tolong Lengkapi Data yang Ada!');
              </script>";
            } else {
              $sql = "SELECT * FROM saw_kriteria";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                echo "<script>
                alert('Hapus Bobot Lama untuk Membuat Bobot Baru');
                </script>";
              } else {
                $sql = "INSERT INTO saw_kriteria(
                  hargatiket,jaraktempuh,banyakpengunjung,fasilitas,keamanan)
                  values ('" . $hargatiket . "',
                  '" . $jaraktempuh . "',
                  '" . $banyakpengunjung . "',
                  '" . $fasilitas . "',
                  '" . $keamanan . "')";
                $hasil = $conn->query($sql);
                echo "<script>
                alert('Bobot Berhasil di Inputkan!');
                </script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->


          <!--start inputan-->
          <form class="form-validate form-horizontal" id="register_form" method="post" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"><b>Kriteria</b></label>
              <div class="col-sm-3">
                <label><b>Bobot</b></label>
              </div>
              <div class="col-sm-2">
                <label><b>Perbaikan Bobot</b></label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Harga Tiket</label>
              <div class="col-sm-3">
                <select class="form-control" name="hargatiket_param" id="hargatiket_param">
                  <option>1. Murah</option>
                  <option>3. Sedang</option>
                  <option>5. Mahal</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="hargatiket" id="hargatiket">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Jarak Tempuh</label>
              <div class="col-sm-3">
                <select class="form-control" name="jaraktempuh_param" id="jaraktempuh_param">
                  <option>1. Dekat</option>
                  <option>3. Sedang</option>
                  <option>5. Jauh</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="jaraktempuh" id="jaraktempuh">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Banyak Pengunjung</label>
              <div class="col-sm-3">
                <select class="form-control" name="banyakpengunjung_param" id="banyakpengunjung_param">
                  <option>1. Sedikit</option>
                  <option>3. Sedang</option>
                  <option>5. Banyak</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="banyakpengunjung" id="banyakpengunjung">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Fasilitas</label>
              <div class="col-sm-3">
                <select class="form-control" name="fasilitas_param" id="fasilitas_param">
                  <option>1. Tidak Lengkap</option>
                  <option>2. Lengkap</option>
                  <option>5. Sangat Lengkap</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="fasilitas" id="fasilitas">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Keamanan</label>
              <div class="col-sm-3">
                <select class="form-control" name="keamanan_param" id="keamanan_param">
                  <option>1. Tidak Aman</option>
                  <option>5. Aman</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="keamanan" id="keamanan">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-outline-success" type="button" id="hitung" onclick="fungsiku()" name="hitung"><i class="fa fa-calculator"></i> Hitung</button>
              </div>
            </div>
            <div class="mb-4">
              <button class="btn btn-outline-primary" type="submit" name="submit"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> Harga Tiket</th>
                <th><i class="fa fa-arrow-down"></i> Jark Tempuh</th>
                <th><i class="fa fa-arrow-down"></i> Banyak Pengunjung</th>
                <th><i class="fa fa-arrow-down"></i> Fasilitas</th>
                <th><i class="fa fa-arrow-down"></i> Keamanan</th>
                <th><i class="fa fa-cogs"></i> Aksi</th>
              </tr>
            </thead>
            <?php
            $b = 0;
            $sql = "SELECT * FROM saw_kriteria";
            $hasil = $conn->query($sql);
            $rows = $hasil->num_rows;
            if ($rows > 0) {
              while ($row = $hasil->fetch_row()) {
            ?>
                <tr>
                  <td Align="center"><?= $row[1] ?></td>
                  <td Align="center"><?= $row[2] ?></td>
                  <td Align="center"><?= $row[3] ?></td>
                  <td Align="center"><?= $row[4] ?></td>
                  <td Align="center"><?= $row[5] ?></td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-danger" href="kriteria_hapus.php?id=<?= $row[0] ?>"><i class="fa fa-close"></i></a>
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