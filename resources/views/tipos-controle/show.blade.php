@extends('layouts.app')

@section('template_title')
    {{ $tiposControle->name ?? __('Show') . " " . __('Tipos Controle') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipos Controle</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tipos-controles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Funcionamiento:</strong>
                                    {{ $tiposControle->id_tipo_funcionamiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $tiposControle->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Marca:</strong>
                                    {{ $tiposControle->marca }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Voltaje:</strong>
                                    {{ $tiposControle->voltaje }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Potencia:</strong>
                                    {{ $tiposControle->potencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Encoder:</strong>
                                    {{ $tiposControle->encoder }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rescate:</strong>
                                    {{ $tiposControle->rescate }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
