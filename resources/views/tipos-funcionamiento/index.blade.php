@extends('layouts.app')

@section('template_title')
    Tipos Funcionamientos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipos Funcionamientos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipos-funcionamientos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Nombre</th>

                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiposFuncionamientos as $tiposFuncionamiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $tiposFuncionamiento->nombre }}</td>

                                            <td>
                                                <form action="{{ route('tipos-funcionamientos.destroy', $tiposFuncionamiento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipos-funcionamientos.show', $tiposFuncionamiento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipos-funcionamientos.edit', $tiposFuncionamiento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $tiposFuncionamientos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
