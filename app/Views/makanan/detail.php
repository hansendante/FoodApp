<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Makanan</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $makanan['gambarmakanan']; ?>" alt="..." class="gambar-makanan">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $makanan['nama']; ?></h5>
                            <p class="card-text"><?= $makanan['deskripsi']; ?></p>
                            <p class="card-text">Rating : <?= $makanan['rating']?></p>
                            <p class="card-text"><small class="text-muted">Last Updated : <?= $makanan['created_at']; ?></small></p>
                            <br><br>
                            <a href="/makanan" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>