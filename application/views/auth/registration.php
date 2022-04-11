<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-5 shadow-lg mt-5 rounded">
			<div class="p-5">
				<div class="text-center">
					<p class="h4 text-gray-900 mb-2">Pendaftaran PPDB ONLINE</p>
                    <p class="h5 text-gray-900 mb-4">MA Darul Mukarram</p>
				</div>
				<br>
				<form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="name" name="name"
							placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
						<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="email" name="email"
							placeholder="Alamat Email" value="<?= set_value('email'); ?>">
						<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<input type="password" class="form-control form-control-user" id="password1"
								name="password1" placeholder="Password">
							<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-sm-6">
							<input type="password" class="form-control form-control-user" id="password2"
								name="password2" placeholder="Repeat Password">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-user btn-block">
						Daftar
					</button>
				</form>
				<hr>
				<div class="text-center">
					<span class="small">Sudah Mempunyai akun? </span> <a class="small"
						href="<?= base_url('auth'); ?>">Login!</a>
				</div>
			</div>
		</div>
	</div>
</div>
