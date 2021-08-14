<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-xl ml-1">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Order</h1>
            <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Nama Makanan</th>
                        <th style="text-align:right" scope="col" scope="col">Harga</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Reservasi Tempat</th>
                        <th>Subtotal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($makanan as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['jenismakanan']; ?></td>
                            <td><?= $m['kuliner']; ?></td>
                            <td style="text-align:right" scope="col"><?php echo number_to_currency($m['harga'], 'IDR'); ?></td>
                            <td style="text-align:right" scope="col"><?php echo number_to_currency($m['hargabahan'], 'IDR'); ?></td>
                            <td><?= $m['quantity']; ?> <?php if ($m['quantity'] < 5) {
                                echo '&nbsp<i class="fas fa-exclamation-circle" style="color:red;" data-toggle="popover" title="Stock Menipis"></i>';
                            } ?></td>
                            
                            <td><?= $m['terjual']; ?></td>
                            <td>
                                <a href="makanan/<?= $m['slug']; ?>" class="btn btn-success"><i class="fas fa-info"></i> </a>
                                <a href="makanan/edit/<?= $m['slug']; ?>" class="btn btn-primary"><i class="fas fa-pen-square"></i> </a>
                                <form action="/makanan/<?= $m['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Input-->
<div class="modal fade" id="data_makanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/makanan/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Makanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kuliner" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kuliner" name="kuliner" value="<?= old('kuliner'); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= old('quantity'); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="hargabahan" class="col-sm-2 col-form-label">Harga Bahan</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="hargabahan" name="hargabahan" value="<?= old('hargabahan'); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gambarmakanan" class="col-sm-2 col-form-label">Gambar makanan</label>
                        <div class="col-sm-2">
                            <img src="/img/default.jpg" class="img-thumbnail img-preview">
                        </div>

                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambarmakanan" name="gambarmakanan" onchange="previewImg()">
                                <div class="invalid-feedback">

                                </div>
                                <label class="custom-file-label" for="gambarmakanan"></label>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Makanan</legend>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection();; ?>