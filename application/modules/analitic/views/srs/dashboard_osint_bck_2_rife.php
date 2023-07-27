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
                <div class="card shadow" style="height: 280px;">
                    <div class="card-body" style="padding:0">
                        <canvas id="doughnutMonth"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="height: 280px;">
                    <div class="card-body">
                        <canvas id="polarPlant"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card" style="height: 570px;">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <h5>Internal Source</h5>
                                <canvas id="barRiskSourceInt"></canvas>
                            </div>
                            <div class="col-lg-12">
                                <h5>External Source</h5>
                                <canvas id="barRiskSourceExt"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="height: 570px;">
                    <div class="card-body text-center">
                        <h5>Risk</h5>
                        <canvas id="barRisk"></canvas>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="height: 420px;">
                    <div class="card-body text-center">
                        <h5>Target Assets</h5>
                        <canvas id="barTargetIssue"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="height: 420px;">
                    <div class="card-body text-center">
                        <h5>Media</h5>
                        <canvas id="barMedia"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="card cardIn2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 pt-4 text-center">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h2 class="text-white">Security Operational Index</h2>
                                    </div>
                                    <div class="col-lg-6 p-3">
                                        <div class="info-box" style="background:rgb(255 255 255 / 13%)">
                                            <span style="background:rgba(0, 176, 80, 1)" class="info-box-icon elevation-1">
                                                <img style="height:60%" src="<?= base_url() ?>/assets/images/icon/people-white.png">
                                            </span>
                                            <div class="info-box-content  text-white">
                                                <span class="info-box-text">
                                                    PEOPLE
                                                </span>
                                                <span id="avgPeople" class="info-box-number">
                                                    4.30
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 p-3">
                                        <div class="info-box" style="background:rgb(255 255 255 / 13%)">
                                            <span style="background:rgba(0, 176, 240, 1)" class="info-box-icon elevation-1">
                                                <img style="height:60%" src="<?= base_url() ?>/assets/images/icon/system-white.png">
                                            </span>
                                            <div class="info-box-content text-white">
                                                <span class="info-box-text">
                                                    SYSTEM
                                                </span>
                                                <span id="avgSystem" class="info-box-number">
                                                    4.76
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 p-3">
                                        <div class="info-box" style="background:rgb(255 255 255 / 13%)">
                                            <span style="background:rgba(255, 0, 0, 1)" class="info-box-icon elevation-1">
                                                <img style="height:60%" src="<?= base_url() ?>/assets/images/icon/device-white.png">
                                            </span>
                                            <div class="info-box-content  text-white">
                                                <span class="info-box-text">
                                                    DEVICE
                                                </span>
                                                <span id="avgDevice" class="info-box-number">
                                                    4.01
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 p-3">
                                        <div class="info-box" style="background:rgb(255 255 255 / 13%)">
                                            <span style="background:rgba(112, 48, 160, 1)" class="info-box-icon elevation-1">
                                                <img style="height:60%" src="<?= base_url() ?>/assets/images/icon/network-white.png">
                                            </span>
                                            <div class="info-box-content  text-white">
                                                <span class="info-box-text">
                                                    NETWORKING
                                                </span>
                                                <span id="avgNetwork" class="info-box-number">
                                                    3.94
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-7">
                                <canvas id="lineSoiAvgMonth"></canvas>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card cardIn2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <canvas id="indexSoi"></canvas>
                                            </div>

                                            <div class="col-lg-5 pt-4 px-5 text-center">
                                                <h5>Index Resiko ADM</h5>
                                                <input id="indexSoiBg" class="form-control form-control-lg" type="text" placeholder="" disabled>

                                                <div id="isoDesc" class="card mt-3" style="display: none;">
                                                    <div class="card-body">
                                                        <dl class="row text-white text-left">
                                                            <dt class="col-sm-1">-</dt>
                                                            <dd class="col-sm-11">Masyarakat Sunter tidak kondusif (pandemic ke endemic) dan program CSR - External</dd>

                                                            <dt class="col-sm-1">-</dt>
                                                            <dd class="col-sm-11">Narkoba (Pembubaran kampung Bahari) - External</dd>

                                                            <dt class="col-sm-1">-</dt>
                                                            <dd class="col-sm-11">Pembangunan KAP 2 - Internal</dd>

                                                            <dt class="col-sm-1">-</dt>
                                                            <dd class="col-sm-11">Serangan Ransomware - Internal</dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>

            <div style="display:none;" class="col-lg-12">
                <div class="card cardIn2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 pt-4 text-center">
                               <h5>Index Resiko ADM</h5> 
                                <canvas style="display:none;" id="grapSoiArea"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="modal fade" id="detailGrap" tabindex="-1" role="dialog" aria-labelledby="detailGrapLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:70%;max-width:none;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailGrapLabel">Graphic Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h3 id="labels"></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detailGrap2" tabindex="-1" role="dialog" aria-labelledby="detailGrapLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:70%;max-width:none;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailGrapLabel">Graphic Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h3 id="labels"></h3>
                    </div>
                </div>
            </div>
        </div>

