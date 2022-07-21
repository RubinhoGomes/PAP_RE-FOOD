@extends('layouts.outer');

@section('content')

<?php $valoresRenda[] = 0; $valoresElet[] = 0; $valoresAgua[] = 0; $valoresCons[] = 0; $valoresManu[] = 0; $valoresEquip[] = 0; $valoresCombs[] = 0;$valoresOutros[] = 0; $valoresTotalD[] = 0; ?>

@for ($i = 1; $i <= 12; $i++)
<?php
    foreach ($despesasG as $d ) {
        if(isset($_POST['ano']) && $d->mes == $i){

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

            if(empty($valoresCombs[$i])){
                $valoresCombs[$i] = $d->combustivel;
            } else if(!empty($valoresCombs[$i])){
                $valoresCombs[$i] += $d->combustivel;
            }

            if(empty($valoresOutros[$i])){
                $valoresOutros[$i] = $d->outras;
            } else if(!empty($valoresOutros[$i])){
                $valoresOutros[$i] += $d->outras;
            }

            if(empty($valoresTotalD[$i])){
                $valoresTotalD[$i] = $d->rendas + $d->agua + $d->eletrecidade + $d->consumiveis + $d->manutencao + $d->equipamentos + $d->combustivel + $d->outras;
            } else if(!empty($valoresTotalD[$i])){
                $valoresTotalD[$i] += $d->rendas + $d->agua + $d->eletrecidade + $d->consumiveis + $d->manutencao + $d->equipamentos + $d->combustivel + $d->outras;
            }

        }
        if(!isset($_POST['ano']) && $d->mes == $i){
                if(empty($valoresRenda[$i])){
                    $valoresRenda[$i] = $d->rendas;
                } else if(!empty($valoresRenda[$i])){
                    $valoresRenda[$i] += $d->rendas;
                }

                if(empty($valoresElet[$i])){
                    $valoresElet[$i] = $d->eletrecidade;
                } else if(!empty($valoresElet[$i])){
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

                if(empty($valoresCombs[$i])){
                    $valoresCombs[$i] = $d->combustivel;
                } else if(!empty($valoresCombs[$i])){
                    $valoresCombs[$i] += $d->combustivel;
                }

                if(empty($valoresOutros[$i])){
                $valoresOutros[$i] = $d->outras;
            } else if(!empty($valoresOutros[$i])){
                $valoresOutros[$i] += $d->outras;
            }

                if(empty($valoresTotalD[$i])){
                    $valoresTotalD[$i] = $d->rendas + $d->agua + $d->eletrecidade + $d->consumiveis + $d->manutencao + $d->equipamentos + $d->combustivel + $d->outras;
                } else if(!empty($valoresTotalD[$i])){
                    $valoresTotalD[$i] += $d->rendas + $d->agua + $d->eletrecidade + $d->consumiveis + $d->manutencao + $d->equipamentos + $d->combustivel + $d->outras;
                }
            }
        if($d->mes != $i && empty($valoresRenda[$i])){
            $valoresRenda[$i] = 0;
        }
        if($d->mes != $i && empty($valoresElet[$i])){
            $valoresElet[$i] = 0;
        }
        if($d->mes != $i && empty($valoresAgua[$i])){
            $valoresAgua[$i] = 0;
        }
        if($d->mes != $i && empty($valoresCons[$i])){
            $valoresCons[$i] = 0;
        }
        if($d->mes != $i && empty($valoresManu[$i])){
            $valoresManu[$i] = 0;
        }
        if($d->mes != $i && empty($valoresEquip[$i])){
            $valoresEquip[$i] = 0;
        }
        if($d->mes != $i && empty($valoresCombs[$i])){
            $valoresCombs[$i] = 0;
        }
        if($d->mes != $i && empty($valoresOutros[$i])){
            $valoresTotalD[$i] = 0;
        }
        if($d->mes != $i && empty($valoresTotalD[$i])){
            $valoresTotalD[$i] = 0;
        }
    }
?>
@endfor
<?php array_shift($valoresRenda); array_shift($valoresElet); array_shift($valoresAgua); array_shift($valoresCons); array_shift($valoresManu); array_shift($valoresEquip); array_shift($valoresOutros); array_shift($valoresTotalD);?>



<div class="container">
    <div class="rowjustify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">{{ __('Despesas') }}</h4>
                    <div class="col-lg-2">
                        <form role="form" method="post" action="/despesas/show" enctype="multipart/form-data">
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
                                    <p class="text-lg mb-0 text-capitalize">Total</p>
                                    <?php $totalDG = 0;?>
                                    <h4 class="mb-0">@foreach ($despesas as $d)
                                        <?php  $totalDG += $d->rendas + $d->eletrecidade + $d->agua + $d->consumiveis + $d->manutencao + $d->equipamentos + $d->outras; ?>
                                        @endforeach
                                        {{ $totalDG }}</h4>
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
                                    <p class="text-lg mb-0 text-capitalize">Eletrecidade</p>
                                    <?php $totalE = 0;?>
                                    <h4 class="mb-0">@foreach ($despesas as $d)
                                        <?php  $totalE += $d->eletrecidade; ?>
                                        @endforeach
                                        {{ $totalE }}</h4>
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
                                    <p class="text-lg mb-0 text-capitalize">Agua</p>
                                    <?php $totalA = 0;?>
                                    <h4 class="mb-0">@foreach ($despesas as $d)
                                        <?php  $totalA += $d->agua; ?>
                                        @endforeach
                                        {{ $totalA }}</h4>
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
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Manutenção</p>
                                    <?php $totalM = 0;?>
                                    <h4 class="mb-0">@foreach ($despesas as $d)
                                        <?php  $totalM += $d->manutencao; ?>
                                        @endforeach
                                        {{ $totalM }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
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
                                    <p class="text-lg mb-0 text-capitalize">Consumiveis</p>
                                    <?php $totalC = 0;?>
                                    <h4 class="mb-0">@foreach ($despesas as $d)
                                        <?php  $totalC += $d->consumiveis; ?>
                                        @endforeach
                                        {{ $totalC }}</h4>
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
                                    <p class="text-lg mb-0 text-capitalize">Equipamentos</p>
                                    <?php $totalEq = 0;?>
                                    <h4 class="mb-0">@foreach ($despesas as $d)
                                        <?php  $totalEq += $d->equipamentos; ?>
                                        @endforeach
                                        {{ $totalEq }}</h4>
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
                                    <p class="text-lg mb-0 text-capitalize">Renda</p>
                                    <?php $totalR = 0;?>
                                    <h4 class="mb-0">@foreach ($despesas as $d)
                                        <?php  $totalR += $d->rendas; ?>
                                        @endforeach
                                        {{ $totalR }}</h4>
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
                                    <p class="text-lg mb-0 text-capitalize">Combustível</p>
                                    <?php $totalCb = 0;?>
                                    <h4 class="mb-0">@foreach ($despesas as $d)
                                        <?php  $totalCb += $d->combustivel; ?>
                                        @endforeach
                                        {{ $totalCb }}</h4>
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
                                    <p class="text-lg mb-0 text-capitalize">Outras Despesas</p>
                                    <?php $totalO = 0;?>
                                    <h4 class="mb-0">@foreach ($despesas as $d)
                                        <?php  $totalO += $d->outras; ?>
                                        @endforeach
                                        {{ $totalO }}</h4>
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
                <form role="form" method="post" action="/despesas/show" enctype="multipart/form-data">
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
                                        <canvas id="chart-Renda" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Renda</h6>
                                <p class="text-sm "> Valor (em Euros)</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-4 mb-4">
                        <div class="card z-index-2  ">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <div class="chart">
                                        <canvas id="chart-Elet" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Eletrecidade</h6>
                                <p class="text-sm "> Valor (em Euros)</p>
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
                                        <canvas id="chart-Agua" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Agua</h6>
                                <p class="text-sm "> Valor (em Euros)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mt-4 mb-4">
                        <div class="card z-index-2  ">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <div class="chart">
                                        <canvas id="chart-Cons" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Consumiveis</h6>
                                <p class="text-sm "> Valor (em Euros)</p>
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
                                        <canvas id="chart-Manu" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Manutenção</h6>
                                <p class="text-sm "> Valor (em Euros)</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-4 mb-4">
                        <div class="card z-index-2  ">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <div class="chart">
                                        <canvas id="chart-Equip" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Equipamentos </h6>
                                <p class="text-sm "> Valor (em Euro)</p>
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
                                        <canvas id="chart-Combs" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Combústivel</h6>
                                <p class="text-sm "> Valor (em Euros)</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-4 mb-4">
                        <div class="card z-index-2  ">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <div class="chart">
                                        <canvas id="chart-TotalD" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Total das Despesas </h6>
                                <p class="text-sm "> Valor (em Euros)</p>
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
                                        <canvas id="chart-Outros" class="chart-canvas" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-0 "> Outras Despesas</h6>
                                <p class="text-sm "> Valor (em Euros)</p>
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


var Combs = document.getElementById("chart-Combs").getContext("2d");

new Chart(Combs, {
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
            data: [<?php echo join(',', $valoresCombs); ?>],
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
