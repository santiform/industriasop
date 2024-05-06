@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Tipos Puerta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Creando nuevo Tipo de puerta</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tipos-puertas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipos-puerta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
