@extends('layouts.app')

@section('template_title')
    {{ $habilitacionesAcceso->name ?? __('Show') . " " . __('Habilitaciones Acceso') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Habilitaciones Acceso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('habilitaciones-accesos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Pedido:</strong>
                                    {{ $habilitacionesAcceso->id_pedido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Parada:</strong>
                                    {{ $habilitacionesAcceso->parada }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Salida A:</strong>
                                    {{ $habilitacionesAcceso->salida_a }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Salida B:</strong>
                                    {{ $habilitacionesAcceso->salida_b }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
