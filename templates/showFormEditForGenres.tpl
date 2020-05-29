{include 'templates/header.tpl'}



<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Editar</a>
                <a class="btn btn-outline-dark" href="ABMgeneros">Volver</a>
                <a class="btn btn-outline-dark" href="cerrar_sesion">Logout</a>
            </nav>
        </div>
    </div>
    <section class="container">
        <table class="table">
            <caption>Agregar Genero</caption>
            <thead>
                <tr>
                    <th>Tipo de Genero</th>
                    <th>Botón</th>
                </tr>
            </thead>
            <form action="guardar_edicion_genero" method="POST">
                {foreach from=$id item= datos}
                    <input type="hidden" name="id_genero" value="{$datos->id_g}">
                    <td> <input type="text" name="nombre_generos" value="{$datos->genres}"></td>
                    <td><button type="submit">Modificar datos</button></td>
                    </tr>
                {/foreach}
            </form>

            </tbody>
        </table>
    </section>