<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <!-- <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                        <span class="input-group-text bg-primary border-primary text-white">
                            <i class="mdi mdi-calendar-range font-13"></i>
                        </span>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                </form> -->
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<?php
$query1 = "SELECT COUNT(t.id_transaksi) AS jmltransaksiLK , SUM(p.total_harga) AS viewtotalLK FROM transaksi t JOIN pembayaran P ON t.id_transaksi = p.id_transaksi WHERE t.jenis_transaksi = 'lepas kunci' AND (t.status_transaksi = 'Sewa Selesai' OR t.status_transaksi = 'Sewa Selesai (Terlambat)')";
$result1 = mysqli_query($connect, $query1);
$row1 = mysqli_fetch_assoc($result1);
$query2 = "SELECT COUNT(t.id_transaksi) AS jmltransaksiDD, SUM(p.total_harga) AS viewtotalDD FROM transaksi t JOIN pembayaran P ON t.id_transaksi = p.id_transaksi WHERE t.jenis_transaksi = 'dengan driver' AND (t.status_transaksi = 'Sewa Selesai' OR t.status_transaksi = 'Sewa Selesai (Terlambat)')";
$result2 = mysqli_query($connect, $query2);
$row2 = mysqli_fetch_assoc($result2);
$query3 = "SELECT COUNT(t.id_transaksi) AS jmltransaksi, SUM(p.total_harga) AS viewtotal FROM transaksi t JOIN pembayaran P ON t.id_transaksi = p.id_transaksi WHERE (t.status_transaksi = 'Sewa Selesai' OR t.status_transaksi = 'Sewa Selesai (Terlambat)')";
$result3 = mysqli_query($connect, $query3);
$row3 = mysqli_fetch_assoc($result3);
$query4 = "SELECT COUNT(id_mobil) AS jmlmobiltersedia FROM mobil WHERE status_mobil = 'Tersedia'";
$result4 = mysqli_query($connect, $query4);
$row4 = mysqli_fetch_assoc($result4);

?>
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-info overflow-hidden" style="height: 130px;">
            <div class="card-body">
                <div class="toll-free-box">
                    <h3> <i class="mdi mdi-deskphone"></i>Rp <?= rupiah($row1["viewtotalLK"]) ?></h3>
                    <p>Total Uang Masuk Transaksi Lepas Kunci</p>
                </div>
            </div> <!-- end card-body-->
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning overflow-hidden" style="height: 130px;">
            <div class="card-body">
                <div class="toll-free-box">
                    <h3> <i class="mdi mdi-deskphone"></i>Rp <?= rupiah($row2["viewtotalDD"]) ?></h3>
                    <p>Total Uang Masuk Transaksi Dengan Driver</p>
                </div>
            </div> <!-- end card-body-->
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white overflow-hidden" style="height: 130px;">
            <div class="card-body">
                <div class="toll-free-box">
                    <h3> <i class="mdi mdi-deskphone"></i>Rp <?= rupiah($row3["viewtotal"]) ?></h3>
                    <p>Total Transaksi Uang Masuk </p>
                </div>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="card tilebox-one">
            <div class="card-body">
                <!-- <i class='uil uil-money-withdraw float-end'></i> -->
                <h6 class="text-uppercase mt-0">Total Transaksi Lepas Kunci</h6>
                <h2 class="my-2"><?= rupiah($row1["jmltransaksiLK"]) ?></h2>
                <p class="mb-0 text-muted">
                    <span class="text-nowrap">Lepas Kunci</span>
                </p>
            </div> <!-- end card-body-->
        </div>
        <!--end card-->

        <div class="card tilebox-one">
            <div class="card-body">
                <!-- <i class='uil uil-money-withdraw float-end'></i> -->
                <h6 class="text-uppercase mt-0">Total Transaksi Dengan Driver</h6>
                <h2 class="my-2"><?= rupiah($row2["jmltransaksiDD"]) ?></h2>
                <p class="mb-0 text-muted">
                    <span class="text-nowrap">Lepas Kunci</span>
                </p>
            </div> <!-- end card-body-->
        </div>
        <!--end card-->
        <!--end card-->

        <div class="card tilebox-one">
            <div class="card-body">
                <!-- <i class='uil uil-money-withdraw float-end'></i> -->
                <h6 class="text-uppercase mt-0">Mobil Tersedia</h6>
                <h2 class="my-2"><?= rupiah($row4["jmlmobiltersedia"]) ?></h2>
                <p class="mb-0 text-muted">
                    <span class="text-nowrap">Lepas Kunci</span>
                </p>
            </div> <!-- end card-body-->
        </div>
        <!--end card-->
    </div> <!-- end col -->

    <div class="col-xl-9 col-lg-8">
        <div class="card card-h-100">
            <div class="card-body">
                <!-- <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Property HY1xx is not receiving hits. Either your site is not receiving any sessions or it is not tagged correctly.
                </div> -->
                <h4 class="header-title mb-4">Line Chart</h4>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="graphCanvas">

                        </canvas>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>

<script src="../assets/js/jquery.js"></script>
<script>
    $(document).ready(function() {
        showGraph();
    });

    function showGraph() {
        {
            $.post("bar_encode.php",
                (data) => {
                    console.log(data);
                    var id = [];
                    var jual = [];
                    for (var i in data) {
                        id.push(data[i].tgl_berangkat);
                        jual.push(data[i].jmltransaksi);

                    }
                    // var chartdata = {
                    //     labels: id,
                    //     datasets: [{
                    //         label: 'Id User',
                    //         backgroundColor: '#49e2ff',
                    //         borderColor: '#46d5f1',
                    //         hoverBackgroundColor: '#CCC',
                    //         hoverBorderColor: '#666',
                    //         data: jual
                    //     }]


                    // };

                    // const labels = Utils.months({
                    //     count: 7
                    // });
                    const linedata = {
                        labels: id,
                        datasets: [{
                            label: 'Total Transaksi',
                            data: jual,
                            fill: true,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    };
                    // </block:setup>

                    // <block:config:0>

                    // </block:config>


                    var graphTarget = $("#graphCanvas");
                    const config = new Chart(graphTarget, {
                        type: 'line',
                        data: linedata,
                    });
                    // var barGraph = new Chart(graphTarget, {
                    //     type: 'bar',
                    //     data: chartdata
                    // });

                });
        }
    }
</script>