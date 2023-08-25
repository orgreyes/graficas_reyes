<h1 class="text-center">Formulario de ingreso de Productos</h1>
<a href="/graficas_reyes/menu" class="btn btn-link">Menu</a>

        <div class="row justify-content-center">
            <form class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="producto_id" id="producto_id">

            <!-- //!Nombre del Producto -->
                <div class="row mb-3">
                    <div class="col">
                    <label for="producto_nombre">Nombre del producto</label>
                        <input type="text" name="producto_nombre" id="producto_nombre" class="form-control">
                    </div>
                </div>

                <!-- //!Precio del Producto -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="producto_precio">Precio del Producto</label>
                        <input type="number" name="producto_precio" id="producto_precio" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
                    </div>

                </div>
            </form>
        </div>
       
        <div id="tablaProductosContainer" class="container mt-5" style="display: none;">
    <div class="text-center">
        <h1>Datatable de Productos</h1>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-12 p-4 shadow"> 
            <table id="tablaProductos" class="table table-bordered table-hover">
                <!-- Contenido de la tabla -->
            </table>
        </div>
    </div>
</div>
<script src="<?= asset('./build/js/productos/index.js') ?>"></script>