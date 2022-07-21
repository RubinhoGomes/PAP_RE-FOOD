@extends('layouts.app')

@section('content')
<div class="container">
    <div class="rowjustify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="text-center">{{ __('Administração') }}</h4>
                    <div class="col-lg-2">
                        <form role="form" method="post" action="/dashboard" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="mes" class="font-weight-bold h6">Escolha um mês:</label>
                            </div>

                            <div class="">
                                <select name="mes" id="mes" class="form-select form-select-sm">
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
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Beneficiários</p>
                                    <?php $valorBenef = 0;?>
                                    <h4 class="mb-0">@foreach ($geral as $gerals)
                                        <?php  $valorBenef += $gerals->numBeneficiarios?>
                                        @endforeach
                                        {{ $valorBenef }}</h4>
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
                                    <i class="fas fa-house-user"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Famílias</p>
                                    <?php $valorFam = 0;?>
                                    <h4 class="mb-0"> @foreach ($geral as $gerals)
                                        <?php  $valorFam += $gerals->numFamilias?>
                                        @endforeach
                                        {{ $valorFam }}</h4>
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
                                    <i class="fas fa-people-carry"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Voluntários</p>
                                    <?php $valorVol = 0;?>
                                    <h4 class="mb-0"> @foreach ($geral as $gerals)
                                        <?php  $valorVol += $gerals->numVoluntarios?>
                                        @endforeach
                                        {{ $valorVol }}</h4>
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
                                    <i class="fa fa-apple-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Fontes de Alimentos</p>
                                    <?php $valorFontesA = 0;?>
                                    <h4 class="mb-0"> @foreach ($geral as $gerals)
                                        <?php  $valorFontesA += $gerals->numFontesAlimentos?>
                                        @endforeach
                                        {{ $valorFontesA }}</h4>
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
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Parceiros Sociais</p>
                                    <?php $valorParcS = 0;?>
                                    <h4 class="mb-0">@foreach ($geral as $gerals)
                                        <?php  $valorParcS += $gerals->numParceirosSociais?>
                                        @endforeach
                                        {{ $valorParcS }}</h4>
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
                                    <i class="fa fa-handshake"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Associações Parceiras</p>
                                    <?php $valorAssoc = 0;?>
                                    <?php $valorAssocP = 0;?>
                                    <h4 class="mb-0"> @foreach ($geral as $gerals)
                                        <?php  $valorAssocP += $gerals->numAssociacoesParceiras?>
                                        @endforeach
                                        {{ $valorAssocP }}</h4>
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
            </div>
        </div>
    </div>
</div>
@endsection
