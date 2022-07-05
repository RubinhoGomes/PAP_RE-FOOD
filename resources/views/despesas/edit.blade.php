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
              <form role="form" action="/despesas/{{ $despesas->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <!-- Valor da eletrecidade -->
                    <div class="form-group">
                        <label for="valElec">Valor da Eletrecidade</label>
                        <input type="number" class="form-control" id="valElec" name="valElec" placeholder="Insira o valor da eletrecidade" value="{{ $despesas->eletrecidade }}">
                        @error('valElec')
                            <p class="text-danger">{{ $errors->first('valElec') }} </p>
                        @enderror
                      </div>
                    <!-- Valor da agua -->
                    <div class="form-group">
                        <label for="valAgua">Valor da Água</label>
                        <input type="number" class="form-control" id="valAgua" name="valAgua" placeholder="Insira o valor da água" value="{{ $despesas->agua }}">
                        @error('valAgua')
                            <p class="text-danger">{{ $errors->first('valAgua') }} </p>
                        @enderror
                      </div>
                    <!-- Valor dos consumiveis -->
                    <div class="form-group">
                        <label for="valCons">Valor dos Consumíveis</label>
                        <input type="number" class="form-control" id="valCons" name="valCons" placeholder="Insira o valor dos consumíveis" value="{{ $despesas->consumiveis }}">
                        @error('valCons')
                            <p class="text-danger">{{ $errors->first('valCons') }} </p>
                        @enderror
                      </div>
                        <!-- Valor da manutenção -->
                          <div class="form-group">
                            <label for="valManu">Valor da Manutenção</label>
                            <input type="number" class="form-control" id="valManu" name="valManu" placeholder="Insira o valor da manutenção" value="{{ $despesas->manutencao }}">
                            @error('valManu')
                                <p class="text-danger">{{ $errors->first('valManu') }} </p>
                            @enderror
                          </div>
                        <!-- Valor dos equipamentos -->
                        <div class="form-group">
                            <label for="valEquip">Valor dos Equipamentos</label>
                            <input type="number" class="form-control" id="valEquip" name="valEquip" placeholder="Insira o valor dos equipamentos" value="{{ $despesas->equipamentos }}">
                            @error('valEquip')
                                <p class="text-danger">{{ $errors->first('valEquip') }} </p>
                            @enderror
                          </div>
                        <!-- Valor dos outros -->
                        <div class="form-group">
                            <label for="valOutros">Valor dos Outros</label>
                            <input type="number" class="form-control" id="valOutros" name="valOutros" placeholder="Insira o valor das outras despesas" value="{{ $despesas->outras }}">
                            @error('valOutros')
                                <p class="text-danger">{{ $errors->first('valOutros') }} </p>
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
                                <input type="number" class="col-md-2" id="mes" name="mes" min="1" max="12" placeholder="Insira o mês" value="{{ $despesas->mes }}">
                                <input type="number" class="col-md-2" id="ano" name="ano" min="1912" max="<?php echo date("Y"); ?>" placeholder="Insira o ano" value="{{ $despesas->ano }}">
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
