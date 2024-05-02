@extends('layouts.app')

@section('template_title')
    {{ $detallesGenerale->name ?? __('Show') . " " . __('Detalles Generale') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalles Generale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('detalles-generales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Pedido:</strong>
                                    {{ $detallesGenerale->id_pedido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Placa Cabina:</strong>
                                    {{ $detallesGenerale->placa_cabina }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Indicador Cabina:</strong>
                                    {{ $detallesGenerale->indicador_cabina }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Indicador Pb:</strong>
                                    {{ $detallesGenerale->indicador_pb }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Indicador Palier:</strong>
                                    {{ $detallesGenerale->indicador_palier }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
