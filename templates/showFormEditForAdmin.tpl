{include 'templates/header.tpl'}

<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Editar</a>
                <a class="btn btn-outline-dark" href="ABMuser">Volver</a>
                <a class="btn btn-outline-dark" href="cerrar_sesion">Logout</a>
            </nav>
        </div>
    </div>
</div>
<section class="container">
    <table class="table">
        <caption>Editar Usuarios</caption>
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Username</th>
                <th>pass</th>
                <th>Botón</th>
            </tr>
        </thead>
        <form action="guardar_edicion_user" method="POST">
            {foreach from=$id item= datos}
                <input type="hidden" name="id_admin" value="{$datos->id_admin}">
                <td> <input type="text" name="nombre_usuario" value="{$datos->name_admin}"></td>
                <td> <input type="text" name="username" value="{$datos->user_name}"></td>
                <td> <input type="text" name="pass" value="{$datos->pass}"></td>
                <td><button type="submit">Modificar datos</button></td>
                </tr>
                {if $error}
                    <div class="alert alert-danger">
                        {$error}
                    </div>
                {/if}
            {/foreach}
        </form>

        </tbody>
    </table>
</section>