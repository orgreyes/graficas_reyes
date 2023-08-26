<h1 class="text-center">Formulario de ingreso de Ventas</h1>
<a href="/graficas_reyes/menu" class="btn btn-link">Menu</a>

        <div class="row justify-content-center">
            <form class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="venta_id" id="venta_id">

            <!-- //!Nombre del Cliente que Compro -->
                <div class="row mb-3">
                    <div class="col">
                    <label for="nombre_cliente">Nombre del cliente</label>
                        <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control">
                    </div>
                </div>

                <!-- //!Fecha de la Compra -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="venta_fecha">Fecha de la Compra</label>
                        <input type="date" name="venta_fecha" id="venta_fecha" class="form-control">
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
       
        <div id="tablaVentasContainer" class="container mt-5" style="display: none;">
    <div class="text-center">
        <h1>Datatable de Ventas</h1>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-12 p-4 shadow"> 
            <table id="tablaVentas" class="table table-bordered table-hover">
                <!-- Contenido de la tabla -->
            </table>
        </div>
    </div>
</div>
<script src="<?= asset('./build/js/ventas/index.js') ?>"></script>