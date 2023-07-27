<!-- <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Event') ?>">Master</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Event') ?>">Event</a></li>
                    <li class="breadcrumb-item"><a href="">Edit Event</a></li>
                </ol>
            </div>
        </div>
    </div>
</section> -->

<section class="content pt-4">
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
            <div class="col-lg-6 d-none">
                <div class="card" style="height: 280px;">
                    <div class="card-body" style="padding:0">
                        <canvas id="doughnutMonth"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="height: 280px;">
                    <div class="card-body">
                        <canvas id="linePlantChart"></canvas>
                        <!-- <div id="linePlantChart" style="width: 100%; height: 100%;"></div> -->
                    </div>
                    <div class="card-body d-none" style="padding:0">
                        <div id="doughnut3dPlant" style="width: 100%; height: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="height: 280px;">
                    <div class="card-body">
                        <div id="pie3d" style="width: 100%; height: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-none">
                <div class="card" style="height: 280px;">
                    <div class="card-body">
                        <canvas id="piePlant"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="height:350px;">
                    <div class="card-header text-center pt-4">
                        <h5>Internal Source</h5>
                    </div>
                    <div class="card-body">
                        <div id="barRiskSourceInt3D" style="width: 100%; height: 100%;"></div>
                    </div>
                    <div class="card-body text-center d-none">
                        <div id="legend-container-barRiskSourceInt" class="d-flex flex-row justify-content-around">
                            <canvas id="barRiskSourceInt" style="width: 50%; height: 220px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card" style="height:350px;">
                    <div class="card-header text-center pt-4">
                        <h5>External Source</h5>
                    </div>
                    <div class="card-body">
                        <div id="barRiskSourceExt3D" style="width: 100%; height: 100%;"></div>
                    </div>
                    <div class="card-body text-center d-none">
                        <div id="legend-container-barRiskSourceExt" class="d-flex flex-row justify-content-around">
                            <canvas id="barRiskSourceExt" style="width: 50%; height: 220px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card" style="height:350px;">
                    <div class="card-header text-center pt-4">
                        <h5>Target Assets</h5>
                    </div>
                    <div class="card-body">
                        <div id="barTargetIssue3D" style="width: 100%; height: 100%;"></div>
                    </div>
                    <div class="card-body text-center d-none">
                        <div id="legend-container" class="d-flex flex-row justify-content-around">
                            <canvas id="barTargetIssue" style="width: 50%;height: 220px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card" style="height:350px;">
                    <div class="card-header text-center pt-4">
                        <h5>Negative Sentiment</h5>
                    </div>
                    <div class="card-body text-center">
                        <div id="barRisk3D" style="width: 100%; height: 100%;">
                        </div>
                    </div>
                    <div class="card-body text-center d-none">
                        <div id="legend-container-barRisk" class="d-flex flex-row justify-content-around">
                            <canvas id="barRisk" style="width: 50%; height: 220px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card" style="height:350px;">
                    <div class="card-header text-center pt-4">
                        <h5>Media</h5>
                    </div>
                    <div class="card-body text-center">
                        <div id="barMedia3D" style="width: 100%; height: 100%;">
                        </div>
                    </div>
                    <div class="card-body text-center d-none">
                        <div id="legend-container-barMedia" class="d-flex flex-row justify-content-around">
                            <canvas id="barMedia" style="width: 50%;height: 220px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card" style="height:350px;">
                    <div class="card-header text-center pt-4">
                        <h5>Format</h5>
                    </div>
                    <div class="card-body text-center">
                        <div id="barFormat3D" style="width: 100%; height: 100%;">
                        </div>
                    </div>
                    <div class="card-body text-center d-none">
                    <div class="card-body text-center">
                        <div id="legend-container-barFormat" class="d-flex flex-row justify-content-around">
                            <canvas id="barFormat" style="width: 50%;height: 220px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<script src="<?= base_url('vendor/anychart/js/anychart-base.min.js'); ?>"></script>
<script src="<?= base_url('vendor/anychart/js/anychart-core.min.js'); ?>"></script>
<script src="<?= base_url('vendor/anychart/js/anychart-cartesian-3d.min.js'); ?>"></script>
<script src="<?= base_url('vendor/anychart/js/anychart-pie.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/2.1.0/chartjs-plugin-annotation.min.js" integrity="sha512-1uGDhRiDlpOPrTi54rJHu3oBLizqaadZDDft+j4fVeFih6eQBeRPJuuP3JcxIqJxIjzOmRq57XwwO4FT+/owIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="<?= base_url('vendor/chartjs/dist/chartjs-plugin-labels.min.js'); ?>"></script>

