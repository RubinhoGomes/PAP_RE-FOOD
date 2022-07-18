@extends('layouts.outer');

@section('content')

<div class="card">
    <div class="card-header">

        <h4 class="text-center">{{ __('Despesas') }}</h4>
        <div class="row">
            <?php $valoresRenda[] = 0; $valoresElet[] = 0; $valoresAgua[] = 0; $valoresCons[] = 0; $valoresManu[] = 0; $valoresEquip[] = 0; $valoresOutros[] = 0; $valoresTotalD[] = 0; ?>

            @for ($i = 1; $i <= 12; $i++)
            <?php
                foreach ($despesas as $d ) {
                    if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes == $i){

                        if(empty($valoresRenda[$i])){
                            $valoresRenda[$i] = $d->rendas;
                        } else if(!empty($valoresRenda[$i])){
                            $valoresRenda[$i] += $d->rendas;
                        }

                        if(empty($valoresElet[$i])){
                            $valoresElet[$i] = $d->eletrecidade;
                        } else if(!empty($valoresBen[$i])){
                            $valoresElet[$i] += $d->eletrecidade;
                        }

                        if(empty($valoresAgua[$i])){
                            $valoresAgua[$i] = $d->agua;
                        } else if(!empty($valoresAgua[$i])){
                            $valoresAgua[$i] += $d->agua;
                        }

                        if(empty($valoresCons[$i])){
                            $valoresCons[$i] = $d->consumiveis;
                        } else if(!empty($valoresCons[$i])){
                            $valoresCons[$i] += $d->consumiveis;
                        }

                        if(empty($valoresManu[$i])){
                            $valoresManu[$i] = $d->manutencao;
                        } else if(!empty($valoresManu[$i])){
                            $valoresManu[$i] += $d->manutencao;
                        }

                        if(empty($valoresEquip[$i])){
                            $valoresEquip[$i] = $d->equipamentos;
                        } else if(!empty($valoresEquip[$i])){
                            $valoresEquip[$i] += $d->equipamentos;
                        }

                        if(empty($valoresOutros[$i])){
                            $valoresOutros[$i] = $d->outras;
                        } else if(!empty($valoresOutros[$i])){
                            $valoresOutros[$i] += $d->outras;
                        }

                        if(empty($valoresTotalD[$i])){
                            $valoresTotalD[$i] = $d->rendas + $d->eletrecidade + $d->consumiveis + $d->manutencao + $d->equipamentos + $d->outras;
                        } else if(!empty($valoresTotalD[$i])){
                            $valoresTotalD[$i] += $d->rendas + $d->eletrecidade + $d->consumiveis + $d->manutencao + $d->equipamentos + $d->outras;
                        }

                    }
                    if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresRenda[$i])){
                        $valoresRenda[$i] = 0;
                    }
                    if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresElet[$i])){
                        $valoresElet[$i] = 0;
                    }
                    if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresAgua[$i])){
                        $valoresAgua[$i] = 0;
                    }
                    if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresCons[$i])){
                        $valoresCons[$i] = 0;
                    }
                    if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresManu[$i])){
                        $valoresManu[$i] = 0;
                    }
                    if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresEquip[$i])){
                        $valoresEquip[$i] = 0;
                    }
                    if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresOutros[$i])){
                        $valoresOutros[$i] = 0;
                    }
                    if(isset($_POST['ano']) && $d->ano == $_POST['ano'] && $d->mes != $i && empty($valoresTotalD[$i])){
                        $valoresTotalD[$i] = 0;
                    }
                }
            ?>
        @endfor
        <?php array_shift($valoresRenda); array_shift($valoresElet); array_shift($valoresAgua); array_shift($valoresCons); array_shift($valoresManu); array_shift($valoresEquip); array_shift($valoresOutros); array_shift($valoresTotalD);?>

            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Renda" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Despesa da Renda</h6>
                        <p class="text-sm "> Valor (em Euros)</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Elet" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Despesa da Eletrecidade</h6>
                        <p class="text-sm "> Valor (em Euros)</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Agua" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Despesa da Agua</h6>
                        <p class="text-sm "> Valor (em Euros)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Cons" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Despesa dos Consumiveis</h6>
                        <p class="text-sm "> Valor (em Euros)</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Manu" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Despesa da Manutenção</h6>
                        <p class="text-sm "> Valor (em Euros)</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Equip" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Despesa dos Equipamentos </h6>
                        <p class="text-sm "> Valor (em Euro)</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Outros" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Outras Despesas</h6>
                        <p class="text-sm "> Valor (em Euros)</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-TotalD" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Total das Despesas </h6>
                        <p class="text-sm "> Valor (em Euros)</p>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Agua" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Donativos Consumiveis </h6>
                        <p class="text-sm "> Comida doada (em Quilogramas)</p>
                    </div>
                </div>
            </div> --}}


        </div>
    </div>
</div>

<script src="/assets/js/plugins/chartjs.min.js"></script>

<script>
    var Renda = document.getElementById("chart-Renda").getContext("2d");

    new Chart(Renda, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Renda",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [<?php echo join(',', $valoresRenda); ?>],
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

    var Elet = document.getElementById("chart-Elet").getContext("2d");

    new Chart(Elet, {
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
            data: [<?php echo join(',', $valoresElet); ?>],
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

var Agua = document.getElementById("chart-Agua").getContext("2d");

new Chart(Agua, {
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
            data: [<?php echo join(',', $valoresAgua); ?>],
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

var Cons = document.getElementById("chart-Cons").getContext("2d");

new Chart(Cons, {
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
            data: [<?php echo join(',', $valoresCons); ?>],
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

var Manu = document.getElementById("chart-Manu").getContext("2d");

new Chart(Manu, {
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
        data: [<?php echo join(',', $valoresManu); ?>],
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

var Equip = document.getElementById("chart-Equip").getContext("2d");

new Chart(Equip, {
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
        data: [<?php echo join(',', $valoresEquip); ?>],
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


var Outros = document.getElementById("chart-Outros").getContext("2d");

new Chart(Outros, {
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
            data: [<?php echo join(',', $valoresOutros); ?>],
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

var TotalD = document.getElementById("chart-TotalD").getContext("2d");

new Chart(TotalD, {
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
        data: [<?php echo join(',', $valoresTotalD); ?>],
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

</script>

@endsection

