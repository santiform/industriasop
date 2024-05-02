@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Tipos Controle
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editando <b>Tipo de control</b></span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tipos-controles.update', $tiposControle->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipos-controle.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
