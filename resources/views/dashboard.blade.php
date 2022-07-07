@extends('layouts.app')

@section('content')
<div class="container">
    <div class="rowjustify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="text-center">{{ __('Administração') }}</h4>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="mes">Mês</label>
                            <select class="form-control select2" name="mes" id="mes" style="width: 100%;">
                            <option value="DO" selected="selected" disabled>Selecione um mês</option>
                            @foreach ($geral as $gerals)

                            @if ($gerals->id == $gerals->first()->id)
                            <option value="{{ $gerals->id }}" selected>{{ $gerals->mes }}/{{ $gerals->ano }}</option>
                            @else
                            <option value="{{ $gerals->id }}">{{ $gerals->mes }}/{{ $gerals->ano }}</option>
                            @endif

                            @endforeach
                            </select>
                            @error('mes')
                            <p class="text-danger">{{ $errors->first('mes') }} </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Beneficiários</p>
                                    <h4 class="mb-0">
                                    {{ $geral->first()->numBeneficiarios }}</h4>
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
                                    <i class="fas fa-house-user"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Famílias</p>
                                    <?php $valorFam = 0;?>
                                    <h4 class="mb-0">
                                        {{ $geral->first()->numFamilias }}
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
                                    <i class="fas fa-people-carry"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Voluntários</p>
                                    <h4 class="mb-0">
                                        {{ $geral->first()->numVoluntarios}}
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
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Parceiros Sociais</p>
                                    <?php $valorParcS = 0;?>
                                    <h4 class="mb-0">
                                        {{ $geral->first()->numParceirosSociais}}
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
                                    <i class="fa fa-apple-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Fontes de Alimentos</p>
                                    <h4 class="mb-0">
                                        {{ $geral->first()->numFontesAlimentos }}
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
                                    <i class="fa fa-handshake"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Associações Parceiras</p>
                                    <h4 class="mb-0">
                                        {{ $geral->first()->numAssociacoesParceiras }}
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
