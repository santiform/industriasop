@extends('layouts.app')

@section('template_title')
    {{ $pedido->name ?? __('Show') . " " . __('Pedido') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Obra:</strong>
                                    {{ $pedido->id_tipo_obra }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Funcionamiento:</strong>
                                    {{ $pedido->id_tipo_funcionamiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Control:</strong>
                                    {{ $pedido->id_tipo_control }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Puerta:</strong>
                                    {{ $pedido->id_tipo_puerta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Acceso:</strong>
                                    {{ $pedido->id_acceso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $pedido->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $pedido->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $pedido->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion Obra:</strong>
                                    {{ $pedido->direccion_obra }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