</section>

<script src="<?= base_url('vendor/chartjs/dist/chart.umd.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/2.1.0/chartjs-plugin-annotation.min.js" integrity="sha512-1uGDhRiDlpOPrTi54rJHu3oBLizqaadZDDft+j4fVeFih6eQBeRPJuuP3JcxIqJxIjzOmRq57XwwO4FT+/owIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="<?= base_url('vendor/chartjs/dist/chartjs-plugin-labels.min.js'); ?>"></script>

<script type="text/javascript">
    // DOUGHNUT MONTH //
    var doughnutMonth = document.getElementById("doughnutMonth").getContext('2d');
    const centerText = {
        afterDatasetsDraw(chart, args, pluginOptions) {
            var {
                ctx,
                data
            } = chart;
            var count = data.datasets[0].dataDUmmy;
            const text = count.reduce((a, b) => a + b) + "\n";
            ctx.save();
            const x = (chart.getDatasetMeta(0).data[0].x)
            const y = (chart.getDatasetMeta(0).data[0].y)
            ctx.textAlign = 'center';
            ctx.font = 'bold 18px sans-serif';
            ctx.fillStyle = 'white';
            ctx.fillText(text, x, y)
        }
    }
    const doughnutLabelsLine = {
        id: 'doughnutLabelsLine',
        afterDraw(chart, args, options) {
            const {
                ctx,
                chartArea: {
                    top,
                    bottom,
                    left,
                    right,
                    width,
                    height
                }
            } = chart;
            chart.data.datasets.forEach((dataset, i) => {
                chart.getDatasetMeta(i).data.forEach((datapoint, index) => {
                    // console.log(datapoint.startAngle);
                    const {
                        x,
                        y
                    } = datapoint.tooltipPosition();

                    const halfwidth = width / 2;
                    const halfheight = height / 2;
                    const xLine = x >= halfwidth ? x + -10 : x - 15;
                    const yLine = y >= halfheight ? y + -4 : y - 4;
                    const extraLine = x >= halfwidth ? -5 : 30;

                    ctx.beginPath();
                    ctx.moveTo(x, y);
                    ctx.lineTo(x, y);
                    ctx.lineTo(x, y);
                    ctx.strokeStyle = doughnutMonthCtx.data.datasets[0].backgroundColor;
                    ctx.stroke();

                    const textWidth = ctx.measureText(chart.data.labels[index]).width;
                    const textPosition = x >= halfwidth ? 'left' : 'right';
                    ctx.font = 'bold 10px Arial';
                    ctx.textBaseLine = 'middle';
                    ctx.textAlign = textPosition;
                    ctx.fillStyle = '#FFF';
                    ctx.fillText(`${chart.data.labels[index]} (${doughnutMonthCtx.data.datasets[0].dataDUmmy[index]})`, xLine + extraLine, yLine);
                })
            })
        }
    }
    var n = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
    var m = "<?= date('m') ?>";
    var doughnutMonthCtx = new Chart(doughnutMonth, {
        type: 'doughnut',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                data: [30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30],
                dataDUmmy: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: [
                    n[0] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[1] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[2] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[3] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[4] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[5] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[6] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[7] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[8] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[9] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[10] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[11] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                ],
                borderColor: ['#FFF'],
                cutout: '50%',
                borderRadius: 5,
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: 20
            },
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: "#FFF"
                    }
                },
                tooltip: {
                    enabled: false
                },
                datalabels: {
                    anchor: 'end',
                    color: '#FFF',
                }
            },

            onClick: (e, activeEls) => {
                let datasetIndex = activeEls[0].datasetIndex;
                let dataIndex = activeEls[0].index;
                const month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
                $("#detailGrap .modal-body").html("");
                document.getElementById("detailGrapLabel").innerHTML = "Detail Grapick Data Bulan ke -" + month[dataIndex]
                $("#detailGrap").modal();
                $("#detailGrap .modal-body").append(`
                    <div class="row">
                        <div class="col-lg-12"> 
                            <div id="popCharts" style="position: absolute;left:40%;top:35%;display:none" class="row justify-content-center loader">
                            <div class="spinner-grow text-primary " role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-secondary ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success ml-1 " role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-danger ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-info ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-dark ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
            			</div>
                            <div style="height:300px;" class="col-md-12">
                                <canvas id="detailDoughnut"></canvas>
                            </div>
                        </div>
                    </div>
            `);
                $.ajax({
                    url: "<?= base_url('analitic/srs/dashboard_osint/getDetailPie') ?>",
                    cache: false,
                    method: "POST",
                    data: {
                        month: month[dataIndex],
                        year: "2023"
                    },
                    beforeSend: function(e) {
                        document.getElementById("popCharts").style.display = "block";
                    },
                    complete: function(e) {
                        document.getElementById("popCharts").style.display = "none";
                    },
                    success: function(e) {
                        // console.log(e);
                        let data = JSON.parse(e);
                        const result = [];
                        for (let i = 0; i < data.length; i++) {
                            result.push(data[i].total);
                        }
                        // console.log(result);
                        var label = [];
                        for (let i = 1; i <= 31; i++) {
                            label.push(i);
                        }
                        var detailAssets = document.getElementById("detailDoughnut").getContext('2d');
                        var assetsMonthChart = new Chart(detailAssets, {
                            type: 'line',
                            data: {
                                labels: label,
                                datasets: [{
                                    pointStyle: 'circle',
                                    pointRadius: 8,
                                    label: 'Total',
                                    data: [],
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
                                responsive: true,
                                maintainAspectRatio: false,
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
                                        max: 10
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

                        // GRAFIS DOUGHNUT PER MONTH //
                        assetsMonthChart.data.datasets[0].data = result;
                        assetsMonthChart.update();
                        // GRAFIS DOUGHNUT PER MONTH //


                    }
                })


            }
        },
        plugins: [centerText, doughnutLabelsLine]
    })
    var ySelected = "<?= date('Y') ?>";
    $("select[name=year_filter").on('change', function() {
        years2 = $("select[name=year_filter] option:selected").val();
        doughnutMonthCtx.data.datasets[0].backgroundColor = [
            n[0] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[1] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[2] == m && years2 == ySelected ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[3] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[4] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[5] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[6] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[7] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[8] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[9] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[10] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[11] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
        ];
        doughnutMonthCtx.update();
    })
    Chart.defaults.color = '#FFF';

    function updatedoughnutMonthCtx(year) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getAllDataPie') ?>",
            method: "POST",
            data: {
                year: year
            },
            cache: false,
            success: function(e) {
                // console.log(e);
                // GRAFIS DOUGHNUT PER MONTH //
                doughnutMonthCtx.data.datasets[0].dataDUmmy = JSON.parse(e);
                doughnutMonthCtx.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updatedoughnutMonthCtx(ySelected)
    // DOUGHNUT MONTH //

    // TYPE OSINT DEFINED AND UNDEFINED //
    var TypePieCtx = document.getElementById("polarPlant").getContext('2d');
    var TypePieChart = new Chart(TypePieCtx, {
        type: 'pie',
        data: {
            labels: ['', ''],
            datasets: [{
                data: [0, 0],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    // 'rgb(54, 162, 235)',
                ],
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: "bottom",
                    "labels": {
                        "fontSize": 20,
                        color: '#FFF'
                    }
                },
                datalabels: {
                    color: '#ffffff',
                }
            },
            maintainAspectRatio: false,
        },
        plugins: [ChartDataLabels]
    });
    document.getElementById("polarPlant").onclick = function(evt) {
        var activePoints = TypePieChart.getElementsAtEventForMode(evt, 'point', TypePieChart.options);
        var firstPoint = activePoints[0];
        var label = TypePieChart.data.labels[firstPoint.index];
        console.log(label)
        if (label == "detail area" || label == "Detail Area") {
            $("#detailGrap .modal-body").html("");
            $("#detailGrap").modal();
            document.getElementById("detailGrapLabel").innerHTML = "Detail Grapick Per Plant"
            $("#detailGrap .modal-body").append(`
                    <div class="row">
                        <div class="col-lg-12"> 
                            <div id="popCharts" style="position: absolute;left:40%;top:35%;display:none" class="row justify-content-center loader">
                            <div class="spinner-grow text-primary " role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-secondary ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success ml-1 " role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-danger ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-info ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-grow text-dark ml-1" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
            			</div>
                            <div style="height:300px;" class="col-md-12">
                                <canvas id="detailPieTypeChart"></canvas>
                            </div>
                        </div>
                    </div>
            `);
            $.ajax({
                url: "<?= base_url('analitic/srs/dashboard_osint/detailPerPlant') ?>",
                method: "POST",
                data: {
                    year: "2023",
                    month: ""
                },
                beforeSend: function() {
                    document.getElementById("popCharts").style.display = "block";
                },
                complete: function() {
                    document.getElementById("popCharts").style.display = "none";
                },
                cache: false,
                success: function(e) {
                    var detailAssets = document.getElementById("detailPieTypeChart").getContext('2d');
                    var assetsMonthChartPlant = new Chart(detailAssets, {
                        type: 'line',
                        data: {
                            labels: ['P1', 'P2', 'P3', 'P4', 'P5', 'VLC', 'HO', 'PC'],
                            datasets: [{
                                pointStyle: 'circle',
                                pointRadius: 8,
                                label: 'Plant 1',
                                data: [1, 2, 4, 3, 1, 2, 6, 8, 3, 6, 8, 3],
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
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                x: {
                                    ticks: {
                                        font: {
                                            size: 13,
                                        },
                                        color: '#FFF',
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
                                    max: 10
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
                    const data = JSON.parse(e);
                    // console.log(data);
                    let label = [];
                    let result = [];
                    for (let i = 0; i < data.length; i++) {
                        label.push(data[i].title);
                    }
                    for (let j = 0; j < data.length; j++) {
                        result.push(data[j].total);
                    }
                    assetsMonthChartPlant.data.datasets[0].data = result;
                    assetsMonthChartPlant.data.labels = label;
                    assetsMonthChartPlant.update();
                }
            })
        }


    }

    function updateTypePieChart(year) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getAllDataDoughnut') ?>",
            method: "POST",
            data: {
                year: year
            },
            cache: false,
            success: function(e) {
                // console.log(JSON.parse(e));
                var res = JSON.parse(e);
                var data = [];
                var label = [];
                for (let d = 0; d < res.length; d++) {
                    data.push(res[d].data);
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].label);
                }
                // console.log(label);
                // GRAFIS DOUGHNUT PER MONTH //
                TypePieChart.data.datasets[0].data = data;
                TypePieChart.data.labels = label;
                TypePieChart.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updateTypePieChart(ySelected)
    // updatedoughnutMonthCtx(ySelected)
    // PLANT DOUGHNUT //

    // RISK SOURCE INTERNAL BAR
    var barRiskSourceIntCtx = document.getElementById("barRiskSourceInt");
    barRiskSourceIntCtx.height = 130;
    const dataLabel = ['Management', 'Employee', 'Business Partner ', 'Contractor', 'Guest / Visitor'];
    const dataTotal = [2, 10, 4, 7, 12];
    var ict_unit = [];
    var efficiency = [];
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };
    var data = dataLabel
    for (var i in data) {
        ict_unit.push("ICT Unit " + data[i].ict_unit);
        efficiency.push(data[i].efficiency);
        coloR.push(dynamicColors());
    }
    var barRiskSourceChart = new Chart(barRiskSourceIntCtx, {
        type: 'bar',
        data: {
            labels: [1, 2, 3, 4],
            datasets: [{
                axis: 'y',
                label: '',
                data: [0, 0, 0, 0],
                fill: false,
                minBarLength: 2,
                barThickness: 20,
                maxBarThickness: 20,
                backgroundColor: coloR,
                borderWidth: 1
            }]
        },
        options: {
            // responsive: true,
            // maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    display: false,
                    max: 40
                },
                y: {
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
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
        },
        plugins: [ChartDataLabels],
    });

    function updateInternalSource(year) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getInternalSource') ?>",
            method: "POST",
            data: {
                year: year
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                var data = [];
                var label = [];
                for (let d = 0; d < res.length; d++) {
                    data.push(res[d].total);
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }
                // GRAFIS DOUGHNUT PER MONTH //
                barRiskSourceChart.data.datasets[0].data = data;
                barRiskSourceChart.data.labels = label;
                barRiskSourceChart.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updateInternalSource(ySelected)
    // RISK SOURCE INTERNAL BAR //

    // RISK SOURCE EXTERNAL BAR
    var barRiskSourceExtCtx = document.getElementById("barRiskSourceExt");
    barRiskSourceExtCtx.height = 130;
    const dataRisoExtLabel = ['Journalist', 'Public/community', 'NGO/LSM', 'Government'];
    const dataRisoExtTotal = [2, 10, 4, 7];
    var ict_unit = [];
    var efficiency = [];
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };
    var data = dataRisoExtLabel
    for (var i in data) {
        ict_unit.push("ICT Unit " + data[i].ict_unit);
        efficiency.push(data[i].efficiency);
        coloR.push(dynamicColors());
    }
    var barRiskSourceChart1 = new Chart(barRiskSourceExtCtx, {
        type: 'bar',
        data: {
            labels: dataRisoExtLabel,
            datasets: [{
                axis: 'y',
                label: '',
                data: dataRisoExtTotal,
                fill: false,
                minBarLength: 2,
                barThickness: 20,
                maxBarThickness: 20,
                backgroundColor: coloR,
                borderWidth: 1
            }]
        },
        options: {
            // responsive: true,
            // maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    display: false,
                    max: 40
                },
                y: {
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
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
        },
        plugins: [ChartDataLabels],
    });

    function updateExternallSource(year) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getExternalSource') ?>",
            method: "POST",
            data: {
                year: year
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                // console.log(res);
                var data = [];
                var label = [];
                for (let d = 0; d < res.length; d++) {
                    data.push(res[d].total);
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }
                // GRAFIS DOUGHNUT PER MONTH //
                barRiskSourceChart1.data.datasets[0].data = data;
                barRiskSourceChart1.data.labels = label;
                barRiskSourceChart1.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updateExternallSource(ySelected)
    // RISK SOURCE EXTERNAL BAR //

    // TARGET ASSETS BAR 
    var barTargetIssueCtx = document.getElementById("barTargetIssue");
    barTargetIssueCtx.height = 100;
    const dataTisLabel = ['Process Production', 'Product', 'Employee Issue'];
    const dataTisTotal = [10, 20, 16];
    var barTargetIssueChart = new Chart(barTargetIssueCtx, {
        type: 'bar',
        data: {
            labels: dataTisLabel,
            datasets: [{
                axis: 'y',
                label: '',
                data: dataTisTotal,
                fill: false,
                minBarLength: 2,
                barThickness: 25,
                maxBarThickness: 25,
                backgroundColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsiveAnimationDuration: 5000,
            indexAxis: 'y',
            scales: {
                x: {
                    display: false,
                    max: 40
                },
                y: {
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
                }
            },
            plugins: {
                // responsive: true,
                // maintainAspectRatio: false,
                legend: {
                    display: false,
                    "labels": {
                        "fontSize": 20,
                        color: '#FFF'
                    }
                },
                datalabels: {
                    color: '#FFF'
                }
            }
        },
        plugins: [ChartDataLabels],
    });

    function updateTargetAssets(year) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getTargetAssets') ?>",
            method: "POST",
            data: {
                year: year
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                // console.log(res);
                var data = [];
                var label = [];
                for (let d = 0; d < res.length; d++) {
                    data.push(res[d].total);
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }
                // GRAFIS DOUGHNUT PER MONTH //
                barTargetIssueChart.data.datasets[0].data = data;
                barTargetIssueChart.data.labels = label;
                barTargetIssueChart.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updateTargetAssets(ySelected)
    // TARGET ASSETS BAR //

    // RISK BAR
    var barRiskCtx = document.getElementById("barRisk");
    barRiskCtx.height = 250;
    const dataRisLabel = ['Humiliation (penghinaan)', 'Libel (Pencemaran nama baik)', 'Blasphemy (penistaan)', 'Inconvenience activities', 'Provoke', 'Instigate (menghasut)', 'Hoax'];
    const dataRisTotal = [2, 10, 12, 9, 5, 11, 4];
    var ict_unit = [];
    var efficiency = [];
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };
    var data = dataRisLabel
    for (var i in data) {
        ict_unit.push("ICT Unit " + data[i].ict_unit);
        efficiency.push(data[i].efficiency);
        coloR.push(dynamicColors());
    }
    var barRiskChart = new Chart(barRiskCtx, {
        type: 'bar',
        data: {
            labels: dataRisLabel,
            datasets: [{
                axis: 'y',
                label: '',
                data: dataRisTotal,
                fill: false,
                minBarLength: 2,
                barThickness: 20,
                maxBarThickness: 20,
                backgroundColor: coloR,
                borderWidth: 1
            }]
        },
        options: {
            // responsive: true,
            // maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    display: false,
                    max: 40
                },
                y: {
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
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
        },
        plugins: [ChartDataLabels],
    });

    function updateRisk(year) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getRisk') ?>",
            method: "POST",
            data: {
                year: year
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                var data = [];
                var label = [];
                for (let d = 0; d < res.length; d++) {
                    data.push(res[d].total);
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }
                // GRAFIS DOUGHNUT PER MONTH //
                barRiskChart.data.datasets[0].data = data;
                barRiskChart.data.labels = label;
                barRiskChart.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updateRisk(ySelected)
    // RISK BAR //

    // MEDIA BAR
    var barMediaCtx = document.getElementById("barMedia");
    barMediaCtx.height = 130;
    const dataMedLabel = ['Print', 'Online', 'Broadcast'];
    const dataMedTotal = [2, 10, 12];
    var ict_unit = [];
    var efficiency = [];
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };
    var data = dataMedLabel
    for (var i in data) {
        ict_unit.push("ICT Unit " + data[i].ict_unit);
        efficiency.push(data[i].efficiency);
        coloR.push(dynamicColors());
    }
    var barMediaChart = new Chart(barMediaCtx, {
        type: 'bar',
        data: {
            labels: dataMedLabel,
            datasets: [{
                axis: 'y',
                label: '',
                data: dataMedTotal,
                fill: false,
                minBarLength: 2,
                barThickness: 20,
                maxBarThickness: 20,
                backgroundColor: coloR,
                borderWidth: 1
            }]
        },
        options: {
            // responsive: true,
            // maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    display: false,
                    max: 50
                },
                y: {
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
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
        },
        plugins: [ChartDataLabels],
    });

    function updateMedia(year) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getMedia') ?>",
            method: "POST",
            data: {
                year: year
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                console.log(res);
                var data = [];
                var label = [];
                for (let d = 0; d < res.length; d++) {
                    data.push(res[d].total);
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }
                // GRAFIS DOUGHNUT PER MONTH //
                barMediaChart.data.datasets[0].data = data;
                barMediaChart.data.labels = label;
                barMediaChart.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updateMedia(ySelected)
    // MEDIA BAR //

    // SOI AVERAGE MONTH LINE  //
    // var lineSoiAvgMonthCtx = document.getElementById("lineSoiAvgMonth").getContext('2d');
    // var soiAvgMonthChart = new Chart(lineSoiAvgMonthCtx, {
    //     type: 'line',
    //     data: {
    //         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
    //         datasets: [{
    //                 label: 'PEOPLE',
    //                 data: [3.00, 4.50, 2.10, 4.00, 1.00, 2.20, 2.05, 3.50, 5.00, 3.80, 1.00, 2.00],
    //                 borderColor: "rgba(0, 176, 80, 1)",
    //                 backgroundColor: "rgba(0, 176, 80, 1)",
    //             },
    //             {
    //                 label: 'SYSTEM',
    //                 data: [1.00, 3.50, 4.10, 4.00, 3.00, 4.20, 4.05, 2.00, 5.00, 1.80, 1.00, 2.00],
    //                 borderColor: "rgba(0, 176, 240, 1)",
    //                 backgroundColor: "rgba(0, 176, 240, 1)",
    //             },
    //             {
    //                 label: 'DEVICE',
    //                 data: [2.30, 4.10, 3.70, 4.00, 4.00, 4.20, 1.20, 3.00, 5.00, 2.80, 1.00, 2.00],
    //                 borderColor: "rgba(255, 0, 0, 1)",
    //                 backgroundColor: "rgba(255, 0, 0, 1)",
    //             },
    //             {
    //                 label: 'NETWORKING',
    //                 data: [4.03, 2.50, 1.10, 4.00, 3.80, 4.20, 3.05, 1.00, 5.00, 4.80, 1.00, 2.00],
    //                 borderColor: "rgba(112, 48, 160, 1)",
    //                 backgroundColor: "rgba(112, 48, 160, 1)",
    //             },
    //         ],
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 min: 0,
    //                 max: 5,
    //                 ticks: {
    //                     precision: 0,
    //                     callback: (yValue) => {
    //                         return Number(yValue).toFixed(2); // format to your liking
    //                     },
    //                 },
    //             },
    //         },
    //         plugins: {
    //             filler: {
    //                 propagate: false
    //             },
    //             'samples-filler-analyser': {
    //                 target: 'chart-analyser'
    //             }
    //         },
    //         interaction: {
    //             intersect: false,
    //         },
    //     },
    // });
    // SOI AVERAGE MONTH LINE  //
    // INDEX BG SOI //
    const dataX = 4.25;
    const dataY = 1.00;

    if ((dataX <= 4 && dataY <= 2) || (dataX >= 4 && dataY >= 2)) {
        $('#indexSoiBg').attr('style', 'background-color: rgb(233 233 9 / 69%)') // yellow
    }

    if (dataX >= 4 && dataY <= 2) {
        $('#indexSoiBg').attr('style', 'background-color: rgb(0 128 9 / 69%)') // green
    }

    if (dataX <= 4 && dataY >= 2) {
        $('#indexSoiBg').attr('style', 'background-color: rgb(255 0 9 / 69%)') // red
    }
    // INDEX BG SOI //

    // INDEX SOI
    // const indexSoiCtx = document.getElementById("indexSoi");
    // indexSoiCtx.height = 300;
    // const srsChart = new Chart(indexSoiCtx, {
    //     type: 'bubble',
    //     data: {
    //         datasets: [{
    //             label: 'Index Resiko',
    //             data: [{
    //                 r: 8,
    //                 x: dataX,
    //                 y: dataY
    //             }],
    //             borderWidth: 1,
    //             backgroundColor: 'black',
    //             borderColor: 'white',
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         // aspectRatio: 2.5,
    //         scales: {
    //             y: {
    //                 title: {
    //                     display: true,
    //                     text: 'Threat',
    //                     fontStyle: "bold",
    //                     font: {
    //                         family: 'Comic Sans MS',
    //                         size: 14,
    //                         weight: 'bold',
    //                         lineHeight: 1.2,
    //                     },
    //                     color: '#FFF',
    //                 },
    //                 ticks: {
    //                     precision: 0,
    //                     color: '#FFF'
    //                 },
    //                 position: 'right',
    //                 min: 0.0,
    //                 max: 5.0,
    //                 beginAtZero: true
    //             },
    //             x: {
    //                 reverse: true,
    //                 title: {
    //                     display: true,
    //                     text: 'Security Operational Index',
    //                     fontStyle: "bold",
    //                     font: {
    //                         family: 'Comic Sans MS',
    //                         size: 14,
    //                         weight: 'bold',
    //                         lineHeight: 1.2,
    //                     },
    //                     color: '#FFF',
    //                 },
    //                 ticks: {
    //                     precision: 0,
    //                     color: '#FFF'
    //                 },
    //                 min: 0.0,
    //                 max: 5.0,
    //                 beginAtZero: true
    //             }
    //         },
    //         plugins: {
    //             tooltip: {
    //                 callbacks: {
    //                     label: function(item) {
    //                         return ` SOI: ${item.raw.x}, THREAT: ${item.raw.y}`
    //                     }
    //                 }
    //             },
    //             autocolors: false,
    //             annotation: {
    //                 annotations: {
    //                     box1: {
    //                         type: 'box',
    //                         xMin: 0,
    //                         xMax: 4,
    //                         yMin: 0,
    //                         yMax: 2,
    //                         backgroundColor: 'rgba(255, 255, 23, 0.5)', // yellow bottom right
    //                         borderColor: 'white'
    //                     },
    //                     box2: {
    //                         type: 'box',
    //                         xMin: 5,
    //                         xMax: 4,
    //                         yMin: 5,
    //                         yMax: 2,
    //                         backgroundColor: 'rgba(255, 255, 23, 0.5)', // yellow top right
    //                         borderColor: 'white'
    //                     },
    //                     box3: {
    //                         type: 'box',
    //                         xMin: 0,
    //                         xMax: 4,
    //                         yMin: 2,
    //                         yMax: 5,
    //                         backgroundColor: 'rgba(255, 0, 0, 0.3)', // red right
    //                         borderColor: 'white'
    //                     },
    //                     box4: {
    //                         type: 'box',
    //                         xMin: 5,
    //                         xMax: 4,
    //                         yMin: 0,
    //                         yMax: 2,
    //                         backgroundColor: 'rgba(0, 255, 0, 0.3)', // green left
    //                         borderColor: 'white'
    //                     }
    //                 }
    //             },
    //             datalabels: {
    //                 color: '#FFF',
    //             },
    //             legend: {
    //                 display: false
    //             },
    //         }
    //     }
    // });
</script>