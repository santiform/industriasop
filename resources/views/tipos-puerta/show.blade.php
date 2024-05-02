@extends('layouts.app')

@section('template_title')
    {{ $tiposPuerta->name ?? __('Show') . " " . __('Tipos Puerta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipos Puerta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tipos-puertas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Funcionamiento:</strong>
                                    {{ $tiposPuerta->id_tipo_funcionamiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Control:</strong>
                                    {{ $tiposPuerta->id_tipo_control }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $tiposPuerta->nombre }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
