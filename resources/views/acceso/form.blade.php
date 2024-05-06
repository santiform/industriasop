<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_funcionamiento" class="form-label">{{ __('Tipo Funcionamiento') }}</label>
            <select name="id_tipo_funcionamiento" class="form-control @error('id_tipo_funcionamiento') is-invalid @enderror" id="id_tipo_funcionamiento">
                <option value="">Selecciona una opción</option>
                @foreach($tiposFuncionamientos as $tipoFuncionamiento)
                    <option value="{{ $tipoFuncionamiento->id }}" @if(old('id_tipo_funcionamiento', $acceso?->id_tipo_funcionamiento) == $tipoFuncionamiento->id) selected @endif>{{ $tipoFuncionamiento->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_tipo_funcionamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_tipo_control" class="form-label">{{ __('Tipo Control') }}</label>
            <select name="id_tipo_control" class="form-control @error('id_tipo_control') is-invalid @enderror" id="id_tipo_control">
                <option value="">Selecciona una opción</option>
                @foreach($tiposControles as $tipoControl)
                    <option value="{{ $tipoControl->id }}" @if(old('id_tipo_control', $acceso?->id_tipo_control) == $tipoControl->id) selected @endif>{{ $tipoControl->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_tipo_control', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_tipo_puerta" class="form-label">{{ __('Tipo Puerta') }}</label>
            <select name="id_tipo_puerta" class="form-control @error('id_tipo_puerta') is-invalid @enderror" id="id_tipo_puerta">
                <option value="">Selecciona una opción</option>
                @foreach($tiposPuertas as $tipoPuerta)
                    <option value="{{ $tipoPuerta->id }}" @if(old('id_tipo_puerta', $acceso?->id_tipo_puerta) == $tipoPuerta->id) selected @endif>{{ $tipoPuerta->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_tipo_puerta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $acceso?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
