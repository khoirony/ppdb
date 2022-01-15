<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Data Siswa</h1>
    <br>

    <div class="row ml-3">
        <div class="col-md-5">
            <form class="user" method="POST" action="">
                <input type="hidden" id="id" name="id" value="<?= $siswa['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="no_peserta" name="no_peserta" placeholder="No Peserta" value="<?= $siswa['no_peserta']; ?>">
                    <?= form_error('no_peserta', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $siswa['nama_lengkap']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nisn" name="nisn" placeholder="NISN" value="<?= $siswa['nisn']; ?>">
                    <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="ttl" name="ttl" placeholder="Tempat Tgl Lahir" value="<?= $siswa['ttl']; ?>">
                    <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jk" name="jk" placeholder="Jenis Kelamin" value="<?= $siswa['jk']; ?>">
                    <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                </button>
            </form>
            <br>
        </div>
    </div>
</div>
<!-- /.container-fluid -->