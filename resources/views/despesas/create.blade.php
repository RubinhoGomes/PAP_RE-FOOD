@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title text-center">Registar Nova Despesa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/despesas" enctype="multipart/form-data">
                  @csrf

                  <div class="card-body">

                    <div class="row">

                    <!-- Valor da Renda -->
                    <div class="form-group col-lg-3">
                        <label for="valRenda">Valor da Renda</label>
                        <input type="number" class="form-control border text-center" id="valRenda" name="valRenda" placeholder="Insira o valor da renda" value="{{ old('valRenda') }}">
                        @error('valRenda')
                            <p class="text-danger">{{ $errors->first('valRenda') }} </p>
                        @enderror
                      </div>

                    <!-- Valor da eletrecidade -->
                    <div class="form-group col-lg-3">
                        <label for="valElec">Valor da Eletrecidade</label>
                        <input type="number" class="form-control border text-center" id="valElec" name="valElec" placeholder="Insira o valor da eletrecidade" value="{{ old('valElec') }}">
                        @error('valElec')
                            <p class="text-danger">{{ $errors->first('valElec') }} </p>
                        @enderror
                      </div>
                    <!-- Valor da agua -->
                    <div class="form-group col-lg-3">
                        <label for="valAgua">Valor da Água</label>
                        <input type="number" class="form-control border text-center" id="valAgua" name="valAgua" placeholder="Insira o valor da água" value="{{ old('valAgua') }}">
                        @error('valAgua')
                            <p class="text-danger">{{ $errors->first('valAgua') }} </p>
                        @enderror
                      </div>


                    </div>

                    <div class="row">

                    <!-- Valor dos consumiveis -->
                    <div class="form-group col-lg-3">
                        <label for="valCons">Valor dos Consumíveis</label>
                        <input type="number" class="form-control border text-center" id="valCons" name="valCons" placeholder="Insira o valor dos consumíveis" value="{{ old('valCons') }}">
                        @error('valCons')
                            <p class="text-danger">{{ $errors->first('valCons') }} </p>
                        @enderror
                      </div>


                        <!-- Valor da manutenção -->
                        <div class="form-group col-lg-3">
                            <label for="valManu">Valor da Manutenção</label>
                            <input type="number" class="form-control border text-center" id="valManu" name="valManu" placeholder="Insira o valor da manutenção" value="{{ old('valManu') }}">
                            @error('valManu')
                                <p class="text-danger">{{ $errors->first('valManu') }} </p>
                            @enderror
                          </div>
                        <!-- Valor dos equipamentos -->
                        <div class="form-group col-lg-3">
                            <label for="valEquip">Valor dos Equipamentos</label>
                            <input type="number" class="form-control border text-center" id="valEquip" name="valEquip" placeholder="Insira o valor dos equipamentos" value="{{ old('valEquip') }}">
                            @error('valEquip')
                                <p class="text-danger">{{ $errors->first('valEquip') }} </p>
                            @enderror
                          </div>


                    </div>
                    <div class="row">

                        <!-- Valor dos outros -->
                        <div class="form-group col-lg-3">
                            <label for="valOutros">Valor dos Outros</label>
                            <input type="number" class="form-control border text-center" id="valOutros" name="valOutros" placeholder="Insira o valor das outras despesas" value="{{ old('valOutros') }}">
                            @error('valOutros')
                                <p class="text-danger">{{ $errors->first('valOutros') }} </p>
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
                                    <input type="number" class="form-control border text-center mx-2" id="ano" name="ano" min="1912" max="<?php echo date("Y"); ?>" placeholder="Insira o ano" value="{{ date('Y') }}">
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
