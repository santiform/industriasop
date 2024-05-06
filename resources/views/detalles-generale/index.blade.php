@extends('layouts.app')

@section('template_title')
    Detalles Generales
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fas fa-question-circle"></i> Detalles generales
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalles-generales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Placa Cabina</th>
									<th >Indicador Cabina</th>
									<th >Indicador Pb</th>
									<th >Indicador Palier</th>

                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detallesGenerales as $detallesGenerale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $detallesGenerale->id_pedido }}</td>

										<td >
                                            @if ($detallesGenerale->placa_cabina === 0) No @endif
                                            @if ($detallesGenerale->placa_cabina === 1) Sí @endif
                                        </td>

										<td >
                                            @if ($detallesGenerale->indicador_cabina === 0) No @endif
                                            @if ($detallesGenerale->indicador_cabina === 1) Sí @endif
                                        </td>

										<td >
                                            @if ($detallesGenerale->indicador_pb === 0) No @endif
                                            @if ($detallesGenerale->indicador_pb === 1) Sí @endif
                                        </td>

										<td >
                                            @if ($detallesGenerale->indicador_palier === 0) No @endif
                                            @if ($detallesGenerale->indicador_palier === 1) Sí @endif
                                        </td>

                                            <td>
                                                <form action="{{ route('detalles-generales.destroy', $detallesGenerale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalles-generales.show', $detallesGenerale->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalles-generales.edit', $detallesGenerale->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $detallesGenerales->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
