<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <br>
    <div style="float: right;" class="mr-3 mb-2">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Admin/tambahdata'); ?>">Tambah Data</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">No Peserta</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">NISN</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Jenis kelamin</th>
                <th scope="col">Status</th>
                <th scope="col" width="14%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data_siswa as $siswa) {

            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $siswa['no_peserta']; ?></td>
                    <td><?= $siswa['nama_lengkap']; ?></td>
                    <td><?= $siswa['nisn']; ?></td>
                    <td><?= $siswa['ttl']; ?></td>
                    <td><?= $siswa['jk']; ?></td>
                    <td>
                        <?php
                        if ($siswa['status_verif'] == 1) {
                            echo '<span class="badge badge-success">Sudah diverifikasi</span>';
                        } else {
                            echo '<span class="badge badge-danger">Belum diverifikasi</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?= base_url('Admin/editdata/' . $siswa['id']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapusdata/' . $siswa['id']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        <?php
                        if ($siswa['status_verif'] == 0) {
                            echo anchor('Admin/setujui/' . $siswa['id'], '<div class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></div>');
                        } else {
                            echo anchor('Admin/batalkan/' . $siswa['id'], '<div class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></div>');
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->