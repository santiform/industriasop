<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_pedido" class="form-label">{{ __('Id Pedido') }}</label>
            <input type="text" name="id_pedido" class="form-control @error('id_pedido') is-invalid @enderror" value="{{ old('id_pedido', $detallesGenerale?->id_pedido) }}" id="id_pedido" placeholder="Id Pedido">
            {!! $errors->first('id_pedido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="placa_cabina" class="form-label">{{ __('Placa Cabina') }}</label>
            <input type="text" name="placa_cabina" class="form-control @error('placa_cabina') is-invalid @enderror" value="{{ old('placa_cabina', $detallesGenerale?->placa_cabina) }}" id="placa_cabina" placeholder="Placa Cabina">
            {!! $errors->first('placa_cabina', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="indicador_cabina" class="form-label">{{ __('Indicador Cabina') }}</label>
            <input type="text" name="indicador_cabina" class="form-control @error('indicador_cabina') is-invalid @enderror" value="{{ old('indicador_cabina', $detallesGenerale?->indicador_cabina) }}" id="indicador_cabina" placeholder="Indicador Cabina">
            {!! $errors->first('indicador_cabina', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="indicador_pb" class="form-label">{{ __('Indicador Pb') }}</label>
            <input type="text" name="indicador_pb" class="form-control @error('indicador_pb') is-invalid @enderror" value="{{ old('indicador_pb', $detallesGenerale?->indicador_pb) }}" id="indicador_pb" placeholder="Indicador Pb">
            {!! $errors->first('indicador_pb', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="indicador_palier" class="form-label">{{ __('Indicador Palier') }}</label>
            <input type="text" name="indicador_palier" class="form-control @error('indicador_palier') is-invalid @enderror" value="{{ old('indicador_palier', $detallesGenerale?->indicador_palier) }}" id="indicador_palier" placeholder="Indicador Palier">
            {!! $errors->first('indicador_palier', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>