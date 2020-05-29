{include 'templates/header.tpl'}
    <div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Administrador</a>
                <a class="btn btn-dark" href="cerrar_sesion">Cerrar Sesión</a>
                <a class="btn btn-dark" href="home">Ver la pagina</a>
            </nav>
        </div>
    </div>
    
    <form action="ABMbandas" method="POST">
       <label>A/B/M de las bandas</label>
       <button type="submit">Ir a ABM</button>
    </form>
                 
    <form action="ABMgeneros" method="POST">
        <label>A/B/M de los generos</label>
        <button type="submit">Ir o ABM</button>
    </form>

    <form action="ABMuser" method="POST">
        <label>A/B/M de los administradores</label>
        <button type="submit">Ir o ABM</button>
    </form>
