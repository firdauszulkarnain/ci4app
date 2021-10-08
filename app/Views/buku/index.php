<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <a href="/buku/create" class="btn btn-primary my-3">Tambah Buku</a>
            <h3>Daftar Buku</h3>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $row) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="img/<?= $row['cover'] ?>" alt="" class="cover"></td>
                            <td><?= $row['judul_buku'] ?></td>
                            <td>
                                <a href="/buku/<?= $row['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>