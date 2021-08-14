<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-xl ml-1">
    <div class="row">

        <div class="col">

            <a href="/transaksi/form" class="btn btn-primary mt-3 mb-3">Makanan</a>
            

            <h1 class="mt-2">Daftar Transaksi</h1>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
            <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
            <table>
                <tr>
                    <td>
                    <input id="datepicker" width="276" />
                    </td>
                    <td>
                        &nbsp; - &nbsp;
                    </td>
                    <td>
                    <input id="datepicker2" width="276"  />
                    </td>
                    <td>
                    <button type="submit" class="btn btn-primary ml-4">Filter</button>
                    </td>
                </tr>
            </table>
            <script>
                $('#datepicker').datepicker({
                    uiLibrary: 'bootstrap4'
                });
            </script>
            <script>
                $('#datepicker2').datepicker({
                    uiLibrary: 'bootstrap4'
                });
            </script>
            <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Quantity</th>
                        <th style="text-align:right" scope="col">Harga</th>
                        <th scope="col">Promo</th>
                        <th style="text-align:right" scope="col" scope="col">Potongan</th>
                        <th style="text-align:right" scope="col" scope="col">Subtotal</th>
                        <th style="text-align:right" scope="col" scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    $potongan = 1 ?>
                    <?php foreach ($transaksi as $t) : ?>
                        <?php if ($t['promo'] == "Diskon 30%") $potongan = 0.3;
                        else if ($t['promo'] == "Diskon 40%") $potongan = 0.4;
                        else if ($t['promo'] == "No Diskon") $potongan = 0;
                        else if ($t['promo'] == "Diskon 50%") $potongan = 0.5 ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $t['nama']; ?></td>
                            <td><?= $t['created_at']; ?></td>
                            <td><?= $t['quantity']; ?></td>
                            <td style="text-align:right"><?php echo number_to_currency($t['harga'],'IDR'); ?></td>
                            <td><?= $t['promo']; ?></td>
                            <?php $subtotal = $t['totalharga'] * $potongan; ?>
                            <td style="text-align:right" scope="col"><?php echo number_to_currency($subtotal,'IDR'); ?></td>
                            <td style="text-align:right" scope="col"><?php echo number_to_currency($t['harga'] * $t['quantity'],'IDR'); ?></td>
                            <td style="text-align:right" scope="col"><?php echo number_to_currency($t['totalharga'] - $subtotal,'IDR'); ?></td>
                            <td>Terjual</td>
                            <td><?= $t['kodetransaksi']; ?></td>
                            <td>
                                <a href="/transaksi/<?= $t['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection();; ?>