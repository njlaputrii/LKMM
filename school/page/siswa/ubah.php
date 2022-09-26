<!DOCTYPE html>
<?php
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$id'");
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
        <div class="card-header bg-dark text-white">Ubah Data Siswa</div>
        <div class="card-body">
    <form method="post">
        <div class="form-group">
        <label for="">NIS</label>
        <input type="text" class="form-control" readonly value="<?php echo $data['nis'];?>" name="nis">
        </div>
        <label for="">Nama Siswa</label>
        <input type="text" class="form-control" value="<?php echo $data['nama_siswa'];?>" name="nama_siswa" >
        <br>
        <label for="">Jenis Kelamin</label>
        <select name="jk" class="form-control">

            <option value="<?php echo $data['jk'];?>"><?php echo $data['jk'];?></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <br>
        <label for="">Kelas</label>
        <input type="text"  class="form-control" value="<?php echo $data['kelas'];?>" name="kelas" >
        <br>
        <label for="">Tahun Ajaran</label>
        <input type="text"  class="form-control" value="<?php echo $data['tahun_ajaran'];?>" name="tahun_ajaran" >
        <br>
        <label for="">Username</label>
        <input type="text"class="form-control" value="<?php echo $data['username'];?>" name="username">
        <br>
        <label for="">Password</label>
        <input type="password" class="form-control" value="<?php echo $data['password'];?>" name="password" >
        <br>
        <label for="">Level</label>
        <select name="level" class="form-control">
            <option value="<?php echo $data['level'];?>"><?php echo $data['level'];?></option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
        <br>
        
        <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
        <input type="reset" name="simpan" class="btn btn-info" value="Reset">
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


        $sql = mysqli_query($koneksi,"UPDATE siswa SET nama_siswa='$nama_siswa',jk='$jk',tahun_ajaran='$tahun_ajaran',kelas='$kelas',username='$username',password='$password',level='$level' WHERE nis='$id'");

        if ($sql) {
            ?>
            <script>
                alert('Data Berhasil Diubah')
                window.location.href = "?page=siswa";
            </script>
            <?php
        }
    }

?>