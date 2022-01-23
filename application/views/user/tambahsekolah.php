<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <br>

    <div class="row ml-3">

        <div class="col-md-5">

            <form class="user" method="POST" action="<?= base_url('Superintendent/tambahkapal'); ?>">

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah" value="<?= set_value('asal_sekolah'); ?>">
                    <?= form_error('asal_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="alamat_sekolah" name="alamat_sekolah" placeholder="Alamat Sekolah Asal" value="<?= set_value('alamat_sekolah'); ?>">
                    <?= form_error('alamat_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="status" name="status" placeholder="Status Sekolah Asal" value="<?= set_value('status'); ?>">
                    <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Ijazah Lulus" value="<?= set_value('tahun_lulus'); ?>">
                    <?= form_error('tahun_lulus', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nomor_ijazah" name="nomor_ijazah" placeholder="Nomor Ijazah" value="<?= set_value('nomor_ijazah'); ?>">
                    <?= form_error('nomor_ijazah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jalur_pendaftaran" name="jalur_pendaftaran" placeholder="Jalur Pendaftaran" value="<?= set_value('jalur_pendaftaran'); ?>">
                    <?= form_error('jalur_pendaftaran', '<small class="text-danger pl-3">', '</small>'); ?>
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