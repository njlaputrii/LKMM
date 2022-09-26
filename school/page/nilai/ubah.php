<!DOCTYPE html>
<?php
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM nilai INNER JOIN siswa ON nilai.nis=siswa.nis WHERE id_nilai='$id'");
    $data = $sql->fetch_assoc();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Dasar</title>
</head>
<body>
    <div class="card">
        <div class="card-header bg-dark text-white">Ubah Data Nilai</div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="">ID Nilai</label>
                    <input type="text" class="form-control" readonly value="<?php echo $data['id_nilai'];?>" name="id_nilai">
                </div>
                <label for="">Nilai Bahasa</label>
                <input type="number" class="form-control" value="<?php echo $data['nilai_bahasa'];?>" name="nilai_bahasa" >
                <br>
                <label for="">Nilai MTK</label>
                <input type="number"  class="form-control" value="<?php echo $data['nilai_mtk'];?>" name="nilai_mtk" >
                <br>
                <label for="">Nilai Agama</label>
                <input type="number"class="form-control" value="<?php echo $data['nilai_agama'];?>" name="nilai_agama">
                <br>
                <label for="">Nama Penginput</label>
                <select name="nis" class="form-control">
                    <option value="<?php echo $data['nis'];?>"><?php echo $data['nama_siswa'];?></option>
                    <?php
                        $sql2 = mysqli_query($koneksi, "SELECT * FROM siswa");
                        while ($data2 = $sql2->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $data2['nis'];?>"><?php echo $data2['nama_siswa'];?></option>
                    <?php 
                        }
                    ?>
                </select>
                <br>
                    
                <input type="submit" name="ubah" class="btn btn-success" value="Simpan">
                <input type="reset" name="simpan" class="btn btn-info" value="Reset">
            </form>
        </div>
    </div>
</body>
</html>

<?php
    if (isset($_POST['ubah'])) {
        $id_nilai = $_POST['id_nilai'];
        $nilai_bahasa = $_POST['nilai_bahasa'];
        $nilai_mtk = $_POST['nilai_mtk'];
        $nilai_agama = $_POST['nilai_agama'];
        $nis = $_POST['nis'];


        $sql = mysqli_query($koneksi,"UPDATE nilai SET nilai_bahasa='$nilai_bahasa',nilai_mtk='$nilai_mtk',nilai_agama='$nilai_agama',nis='$nis' WHERE id_nilai='$id'");

        if ($sql) {
            ?>
            <script>
                alert('Data Berhasil Diubah')
                window.location.href = "?page=nilai";
            </script>
            <?php
        }
    }

?>