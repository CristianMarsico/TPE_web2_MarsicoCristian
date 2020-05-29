{include 'templates/header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Administrador</a>
                <a class="btn btn-outline-dark" href="cerrar_sesion">Logout</a>
            </nav>
        </div>
    </div>
</div>
    <div>
        <h2>ABM DE LOS ADMINISTRADORES</h2>
        <b class="navbar-brand">En esta sección usted podrá hacer ALTAS, BAJAS y MODIFICACIONES de Generos.</b><br>
        <b class="navbar-brand">Seleccione una OPCIÓN.</b>
    </div>
    <form action="agregar_usuario" method="POST">
        <label><b>Agregar un nuevo genero a la BBDD</b></label>
        <button type="submit">Dar de Alta</button>
    </form>

    <section class="container">
      <table class="table">
        <caption>LISTA ADMINISTRADORES</caption>
            <thead>
                <tr>
                    <th>Apellido/Nombre</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Botones</th>
                </tr>
            </thead>
        <tbody id="lista">
            <tr> 

            {foreach from=$admin item=$datos}
                <td>{$datos->name_admin}</td>
                <td>{$datos->user_name}</td>
                <td>{$datos->pass}</td>
                <td><a href = "eliminar_usuario/{$datos->id_admin}">eliminar<a> | <a href = "editar_usuario/{$datos->id_admin}">editar<a></td>
                </tr>
            {/foreach}       
        </tbody>
      </table>
    </section>
        