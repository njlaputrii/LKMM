<div class="container">
    <div class="card">
        <div class="card-header bg-dark text-white">DATA SISWA</div>
        <div class="card-body">
            <a class="btn btn-primary" href="?page=siswa&aksi=tambah">Tambah Data</a>
            <br><br>
            <form action="" method="get">
                <label>Cari :</label>
                <input type="text" name="cari" id="">
                <input type="submit" value="Cari">
                <input type="hidden" name="page" value="siswa">
            </form>

            <?php
                if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    echo "<b>Hasil Pencarian : ".$cari."</b>";
                }
            ?>
            <br><br>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $sql = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nama_siswa LIKE '%".$cari."%' OR jk LIKE '%".$cari."%' OR kelas LIKE '%".$cari."%' OR thn_ajaran LIKE '%".$cari."%' OR level LIKE '%".$cari."%' ORDER BY nis DESC");
                    } else {
                        $sql = mysqli_query($koneksi,"SELECT * FROM siswa WHERE level= 'siswa' ORDER BY nama_siswa DESC"); 
                    }
                    while ($data = $sql->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $data['nis'];?></td>
                    <td><?php echo $data['nama_siswa'];?></td>
                    <td><?php echo $data['jk'];?></td>
                    <td><?php echo $data['kelas'];?></td>
                    <td><?php echo $data['tahun_ajaran'];?></td>
                    <td><?php echo $data['username'];?></td>
                    <td><?php echo $data['level'];?></td>
                    <td>
                        <a class="btn btn-warning" href="?page=siswa&aksi=ubah&id=<?php echo $data['nis'];?>">Ubah</a>
                        <a class="btn btn-danger" href="?page=siswa&aksi=hapus&id=<?php echo $data['nis'];?>">Hapus</a>
                    </td>
                </tr>
                <?php
                    }   
                ?>
            </table>
        </div>
    </div>
</div>