<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_funcionamiento" class="form-label">{{ __('Tipo de funcionamiento') }}</label>
            <select name="id_tipo_funcionamiento" class="form-control @error('id_tipo_funcionamiento') is-invalid @enderror" id="id_tipo_funcionamiento">
                <option value="">Seleccioná una opción</option>
                @foreach($tiposFuncionamiento as $tipo)
                    <option value="{{ $tipo->id }}" @if(old('id_tipo_funcionamiento', $tiposControle?->id_tipo_funcionamiento) == $tipo->id) selected @endif>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_tipo_funcionamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $tiposControle?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="marca" class="form-label">{{ __('Marca') }}</label>
            <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca', $tiposControle?->marca) }}" id="marca" placeholder="Marca">
            {!! $errors->first('marca', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="voltaje" class="form-label">{{ __('Voltaje') }}</label>
            <input type="text" name="voltaje" class="form-control @error('voltaje') is-invalid @enderror" value="{{ old('voltaje', $tiposControle?->voltaje) }}" id="voltaje" placeholder="Voltaje">
            {!! $errors->first('voltaje', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="potencia" class="form-label">{{ __('Potencia') }}</label>
            <input type="text" name="potencia" class="form-control @error('potencia') is-invalid @enderror" value="{{ old('potencia', $tiposControle?->potencia) }}" id="potencia" placeholder="Potencia">
            {!! $errors->first('potencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="encoder" class="form-label">{{ __('Encoder') }}</label>
            <input type="text" name="encoder" class="form-control @error('encoder') is-invalid @enderror" value="{{ old('encoder', $tiposControle?->encoder) }}" id="encoder" placeholder="Encoder">
            {!! $errors->first('encoder', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rescate" class="form-label">{{ __('Rescate') }}</label>
            <input type="text" name="rescate" class="form-control @error('rescate') is-invalid @enderror" value="{{ old('rescate', $tiposControle?->rescate) }}" id="rescate" placeholder="Rescate">
            {!! $errors->first('rescate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary" data-placement="left">
            Submit
        </button>
    </div>
</div>