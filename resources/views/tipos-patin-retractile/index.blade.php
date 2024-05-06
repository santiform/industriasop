@extends('layouts.app')

@section('template_title')
    Tipos Patin Retractiles
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fas fa-unlock-alt"></i> Tipos de Patines retractiles
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipos-patin-retractiles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Tipo</th>
									<th >Voltaje</th>

                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiposPatinRetractiles as $tiposPatinRetractile)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $tiposPatinRetractile->tipo }}</td>
										<td >{{ $tiposPatinRetractile->voltaje }}</td>

                                            <td>
                                                <form action="{{ route('tipos-patin-retractiles.destroy', $tiposPatinRetractile->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipos-patin-retractiles.show', $tiposPatinRetractile->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipos-patin-retractiles.edit', $tiposPatinRetractile->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $tiposPatinRetractiles->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
