<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_pedido" class="form-label">{{ __('Id Pedido') }}</label>
            <input type="text" name="id_pedido" class="form-control @error('id_pedido') is-invalid @enderror" value="{{ old('id_pedido', $detallesGenerale?->id_pedido) }}" id="id_pedido" placeholder="Id Pedido">
            {!! $errors->first('id_pedido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="placa_cabina" class="form-label">{{ __('Placa Cabina') }}</label>
            <select name="placa_cabina" class="form-control @error('placa_cabina') is-invalid @enderror" id="placa_cabina">
                <option value="" disabled selected>Seleccioná una opción</option>
                <option value="1" {{ old('placa_cabina', $detallesGenerale?->placa_cabina) == '1' ? 'selected' : '' }}>Si</option>
                <option value="0" {{ old('placa_cabina', $detallesGenerale?->placa_cabina) == '0' ? 'selected' : '' }}>No</option>
            </select>
            {!! $errors->first('placa_cabina', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="indicador_cabina" class="form-label">{{ __('Indicador Cabina') }}</label>
            <select name="indicador_cabina" class="form-control @error('indicador_cabina') is-invalid @enderror" id="indicador_cabina">
                <option value="" disabled selected>Seleccioná una opción</option>
                <option value="1" {{ old('indicador_cabina', $detallesGenerale?->indicador_cabina) == '1' ? 'selected' : '' }}>Si</option>
                <option value="0" {{ old('indicador_cabina', $detallesGenerale?->indicador_cabina) == '0' ? 'selected' : '' }}>No</option>
            </select>
            {!! $errors->first('indicador_cabina', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="indicador_pb" class="form-label">{{ __('Indicador Pb') }}</label>
            <select name="indicador_pb" class="form-control @error('indicador_pb') is-invalid @enderror" id="indicador_pb">
                <option value="" disabled selected>Seleccioná una opción</option>
                <option value="1" {{ old('indicador_pb', $detallesGenerale?->indicador_pb) == '1' ? 'selected' : '' }}>Si</option>
                <option value="0" {{ old('indicador_pb', $detallesGenerale?->indicador_pb) == '0' ? 'selected' : '' }}>No</option>
            </select>
            {!! $errors->first('indicador_pb', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="indicador_palier" class="form-label">{{ __('Indicador Palier') }}</label>
            <select name="indicador_palier" class="form-control @error('indicador_palier') is-invalid @enderror" id="indicador_palier">
                <option value="" disabled selected>Seleccioná una opción</option>
                <option value="1" {{ old('indicador_palier', $detallesGenerale?->indicador_palier) == '1' ? 'selected' : '' }}>Si</option>
                <option value="0" {{ old('indicador_palier', $detallesGenerale?->indicador_palier) == '0' ? 'selected' : '' }}>No</option>
            </select>
            {!! $errors->first('indicador_palier', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>