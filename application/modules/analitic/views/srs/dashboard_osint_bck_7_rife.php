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
                    <div class="card-body text-center">
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
                    <div class="card-body text-center">
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
                    <div class="card-body text-center">
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

    function updatedoughnutMonthCtx(field) {
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
                // console.log(e);
                // GRAFIS DOUGHNUT PER MONTH //
                doughnutMonthCtx.data.datasets[0].dataDUmmy = JSON.parse(e);
                doughnutMonthCtx.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updatedoughnutMonthCtx(field)
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
                for (let d = 0; d < res.length; d++) {
                    dataSets.push(res[d].total);
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
                // console.log(coloR)

                // GRAFIS DOUGHNUT PER MONTH //
                plantPieChart.data.datasets[0].data = dataSets;
                // plantPieChart.data.datasets[0].backgroundColor = coloR;
                plantPieChart.data.labels = label;
                plantPieChart.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updatePlantPieChart(field)

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
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }
                // GRAFIS DOUGHNUT PER MONTH //
                barRiskSourceChart.data.datasets = data;
                // barRiskSourceChart.data.labels = label;
                barRiskSourceChart.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        })
    }
    updateInternalSource(field)
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
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barRiskSourceChart1.data.datasets = data;
                barRiskSourceChart1.update();
            }
        })
    }
    updateExternallSource(field)
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
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barTargetIssueChart.data.datasets = dataSets;
                barTargetIssueChart.update();
            }
        })
    }
    updateTargetAssets(field)
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
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barRiskChart.data.datasets = dataSets;
                barRiskChart.update();
            }
        })
    }
    updateRisk(field)
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
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barMediaChart.data.datasets = dataSets;
                barMediaChart.update();
            }
        })
    }
    updateMedia(field)
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
                }
                for (let l = 0; l < res.length; l++) {
                    label.push(res[l].name);
                }

                barFormatChart.data.datasets = dataSets;
                barFormatChart.update();
            }
        })
    }
    updateFormat(field)
    // FORMAT BAR //

    // ALL CHART WHEN UPDATE FILTER //
    $("#areaFilter, #yearFilter, #monthFilter").change(function(e) {
        var field = [
            area = $("#areaFilter").val(),
            year = $("#yearFilter").val(),
            month = $("#monthFilter").val(),
        ]

        updatedoughnutMonthCtx(field)
        updatePlantPieChart(field)
        updateInternalSource(field)
        updateExternallSource(field)
        updateTargetAssets(field)
        updateRisk(field)
        updateMedia(field)
        updateFormat(field)
    });
</script>