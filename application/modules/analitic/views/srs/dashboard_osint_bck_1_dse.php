<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <!-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Event') ?>">Master</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Event') ?>">Event</a></li>
                    <li class="breadcrumb-item"><a href="">Edit Event</a></li>
                </ol> -->
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card cardIn2">
                    <div class="card-body">
                        <form id="form-filter" class="form-horizontal">
                            <div class="form-row">

                                <div class="form-group col-2">
                                    <label for="yearFilter">Year</label>
                                    <?= $select_year_filter; ?>
                                </div>

                                <div class="form-group col-2">
                                    <label for="monthFilter">Month</label>
                                    <?= $select_month_filter; ?>
                                </div>

                                <div class="form-group col d-flex align-items-end justify-content-end">
                                    <span class="h1 ff-fugazone title-dashboard">OSINT_Dashboard</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6">
                <div class="card cardIn2 " style="height: 350px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5>All Issue</h5>
                                <canvas id="osintChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


</section>

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="<?= base_url('vendor/chartjs/dist/chart.umd.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/2.1.0/chartjs-plugin-annotation.min.js" integrity="sha512-1uGDhRiDlpOPrTi54rJHu3oBLizqaadZDDft+j4fVeFih6eQBeRPJuuP3JcxIqJxIjzOmRq57XwwO4FT+/owIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="<?= base_url('vendor/chartjs/dist/chartjs-plugin-labels.min.js'); ?>"></script>

<script type="text/javascript">
    var osintCanvas = document.getElementById("osintChart").getContext('2d');
    var osintChart = new Chart(osintCanvas, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                pointStyle: 'circle',
                pointRadius: 8,
                label: '',
                data: [12, 11, 10, 4, 6, 7, 5, 8, 6, 1, 7, 12],
                fill: true,
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                tension: 0.1,
                segment: {
                    borderColor: 'red',
                    backgroundColor: 'rgba(201, 90, 80, 0.3)',
                },
                borderWidth: 1,
            }]
        },
        options: {
            // responsive: true,
            // maintainAspectRatio: false,
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 13,
                        },
                        color: '#FFF'
                    },
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        color: '#FFF'
                    },
                    min: 0,
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#FFF'
                }
            },
        }
    });


    // var riSoSub1 = document.getElementById("InformationChart");
    // var riSoMntChart = new Chart(riSoSub1, {
    //     type: 'bar',
    //     data: {
    //         labels: ['Conventional Crime', 'Crime About State Property', 'Crime Has Contingent Impact', 'Human Rights Violations', 'Transactional Crime'],
    //         datasets: [{
    //             axis: 'y',
    //             label: '',
    //             data: [1, 2, 3, 5, 4],
    //             fill: false,
    //             minBarLength: 2,
    //             barThickness: 20,
    //             maxBarThickness: 20,
    //             // backgroundColor: coloR,
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(255, 159, 64, 1)',
    //                 'rgba(255, 205, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(201, 203, 207, 1)'
    //             ],
    //             borderWidth: 1
    //         }, ]
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: true,
    //         responsiveAnimationDuration: 5000,
    //         indexAxis: 'y',
    //         scales: {
    //             x: {
    //                 display: false
    //             },
    //             y: {
    //                 ticks: {
    //                     font: {
    //                         size: 13,
    //                     },
    //                     color: '#FFF'
    //                 },
    //             }
    //         },
    //         plugins: {
    //             legend: {
    //                 display: false
    //             },
    //             datalabels: {
    //                 color: '#FFF',
    //                 // margin: 5
    //             }
    //         },
    //     },
    //     plugins: [ChartDataLabels],
    // });
</script>