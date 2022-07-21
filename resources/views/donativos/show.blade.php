@extends('layouts.outer');

@section('content')

<?php $valoresDin[] = 0; $valoresNPer[] = 0; $valoresCon[] = 0; ?>
@for ($i = 1; $i <= 12; $i++)
    <?php
        foreach ($donativosG as $d ) {
            if(isset($_POST['ano']) && $d->mes == $i){

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
            if(!isset($_POST['ano']) && $d->mes == $i){

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
            if($d->mes != $i && empty($valoresDin[$i])){
                $valoresDin[$i] = 0;
            }
            if($d->mes != $i && empty($valoresNPer[$i])){
                $valoresNPer[$i] = 0;
            }
            if($d->mes != $i && empty($valoresCon[$i])){
                $valoresCon[$i] = 0;
            }
        }
    ?>
@endfor
<?php array_shift($valoresDin); array_shift($valoresNPer); array_shift($valoresCon); ?>


<div class="container">
    <div class="rowjustify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">{{ __('Donativos') }}</h4>
                    <div class="col-lg-2">
                        <form role="form" method="post" action="/donativos/show" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="mes" class="font-weight-bold h6">Escolha um mês:</label>
                            </div>

                            <div class="">
                                <select name="mes" id="mes" class="form-select form-select-sm text-center">
                                    @for ($i = 1; $i <= 12; $i++)

                                    @if ($i == date('m') - 1)
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                    @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endif
                                    @endfor
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary mt-xl-2" name="btnPesquisar">Pesquisar</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Valor dos Donativos monetários</p>
                                    <?php $totalD = 0;?>
                                    <h4 class="mb-0"> @foreach ($donativos as $d)
                                        <?php  $totalD += $d->valorDinheiro?>
                                        @endforeach
                                        {{ $totalD }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3%
                                    </span>than lask month</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Valor dos donativos em alimentos não Perecíveis</p>
                                    <?php $totalNP = 0;?>
                                    <h4 class="mb-0"> @foreach ($donativos as $d)
                                        <?php  $totalNP += $d->valorNaoPerciveis?>
                                        @endforeach
                                        {{ $totalNP }}</h4>
                                    </h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span>
                                    than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Valor dos donativos em consumíveis</p>
                                    <?php $totalC = 0;?>
                                    <h4 class="mb-0"> @foreach ($donativos as $d)
                                        <?php  $totalC += $d->valorConsumiveis?>
                                        @endforeach
                                        {{ $totalC }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55%
                                    </span>than lask week</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <form role="form" method="post" action="/donativos/show" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <p class="text-center mt-xl-4 mb-xl-4 h4">Consulte os dados anuais</p>
                        <div class="col-sm-1 text-center">
                                <div class="mt-2 ml-2">
                                    <label for="ano" class="font-weight-bold h6">Ano: </label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <select class="form-control text-center" name="ano" id="ano">
                                    <option value="DO" selected="selected" disabled>Selecionar Ano</option>
                                    @for ($i = 2016; $i <= date("Y"); $i++)
                                    @if ($i == date('Y') - 1)
                                    <option value="{{ $i }}" selected>{{ $i }}</option>
                                    @else
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endif
                                    @endfor
                                    </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <input class="btn btn-primary" type="submit" name="submit" value="Visualizar grafico">
                        </div>
                    </div>
                </form>

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
