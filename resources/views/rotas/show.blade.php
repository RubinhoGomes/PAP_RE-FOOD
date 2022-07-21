@extends('layouts.outer');

@section('content')


<?php $tViag[] = 0; $totalKmG[] = 0; $tViagB[] = 0; $tViagV[] = 0; $tKmB[] = 0; $tKmV[] = 0?>
@for ($i = 1; $i <= 12; $i++)
    @foreach ($rotasG as $r)
        @if (isset($_POST['ano']) && $r->Mes == $i)
            <?php

                if(empty($totalKm[$i])){
                    $totalKmG[$i] = ($r->totalKmChegada - $r->totalKmPartida);
                }
                else{
                    $totalKmG[$i] += ($r->totalKmChegada - $r->totalKmPartida);
                }

                if(empty($tViag[$i])){
                    $tViag[$i] = $r->totalViag;
                } else {
                    $tViag[$i] += $r->totalViag;
                }

                if($r->Carrinhas->cor == 'Branca' && empty($tKmB[$i])){
                    $tKmB[$i] = ($r->totalKmChegada - $r->totalKmPartida);
                } else if($r->Carrinhas->cor == 'Branca' && !empty($tKmB[$i])){
                    $tKmB[$i] += ($r->totalKmChegada - $r->totalKmPartida);
                } else if($r->Carrinhas->cor == 'Vermelha' && empty($tKmV[$i])){
                    $tKmV[$i] = ($r->totalKmChegada - $r->totalKmPartida);
                } else if($r->Carrinhas->cor == 'Vermelha' && !empty($tKmV[$i])){
                    $tKmV[$i] += ($r->totalKmChegada - $r->totalKmPartida);
                }

                if($r->Carrinhas->cor == 'Branca' && empty($tViagB[$i])){
                    $tViagB[$i] = $r->totalViag;
                } else if($r->Carrinhas->cor == 'Branca' && !empty($tViagB[$i])){
                    $tViagB[$i] += $r->totalViag;
                } else if($r->Carrinhas->cor == 'Vermelha' && empty($tViagV[$i])){
                    $tViagV[$i] = $r->totalViag;
                } else if($r->Carrinhas->cor == 'Vermelha' && !empty($tViagB[$i])){
                    $tViagV[$i] += $r->totalViag;
                }

            ?>
        @endif
        @if (!isset($_POST['ano']) && $r->Mes == $i)
            <?php
            if(empty($totalKm[$i])){
                $totalKmG[$i] = ($r->totalKmChegada - $r->totalKmPartida);
            }
            else{
                $totalKmG[$i] += ($r->totalKmChegada - $r->totalKmPartida);
            }

            if(empty($tViag[$i])){
                $tViag[$i] = $r->totalViag;
            } else {
                $tViag[$i] += $r->totalViag;
            }

            if($r->Carrinhas->cor == 'Branca' && empty($tKmB[$i])){
                $tKmB[$i] = ($r->totalKmChegada - $r->totalKmPartida);
            } else if($r->Carrinhas->cor == 'Branca' && !empty($tKmB[$i])){
                $tKmB[$i] += ($r->totalKmChegada - $r->totalKmPartida);
            } else if($r->Carrinhas->cor == 'Vermelha' && empty($tKmV[$i])){
                $tKmV[$i] = ($r->totalKmChegada - $r->totalKmPartida);
            } else if($r->Carrinhas->cor == 'Vermelha' && !empty($tKmV[$i])){
                $tKmV[$i] += ($r->totalKmChegada - $r->totalKmPartida);
            }

            if($r->Carrinhas->cor == 'Branca' && empty($tViagB[$i])){
                $tViagB[$i] = $r->totalViag;
            } else if($r->Carrinhas->cor == 'Branca' && !empty($tViagB[$i])){
                $tViagB[$i] += $r->totalViag;
            } else if($r->Carrinhas->cor == 'Vermelha' && empty($tViagV[$i])){
                $tViagV[$i] = $r->totalViag;
            } else if($r->Carrinhas->cor == 'Vermelha' && !empty($tViagB[$i])){
                $tViagV[$i] += $r->totalViag;
            }

            ?>
        @endif

        @if ($r->Mes != $i && empty($totalKmG[$i]))
                <?php
                    $totalKmG[$i] = 0;
                ?>
        @endif

        @if ($r->Mes != $i && empty($tViag[$i]))
            <?php
                $tViag[$i] = 0;
            ?>
        @endif

        @if ($r->Mes != $i && empty($tKmB[$i]))
            <?php
                $tKmB[$i] = 0;
            ?>
        @endif

        @if ($r->Mes != $i && empty($tKmV[$i]))
            <?php
                $tKmV[$i] = 0;
            ?>
        @endif

        @if ($r->Mes != $i && empty($tViagB[$i]))
            <?php
                $tViagB[$i] = 0;
            ?>
        @endif

        @if ($r->Mes != $i && empty($tViagV[$i]))
            <?php
                $tViagV[$i] = 0;
            ?>
        @endif

    @endforeach
