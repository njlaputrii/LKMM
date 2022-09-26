<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Dasar</title>
</head>
<body>
    <div class="card">
        <div class="card-header bg-dark text-white">Tambah Data Nilai</div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="">ID Nilai</label>
                    <input type="text" class="form-control"  name="id_nilai">
                </div>
                <label for="">Nilai Bahasa</label>
                <input type="number" class="form-control" name="nilai_bahasa" >
                <br>
                <label for="">Nilai MTK</label>
                <input type="number" class="form-control" name="nilai_mtk" >
                <br>
                <label for="">Nilai Agama</label>
                <input type="number"  class="form-control" name="nilai_agama" >
                <br>
                <label for="">Nama Penginput</label>
                <select type="text" class="form-control"  name="nis">
                    <option selected>---> Pilih <---</option>
                    <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM siswa");
                        while ($data = $sql->fetch_assoc()){
                    ?>
                    <option value="<?php echo $data['nis'] ?>"><?php echo $data['nama_siswa'];?></option>
                    <?php 
                        }
                    ?>
                </select>
                <br>
                <div class="row">
                  <div class="col-2">
                     <a href="<?= $_url ?>" type="button" class="btn btn-info btn-block"><b>Batal</b></a>
                  </div>
                  <div class="col-8">

                  </div>
                  <div class="col-2">
                     <button type="submit" name="simpan" class="btn btn-success btn-block"><b>Simpan</b></button>
                  </div>
               </div>
<!--                     
                <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                <input type="reset" name="simpan" class="btn btn-info" value="Reset"> -->
            </form>
        </div>
    </div>
</body>
</html>

<?php
    if (isset($_POST['simpan'])) {
        $nis = $_POST['nis'];
        $nilai_bahasa = $_POST['nilai_bahasa'];
        $id_nilai = $_POST['id_nilai'];
        $nilai_mtk = $_POST['nilai_mtk'];
        $nilai_agama = $_POST['nilai_agama'];

        $sql = mysqli_query($koneksi,"INSERT INTO nilai (id_nilai,nilai_bahasa,nilai_mtk,nilai_agama,nis)VALUES('$id_nilai','$nilai_bahasa','$nilai_mtk','$nilai_agama','$nis')");

        if ($sql) {
            ?>
            <script>
                alert('Nilai Berhasil Disimpan')
                window.location.href = "?page=nilai";
            </script>
            <?php
        }
    }

?>