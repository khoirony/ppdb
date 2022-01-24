<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <br>

    <div class="row ml-3">

        <div class="col-md-5">

            <form class="user" method="POST" action="<?= base_url('User/tambahortu'); ?>">

                <span class="pl-3">Nama Orang Tua</span>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah">
                        <?= form_error('ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu">
                        <?= form_error('ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <span class="pl-3">Pendidikan Terakhir Orang Tua</span>
                <div class="form-group row mb-0">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select class="form-select form-select-lg rounded-pill fs-6" id="pendidikan_ayah" name="pendidikan_ayah" aria-label="Default select example">
                                <option value="">Pendidikan Ayah</option>
                                <option value="SD">SD</option>
                                <option value="SLTP">SLTP</option>
                                <option value="SLTA">SLTA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select class="form-select form-select-lg rounded-pill fs-6" id="pendidikan_ibu" name="pendidikan_ibu" aria-label="Default select example">
                                <option value="">Pendidikan Ibu</option>
                                <option value="SD">SD</option>
                                <option value="SLTP">SLTP</option>
                                <option value="SLTA">SLTA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                            </select>
                        </div>
                    </div>
                </div>

                <span class="pl-3">Pekerjaan Orang Tua</span>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah">
                        <?= form_error('pekerjaan_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu">
                        <?= form_error('pekerjaan_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="penghasilan" name="penghasilan" placeholder="Penghasilan Perbulan" value="<?= set_value('penghasilan'); ?>">
                    <?= form_error('penghasilan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat Orang Tua" value="<?= set_value('alamat'); ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nomor" name="nomor" placeholder="Nomor Telp Orang Tua" value="<?= set_value('nomor'); ?>">
                    <?= form_error('nomor', '<small class="text-danger pl-3">', '</small>'); ?>
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