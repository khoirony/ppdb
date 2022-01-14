<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


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
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td><span class="badge badge-warning">Sudah</span></td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td><span class="badge badge-danger">Belum</span></td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></button>
                </td>
            </tr>
        </tbody>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->