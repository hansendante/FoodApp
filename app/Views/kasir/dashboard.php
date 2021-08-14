<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">

        <?php $totalPendapatan = 0;

        $totalPengeluaran = 0;
        $totalProfit = 0; ?>
        <?php $i = 1; ?>
        <?php foreach ($makanan as $t) : ?>
            <?php $i++; ?>

            <?php $listMakanan = $t['nama']; ?>
            <?php $pendapatan = $t['harga'] * $t['terjual'];
            $totalPendapatan = $totalPendapatan + $pendapatan; ?>
            <?php $pengeluaran = $t['quantity'] * $t['hargabahan'];
            $totalPengeluaran = $totalPengeluaran + $pengeluaran; ?>
            <?php $profit = ($t['harga'] * $t['terjual']) - ($t['quantity'] * $t['hargabahan']);
            $totalProfit = $totalProfit + $profit; ?>
        <?php endforeach; ?>
        <!-- Earnings (Monthly) Card Example -->
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pendapatan(Bulanan)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_to_currency($totalPendapatan, 'IDR'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Pengeluaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_to_currency($totalPengeluaran, 'IDR'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pendapatan (Tahunan)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_to_currency($totalPendapatan * 12, 'IDR'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Profit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_to_currency($totalProfit, 'IDR');  ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>