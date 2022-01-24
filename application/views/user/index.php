<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row text-white pt-3 pb-5 justify-content-center">
        <div class="card bg-primary col-3 mr-5">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title">Data Siswa</h5>
                <?= $ceksiswa; ?>
                <a href="<?= base_url('User/tambahsiswa'); ?>">
                    <p class="card-text text-white">Isi Data <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>

        <div class="card bg-secondary col-3 mr-5">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title">Data Orang Tua</h5>
                <?= $cekortu; ?>
                <a href="<?= base_url('User/tambahortu'); ?>">
                    <p class="card-text text-white">Isi Data <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>


        <div class="card bg-dark col-3 mr-5">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title">Data Sekolah</h5>
                <?= $ceksekolah; ?>
                <a href="<?= base_url('User/tambahsekolah'); ?>">
                    <p class="card-text text-white">Isi Data <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->