<script type="text/javascript">
    // $( document ).ready(function() {})
    var field = [
        area = $("#areaFilter").val(),
        year = $("#yearFilter").val(),
        month = $("#monthFilter").val(),
    ]

    var colorArr = [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 205, 86, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(231, 76, 60, 1)',
        'rgba(40, 167, 69, 1)'
    ].sort( () => Math.random() - 0.5);

    const getOrCreateLegendList = (chart, id) => {
        const legendContainer = document.getElementById(id);
        let listContainer = legendContainer.querySelector('ul');

        if (!listContainer) {
            listContainer = document.createElement('ul');
            listContainer.style.display = 'flex';
            listContainer.style.flexDirection = 'column';
            listContainer.style.margin = 0;
            listContainer.style.padding = 0;

            legendContainer.appendChild(listContainer);
        }

        return listContainer;
    };

    const htmlLegendPlugin = {
        id: 'htmlLegend',
        afterUpdate(chart, args, options) {
        const ul = getOrCreateLegendList(chart, options.containerID);

        // Remove old legend items
        while (ul.firstChild) {
            ul.firstChild.remove();
        }

        // Reuse the built-in legendItems generator
        const items = chart.options.plugins.legend.labels.generateLabels(chart);
        items.forEach(item => {
          const li = document.createElement('li');
            li.style.alignItems = 'center';
            li.style.cursor = 'pointer';
            li.style.display = 'flex';
            li.style.flexDirection = 'row';
            li.style.marginLeft = '10px';
            li.style.marginBottom = '8px';
            li.style.fontSize = '13px';
            li.style.textAlign = 'left';

          li.onclick = () => {
            const {type} = chart.config;
            if (type === 'pie' || type === 'doughnut') {
              // Pie and doughnut charts only have a single dataset and visibility is per item
              chart.toggleDataVisibility(item.index);
            } else {
              chart.setDatasetVisibility(item.datasetIndex, !chart.isDatasetVisible(item.datasetIndex));
            }
            chart.update();
          };

          // Color box
          const boxSpan = document.createElement('span');
          boxSpan.style.background = item.fillStyle;
          boxSpan.style.borderColor = item.strokeStyle;
          boxSpan.style.borderWidth = item.lineWidth + 'px';
          boxSpan.style.display = 'inline-block';
          boxSpan.style.width = '15px';
          boxSpan.style.height = '15px';
          boxSpan.style.marginRight = '10px';

          // Text
          const textContainer = document.createElement('p');
          textContainer.style.color = item.fontColor;
          textContainer.style.margin = 0;
          textContainer.style.padding = 0;
          textContainer.style.textDecoration = item.hidden ? 'line-through' : '';

          const text = document.createTextNode(item.text);
          textContainer.appendChild(text);

          li.appendChild(boxSpan);
          li.appendChild(textContainer);
          ul.appendChild(li);
        });
      }
    };

    // CONFIG BAR HORIZONTAL
    const barThickness = 20;
    // COLOR PALETTES
    var colorPalette = ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#3D9970", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#111111", "#AAAAAA"];

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

    // PLANT DOUGHNUT 3D
    anychart.onDocumentReady(function () {
        // create data
        var data = [];
        // create a 3d pie chart and set the data
        doughnut3dChart = anychart.pie3d(data);
        doughnut3dChart.innerRadius("30%");

        let palette = anychart.palettes.distinctColors();
        palette.items(colorPalette);
        doughnut3dChart.palette(palette);

        var legend = doughnut3dChart.legend();
        legend.enabled(false);
        legend.useHtml(true);
        legend.itemsFormat(
          "<span style='color:#ffffff;font-size:10px'>{%x}</span>"
        );
        // "<span style='color:#ffffff;font-size:10px'>{%x}: {%value}</span>"

        // legend.positionMode("outside");
        // legend.position("right");
        // legend.align("center");
        // legend.itemsLayout("verticalExpandable");

        // set the chart title
        doughnut3dChart.title("");
        doughnut3dChart.labels().format("{%x} {%value}");
        doughnut3dChart.background().enabled(false);
        doughnut3dChart.container("doughnut3dPlant");
        doughnut3dChart.draw();

        // updatedoughnutMonthCtx(field)
    });
    // PLANT DOUGHNUT 3D //

    // PLANT LINE
    var linePlantCtx = document.getElementById("linePlantChart");
    var linePlantChart = new Chart(linePlantCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: '',
                data: [0,0,0,0,0,0,0,0,0,0,0,0],
                fill: true,
                cubicInterpolationMode: 'monotone',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            responsiveAnimationDuration: 5000,
            scales: {
                x: {
                    grid: {
                        display: false,
                    }
                },
                y: {
                    grid: {
                        display: true,
                        color: function(context) {
                            return '#8d8d8d';
                        }
                    },
                    ticks: {
                        precision: 0,
                        color: '#FFF'
                    },
                    min: 0
                }
            },
            plugins: {
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
            },
            interaction: {
              intersect: false,
            },
        },
        plugins: [ChartDataLabels],
    });
    // PLANT LINE //

    updatePlantMonthCtx(field)
    function updatePlantMonthCtx(field) {
        var month = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getAllDataPie') ?>",
            method: "POST",
            data: {
                area: area,
                year: year,
                month: month
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);

                // GRAFIS DOUGHNUT PER MONTH //
                doughnutMonthCtx.data.datasets[0].dataDUmmy = JSON.parse(e);
                doughnutMonthCtx.update();
                // GRAFIS DOUGHNUT PER MONTH //

                var data = []
                var data3d = []
                for (let d = 0; d < res.length; d++) {
                    data.push([
                        res[d]
                    ]);

                    data3d.push({
                        x: month[d],
                        value: res[d]
                    });
                }
                
                // GRAFIS LINE PER MONTH //
                linePlantChart.data.datasets[0].data = res;
                linePlantChart.update();
                // GRAFIS LINE PER MONTH //

                // doughnut3dChart.data(data3d);
                // doughnut3dChart.listen("pointClick", function(e){
                //     var index = e.iterator.getIndex();
                //     const label = e.iterator.f.x;
                //     // var row = dataSet.row(index);
                //     // if (row.fillOld){
                //     //   row.fill = row.fillOld; delete row.fillOld;
                //     // }else{
                //     //   row.fillOld = row.fill; row.fill = "green";
                //     // }
                //     // dataSet.row(index, row);
                // });

                // const xAxis = doughnut3dChart.xAxis();
                // xAxis.labels().listen('click', function (e) {
                //     const labelIndex = e.labelIndex;
                //     const label = this.getLabel(labelIndex);
                //     const value = xAxis.scale().ticks().get()[labelIndex];
                //     console.log(value);
                // });
            }
        })
    }
    // DOUGHNUT MONTH //

    // PLANT OSINT DEFINED AND UNDEFINED //
    var plantPieCtx = document.getElementById("piePlant").getContext('2d');
    var plantPieChart = new Chart(plantPieCtx, {
      type: 'pie',
      data: {
        labels: [],
        datasets: [
            {
                label: 'Dataset 1',
                data: [],
                backgroundColor: [
                    'rgba(54, 162, 235, 1.5)',
                    'rgba(255, 99, 132, 1.5)',
                    'rgba(255, 159, 64, 1.5)',
                    'rgba(153, 102, 255, 1.5)',
                    'rgba(201, 203, 207, 1.5)',
                    'rgba(75, 192, 192, 1.5)',
                    'rgba(255, 205, 86, 1.5)',
                    'rgb(40, 167, 69, 1.5)'
                ],
                borderWidth: 5,
                borderColor: 'rgba(0, 0, 0, 0.1)'
            }
          ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'right',
            },
            tooltip: {
                callbacks: {
                    title: () => null,
                    label: function(context) {
                        let label = context.label || '';

                        if (label) {
                            label += ': ';
                        }
                        if (context.parsed.y !== null) {
                            label += context.parsed;
                        }
                        return label;
                    }
                }
            },
        }
      },
      plugins: [ChartDataLabels]
    });

    // PLANT PIE 3D
    anychart.onDocumentReady(function () {
        // create data
        var data = [];
        // create a 3d pie chart and set the data
        pie3dChart = anychart.pie3d(data);
        
        pie3dChart.legend().useHtml(true);
        pie3dChart.legend().itemsFormat(
          "<span style='color:#ffffff; font-size:10px'>{%x}</span>"
        );
        // "<span style='color:#ffffff;font-size:10px'>{%x}: {%value}</span>"

        let palette = anychart.palettes.distinctColors();
        palette.items(colorPalette);
        pie3dChart.palette(palette);

        var legend = pie3dChart.legend();
        legend.enabled(true);
        // legend.positionMode("outside");
        legend.position("right");
        legend.align("center");
        legend.itemsLayout("verticalExpandable");

        // set the chart title
        pie3dChart.title("");
        pie3dChart.labels().format("{%value}");
        pie3dChart.background().enabled(false);
        pie3dChart.container("pie3d");
        pie3dChart.draw();

        updatePlantPieChart(field)
    });
    // PLANT PIE 3D //

    function updatePlantPieChart(field) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getArea') ?>",
            method: "POST",
            data: {
                area: area,
                year: year,
                month: month
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                var dataSets = [];
                var label = [];
                var data3d = [];
                for (let d = 0; d < res.length; d++) {
                    dataSets.push(res[d].total);
                    data3d.push({
                        x: res[d].title,
                        value: res[d].total
                    });
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].title);
                }

                // var coloR = []
                // for (var i in label) {
                //     ict_unit.push("ICT Unit " + label[i].ict_unit);
                //     efficiency.push(label[i].efficiency);
                //     coloR.push(dynamicColors());
                // }

                plantPieChart.data.datasets[0].data = dataSets;
                // plantPieChart.data.datasets[0].backgroundColor = coloR;
                plantPieChart.data.labels = label;
                plantPieChart.update();

                pie3dChart.data(data3d);
            }
        })
    }

    // RISK SOURCE INTERNAL BAR
    var barRiskSourceIntCtx = document.getElementById("barRiskSourceInt");
    // barRiskSourceIntCtx.height = 100;
    const dataLabel = ['Management', 'Employee', 'Business Partner ', 'Contractor', 'Guest / Visitor'];
    const dataTotal = [2, 10, 4, 7, 12];
    var ict_unit = [];
    var efficiency = [];
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ", 1.0" + ")";
    };
    // var data = dataLabel
    for (var i in data) {
        ict_unit.push("ICT Unit " + data[i].ict_unit);
        efficiency.push(data[i].efficiency);
        coloR.push(dynamicColors());
    }
    var barRiskSourceChart = new Chart(barRiskSourceIntCtx, {
        type: 'bar',
        data: {
            labels: ['Internal'],
            datasets: [],
        },
        options: {
            responsive: false,
            // maintainAspectRatio: false,
            // indexAxis: 'x',
            scales: {
                y: {
                    display: false,
                    // max: 40,
                },
                x: {
                    display: false,
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
                }
            },
            plugins: {
                htmlLegend: {
                    containerID: 'legend-container-barRiskSourceInt',
                },
                legend: {
                    display: false,
                    position: 'bottom',
                    align: 'start',
                    labels: {
                        boxWidth: 20,
                        boxHeight: 8,
                    },
                    title: {
                        display: true,
                        padding: {
                            top: 2,
                        }
                    },
                },
                tooltip: {
                    callbacks: {
                        title: () => null
                    }
                },
                datalabels: {
                    color: '#FFF'
                }
            },
        },
        plugins: [ChartDataLabels,htmlLegendPlugin],
    });

    anychart.onDocumentReady(function () {
        // create a 3d column chart
        riskSourceInt3D = anychart.column3d();

        riskSourceInt3D.xAxis(false);
        riskSourceInt3D.yAxis(false);
        riskSourceInt3D.background().enabled(false);
        riskSourceInt3D.xGrid().stroke(false);
        riskSourceInt3D.yGrid().stroke(false);
        riskSourceInt3D.yAxis().ticks(false);
        // riskSourceInt3D.barsPadding(-0.5);
        // riskSourceInt3D.barGroupsPadding(2);
        riskSourceInt3D.bounds(0, 0, "83%", "100%");
        riskSourceInt3D.pointWidth(15);

        var tooltip = riskSourceInt3D.tooltip();
        tooltip.format("Value: {%value}");

        // LEGEND
        var legend = riskSourceInt3D.legend();
        legend.enabled(true);
        legend.position("right");
        legend.align("top");
        legend.itemsLayout("verticalExpandable");
        legend.padding(0,0,0,65);
        // legend.width("55%");
        legend.fontColor("#ffffff");

        labels = riskSourceInt3D.labels();
        labels.position("center");
        labels.anchor("center");
        labels.fontColor("#ffffff");
        labels.fontSize(10);

        // set the container id
        riskSourceInt3D.container("barRiskSourceInt3D");
        // initiate drawing the chart
        riskSourceInt3D.draw();

        updateInternalSource(field)
    });

    function updateInternalSource(field) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getInternalSource') ?>",
            method: "POST",
            data: {
                area: area,
                year: year,
                month: month
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                var data = [];
                var data3D = [];
                var label = [];
                const colorBg = colorArr
                for (let d = 0; d < res.length; d++) {
                    ict_unit.push("ICT Unit " + res[d].ict_unit);
                    efficiency.push(res[d].efficiency);

                    data.push({
                        label: res[d].name,
                        data: [res[d].total],
                        barThickness: barThickness,
                        maxBarThickness: barThickness,
                        backgroundColor: colorBg[d] // dynamicColors()
                    })

                    data3D.push([
                        res[d].name,
                        res[d].total,
                        colorPalette[d],
                    ])
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }
                // GRAFIS DOUGHNUT PER MONTH //
                barRiskSourceChart.data.datasets = data;
                // barRiskSourceChart.data.labels = label;
                barRiskSourceChart.update();

                // CHART 3D
                riskSourceInt3D.removeSeriesAt(0);
                var dataSets3D = anychart.data.set(data3D);
                var series1 = dataSets3D.mapAs({x: 0, value: 1, fill: 2});
                riskSourceInt3D.column(series1);

                // LEGEND CUSTOME
                var legendItems = [];
                for (var i = 0; i < riskSourceInt3D.getSeriesCount(); i++) {
                    var series = riskSourceInt3D.getSeriesAt(i);
                    for (var k = 0; k < series.data().getRowsCount(); k++) {
                      legendItems.push({
                        text: dataSets3D.data()[k][0],
                        iconType: "square",
                        iconFill: dataSets3D.data()[k][2]
                      });
                    }
                }

                var legend = riskSourceInt3D.legend();
                legend.items(legendItems);

                riskSourceInt3D.labels(true);
                riskSourceInt3D.labels().format("{%value}");

                var i=0;
                while (riskSourceInt3D.getSeriesAt(i)){
                  // rename each series
                  riskSourceInt3D.getSeriesAt(i).name("Series #" + (i+1));
                  i++;
                }

                riskSourceInt3D.listen("pointClick", function(e){
                    var index = e.iterator.getIndex();
                    var data = e.iterator;
                    const label = data.$f.data.x;

                    $("#detailGrap .modal-body").html("");
                    $("#detailGrap").modal();
                    document.getElementById("detailGrapLabel").innerHTML = "Detail Grafis - " + label
                    $("#detailGrap .modal-body").append(`
                        <div class="row">
                            <div class="col-lg-12">
                            </div>
                        </div>
                    `);
                    console.log(data)
                    // var row = dataSet.row(index);
                    // if (row.fillOld){
                    //   row.fill = row.fillOld; delete row.fillOld;
                    // }else{
                    //   row.fillOld = row.fill; row.fill = "green";
                    // }
                    // dataSet.row(index, row);
                });
                // CHART 3D //
            }
        })
    }
    // RISK SOURCE INTERNAL BAR //

    // RISK SOURCE EXTERNAL BAR
    var barRiskSourceExtCtx = document.getElementById("barRiskSourceExt");
    // barRiskSourceExtCtx.height = 130;
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
            labels: ['External'],
            datasets: [],
        },
        options: {
            responsive: false,
            // maintainAspectRatio: false,
            // indexAxis: 'x',
            scales: {
                y: {
                    display: false,
                    // max: 40,
                },
                x: {
                    display: false,
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
                }
            },
            plugins: {
                htmlLegend: {
                    containerID: 'legend-container-barRiskSourceExt',
                },
                legend: {
                    display: false,
                    position: 'bottom',
                    align: 'start',
                    labels: {
                        boxWidth: 20,
                        boxHeight: 8,
                    },
                    title: {
                        display: true,
                        padding: {
                            top: 2,
                        }
                    },
                },
                tooltip: {
                    callbacks: {
                        title: () => null
                    }
                },
                datalabels: {
                    color: '#FFF'
                }
            },
        },
        plugins: [ChartDataLabels,htmlLegendPlugin],
    });

    anychart.onDocumentReady(function () {
        // create a 3d column chart
        riskSourceExt3D = anychart.column3d();

        riskSourceExt3D.xAxis(false);
        riskSourceExt3D.yAxis(false);
        riskSourceExt3D.background().enabled(false);
        riskSourceExt3D.xGrid().stroke(false);
        riskSourceExt3D.yGrid().stroke(false);
        riskSourceExt3D.yAxis().ticks(false);
        // riskSourceExt3D.barsPadding(-0.5);
        // riskSourceExt3D.barGroupsPadding(2);
        riskSourceExt3D.bounds(0, 0, "83%", "100%");
        riskSourceExt3D.pointWidth(15);

        var tooltip = riskSourceExt3D.tooltip();
        tooltip.format("Value: {%value}");

        // LEGEND
        var legend = riskSourceExt3D.legend();
        legend.enabled(true);
        legend.position("right");
        legend.align("top");
        legend.itemsLayout("verticalExpandable");
        legend.padding(0,0,0,65);
        // legend.width("65%");
        legend.fontColor("#ffffff");

        labels = riskSourceExt3D.labels();
        labels.position("center");
        labels.anchor("center");
        labels.fontColor("#ffffff");
        labels.fontSize(10);

        // set the container id
        riskSourceExt3D.container("barRiskSourceExt3D");
        // initiate drawing the chart
        riskSourceExt3D.draw();

        updateExternallSource(field)
    });

    function updateExternallSource(field) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getExternalSource') ?>",
            method: "POST",
            data: {
                area: area,
                year: year,
                month: month
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                // console.log(res);
                var data = [];
                var data3D = [];
                var label = [];
                const colorBg = colorArr
                for (let d = 0; d < res.length; d++) {
                    // data.push(res[d].total);
                    data.push({
                        label: res[d].name,
                        data: [res[d].total],
                        barThickness: barThickness,
                        maxBarThickness: barThickness,
                        backgroundColor: colorBg[d]
                    })
                    data3D.push([
                        res[d].name,
                        res[d].total,
                        colorPalette[d]
                    ])
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barRiskSourceChart1.data.datasets = data;
                barRiskSourceChart1.update();

                // CHART 3D
                riskSourceExt3D.removeSeriesAt(0);
                var dataSets3D = anychart.data.set(data3D);
                var series1 = dataSets3D.mapAs({x: 0, value: 1, fill: 2});
                riskSourceExt3D.column(series1);

                // LEGEND CUSTOME
                var legendItems = [];
                for (var i = 0; i < riskSourceExt3D.getSeriesCount(); i++) {
                    var series = riskSourceExt3D.getSeriesAt(i);
                    for (var k = 0; k < series.data().getRowsCount(); k++) {
                      legendItems.push({
                        text: dataSets3D.data()[k][0],
                        iconType: "square",
                        iconFill: dataSets3D.data()[k][2]
                      });
                    }
                }

                var legend = riskSourceExt3D.legend();
                legend.items(legendItems);

                riskSourceExt3D.labels(true);
                riskSourceExt3D.labels().format("{%value}");

                var i=0;
                while (riskSourceExt3D.getSeriesAt(i)){
                  riskSourceExt3D.getSeriesAt(i).name("Series #" + (i+1));
                  i++;
                }
                // CHART 3D //
            }
        })
    }
    // updateExternallSource(field)
    // RISK SOURCE EXTERNAL BAR //

    // TARGET ASSETS BAR
    var barTargetIssueCtx = document.getElementById("barTargetIssue");
    // barTargetIssueCtx.height = 200;
    const dataTisLabel = ['Process Production', 'Product', 'Employee Issue'];
    const dataTisTotal = [10, 20, 16];
    var barTargetIssueChart = new Chart(barTargetIssueCtx, {
        type: 'bar',
        data: {
            labels: 'R',
            datasets: [],
        },
        options: {
            responsive: false,
            // maintainAspectRatio: false,
            // indexAxis: 'x',
            scales: {
                y: {
                    display: false,
                    // max: 40,
                },
                x: {
                    display: false,
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
                }
            },
            plugins: {
                htmlLegend: {
                    containerID: 'legend-container',
                },
                legend: {
                    display: false,
                    position: 'bottom',
                    align: 'start',
                    labels: {
                        boxWidth: 20,
                        boxHeight: 8,
                    },
                    title: {
                        display: true,
                        padding: {
                            top: 2,
                        }
                    },
                },
                tooltip: {
                    callbacks: {
                        title: () => null
                    }
                },
                datalabels: {
                    color: '#FFF'
                }
            },
        },
        plugins: [ChartDataLabels,htmlLegendPlugin],
    });

    anychart.onDocumentReady(function () {
        // create a 3d column chart
        barTargetIssue3D = anychart.column3d();

        barTargetIssue3D.xAxis(false);
        barTargetIssue3D.yAxis(false);
        barTargetIssue3D.background().enabled(false);
        barTargetIssue3D.xGrid().stroke(false);
        barTargetIssue3D.yGrid().stroke(false);
        barTargetIssue3D.yAxis().ticks(false);
        // barTargetIssue3D.barsPadding(-0.5);
        // barTargetIssue3D.barGroupsPadding(2);
        barTargetIssue3D.bounds(0, 0, "83%", "100%");
        barTargetIssue3D.pointWidth(15);

        var tooltip = barTargetIssue3D.tooltip();
        tooltip.format("Value: {%value}");

        // LEGEND
        var legend = barTargetIssue3D.legend();
        legend.enabled(true);
        legend.position("right");
        legend.align("top");
        legend.itemsLayout("verticalExpandable");
        legend.padding(0,0,0,65);
        // legend.width("65%");
        legend.fontColor("#ffffff");

        labels = barTargetIssue3D.labels();
        labels.position("center");
        labels.anchor("center");
        labels.fontColor("#ffffff");
        labels.fontSize(10);

        barTargetIssue3D.container("barTargetIssue3D");
        barTargetIssue3D.draw();

        updateTargetAssets(field)
    });

    function updateTargetAssets(field) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getTargetAssets') ?>",
            method: "POST",
            data: {
                area: area,
                year: year,
                month: month
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                // console.log(res);
                var data = [];
                var dataSets = [];
                var data3D = [];
                var label = [];
                const colorBg = colorArr
                for (let d = 0; d < res.length; d++) {
                    // data.push(res[d].total);
                    dataSets.push({
                        label: res[d].name,
                        data: [res[d].total],
                        barThickness: barThickness,
                        maxBarThickness: barThickness,
                        backgroundColor: colorBg[d]
                    });
                    data3D.push([
                        res[d].name,
                        res[d].total,
                        colorPalette[d]
                    ])
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barTargetIssueChart.data.datasets = dataSets;
                barTargetIssueChart.update();

                // CHART 3D
                barTargetIssue3D.removeSeriesAt(0);
                var dataSets3D = anychart.data.set(data3D);
                var series1 = dataSets3D.mapAs({x: 0, value: 1, fill: 2});
                barTargetIssue3D.column(series1);

                // LEGEND CUSTOME
                var legendItems = [];
                for (var i = 0; i < barTargetIssue3D.getSeriesCount(); i++) {
                    var series = barTargetIssue3D.getSeriesAt(i);
                    for (var k = 0; k < series.data().getRowsCount(); k++) {
                      legendItems.push({
                        text: dataSets3D.data()[k][0],
                        iconType: "square",
                        iconFill: dataSets3D.data()[k][2]
                      });
                    }
                }

                var legend = barTargetIssue3D.legend();
                legend.items(legendItems);

                barTargetIssue3D.labels(true);
                barTargetIssue3D.labels().format("{%value}");

                var i=0;
                while (barTargetIssue3D.getSeriesAt(i)){
                  barTargetIssue3D.getSeriesAt(i).name("Series #" + (i+1));
                  i++;
                }
                // CHART 3D //
            }
        })
    }
    // updateTargetAssets(field)
    // TARGET ASSETS BAR //

    // RISK BAR
    var barRiskCtx = document.getElementById("barRisk");
    // barRiskCtx.height = 200;
    const dataRisLabel = [];
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
            labels: 'R',
            datasets: [],
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            scales: {
                y: {
                    display: false,
                    // max: 40,
                },
                x: {
                    display: false,
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
                }
            },
            plugins: {
                htmlLegend: {
                    containerID: 'legend-container-barRisk',
                },
                legend: {
                    display: false,
                    position: 'right',
                    align: 'start',
                    labels: {
                        boxWidth: 20,
                        boxHeight: 8,
                    },
                    title: {
                        display: true,
                        padding: {
                            top: 2,
                        }
                    },
                },
                tooltip: {
                    callbacks: {
                        title: () => null
                    }
                },
                datalabels: {
                    color: '#FFF'
                }
            },
        },
        plugins: [ChartDataLabels,htmlLegendPlugin],
    });

    anychart.onDocumentReady(function () {
        // create a 3d column chart
        negative3D = anychart.column3d();

        negative3D.xAxis(false);
        negative3D.yAxis(false);
        negative3D.background().enabled(false);
        negative3D.xGrid().stroke(false);
        negative3D.yGrid().stroke(false);
        negative3D.yAxis().ticks(false);
        negative3D.pointWidth(15);

        var tooltip = negative3D.tooltip();
        tooltip.format("Value: {%value}");

        // LEGEND
        var legend = negative3D.legend();
        legend.enabled(true);
        legend.position("right");
        legend.align("top");
        legend.itemsLayout("verticalExpandable");
        legend.padding(0);
        legend.width("55%");
        legend.fontColor("#ffffff");

        labels = negative3D.labels();
        labels.position("center");
        labels.anchor("center");
        labels.fontColor("#ffffff");
        labels.fontSize(10);

        // set the container id
        negative3D.container("barRisk3D");
        // initiate drawing the chart
        negative3D.draw();

        updateRisk(field)
    });

    function updateRisk(field) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getNegativeSentiment') ?>",
            method: "POST",
            data: {
                area: area,
                year: year,
                month: month
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);
                var dataSets = [];
                var data3D = [];
                var label = [];
                const colorBg = colorArr
                for (let d = 0; d < res.length; d++) {
                    dataSets.push({
                        label: res[d].name,
                        data: [res[d].total],
                        barThickness: barThickness,
                        maxBarThickness: barThickness,
                        backgroundColor: colorBg[d]
                    });

                    data3D.push([
                        res[d].name,
                        res[d].total,
                        colorPalette[d],
                    ]);
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barRiskChart.data.datasets = dataSets;
                barRiskChart.update();

                // CHART 3D
                negative3D.removeSeriesAt(0);
                var dataSets3D = anychart.data.set(data3D);
                var series1 = dataSets3D.mapAs({x: 0, value: 1, fill: 2});
                negative3D.column(series1);

                // LEGEND CUSTOME
                var legendItems = [];
                for (var i = 0; i < negative3D.getSeriesCount(); i++) {
                    var series = negative3D.getSeriesAt(i);
                    for (var k = 0; k < series.data().getRowsCount(); k++) {
                      legendItems.push({
                        text: dataSets3D.data()[k][0],
                        iconType: "square",
                        iconFill: dataSets3D.data()[k][2]
                      });
                    }
                }

                var legend = negative3D.legend();
                // add custom legend items
                legend.items(legendItems);

                negative3D.labels(true);
                negative3D.labels().format("{%value}");

                // negative3D.labels(true);
                // negative3D.labels().format("{%x}");

                var i=0;
                // create a loop
                while (negative3D.getSeriesAt(i)){
                  // rename each series
                  negative3D.getSeriesAt(i).name("Series #" + (i+1));
                  i++;
                }
            }
        })
    }
    // RISK BAR //

    // MEDIA BAR
    var barMediaCtx = document.getElementById("barMedia");
    // barMediaCtx.height = 200;
    const dataMedLabel = [];
    const dataMedTotal = [];
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
            labels: 'M',
            datasets: [],
            // datasets: [{
            //     axis: 'y',
            //     label: '',
            //     data: dataRisTotal,
            //     fill: false,
            //     minBarLength: 2,
            //     barThickness: 20,
            //     maxBarThickness: 20,
            //     backgroundColor: coloR,
            //     borderWidth: 1
            // }]
        },
        options: {
            responsive: false,
            // maintainAspectRatio: false,
            // indexAxis: 'x',
            scales: {
                y: {
                    display: false,
                    // max: 40,
                },
                x: {
                    display: false,
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
                }
            },
            plugins: {
                htmlLegend: {
                    containerID: 'legend-container-barMedia',
                },
                legend: {
                    display: false,
                    position: 'bottom',
                    align: 'start',
                    labels: {
                        boxWidth: 20,
                        boxHeight: 8,
                    },
                    title: {
                        display: true,
                        padding: {
                            top: 2,
                        }
                    },
                },
                tooltip: {
                    callbacks: {
                        title: () => null
                    }
                },
                datalabels: {
                    color: '#FFF'
                }
            },
        },
        plugins: [ChartDataLabels,htmlLegendPlugin],
    });

    anychart.onDocumentReady(function () {
        // create a 3d column chart
        barMedia3D = anychart.column3d();

        // barMedia3D.xAxis(1);
        barMedia3D.xAxis(false);
        barMedia3D.yAxis(false);
        barMedia3D.background().enabled(false);
        barMedia3D.xGrid().stroke(false);
        barMedia3D.yGrid().stroke(false);
        barMedia3D.yAxis().ticks(false);
        // barMedia3D.barsPadding(-0.5);
        // barMedia3D.barGroupsPadding(2);
        barMedia3D.bounds(0, 0, "73%", "100%");
        barMedia3D.pointWidth(15);

        var tooltip = barMedia3D.tooltip();
        tooltip.format("Value: {%value}");

        // LEGEND
        var legend = barMedia3D.legend();
        legend.enabled(true);
        legend.position("right");
        legend.align("top");
        legend.itemsLayout("verticalExpandable");
        legend.padding(0,0,0,65);
        // legend.width("55%");
        legend.fontColor("#ffffff");

        labels = barMedia3D.labels();
        labels.position("center");
        labels.anchor("center");
        labels.fontColor("#ffffff");
        labels.fontSize(10);

        barMedia3D.container("barMedia3D");
        barMedia3D.draw();

        updateMedia(field)
    });

    function updateMedia(field) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getMedia') ?>",
            method: "POST",
            data: {
                area: area,
                year: year,
                month: month
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);

                var data = [];
                var dataSets = [];
                var data3D = [];
                var label = [];
                const colorBg = colorArr
                for (let d = 0; d < res.length; d++) {
                    // data.push(res[d].total);
                    dataSets.push({
                        label: res[d].name,
                        data: [res[d].total],
                        barThickness: barThickness,
                        maxBarThickness: barThickness,
                        backgroundColor: colorBg[d]
                    });

                    data3D.push([
                        res[d].name,
                        res[d].total,
                        colorPalette[d],
                    ]);
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barMediaChart.data.datasets = dataSets;
                barMediaChart.update();

                // CHART 3D
                barMedia3D.removeSeriesAt(0);
                var dataSets3D = anychart.data.set(data3D);
                var series1 = dataSets3D.mapAs({x: 0, value: 1, fill: 2});
                barMedia3D.column(series1);

                // LEGEND CUSTOME
                var legendItems = [];
                for (var i = 0; i < barMedia3D.getSeriesCount(); i++) {
                    var series = barMedia3D.getSeriesAt(i);
                    for (var k = 0; k < series.data().getRowsCount(); k++) {
                      legendItems.push({
                        text: dataSets3D.data()[k][0],
                        iconType: "square",
                        iconFill: dataSets3D.data()[k][2]
                      });
                    }
                }

                var legend = barMedia3D.legend();
                legend.items(legendItems);

                barMedia3D.labels(true);
                barMedia3D.labels().format("{%value}");

                var i=0;
                while (barMedia3D.getSeriesAt(i)){
                  barMedia3D.getSeriesAt(i).name("Series #" + (i+1));
                  i++;
                }
                // CHART 3D //
            }
        })
    }
    // updateMedia(field)
    // MEDIA BAR //

    // FORMAT BAR
    var barFormatCtx = document.getElementById("barFormat");
    const dataFormatLabel = [];
    var ict_unit = [];
    var efficiency = [];
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };
    var data = dataFormatLabel
    for (var i in data) {
        ict_unit.push("ICT Unit " + data[i].ict_unit);
        efficiency.push(data[i].efficiency);
        coloR.push(dynamicColors());
    }
    var barFormatChart = new Chart(barFormatCtx, {
        type: 'bar',
        data: {
            labels: 'M',
            datasets: [],
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            scales: {
                y: {
                    display: false,
                    // max: 40,
                },
                x: {
                    display: false,
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
                }
            },
            plugins: {
                htmlLegend: {
                    containerID: 'legend-container-barFormat',
                },
                legend: {
                    display: false,
                    position: 'bottom',
                    align: 'start',
                    labels: {
                        boxWidth: 20,
                        boxHeight: 8,
                    },
                    title: {
                        display: true,
                        padding: {
                            top: 2,
                        }
                    },
                },
                tooltip: {
                    callbacks: {
                        title: () => null
                    }
                },
                datalabels: {
                    color: '#FFF'
                }
            },
        },
        plugins: [ChartDataLabels,htmlLegendPlugin],
    });

    anychart.onDocumentReady(function () {
        // create a 3d column chart
        barFormat3D = anychart.column3d();

        barFormat3D.xAxis(false);
        barFormat3D.yAxis(false);
        barFormat3D.background().enabled(false);
        barFormat3D.xGrid().stroke(false);
        barFormat3D.yGrid().stroke(false);
        barFormat3D.yAxis().ticks(false);
        // set the padding between columns
        // barFormat3D.barsPadding(-0.5);
        // barFormat3D.barGroupsPadding(2);
        barFormat3D.bounds(0, 0, "73%", "100%");
        barFormat3D.pointWidth(15);

        var tooltip = barFormat3D.tooltip();
        tooltip.format("Value: {%value}");

        // LEGEND
        var legend = barFormat3D.legend();
        legend.enabled(true);
        legend.position("right");
        legend.align("top");
        legend.itemsLayout("verticalExpandable");
        legend.padding(0,0,0,65);
        // legend.width("55%");
        legend.fontColor("#ffffff");

        labels = barFormat3D.labels();
        labels.position("center");
        labels.anchor("center");
        labels.fontColor("#ffffff");
        labels.fontSize(10);

        barFormat3D.container("barFormat3D");
        barFormat3D.draw();

        updateFormat(field)
    });

    function updateFormat(field) {
        $.ajax({
            url: "<?= base_url('analitic/srs/dashboard_osint/getFormat') ?>",
            method: "POST",
            data: {
                area: area,
                year: year,
                month: month
            },
            cache: false,
            success: function(e) {
                var res = JSON.parse(e);

                var data = [];
                var dataSets = [];
                var data3D = [];
                var label = [];
                const colorBg = colorArr
                for (let d = 0; d < res.length; d++) {
                    // data.push(res[d].total);
                    dataSets.push({
                        label: res[d].name,
                        data: [res[d].total],
                        barThickness: barThickness,
                        maxBarThickness: barThickness,
                        backgroundColor: colorBg[d]
                    });

                    data3D.push([
                        res[d].name,
                        res[d].total,
                        colorPalette[d],
                    ]);
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barFormatChart.data.datasets = dataSets;
                barFormatChart.update();

                // CHART 3D
                barFormat3D.removeSeriesAt(0);
                var dataSets3D = anychart.data.set(data3D);
                var series1 = dataSets3D.mapAs({x: 0, value: 1, fill: 2});
                barFormat3D.column(series1);

                // LEGEND CUSTOME
                var legendItems = [];
                for (var i = 0; i < barFormat3D.getSeriesCount(); i++) {
                    var series = barFormat3D.getSeriesAt(i);
                    for (var k = 0; k < series.data().getRowsCount(); k++) {
                      legendItems.push({
                        text: dataSets3D.data()[k][0],
                        iconType: "square",
                        iconFill: dataSets3D.data()[k][2]
                      });
                    }
                }

                var legend = barFormat3D.legend();
                legend.items(legendItems);

                barFormat3D.labels(true);
                barFormat3D.labels().format("{%value}");

                var i=0;
                while (barFormat3D.getSeriesAt(i)){
                  barFormat3D.getSeriesAt(i).name("Series #" + (i+1));
                  i++;
                }
                // CHART 3D //
            }
        })
    }
    // updateFormat(field)
    // FORMAT BAR //

    // ALL CHART WHEN UPDATE FILTER //
    $("#areaFilter, #yearFilter, #monthFilter").change(function(e) {
        var field = [
            area = $("#areaFilter").val(),
            year = $("#yearFilter").val(),
            month = $("#monthFilter").val(),
        ]

        // updatedoughnutMonthCtx(field)
        updatePlantMonthCtx(field)
        updatePlantPieChart(field)
        updateInternalSource(field)
        updateExternallSource(field)
        updateTargetAssets(field)
        updateRisk(field)
        updateMedia(field)
        updateFormat(field)
    });
</script>