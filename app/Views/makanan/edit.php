<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Makanan</h2>

            <form action="/makanan/update/<?= $makanan['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $makanan['slug']; ?>">
                <input type="hidden" name="gambarmakananLama" value="<?= $makanan['gambarmakanan']; ?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama makanan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid ' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $makanan['nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= (old('deskripsi')) ? old('deskripsi') : $makanan['deskripsi'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kuliner" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kuliner" name="kuliner" value="<?= (old('kuliner')) ? old('kuliner') : $makanan['kuliner'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?= (old('quantity')) ? old('quantity') : $makanan['quantity'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= (old('harga')) ? old('harga') : $makanan['harga'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="hargabahan" class="col-sm-2 col-form-label">Harga Bahan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="hargabahan" name="hargabahan" value="<?= (old('hargabahan')) ? old('hargabahan') : $makanan['hargabahan'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambarmakanan" class="col-sm-2 col-form-label">Gambar makanan</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $makanan['gambarmakanan']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('gambarmakanan')) ? 'is-invalid' : ''; ?>" id="gambarmakanan" name="gambarmakanan" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambarmakanan'); ?>
                            </div>
                            <label class="custom-file-label" for="gambarmakanan"><?= $makanan['gambarmakanan']; ?></label>
                        </div>
                    </div>
                </div>
                <!-- -->
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Jenis makanan</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenismakanan" id="jenismakanan" value="Appetizers" checked>
                            <label class="form-check-label" for="jenismakanan">
                                Appetizers
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenismakanan" id="jenismakanan" value="Main Course">
                            <label class="form-check-label" for="jenismakanan">
                                Main Course
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenismakanan" id="jenismakanan" value="Dessert">
                            <label class="form-check-label" for="jenismakanan">
                                Dessert
                            </label>
                        </div>

                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>