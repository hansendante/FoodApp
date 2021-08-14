<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

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
    <!-- Content Row -->
    <div class="row">


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
    <div>
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Overview Penghasilan</h6>
                    </div>
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sumber Pendapatan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Profit</h6>
                    </div>
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>


    </div>






    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <script>
        var makananValues = "<?php echo $listMakanan; ?>"
        var xValues = ["Pendapatan", "Pengeluaran", "Profit"];
        var pendapatanValues = "<?php echo $totalPendapatan ?>";
        var pengeluaranValues = "<?php echo $totalPengeluaran; ?>";
        var profitValues = "<?php echo $totalProfit; ?>";
        var yValues = [pendapatanValues, pengeluaranValues, profitValues, 24, 15];
        var barColors = ["lightblue", "lightgreen", "gray", "orange", "brown"];
        

        new Chart("myPieChart", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },

        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pendapatan', 'Pengeluaran', 'Profit'],
                datasets: [{
                    label: 'Data Penghasilan',
                    data: [<?php echo $totalPendapatan; ?>, <?php echo $totalPengeluaran; ?>, <?php echo $totalProfit; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myAreaChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Profit Per Bulan',
                    data: [<?php echo $totalProfit; ?>, <?php echo $totalProfit * 2; ?>, <?php echo $totalProfit * 3; ?>, <?php echo $totalProfit * 4; ?>, <?php echo $totalProfit * 5; ?>, <?php echo $totalProfit * 6; ?>,
                        <?php echo $totalProfit * 7; ?>, <?php echo $totalProfit * 8; ?>, <?php echo $totalProfit * 9; ?>, <?php echo $totalProfit * 10; ?>, <?php echo $totalProfit * 11; ?>, <?php echo $totalProfit * 12; ?>,
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',

                    ],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <?= $this->endSection();; ?>