@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Visualizar Grafico Rotas</p>
                    <p>Visualizar Grafico Refeição</p>
                    <p>Visualizar Grafico Donativos</p>
                    <p>Visualizar Grafico Despesas</p>
                    <p>Visualizar Grafico Carrinhas</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
