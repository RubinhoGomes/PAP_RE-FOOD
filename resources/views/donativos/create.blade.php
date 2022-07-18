@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title text-center">Registrar Novo Donativo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/donativos" enctype="multipart/form-data">
                  @csrf

                  <div class="card-body">

                    <div class="row">

                        <!-- Valor dos donativos -->
                        <div class="form-group col-lg-3">
                            <label for="valDon">Valor dos donativos</label>
                            <input type="number" class="form-control border text-center" id="valDon" name="valDon" placeholder="Insira o valor dos donativos" value="{{ old('valDon') }}">
                            @error('valDon')
                                <p class="text-danger">{{ $errors->first('valDon') }} </p>
                            @enderror
                        </div>
                        <!-- Valor alimentos não perecíveis -->
                        <div class="form-group col-lg-3">
                            <label for="valNPer">Valor dos alimentos não perciveis</label>
                            <input type="number" class="form-control border text-center" id="valNPer" name="valNPer" placeholder="Insira o valor dos alimentos não percíveis" value="{{ old('valNPer') }}">
                            @error('valNPer')
                                <p class="text-danger">{{ $errors->first('valNPer') }} </p>
                            @enderror
                        </div>
                        <!-- Valor dos consumiveis -->
                        <div class="form-group col-lg-3">
                            <label for="valCons">Valor dos consumíveis</label>
                            <input type="number" class="form-control border text-center" id="valCons" name="valCons" placeholder="Insira o valor dos consumíveis" value="{{ old('valCons') }}">
                            @error('valCons')
                                <p class="text-danger">{{ $errors->first('valCons') }} </p>
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
