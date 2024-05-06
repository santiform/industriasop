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
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Pedido:</strong>
                                    {{ $detallesPuerta->id_pedido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de funcionamiento:</strong>
                                    {{ $detallesPuerta->tipo_funcionamiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de control:</strong>
                                    {{ $detallesPuerta->tipo_control }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de puerta:</strong>
                                    {{ $detallesPuerta->tipo_puerta }}
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
                                    <strong>Patin retractil:</strong>
                                    {{ $detallesPuerta->patin_retractil }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
