<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_pedido" class="form-label">{{ __('Id Pedido') }}</label>
            <input type="text" name="id_pedido" class="form-control @error('id_pedido') is-invalid @enderror" value="{{ old('id_pedido', $habilitacionesAcceso?->id_pedido) }}" id="id_pedido" placeholder="Id Pedido">
            {!! $errors->first('id_pedido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="parada" class="form-label">{{ __('Parada') }}</label>
            <input type="text" name="parada" class="form-control @error('parada') is-invalid @enderror" value="{{ old('parada', $habilitacionesAcceso?->parada) }}" id="parada" placeholder="Parada">
            {!! $errors->first('parada', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="salida_a" class="form-label">{{ __('Salida A') }}</label>
            <input type="text" name="salida_a" class="form-control @error('salida_a') is-invalid @enderror" value="{{ old('salida_a', $habilitacionesAcceso?->salida_a) }}" id="salida_a" placeholder="Salida A">
            {!! $errors->first('salida_a', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="salida_b" class="form-label">{{ __('Salida B') }}</label>
            <input type="text" name="salida_b" class="form-control @error('salida_b') is-invalid @enderror" value="{{ old('salida_b', $habilitacionesAcceso?->salida_b) }}" id="salida_b" placeholder="Salida B">
            {!! $errors->first('salida_b', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>