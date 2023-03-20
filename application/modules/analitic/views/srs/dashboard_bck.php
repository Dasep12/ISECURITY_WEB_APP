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
        <div class="row  justify-content-center">
            <div class="col-lg-6">
                <div class="card cardIn2">
                    <div class="card-body">
                        <div class="row  justify-content-center">
                            <div class="form-inline">
                                <select style="border-radius: 0px;" name="bulan" class="form-control form-control-sm" id="bulan">
                                    <option>Januari</option>
                                    <option>Februari</option>
                                    <option>Maret</option>
                                    <option>April</option>
                                </select>

                                <select style="border-radius: 0px;" name="tahun" class="form-control form-control-sm" id="tahun">
                                    <?php for ($i = 22; $i < 60; $i++) : ?>
                                        <option><?= 20 . $i ?></option>
                                    <?php endfor ?>
                                </select>
                                <select style="border-radius: 0px;" name="plant" class="form-control form-control-sm" id="plant">
                                    <option>Plant 1</option>
                                    <option>Plant 2</option>
                                    <option>Plant 3</option>
                                    <option>Plant 4</option>
                                </select>
                                <button id="filter_btn" style="border-radius: 0px;" class="btn btn-sm btn-primary" type="button">Filter</button>
                            </div>
                        </div>

                        <canvas id="container"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/2.1.0/chartjs-plugin-annotation.min.js" integrity="sha512-1uGDhRiDlpOPrTi54rJHu3oBLizqaadZDDft+j4fVeFih6eQBeRPJuuP3JcxIqJxIjzOmRq57XwwO4FT+/owIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    const ctx = document.getElementById("container");
    const myChart = new Chart(ctx, {
        type: 'bubble',
        data: {
            // labels: ['January', 'Fabruary', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Index Resiko',
                data: [],
                borderWidth: 1,
                backgroundColor: 'black',
                borderColor: 'white'
            }]
        },
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'TREAT',
                        fontStyle: "bold",
                    },
                    max: 5.0,
                    beginAtZero: true
                },
                x: {
                    title: {
                        display: true,
                        text: 'SOI',
                        fontStyle: "bold",
                    },
                    max: 5.0,
                    beginAtZero: true
                }
            },
            plugins: {
                autocolors: false,
                annotation: {
                    annotations: {
                        box1: {
                            type: 'box',
                            xMin: 0,
                            xMax: 2.5,
                            yMin: 0,
                            yMax: 2.5,
                            backgroundColor: 'rgba(255, 255, 23, 0.5)',
                            borderColor: 'white'
                        },
                        box2: {
                            type: 'box',
                            xMin: 2.5,
                            xMax: 5,
                            yMin: 2.5,
                            yMax: 5,
                            backgroundColor: 'rgba(255, 255, 23, 0.5)',
                            borderColor: 'white'
                        },
                        box3: {
                            type: 'box',
                            xMin: 0,
                            xMax: 2.5,
                            yMin: 2.5,
                            yMax: 5,
                            backgroundColor: 'rgba(255, 0, 0, 0.3)',
                            borderColor: 'white'
                        },
                        box4: {
                            type: 'box',
                            xMin: 2.5,
                            xMax: 5,
                            yMin: 0,
                            yMax: 2.5,
                            backgroundColor: 'rgba(0, 255, 0, 0.3)',
                            borderColor: 'white'
                        }
                    }
                }
            }
        }
    });

    $("#filter_btn").click(function(e) {
        var data = [{
            r: 10,
            x: 2,
            y: 4
        }];
        myChart.data.datasets[0].data = data;
        myChart.update();
    })
</script>