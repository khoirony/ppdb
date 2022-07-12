<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<br>
    <div class="row">
        <div class="col-md-4">
        <?= $this->session->flashdata('msg');
            if (isset($_SESSION['msg'])) {
                unset($_SESSION['msg']);
            } ?>
        </div>
    </div>
    

	<div class="row">
		<div class="col-md-4">
			<form class="user" method="POST" action="<?= base_url('user/upload'); ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label class="form-label ml-3">Upload Ijazah/Surat Keterangan Lulus</label>
					<input type="file" id="ijazah" name="ijazah" class="form-control rounded-pill">
				</div>
				<div class="form-group">
					<label class="form-label ml-3">Upload Kartu Keluarga</label>
					<input type="file" id="kk" name="kk" class="form-control rounded-pill">
				</div>
				<div class="form-group">
					<label class="form-label ml-3">Upload Akta Kelahiran</label>
					<input type="file" id="akta" name="akta" class="form-control rounded-pill">
				</div>

				<button type="submit" class="btn btn-primary btn-user btn-block">
					Submit
				</button>
			</form>
		</div>
        <div class="col-md-3">

        </div>
		<div class="col-md-5">
            <?php 
            if($cekberkas == 0): ?>
                echo '
                Status <br><br>
                Upload Ijazah/SKL : <br>
                Upload Kartu Keluarga : <br>
                Upload Akta Kelahiran :  ';
            <?php else: ?>
                Status <br>
                Upload Ijazah/SKL : 

                <?php if ($berkas['ijazah'] != ''): ?>
                    <span class="badge badge-success">Sudah diupload</span><br>
                    <img src="<?= base_url('assets/img/berkas/' . $berkas['ijazah']); ?>" width="150" alt="ijazah" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-auto">
                                <img src="<?= base_url('assets/img/berkas/' . $berkas['ijazah']); ?>" alt="ijazah" class="img-thumbnail">
                            </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <span class="badge badge-danger">Belum diupload</span>
                <?php endif; ?> <br>

                Upload Kartu Keluarga : 
                <?php if($berkas['kk'] != ''): ?>
                    <span class="badge badge-success">Sudah diupload</span><br>
                    <img src="<?= base_url('assets/img/berkas/' . $berkas['kk']); ?>" width="150" alt="kk" type="button" data-bs-toggle="modal" data-bs-target="#kk">

                    <!-- Modal -->
                    <div class="modal fade" id="kk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-auto">
                                <img src="<?= base_url('assets/img/berkas/' . $berkas['kk']); ?>" alt="kk" class="img-thumbnail">
                            </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <span class="badge badge-danger">Belum diupload</span>
                <?php endif; ?> <br>

                Upload Akta Kelahiran : 
                <?php if($berkas['akta'] != ''): ?>
                    <span class="badge badge-success">Sudah diupload</span><br>
                    <img src="<?= base_url('assets/img/berkas/' . $berkas['akta']); ?>" width="150" alt="akta" type="button" data-bs-toggle="modal" data-bs-target="#akta">

                    <!-- Modal -->
                    <div class="modal fade" id="akta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-auto">
                                <img src="<?= base_url('assets/img/berkas/' . $berkas['akta']); ?>" alt="akta" class="img-thumbnail">
                            </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <span class="badge badge-danger">Belum diupload</span>
                <?php endif; ?>
            <?php endif; ?>
		</div>
	</div>


</div>
<!-- /.container-fluid -->