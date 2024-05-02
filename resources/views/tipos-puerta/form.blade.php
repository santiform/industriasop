<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_funcionamiento" class="form-label">{{ __('Id Tipo Funcionamiento') }}</label>
            <input type="text" name="id_tipo_funcionamiento" class="form-control @error('id_tipo_funcionamiento') is-invalid @enderror" value="{{ old('id_tipo_funcionamiento', $tiposPuerta?->id_tipo_funcionamiento) }}" id="id_tipo_funcionamiento" placeholder="Id Tipo Funcionamiento">
            {!! $errors->first('id_tipo_funcionamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_control" class="form-label">{{ __('Id Tipo Control') }}</label>
            <input type="text" name="id_tipo_control" class="form-control @error('id_tipo_control') is-invalid @enderror" value="{{ old('id_tipo_control', $tiposPuerta?->id_tipo_control) }}" id="id_tipo_control" placeholder="Id Tipo Control">
            {!! $errors->first('id_tipo_control', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $tiposPuerta?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>