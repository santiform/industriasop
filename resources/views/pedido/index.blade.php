@extends('layouts.app')

@section('template_title')
    Pedidos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fas fa-list-alt"></i> Pedidos
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Tipo Obra</th>
									<th >Tipo Funcionamiento</th>
									<th >Tipo Control</th>
									<th >Tipo Puerta</th>
                                    <th >Estado</th>
									<th >Nombre</th>
									<th >Email</th>
									<th >Telefono</th>
									<th >Direccion Obra</th>

                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <td>{{ $pedido->id }}</td>
                                            
										<td >{{ $pedido->tipo_obra }}</td>
										<td >{{ $pedido->tipo_funcionamiento }}</td>
										<td >{{ $pedido->tipo_control }}</td>
										<td >{{ $pedido->tipo_puerta }}</td>
                                        <td >{{ $pedido->estado }}</td>
										<td >{{ $pedido->nombre }}</td>
										<td >{{ $pedido->email }}</td>
										<td >{{ $pedido->telefono }}</td>
										<td >{{ $pedido->direccion_obra }}</td>

                                            <td>
                                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pedidos.show', $pedido->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pedidos.edit', $pedido->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
            </div>
        </div>
    </div>
@endsection
