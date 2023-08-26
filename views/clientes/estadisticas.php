<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Clientes</title>
    <style>
        body {
            padding-top: 70px;
        }
        .navbar {
            background-color: black;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">DEVJOBS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Estadísticas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="/graficas_reyes/clientes/estadisticas" class="btn">Estadistica Clientes</a><br>
                            <a href="/graficas_reyes/productos/estadistica" class="btn">Estadistica Ventas</a><br>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Registrar Datos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="/graficas_reyes/clientes/datatable" class="btn">Clientes</a><br>
                            <a href="/graficas_reyes/productos/datatable" class="btn">Productos</a><br>
                            <a href="/graficas_reyes/ventas/datatable" class="btn">Ventas</a><br>
                        </div>
                    </li>
                    <li class="nav-item">
                    <a href="/graficas_reyes/logout" class="btn btn-danger">Cerrar Secion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Estadísticas de Clientes</h1>
        <div class="text-center">
            <button id="btnActualizar" class="btn btn-info" data-bs-toggle="dropdown">Actualizar</button>
 
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <canvas id="chartClientes" style="width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=asset('./build/js/clientes/estadistica.js')?>"></script>
</body>
</html>
