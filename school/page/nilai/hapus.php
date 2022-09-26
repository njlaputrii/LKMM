<?php
$id=$_GET['id'];
    $sql = mysqli_query($koneksi,"DELETE FROM nilai WHERE id_nilai='$id'");

    ?>
    <script>
        alert('Data Berhasil Dihapus')
        window.location.href='?page=nilai';
    </script>
?>