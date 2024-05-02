@extends('layouts.app')

@section('template_title')
    Detalles Puertas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalles Puertas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalles-puertas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
									<th >Id Pedido</th>
									<th >Id Tipo Funcionamiento</th>
									<th >Id Tipo Control</th>
									<th >Id Tipo Puerta</th>
									<th >Marca</th>
									<th >Voltaje</th>
									<th >Id Patin Retractil</th>

                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detallesPuertas as $detallesPuerta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $detallesPuerta->id_pedido }}</td>
										<td >{{ $detallesPuerta->id_tipo_funcionamiento }}</td>
										<td >{{ $detallesPuerta->id_tipo_control }}</td>
										<td >{{ $detallesPuerta->id_tipo_puerta }}</td>
										<td >{{ $detallesPuerta->marca }}</td>
										<td >{{ $detallesPuerta->voltaje }}</td>
										<td >{{ $detallesPuerta->id_patin_retractil }}</td>

                                            <td>
                                                <form action="{{ route('detalles-puertas.destroy', $detallesPuerta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalles-puertas.show', $detallesPuerta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalles-puertas.edit', $detallesPuerta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $detallesPuertas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
