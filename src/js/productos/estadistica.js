import { Toast } from "bootstrap";
import Chart from "chart.js/auto";

const canvas = document.getElementById('chartVentas')
const btnActualizar = document.getElementById('btnActualizar')
const context = canvas.getContext('2d');

const getRandomColor = () => {
    const r = Math.floor(Math.random() * 256)
    const g = Math.floor(Math.random() * 256)
    const b = Math.floor(Math.random() * 256)

    const rgColor = `rgba(${r},${g},${b},0.5)`
    return rgColor
}

const chartVentas  = new Chart(context, {
    type : 'bar',
    data : {
        labels : [],
        datasets : [
            {
                label : 'Ventas',
                data : [],
                backgroundColor : []
            }
        ]
    }
})

const getEstadisticas = async () => {
    const url = `/graficas_reyes/API/productos/estadistica`;
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();

            chartVentas.data.labels = [];
            chartVentas.data.datasets[0].data = [];
            chartVentas.data.datasets[0].backgroundColor = [];

        if(data){
            data.forEach(registro => {
                chartVentas.data.labels.push(registro.producto)
                chartVentas.data.datasets[0].data.push(registro.cantidad)
                chartVentas.data.datasets[0].backgroundColor.push(getRandomColor())
            });
        }else{
            Toast.fire({
                title : 'No se encontraron Registros',
                icon : 'info'
            })
        }
        
        chartVentas.update();

    } catch (error) {
        console.log(error);
    }
}

getEstadisticas();
btnActualizar.addEventListener('click', getEstadisticas)
