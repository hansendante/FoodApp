<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-xl ml-1">
    <div class="row">
        <div class="col">
            <a href="/transaksi/form" class="btn btn-primary mt-3">Makanan</a>
            <h1 class="mt-2">Daftar Pembukuan</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th style="text-align:right" scope="col" scope="col">Pendapatan</th>
                        <th style="text-align:right" scope="col" scope="col">Pengeluaran</th>
                        <th style="text-align:right" scope="col" scope="col">Profit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalPendapatan = 0;
                    $totalPengeluaran = 0;
                    $totalProfit = 0; ?>
                    <?php $i = 1; ?>
                    <?php foreach ($makanan as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $listMakanan = $t['nama']; ?></td>
                            <?php $pendapatan = $t['harga'] * $t['terjual'];
                            $totalPendapatan = $totalPendapatan + $pendapatan; ?>
                            <?php $pengeluaran = $t['quantity'] * $t['hargabahan'];
                            $totalPengeluaran = $totalPengeluaran + $pengeluaran; ?>
                            <?php $profit = ($t['harga'] * $t['terjual']) - ($t['quantity'] * $t['hargabahan']);
                            $totalProfit = $totalProfit + $profit; ?>
                            <td style="text-align:right" scope="col"> <?php echo number_to_currency($pendapatan, 'IDR'); ?></td>
                            <td style="text-align:right" scope="col"> <?php echo number_to_currency($pengeluaran, 'IDR'); ?></td>
                            <td style="text-align:right" scope="col"> <?php echo number_to_currency($profit, 'IDR'); ?></td>

                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th scope="row" style="border-top: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;" >
                        <td style="font-weight:bold; border-top: 2px solid black; border-bottom: 2px solid black; ">Total</td>
                        <td style="text-align:right; font-weight:bold; border-top: 2px solid black; border-bottom: 2px solid black;" scope="col"> <?php echo number_to_currency($totalPendapatan, 'IDR'); ?></td>
                        <td style="text-align:right; font-weight:bold; border-top: 2px solid black; border-bottom: 2px solid black;" scope="col"> <?php echo number_to_currency($totalPengeluaran, 'IDR'); ?></td>
                        <td style="text-align:right; font-weight:bold; border-top: 2px solid black; border-right: 2px solid black; border-bottom: 2px solid black;" scope="col"> <?php echo number_to_currency($totalProfit, 'IDR'); ?></td>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?= $this->endSection();; ?>