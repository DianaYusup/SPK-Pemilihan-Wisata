<?php
include 'koneksi.php';
$namawisata= $_GET['namawisata'];
$sql = "DELETE FROM saw_wisata WHERE namawisata='$namawisata'";
$hasil = $conn->query($sql);

$sql = "DELETE FROM saw_penilaian WHERE namawisata='$namawisata'";
        $hasil = $conn->query($sql);

echo "<script>window.location.href='index.php';
    alert('Berhasil di Hapus !'); 
    </script>";
