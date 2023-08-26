import { Toast } from "bootstrap";
import Chart from "chart.js/auto";

const canvas = document.getElementById('chartClientes')
const btnActualizar = document.getElementById('btnActualizar')
const context = canvas.getContext('2d');

const getRandomColor = () => {
    const r = Math.floor(Math.random() * 256)
    const g = Math.floor(Math.random() * 256)
    const b = Math.floor(Math.random() * 256)

    const rgColor = `rgba(${r},${g},${b},0.5)`
    return rgColor
}

const chartClientes  = new Chart(context, {
    type : 'pie',
    data : {
        labels : [],
        datasets : [
            {
                label : 'Clientes',
                data : [],
                backgroundColor : []
            }
        ]
    }
})

const getEstadisticas = async () => {
    const url = `/graficas_reyes/API/clientes/estadistica`;
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();

            chartClientes.data.labels = [];
            chartClientes.data.datasets[0].data = [];
            chartClientes.data.datasets[0].backgroundColor = [];

        if(data){
            data.forEach(registro => {
                chartClientes.data.labels.push(registro.producto)
                chartClientes.data.datasets[0].data.push(registro.cantidad)
                chartClientes.data.datasets[0].backgroundColor.push(getRandomColor())
            });
        }else{
            Toast.fire({
                title : 'No se encontraron Registros',
                icon : 'info'
            })
        }
        
        chartClientes.update();

    } catch (error) {
        console.log(error);
    }
}

getEstadisticas();
btnActualizar.addEventListener('click', getEstadisticas)
