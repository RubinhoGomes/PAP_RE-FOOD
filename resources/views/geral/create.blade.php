@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title text-center">Registrar Novos Dados</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/geral" enctype="multipart/form-data">
                  @csrf

                  <div class="card-body">

                    <div class="row">

                        <!-- Valor dos Beneficiarios -->
                        <div class="form-group col-lg-3">
                            <label for="valBen">Beneficiários</label>
                            <input type="number" class="form-control border text-center" id="valBen" name="valBen" placeholder="Insira o valor dos donativos" value="{{ old('valBen') }}">
                            @error('valBen')
                                <p class="text-danger">{{ $errors->first('valBen') }} </p>
                            @enderror
                        </div>
                        <!-- Valor das Familias -->
                        <div class="form-group col-lg-3">
                            <label for="valFam">Famílias</label>
                            <input type="number" class="form-control border text-center" id="valFam" name="valFam" placeholder="Insira o valor dos alimentos não percíveis" value="{{ old('valFam') }}">
                            @error('valFam')
                                <p class="text-danger">{{ $errors->first('valFam') }} </p>
                            @enderror
                        </div>
                        <!-- Valor dos Voluntarios -->
                        <div class="form-group col-lg-3">
                            <label for="valVol">Voluntários</label>
                            <input type="number" class="form-control border text-center" id="valVol" name="valVol" placeholder="Insira o valor dos consumíveis" value="{{ old('valVol') }}">
                            @error('valVol')
                                <p class="text-danger">{{ $errors->first('valVol') }} </p>
                            @enderror
                        </div>

                        <!-- Valor das Fontes de Alimentos -->
                        <div class="form-group col-lg-3">
                            <label for="valFonA">Fontes de Alimentos</label>
                            <input type="number" class="form-control border text-center" id="valFonA" name="valFonA" placeholder="Insira o valor dos donativos" value="{{ old('valFonA') }}">
                            @error('valFonA')
                                <p class="text-danger">{{ $errors->first('valFonA') }} </p>
                            @enderror
                        </div>
                        <!-- Valor dos Parceiros Sociais -->
                        <div class="form-group col-lg-3">
                            <label for="valParS">Parceiros Sociais</label>
                            <input type="number" class="form-control border text-center" id="valParS" name="valParS" placeholder="Insira o valor dos alimentos não percíveis" value="{{ old('valParS') }}">
                            @error('valParS')
                                <p class="text-danger">{{ $errors->first('valParS') }} </p>
                            @enderror
                        </div>
                        <!-- Valor das Associações -->
                        <div class="form-group col-lg-3">
                            <label for="valAssP">Associações Parceiras</label>
                            <input type="number" class="form-control border text-center" id="valAssP" name="valAssP" placeholder="Insira o valor dos consumíveis" value="{{ old('valAssP') }}">
                            @error('valAssP')
                                <p class="text-danger">{{ $errors->first('valAssP') }} </p>
                            @enderror
                        </div>


                    </div>


                   <!-- Data -->
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-2 d-flex align-items-center mt-2">
                                <label for="kgAssoc2">Mês:</label>
                                <input type="number" class="form-control border text-center mx-2" id="mes" name="mes" min="1" max="12" placeholder="Insira o mês" value="{{ date('m') }}">
                            </div>
                            <div class="col-lg-2 d-flex align-items-center mt-2">
                                <label for="kgAssoc2">Ano:</label>
                                <input type="number" class="form-control border text-center mx-2" id="ano" name="ano" min="2016" max="<?php echo date("Y"); ?>" placeholder="Insira o ano" value="{{ date('Y') }}">
                            </div>
                        </div>
                    </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="btnCriar">Criar</button>
                    <button type="button" class="btn btn-warning" name="btnLimpar" id="btnLimpar">Limpar</button>
                  </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
