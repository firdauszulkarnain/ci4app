<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-3">Detail Buku</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $buku['cover'] ?>" width="80%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $buku['judul_buku'] ?></h5>
                            <p class="card-text"><b>Penulis : </b> <?= $buku['penulis'] ?></p>
                            <p class="card-text"><small class="text-muted"><b>Penerbit : </b> <?= $buku['penerbit']; ?></small></p>

                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                            <br>
                            <a href="/buku" class="btn btn-secondary mt-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>