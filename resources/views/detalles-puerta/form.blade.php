<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_pedido" class="form-label">{{ __('Id Pedido') }}</label>
            <input type="text" name="id_pedido" class="form-control @error('id_pedido') is-invalid @enderror" value="{{ old('id_pedido', $detallesPuerta?->id_pedido) }}" id="id_pedido" placeholder="Id Pedido">
            {!! $errors->first('id_pedido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_funcionamiento" class="form-label">{{ __('Id Tipo Funcionamiento') }}</label>
            <input type="text" name="id_tipo_funcionamiento" class="form-control @error('id_tipo_funcionamiento') is-invalid @enderror" value="{{ old('id_tipo_funcionamiento', $detallesPuerta?->id_tipo_funcionamiento) }}" id="id_tipo_funcionamiento" placeholder="Id Tipo Funcionamiento">
            {!! $errors->first('id_tipo_funcionamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_control" class="form-label">{{ __('Id Tipo Control') }}</label>
            <input type="text" name="id_tipo_control" class="form-control @error('id_tipo_control') is-invalid @enderror" value="{{ old('id_tipo_control', $detallesPuerta?->id_tipo_control) }}" id="id_tipo_control" placeholder="Id Tipo Control">
            {!! $errors->first('id_tipo_control', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_puerta" class="form-label">{{ __('Id Tipo Puerta') }}</label>
            <input type="text" name="id_tipo_puerta" class="form-control @error('id_tipo_puerta') is-invalid @enderror" value="{{ old('id_tipo_puerta', $detallesPuerta?->id_tipo_puerta) }}" id="id_tipo_puerta" placeholder="Id Tipo Puerta">
            {!! $errors->first('id_tipo_puerta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="marca" class="form-label">{{ __('Marca') }}</label>
            <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca', $detallesPuerta?->marca) }}" id="marca" placeholder="Marca">
            {!! $errors->first('marca', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="voltaje" class="form-label">{{ __('Voltaje') }}</label>
            <input type="text" name="voltaje" class="form-control @error('voltaje') is-invalid @enderror" value="{{ old('voltaje', $detallesPuerta?->voltaje) }}" id="voltaje" placeholder="Voltaje">
            {!! $errors->first('voltaje', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_patin_retractil" class="form-label">{{ __('Id Patin Retractil') }}</label>
            <input type="text" name="id_patin_retractil" class="form-control @error('id_patin_retractil') is-invalid @enderror" value="{{ old('id_patin_retractil', $detallesPuerta?->id_patin_retractil) }}" id="id_patin_retractil" placeholder="Id Patin Retractil">
            {!! $errors->first('id_patin_retractil', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>