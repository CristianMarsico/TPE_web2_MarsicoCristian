{include 'templates/header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">{$user}</a>
                <a class="btn btn-dark" href="cerrar_sesion">Cerrar Sesión</a>
                <a class="btn btn-dark" href="home">Ver la pagina</a>
                <a class="btn btn-dark" href="tareas">Tareas</a>
            </nav>
        </div>
    </div>

    <h2> Bienvenido <b>{$user}</b></h2>
    <p>ud está autorizado para acceder al A/B/M de la base de datos</p>
    