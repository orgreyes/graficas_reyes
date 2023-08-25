import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje"
import { validarFormulario, Toast } from "../funciones"
import Swal from "sweetalert2";

const formulario = document.querySelector('form');
const btnBuscar = document.getElementById('btnBuscar');
const btnGuardar = document.getElementById('btnGuardar');
const btnModificar = document.getElementById('btnModificar');
const btnCancelar = document.getElementById('btnCancelar');

//!Esto es para ocultar el bootn de modificar, cancelar y la tabla
btnModificar.disabled = true
btnModificar.parentElement.style.display = 'none'
btnCancelar.disabled = true
btnCancelar.parentElement.style.display = 'none'

let contenedor = 1;

//!Aca se gebera la tabla
const datatable = new Datatable('#tablaClientes', {
    language : lenguaje,
    data : null,
    columns : [
        {
            title : 'NO',
            render: () => contenedor++ 
            
        },
        {
            title : 'NOMBRE',
            data: 'cliente_nombre'
        },
        {
            title : 'NIT',
            data: 'cliente_nit',
        },
        {
            title : 'MODIFICAR',
            data: 'cliente_id',
            searchable: false,
            orderable: false,
            render : (data, type, row, meta) => `<button class="btn btn-warning" data-id='${data}' data-nombre='${row["cliente_nombre"]}' data-nit='${row["cliente_nit"]}'>Modificar</button>`
        },
        {
            title : 'ELIMINAR',
            data: 'cliente_id',
            searchable: false,
            orderable: false,
            render : (data, type, row, meta) => `<button class="btn btn-danger" data-id='${data}'>Eliminar</button>`
        }
    ]
})


//!Aca mandamos a llamar la funcion para validar que todos los campos esten llenos al momento de guardar.
const guardar = async (e) => {
    e.preventDefault();

    if (!validarFormulario(formulario,['cliente_id'])){
        Toast.fire({
            title: 'Campos incompletos',
            text: 'Debe llenar todos los campos del formulario',
            icon: 'warning',
            showCancelButton: false,
            confirmCancelButtonColor: '#d33',
            confirmButtonText: 'OK',
        });
        return;
    }

    const body = new FormData(formulario)
    body.delete('cliente_id')
    const url ='/graficas_reyes/API/clientes/guardar';
    const config = {
        method : 'POST',
        body
    }

    try {
        const respuesta = await fetch(url,config);
        const data = await respuesta.json();

         console.log(data);

        const {codigo, mensaje, detalle} = data;
        
        switch (codigo) {
            case 1:
                formulario.reset();
                buscar();
                break;

            case 0:
                console.log(detalle);
                break;

            default:
                break;
        }

        Toast.fire({
            title:'Guardando Exitoso',
            text: 'Los datos se han guardado correctamente',
            icon: 'success',
            showCancelButton: false,
            confirmCancelButtonColor: '#3085d6',
            confirmButtonText: 'OK',
        });

    } catch (error) {
        console.log(error);
    }

};


//!Aca esta la funcion para buscar
const buscar = async () => {
    contenedor = 1;

    const url = `/graficas_reyes/API/clientes/buscar`;
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();

        console.log(data);
        datatable.clear().draw()
        if (data) {
            datatable.rows.add(data).draw();
        } else {
            Toast.fire({
                title: 'No se encontraron registros',
                icon: 'info'
            })
        }

    } catch (error) {
        console.log(error);
    }
}


//!Para colocar los datos sobre el formulario
const traeDatos = (e) => {
    const button = e.target;
    const id = button.dataset.id
    const nombre = button.dataset.nombre
    const nit = button.dataset.nit

    //!Para colocar los datos
    formulario.cliente_id.value = button.dataset.id
    formulario.cliente_nombre.value = button.dataset.nombre
    formulario.cliente_nit.value = button.dataset.nit
    
    //!Para ocultar el boton de guardar y que aparezcan modificar y eliminar.
    btnGuardar.disabled = true
    btnGuardar.parentElement.style.display = 'none'
    btnBuscar.disabled = true
    btnBuscar.parentElement.style.display = 'none'
    btnModificar.disabled = false
    btnModificar.parentElement.style.display = ''
    btnCancelar.disabled = false
    btnCancelar.parentElement.style.display = ''
    tablaClientes.style.display = 'none'

    // console.log(id, nombre, nit)
}

//!Aca esta la funcino de cancelar la accion de modificar un registro.
const cancelarAccion = () => {
    formulario.reset(); // Limpia los campos del formulario
    btnGuardar.disabled = false;
    btnGuardar.parentElement.style.display = '';
    btnBuscar.disabled = false;
    btnBuscar.parentElement.style.display = '';
    btnModificar.disabled = true;
    btnModificar.parentElement.style.display = 'none';
    btnCancelar.disabled = true;
    btnCancelar.parentElement.style.display = 'none';
    tablaClientes.style.display = ''; 
}


//!Aca esta la funcion de modificar un registro
const modificar = async () => {
    
    const cliente_id = formulario.cliente_id.value;
    const body = new FormData(formulario);
    body.append('cliente_id', cliente_id);

    const url = `/graficas_reyes/API/clientes/modificar`;
    const config = {
        method: 'POST',
        body,
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);
        const { codigo, mensaje, detalle } = data;

        switch (codigo) {
            case 1:
                formulario.reset();
                cancelarAccion();
                buscar();

                Toast.fire({
                    icon: 'success',
                    title: 'Actualizado',
                    text: mensaje,
                    confirmButtonText: 'OK'
                });
                break;
            case 0:
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Verifique sus datos: ' + mensaje,
                    confirmButtonText: 'OK'
                });
                break;
            default:
                break;
        }

    } catch (error) {
        console.log(error);
    }
};



const eliminar = async e => {
    const result = await Swal.fire({
        icon: 'question',
        title: 'Eliminar paciente',
        text: '¿Desea eliminar este paciente?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    });

    const button = e.target;
    const id = button.dataset.id
    // alert(id);
    
    if (result.isConfirmed) {
        const body = new FormData();
        body.append('cliente_id', id);

        const url = `/graficas_reyes/API/clientes/eliminar`;
        const config = {
            method: 'POST',
            body,
        };

        try {
            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            console.log(data);
            const { codigo, mensaje, detalle } = data;

            let icon='info'
            switch (codigo) {
                case 1:
                    buscar();
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado Exitosamente',
                        text: mensaje,
                        confirmButtonText: 'OK'
                    });
                    break;
                case 0:
                    console.log(detalle);
                    break;
                default:
                    break;
            }

        } catch (error) {
            console.log(error);
        }
    }
};



datatable.on('click','.btn-warning', traeDatos)
datatable.on('click','.btn-danger', eliminar)
formulario.addEventListener('submit', guardar);
btnCancelar.addEventListener('click', cancelarAccion);
btnModificar.addEventListener('click', modificar);


let isSearching = false; 
btnBuscar.addEventListener('click', () => {
    if (!isSearching) {
        isSearching = true;
        buscar().then(() => {
            isSearching = false;
            btnBuscar.style.display = 'none'; 
            document.getElementById('tablaClientesContainer').style.display = 'block'; 
        });
    }
});


