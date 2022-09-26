<div class="container">
    <div class="card">
        <div class="card-header bg-dark text-white">DATA NILAI</div>
        <div class="card-body">
            <a class="btn btn-primary" href="?page=nilai&aksi=tambah">Tambah Nilai</a>
            <br><br>
            <form action="" method="get">
                <label>Cari :</label>
                <input type="text" name="cari" id="">
                <input type="submit" value="Cari">
                <input type="hidden" name="page" value="nilai">
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
                    <th>ID Nilai</th>
                    <th>Nama Siswa</th>
                    <th>Tahun Ajaran</th>
                    <th>Kelas</th>
                    <th>Nilai MTK</th>
                    <th>Nilai Agama</th>
                    <th>Nilai Bahasa</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $sql = mysqli_query($koneksi,"SELECT * FROM nilai INNER JOIN siswa ON siswa.nis=nilai.nis WHERE nama_siswa LIKE '%".$cari."%' OR nilai_mtk LIKE '%".$cari."%' OR nilai_bahasa LIKE '%".$cari."%' OR nilai_agama LIKE '%".$cari."%' OR kelas LIKE '%".$cari."%' OR tahun_ajaran LIKE '%".$cari."%'");
                    } else {
                        $sql = mysqli_query($koneksi,"SELECT * FROM nilai INNER JOIN siswa ON siswa.nis=nilai.nis"); 
                    }
                    while ($data = $sql->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $data['id_nilai'];?></td>
                    <td><?php echo $data['nama_siswa'];?></td>
                    <td><?php echo $data['tahun_ajaran'];?></td>
                    <td><?php echo $data['kelas'];?></td>
                    <td><?php echo $data['nilai_mtk'];?></td>
                    <td><?php echo $data['nilai_agama'];?></td>
                    <td><?php echo $data['nilai_bahasa'];?></td>
                    <td>
                        <a class="btn btn-warning" href="?page=nilai&aksi=ubah&id=<?php echo $data['id_nilai'];?>">Ubah</a>
                        <a class="btn btn-danger" href="?page=nilai&aksi=hapus&id=<?php echo $data['id_nilai'];?>">Hapus</a>
                    </td>
                </tr>
                <?php
                    }   
                ?>
            </table>
        </div>
    </div>
</div>