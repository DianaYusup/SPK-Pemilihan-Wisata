<?php
include 'koneksi.php';
$namawisata = $_GET['namawisata'];
$sql = "DELETE FROM saw_penilaian WHERE namawisata='$namawisata'";
$hasil = $conn->query($sql);
echo "<script>
window.location.href='penilaian.php';
alert('berhasil di hapus !'); 
</script>";
