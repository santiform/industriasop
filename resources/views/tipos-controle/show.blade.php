@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">Mostrando detalles de <b>Tipo de control</b></span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de funcionamiento:</strong>
                                    {{ $tiposControle->tipo_funcionamiento }}
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
