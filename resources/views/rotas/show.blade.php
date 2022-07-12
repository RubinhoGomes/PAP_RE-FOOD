@extends('layouts.outer');

@section('content')

<div class="container">
    <div class="rowjustify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="text-center">{{ __('Rotas') }}</h4>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="mes">Mês: </label>
                            </div>
                        <div class="form-group col-md-3">
                            <select class="form-control select2" name="mes" id="mes" style="width: 100%;">
                            <option value="DO" selected="selected" disabled>Selecione um mês</option>
                            @foreach ($rotas as $rota)
                            <?php $data = explode("-", $rota->data) ?>
                            @if ($rota->first()->id == $rota->id)
                            <option value="{{ $rota->id }}" selected>{{ $data[0]}}-{{ $data[1] }}</option>

                            @else
                            <option value="{{ $rota->id }}">{{ $data[0]}}-{{ $data[1] }}</option>

                            @endif

                            @endforeach
                            </select>
                            @error('mes')
                            <p class="text-danger">{{ $errors->mes }} </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Total de Rotas</p>
                                    <h4 class="mb-0">
                                    {{ $rotas->count() }}</h4>
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
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Total da Carrinha Branca</p>
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
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Total da Carrinha Vermelha</p>
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
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Total Km Percorridos</p>
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
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Total Km Carrinha Branca</p>
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
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Total Km Carrinha Vermelha</p>
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
                <form role="form" method="post" action="/rotas/rotas" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-1">
                            <label for="ano">Ano: </label>
                        </div>
                        <div class="form-group col-md-2">
                        <select class="form-control select2" name="ano" id="ano" style="width: 100%;">
                        <option value="DO" selected="selected" disabled>Selecione um Ano</option>
                        @for ($i = 1912; $i <= date("Y"); $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor ($rotas as $rota)

                        </select>
                        @error('ano')
                        <p class="text-danger">{{ $errors->ano }} </p>
                        @enderror
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-1">
                            <label for="mes">Mes: </label>
                        </div>
                        <div class="form-group col-md-2">
                        <select class="form-control select2" name="mes" id="mes" style="width: 100%;">
                        <option value="DO" selected="selected" disabled>Selecione um mês</option>
                        @for ($i = 1; $i <= 12.2; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor ($rotas as $rota)

                        </select>
                        @error('mes')
                        <p class="text-danger">{{ $errors->mes }} </p>
                        @enderror
                    </div> --}}
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <input class="btn btn-primary" type="submit" name="submit" value="Visualizar grafico">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
