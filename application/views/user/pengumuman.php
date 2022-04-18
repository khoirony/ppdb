<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <br>

    <?php 
    if($data_siswa['status_lulus'] == 1){
    ?>
        <div class="mx-auto">
            SELAMAT ANDA LULUS
        </div>
    <?php 
    }else{
    ?>
        <div class="mx-auto">
            MOHON MAAF ANDA BELUM LULUS
        </div>
    <?php 
    }
    ?>


</div>
<!-- /.container-fluid -->