<h1 class="text-center">Formulario de ingreso de Clientes</h1>
<a href="/graficas_reyes/menu" class="btn btn-link">Menu</a>

        <div class="row justify-content-center">
            <form class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="cliente_id" id="cliente_id">

            <!-- //!Nombre del Cliente -->
                <div class="row mb-3">
                    <div class="col">
                    <label for="cliente_nombre">Nombre del cliente</label>
                        <input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control">
                    </div>
                </div>

                <!-- //!NIT del Cliente -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nit">NIT del cliente</label>
                        <input type="number" name="cliente_nit" id="cliente_nit" class="form-control">
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
       
        <div id="tablaClientesContainer" class="container mt-5" style="display: none;">
    <div class="text-center">
        <h1>Datatable de Clientes</h1>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-12 p-4 shadow"> 
            <table id="tablaClientes" class="table table-bordered table-hover">
                <!-- Contenido de la tabla -->
            </table>
        </div>
    </div>
</div>
<script src="<?= asset('./build/js/clientes/index.js') ?>"></script>