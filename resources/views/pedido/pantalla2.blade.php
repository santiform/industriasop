@include('layouts.formulario.header')

        <!-- Contenedor Principal (2 Columnas) -->
        <div class="principal">
            <div class="izquierda">
                <div class="timeline">
                    <div class="paso paso-azul">
                      <div class="circle circle-azul">1</div> Datos básicos
                    </div>
                    <div class="linea linea-azul">|</div>
                    <div class="paso paso-gris">
                        <div class="circle circle-gris">2</div> Control
                    </div>
                    <div class="linea linea-gris">|</div>
                    <div class="paso paso-gris">
                        <div class="circle circle-gris">3</div> Puertas
                    </div>
                    <div class="linea linea-gris">|</div>
                    <div class="paso paso-gris">
                        <div class="circle circle-gris">4</div> Detalles generales
                    </div>
                    <div class="linea linea-gris">|</div>
                    <div class="paso paso-gris">
                        <div class="circle circle-gris">5</div> Confirmación
                    </div>
                </div>
            </div>



            <div class="derecha">
                <div class="formulario">
                    <h2 class="titleSection"><div class="div-paso">1</div> DATOS BÁSICOS</h2>
                    <form action="" method="POST" required>
                    @csrf
                        <div class="titulo-form-group">Empresa</div>
                        <div class="form-group">
                            <label for="nombre">Nombre de empresa</label>
                            <input required  type="text" id="nombre" name="nombre" placeholder="">
                            <div style="height: 1.6rem;" ></div>
                            <label for="email">Email de empresa</label>
                            <input required  type="email" id="email" name="email" placeholder="">
                            <div style="height: 1.6rem;" ></div>
                            <label for="telefono">Teléfono de empresa</label>
                            <input required  type="tel" id="telefono" name="telefono" placeholder="">
                        </div>
                        <div class="titulo-form-group">Obra</div>
                        <div class="form-group">

                        <label for="direccion">Dirección de obra</label>
                        <input required  type="text" id="direccion" name="direccion" placeholder="">

                        <div style="height: 1.6rem;" ></div>

                        <label for="tipo_obra">Tipo de obra</label>
                            <select required  id="tipo_obra" name="tipo_obra">
                                <option value="" disabled selected></option>
                                <option value="1">Modernización</option>
                                <option value="2">Nueva</option>
                            </select>

                        </div>

                        <div class="titulo-form-group">Ascensor</div>
                        <div class="form-group">
                            <label for="tipo_pedido">Tipo de pedido</label>
                            <select required  id="tipo_pedido" name="tipo_pedido">
                                <option value="" disabled selected></option>
                                <option value="1">Cuadro de maniobra y botonera</option>
                                <option value="2">Cuadro de maniobra</option>
                                <option value="3">Botonera</option>
                            </select>
                        </div>


                    <div class="botones-container">
                        <div class="boton-izquierdo">
                            
                        </div>

                        <div class="boton-derecho">
                            <div class="btnNext">
                                <button type="submit">Siguiente</button>
                            </div>
                        </div>
                    </div>

                    
                    </form>
                </div>         
            </div>
        </div>
    </div>

@include('layouts.formulario.footer')