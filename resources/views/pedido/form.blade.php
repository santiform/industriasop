<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_obra" class="form-label">{{ __('Tipo de obra') }}</label>
            <select name="id_tipo_obra" class="form-control @error('id_tipo_obra') is-invalid @enderror" id="id_tipo_obra">
                <option value="">Selecciona una opción</option>
                @foreach($tiposObras as $tipoObra)
                    <option value="{{ $tipoObra->id }}" @if(old('id_tipo_obra', $pedido?->id_tipo_obra) == $tipoObra->id) selected @endif>{{ $tipoObra->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_tipo_obra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_tipo_funcionamiento" class="form-label">{{ __('Tipo de funcionamiento') }}</label>
            <select name="id_tipo_funcionamiento" class="form-control @error('id_tipo_funcionamiento') is-invalid @enderror" id="id_tipo_funcionamiento">
                <option value="">Selecciona una opción</option>
                @foreach($tiposFuncionamientos as $tipoFuncionamiento)
                    <option value="{{ $tipoFuncionamiento->id }}" @if(old('id_tipo_funcionamiento', $pedido?->id_tipo_funcionamiento) == $tipoFuncionamiento->id) selected @endif>{{ $tipoFuncionamiento->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_tipo_funcionamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_tipo_control" class="form-label">{{ __('Tipo de control') }}</label>
            <select name="id_tipo_control" class="form-control @error('id_tipo_control') is-invalid @enderror" id="id_tipo_control">
                <option value="">Selecciona una opción</option>
                @foreach($tiposControles as $tipoControl)
                    <option value="{{ $tipoControl->id }}" @if(old('id_tipo_control', $pedido?->id_tipo_control) == $tipoControl->id) selected @endif>{{ $tipoControl->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_tipo_control', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_tipo_puerta" class="form-label">{{ __('Tipo de puerta') }}</label>
            <select name="id_tipo_puerta" class="form-control @error('id_tipo_puerta') is-invalid @enderror" id="id_tipo_puerta">
                <option value="">Selecciona una opción</option>
                @foreach($tiposPuertas as $tipoPuerta)
                    <option value="{{ $tipoPuerta->id }}" @if(old('id_tipo_puerta', $pedido?->id_tipo_puerta) == $tipoPuerta->id) selected @endif>{{ $tipoPuerta->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_tipo_puerta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_acceso" class="form-label">{{ __('Tipo de acceso') }}</label>
            <select name="id_acceso" class="form-control @error('id_acceso') is-invalid @enderror" id="id_acceso">
                <option value="">Selecciona una opción</option>
                @foreach($accesos as $acceso)
                    <option value="{{ $acceso->id }}" @if(old('id_acceso', $pedido?->id_acceso) == $acceso->id) selected @endif>{{ $acceso->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_acceso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_estado" class="form-label">{{ __('Estado') }}</label>
            <select name="id_estado" class="form-control @error('id_estado') is-invalid @enderror" id="id_estado">
                <option value="">Selecciona una opción</option>
                @foreach($estados as $estado)
                    <option value="{{ $estado->id }}" @if(old('id_estado', $pedido?->id_estado) == $estado->id) selected @endif>{{ $estado->nombre }}</option>
                @endforeach
            </select>
            {!! $errors->first('id_estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $pedido?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $pedido?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $pedido?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion_obra" class="form-label">{{ __('Direccion Obra') }}</label>
            <input type="text" name="direccion_obra" class="form-control @error('direccion_obra') is-invalid @enderror" value="{{ old('direccion_obra', $pedido?->direccion_obra) }}" id="direccion_obra" placeholder="Direccion Obra">
            {!! $errors->first('direccion_obra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>