@extends('layouts.outer');

@section('content')

<?php

// if (isset() && isset()) {
//     # code...
// }

?>
<div class="card">
    <div class="card-header">

        <h4 class="text-center">{{ __('Donativos') }}</h4>
        <div class="row">
            <?php $valoresDin[] = 0; $valoresNPer[] = 0; $valoresCon[] = 0; ?>
            @for ($i = 1; $i <= 12; $i++)
                <?php
                    foreach ($donativos as $d ) {
                        if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes == $i){

                            if(empty($valoresDin[$i])){
                                $valoresDin[$i] = $d->valorDinheiro;
                            } else if(!empty($valoresDin[$i])){
                                $valoresDin[$i] += $d->valorDinheiro;
                            }

                            if(empty($valoresNPer[$i])){
                                $valoresNPer[$i] = $d->valorNaoPerciveis;
                            } else if(!empty($valoresNPer[$i])){
                                $valoresNPer[$i] += $d->valorNaoPerciveis;
                            }

                            if(empty($valoresCon[$i])){
                                $valoresCon[$i] = $d->valorConsumiveis;
                            } else if(!empty($valoresCon[$i])){
                                $valoresCon[$i] += $d->valorConsumiveis;
                            }

                        }
                        if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresDin[$i])){
                            $valoresDin[$i] = 0;
                        }
                        if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresNPer[$i])){
                            $valoresNPer[$i] = 0;
                        }
                        if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresCon[$i])){
                            $valoresCon[$i] = 0;
                        }
                    }
                ?>
            @endfor
            <?php array_shift($valoresDin); array_shift($valoresNPer); array_shift($valoresCon); ?>

<div class="row">
    <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-Din" class="chart-canvas" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Donativos em Dinheiro </h6>
                <p class="text-sm "> Valor doado (em Euros)</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-NPer" class="chart-canvas" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Donativos Não Perciveis </h6>
                <p class="text-sm "> Comida doada (em Quilogramas)</p>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-Con" class="chart-canvas" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Donativos Consumiveis </h6>
                <p class="text-sm "> Comida doada (em Quilogramas)</p>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

</div>

<script src="/assets/js/plugins/chartjs.min.js"></script>

<script>
    var Din = document.getElementById("chart-Din").getContext("2d");

    new Chart(Din, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [<?php echo join(',', $valoresDin); ?>],
                maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

    var NPer = document.getElementById("chart-NPer").getContext("2d");

    new Chart(NPer, {
    type: "line",
    data: {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            label: "Mobile apps",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: [<?php echo join(',', $valoresNPer); ?>],
            maxBarThickness: 6

        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: '#f8f9fa',
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});

var Con = document.getElementById("chart-Con").getContext("2d");

new Chart(Con, {
    type: "bar",
    data: {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "rgba(255, 255, 255, .8)",
            data: [<?php echo join(',', $valoresCon); ?>],
            maxBarThickness: 6
        }, ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                    color: "#fff"
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});

</script>

@endsection

