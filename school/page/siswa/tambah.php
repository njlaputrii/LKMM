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
        <div class="card-header bg-dark text-white">Tambah Data Siswa</div>
        <div class="card-body">
    <form method="post">
        <div class="form-group">
        <label for="">NIS</label>
        <input type="text" class="form-control"  name="nis">
        </div>
        <label for="">Nama Siswa</label>
        <input type="text" class="form-control" name="nama_siswa" >
        <br>
        <label for="">Jenis Kelamin</label>
        <select name="jk" class="form-control">

            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <br>
        <label for="">Kelas</label>
        <input type="text"  class="form-control" name="kelas" >
        <br>
        <label for="">Tahun Ajaran</label>
        <input type="text"  class="form-control" name="tahun_ajaran" >
        <br>
        <label for="">Username</label>
        <input type="text"class="form-control"  name="username">
        <br>
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" >
        <br>
        <label for="">Level</label>
        <select name="level" class="form-control">
            <option value="">Pilih Level</option>
            <option value="Siswa">Siswa</option>
            <option value="TU">Tata Usaha</option>
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
        
        <!-- <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
        <input type="reset" name="simpan" class="btn btn-info" value="Reset"> -->
    </form>
    </div>
    </div>
</body>
</html>

<?php
    if (isset($_POST['simpan'])) {
        $nis = $_POST['nis'];
        $nama_siswa = $_POST['nama_siswa'];
        $jk = $_POST['jk'];
        $tahun_ajaran = $_POST['tahun_ajaran'];
        $kelas = $_POST['kelas'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $sql = mysqli_query($koneksi,"INSERT INTO siswa (nis,nama_siswa,jk,tahun_ajaran,kelas,username,password,level)VALUES('$nis','$nama_siswa','$jk','$tahun_ajaran','$kelas','$username','$password','$level')");

        if ($sql) {
            ?>
            <script>
                alert('Data Berhasil Disimpan')
                window.location.href = "?page=siswa";
            </script>
            <?php
        }
    }

?>