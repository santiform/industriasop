@extends('layouts.app')

@section('template_title')
    Accesos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fas fa-person-booth"></i> Accesos
                            </span>

                             <div class="float-right">
                                <a href="{{ route('accesos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <i class="fas fa-plus-circle"></i> Nuevo registro
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive ">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Id Tipo Funcionamiento</th>
									<th >Id Tipo Control</th>
									<th >Id Tipo Puerta</th>
									<th >Nombre</th>

                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accesos as $acceso)
                                        <tr>
                                            <td>{{ $acceso->id }}</td>
                                            
										<td >{{ $acceso->tipo_funcionamiento }}</td>
										<td >{{ $acceso->tipo_control }}</td>
										<td >{{ $acceso->tipo_puerta }}</td>
										<td >{{ $acceso->nombre }}</td>

                                            <td>
                                                <form action="{{ route('accesos.destroy', $acceso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('accesos.show', $acceso->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('accesos.edit', $acceso->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
