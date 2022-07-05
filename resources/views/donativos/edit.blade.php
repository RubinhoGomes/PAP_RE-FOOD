@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title text-center">Editar Refeição</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/donativos/{{ $donativos->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <!-- Valor dos donativos -->
                    <div class="form-group">
                        <label for="valDon">Valor dos donativos</label>
                        <input type="number" class="form-control" id="valDon" name="valDon" placeholder="Insira o valor dos donativos" value="{{ $donativos->valorDinheiro }}">
                        @error('valDon')
                            <p class="text-danger">{{ $errors->first('valDon') }} </p>
                        @enderror
                      </div>
                    <!-- Valor alimentos não perecíveis -->
                    <div class="form-group">
                        <label for="valNPer">Valor dos alimentos não perciveis</label>
                        <input type="number" class="form-control" id="valNPer" name="valNPer" placeholder="Insira o valor dos alimentos não percíveis" value="{{ $donativos->valorNaoPerciveis }}">
                        @error('valNPer')
                            <p class="text-danger">{{ $errors->first('valNPer') }} </p>
                        @enderror
                      </div>
                    <!-- Valor dos consumiveis -->
                    <div class="form-group">
                        <label for="valCons">Valor dos consumíveis</label>
                        <input type="number" class="form-control" id="valCons" name="valCons" placeholder="Insira o valor dos consumíveis" value="{{ $donativos->valorConsumiveis }}">
                        @error('valCons')
                            <p class="text-danger">{{ $errors->first('valCons') }} </p>
                        @enderror
                      </div>
                   <!-- Data -->
                    <div class="form-group">
                        <label for="data">Data</label>
                        {{-- <input type="date" class="form-control" id="data" name="data" value="{{ old('data') }}">
                        @error('data')
                             <p class="text-danger">{{ $errors->first('data') }} </p>
                        @enderror --}}
                        <div class="row">
                            <input type="number" class="col-md-2" id="mes" name="mes" min="1" max="12" placeholder="Insira o mês" value="{{ $donativos->mes }}">
                            <input type="number" class="col-md-2" id="ano" name="ano" min="1912" max="<?php echo date("Y"); ?>" placeholder="Insira o ano" value="{{ $donativos->ano }}">
                        </div>
                    </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="btnEditar">Guardar</button>
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
