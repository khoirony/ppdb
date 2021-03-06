<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<br>
    <div class="row">
        <div class="col-7">
            <?= $this->session->flashdata('msg');
            if (isset($_SESSION['msg'])) {
                unset($_SESSION['msg']);
            } ?>
            <form class="user" method="POST" action="">
                <div class="form-group row">
                    <p class="pl-4">Ganti Password</p>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1"
                            placeholder="Password">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2"
                            placeholder="Repeat Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                </button>
            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