@endfor
<?php  array_shift($totalKmG); array_shift($tViag); array_shift($tViagB); array_shift($tViagV); array_shift($tKmB); array_shift($tKmV); ?>

<div class="container">
    <div class="rowjustify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="text-center">{{ __('Rotas') }}</h4>
                    <div class="col-lg-2">
                        <form role="form" method="post" action="/rotas/show/" enctype="multipart/form-data">
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
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Número de Viagens</p>
                                    <h4 class="mb-0">
                                    {{  $rotas->count() }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3%
                                    </span>than lask month</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Número de Viagens da Carrinha Branca</p>
                                    <?php $valorCarrinhaBranca = 0; ?>
                                    <h4 class="mb-0">
                                        @foreach ($rotas as $rota)
                                            @if ($rota->Carrinhas->cor == 'Branca')
                                                <?php $valorCarrinhaBranca++; ?>
                                            @endif
                                        @endforeach
                                        {{ $valorCarrinhaBranca }}
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
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Número de Viagens da Carrinha Vermelha</p>
                                    <?php $valorCarrinhaVermelha = 0;?>
                                    <h4 class="mb-0">
                                        @foreach ($rotas as $rota)
                                            @if ($rota->Carrinhas->cor == 'Vermelha')
                                                <?php $valorCarrinhaVermelha++; ?>
                                            @endif
                                        @endforeach
                                        {{ $valorCarrinhaVermelha }}
                                    </h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55%
                                    </span>than lask week</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mt-xl-2 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Quilómetros Percorridos</p>
                                    <?php $totalKm = 0;?>
                                    <h4 class="mb-0">
                                        @foreach ($rotas as $rota)

                                            <?php $totalKm += ($rota->kmChegada - $rota->kmPartida )?>

                                        @endforeach
                                        {{ $totalKm }}
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Quilómetros Percorridos da Carrinha Branca</p>
                                    <?php $totalKm = 0;?>
                                    <h4 class="mb-0">
                                        @foreach ($rotas as $rota)
                                            @if ($rota->Carrinhas->cor == 'Branca')
                                                <?php $totalKm += ($rota->kmChegada - $rota->kmPartida )?>
                                            @endif
                                        @endforeach
                                        {{ $totalKm }}
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Quilómetros Percorridos da Carrinha Vermelha</p>
                                    <?php $totalKm = 0;?>
                                    <h4 class="mb-0">
                                        @foreach ($rotas as $rota)
                                            @if ($rota->Carrinhas->cor == 'Vermelha')
                                                <?php $totalKm += ($rota->kmChegada - $rota->kmPartida )?>
                                            @endif
                                        @endforeach
                                        {{ $totalKm }}
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <form role="form" method="POST" action="/rotas/show" enctype="multipart/form-data">
                    {{ csrf_field() }} {{ method_field('POST') }}
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
                                        <canvas id="chart-TotalV" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Número de Viagens </h6>
                                <p class="text-sm "> Numero de viagens</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-4 mb-4">
                        <div class="card z-index-2  ">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <div class="chart">
                                        <canvas id="chart-BV" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Número de Viagens da Carrinha Branca</h6>
                                <p class="text-sm "> Numero de viagens</p>
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
                                        <canvas id="chart-VV" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Número de Viagens da Carrinha Vermelha</h6>
                                <p class="text-sm "> Numero de viagens</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-4 mb-4">
                        <div class="card z-index-2  ">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <div class="chart">
                                        <canvas id="chart-KmTotalP" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Quilómetros Percoridos </h6>
                                <p class="text-sm "> Numero de Quilómetros</p>
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
                                        <canvas id="chart-tKmB" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Quilómetros Percoridos da Carrinha Branca</h6>
                                <p class="text-sm "> Numero de Quilómetros</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-4 mb-4">
                        <div class="card z-index-2  ">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <div class="chart">
                                        <canvas id="chart-tKmV" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Quilómetros Percoridos da Carrinha Vermelha</h6>
                                <p class="text-sm "> Numero de Quilómetros</p>
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

    var TotalV = document.getElementById("chart-TotalV").getContext("2d");

    new Chart(TotalV, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Viagens",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [<?php echo join(',', $tViag); ?>],
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

    var BV = document.getElementById("chart-BV").getContext("2d");

    new Chart(BV, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Viagens",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [<?php echo join(',', $tViagB); ?>],
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

    var VV = document.getElementById("chart-VV").getContext("2d");

    new Chart(VV, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Viagens",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [<?php echo join(',', $tViagV); ?>],
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


    var KmTP = document.getElementById("chart-KmTotalP").getContext("2d");

    new Chart(KmTP, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Quilómetros",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [<?php echo join(',', $totalKmG); ?>],
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

    var tKmB = document.getElementById("chart-tKmB").getContext("2d");

    new Chart(tKmB, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Quilómetros",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [<?php echo join(',', $tKmB); ?>],
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

    var tKmV = document.getElementById("chart-tKmV").getContext("2d");

    new Chart(tKmV, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Quilómetros",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [<?php echo join(',', $tKmV); ?>],
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
