<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Transaksi Makanan</h2>

            <form action="/transaksi/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Makanan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid ' : ''; ?>" id="nama" name="nama" autofocus">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga Makanan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga" name="harga" ">
                    </div>
                </div>
                <div class=" row mb-3">
                        <label for="quantity" class="col-sm-2 col-form-label">Quantity Makanan</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quantity" name="quantity" ">
                    </div>
                </div>
                <div class=" row mb-3">
                            <label for="kodetransaksi" class="col-sm-2 col-form-label">Kode Transaksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodetransaksi" name="kodetransaksi" ">
                    </div>
                </div>
                <fieldset class=" row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Jenis Promo</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="promo" id="promo" value="No Diskon" checked>
                                        <label class="form-check-label" for="promo">
                                            No Diskon
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="promo" id="promo" value="Diskon 30%" checked>
                                        <label class="form-check-label" for="promo">
                                            Diskon 30%
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="promo" id="promo" value="Diskon 40%">
                                        <label class="form-check-label" for="promo">
                                            Diskon 40%
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="promo" id="promo" value="Diskon 50%">
                                        <label class="form-check-label" for="promo">
                                            Diskon 50%
                                        </label>
                                    </div>

                                </div>
                                </fieldset>
                                <!-- -->
                                <button type=" submit" class="btn btn-primary">Transaksi</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>