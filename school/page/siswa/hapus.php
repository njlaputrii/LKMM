<?php
$id=$_GET['id'];
    $sql = mysqli_query($koneksi,"DELETE FROM siswa WHERE nis ='$id'");

    ?>
    <script>
        alert('Data Berhasil Dihapus')
        window.location.href='?page=siswa';
    </script>
?>