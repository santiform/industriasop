@extends('layouts.app')

@section('template_title')
    Tipos Controles
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipos Controles') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipos-controles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        
									<th >Id Tipo Funcionamiento</th>
									<th >Nombre</th>
									<th >Marca</th>
									<th >Voltaje</th>
									<th >Potencia</th>
									<th >Encoder</th>
									<th >Rescate</th>

                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiposControles as $tiposControle)
                                        <tr>
                                            <td>{{ $tiposControle->id }}</td>
                                            
										<td >{{ $tiposControle->tipo_funcionamiento }}</td>
										<td >{{ $tiposControle->nombre }}</td>
										<td >{{ $tiposControle->marca }}</td>
										<td >{{ $tiposControle->voltaje }}</td>
										<td >{{ $tiposControle->potencia }}</td>
										<td >{{ $tiposControle->encoder }}</td>
										<td >{{ $tiposControle->rescate }}</td>

                                            <td>
                                                <form action="{{ route('tipos-controles.destroy', $tiposControle->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipos-controles.show', $tiposControle->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipos-controles.edit', $tiposControle->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> Borrar</button>
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
