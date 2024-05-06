@extends('layouts.app')

@section('template_title')
    {{ $tiposObra->name ?? __('Show') . " " . __('Tipos Obra') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipos Obra</span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $tiposObra->nombre }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
