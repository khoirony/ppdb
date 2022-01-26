<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $title; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">PPDB ONLINE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-5">
                        <a class="nav-link active fw-bold" aria-current="page" href="#">Tentang Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="#">Kontak Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="contaner text-center p-5">
        <br><br><br><br><br><br><br>
        <h3 class="">PPDB ONLINE</h3>
        <h3>MA DARUL MUKARRAM</h3>
        <br><br><br><br><br>
        <div class="row ms-4 me-4">
            <div class="col">
                <a class="btn btn-danger rounded-0 fs-5 col-9" href="#" role="button">Download Panduan PPDB</a>
            </div>
            <div class="col">
                <a class="btn btn-primary rounded-0 fs-5 col-9" href="#" role="button">Pendftaran PPDB Online</a>
            </div>
            <div class="col">
                <a class="btn btn-primary rounded-0 fs-5 col-9" href="<?= base_url('auth/index'); ?>" role="button">Login Calon Siswa</a>
            </div>
        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>