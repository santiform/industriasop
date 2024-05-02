<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_obra" class="form-label">{{ __('Id Tipo Obra') }}</label>
            <input type="text" name="id_tipo_obra" class="form-control @error('id_tipo_obra') is-invalid @enderror" value="{{ old('id_tipo_obra', $pedido?->id_tipo_obra) }}" id="id_tipo_obra" placeholder="Id Tipo Obra">
            {!! $errors->first('id_tipo_obra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_funcionamiento" class="form-label">{{ __('Id Tipo Funcionamiento') }}</label>
            <input type="text" name="id_tipo_funcionamiento" class="form-control @error('id_tipo_funcionamiento') is-invalid @enderror" value="{{ old('id_tipo_funcionamiento', $pedido?->id_tipo_funcionamiento) }}" id="id_tipo_funcionamiento" placeholder="Id Tipo Funcionamiento">
            {!! $errors->first('id_tipo_funcionamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_control" class="form-label">{{ __('Id Tipo Control') }}</label>
            <input type="text" name="id_tipo_control" class="form-control @error('id_tipo_control') is-invalid @enderror" value="{{ old('id_tipo_control', $pedido?->id_tipo_control) }}" id="id_tipo_control" placeholder="Id Tipo Control">
            {!! $errors->first('id_tipo_control', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_tipo_puerta" class="form-label">{{ __('Id Tipo Puerta') }}</label>
            <input type="text" name="id_tipo_puerta" class="form-control @error('id_tipo_puerta') is-invalid @enderror" value="{{ old('id_tipo_puerta', $pedido?->id_tipo_puerta) }}" id="id_tipo_puerta" placeholder="Id Tipo Puerta">
            {!! $errors->first('id_tipo_puerta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_acceso" class="form-label">{{ __('Id Acceso') }}</label>
            <input type="text" name="id_acceso" class="form-control @error('id_acceso') is-invalid @enderror" value="{{ old('id_acceso', $pedido?->id_acceso) }}" id="id_acceso" placeholder="Id Acceso">
            {!! $errors->first('id_acceso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
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