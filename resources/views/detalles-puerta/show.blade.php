@extends('layouts.app')

@section('template_title')
    {{ $detallesPuerta->name ?? __('Show') . " " . __('Detalles Puerta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalles Puerta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('detalles-puertas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Pedido:</strong>
                                    {{ $detallesPuerta->id_pedido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Funcionamiento:</strong>
                                    {{ $detallesPuerta->id_tipo_funcionamiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Control:</strong>
                                    {{ $detallesPuerta->id_tipo_control }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Puerta:</strong>
                                    {{ $detallesPuerta->id_tipo_puerta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Marca:</strong>
                                    {{ $detallesPuerta->marca }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Voltaje:</strong>
                                    {{ $detallesPuerta->voltaje }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Patin Retractil:</strong>
                                    {{ $detallesPuerta->id_patin_retractil }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
