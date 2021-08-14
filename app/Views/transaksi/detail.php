<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Transaksi</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $transaksi['nama']; ?></h5>
                            <p class="card-text"><small class="text-muted">Last Updated : <?= $transaksi['updated_at']; ?></small></p>
                            <form action="/transaksi/<?= $transaksi['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Clear Data</button>
                            </form>
                            <br><br>
                            <a href="/transaksi">Kembali ke daftar transaksi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>