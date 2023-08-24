import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje"
import { Toast } from "../funciones"

let contenedor = 1;

const datatable = new Datatable('#tablaProductos', {
    language : lenguaje,
    data : null,
    columns : [
        {
            title : 'NO',
            render: () => contenedor++ 
            
        },
        {
            title : 'NOMBRE',
            data: 'producto_nombre'
        },
        {
            title : 'PRECIO',
            data: 'producto_precio',
            render : (data) => 'Q. ' + data
        },
        {
            title : 'MODIFICAR',
            data: 'producto_id',
            searchable: false,
            orderable: false,
            render : (data, type, row, meta) => `<button class="btn btn-warning" data-id='${data}' data-nombre='${row["producto_nombre"]}' data-precio='${row["producto_precio"]}'>Modificar</button>`
        },
        {
            title : 'ELIMINAR',
            data: 'producto_id',
            searchable: false,
            orderable: false,
            render : (data, type, row, meta) => `<button class="btn btn-danger" data-id='${data}'>Eliminar</button>`
        }
    ]
})

const buscar = async () => {

    // let producto_nombre = formulario.producto_nombre.value;
    // let producto_precio = formulario.producto_precio.value;
    const url = `/graficas_reyes/API/productos/buscar`;
    const config = {
        method : 'GET'
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();
        
        // tablaProductos.tBodies[0].innerHTML = ''
        // const fragment = document.createDocumentFragment();
        console.log(data);
        datatable.clear().draw()
        if(data){
            datatable.rows.add(data).draw();
        }else{
            Toast.fire({
                title : 'No se encontraron registros',
                icon : 'info'
            })
        }
        
    } catch (error) {
        console.log(error);
    }
}

const traeDatos = (e) => {
    const button = e.target;
    const id = button.dataset.id
    const nombre = button.dataset.nombre
    const precio = button.dataset.precio

    console.log(id, nombre, precio)
}

const eliminar = e => {
    const button = e.target;
    const id = button.dataset.id
    alert(id);
}
buscar();

datatable.on('click','.btn-warning', traeDatos)
datatable.on('click','.btn-danger', eliminar)