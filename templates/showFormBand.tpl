{include 'templates/header.tpl'}
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">{$user}</a>
                <a class="btn btn-outline-dark" href="ABMbandas">volver</a>
                <a class="btn btn-outline-dark" href="cerrar_sesion">Logout</a>
            </nav>
        </div>
    </div>
</div>
<section class="container">
    <table class="table">
        <caption>Agregar Genero</caption>
        <thead>
            <tr>
                <th>Artista</th>
                <th>Nombre CD</th>
                <th>canciones</th>
                <th>año</th>
                <th>foto</th>
                <th>Genero</th>
                <th>Botón</th>
            </tr>


        </thead>
        <form action="guardar_banda" method="POST" enctype="multipart/form-data">
            <tbody id="lista">
                <tr>
                    <td> <input type="text" name="nombre"></td>
                    <td> <input type="text" name="album"></td>
                    <td> <input type="text" name="canciones"></td>
                    <td> <input type="text" name="anio"></td>
                    <td><input type="file" name="input_name" id="imageToUpload"></td>
                    <td><select name="genero">
                            {foreach from=$bandas item= $band}
                                <option>{$band->id_g}</option>
                            {/foreach}
                        </select></td>

                    <td><button type="submit">Agregar datos</button></td>
                </tr>
            </tbody>
            {if $error}
                <div class="alert alert-danger">
                    {$error}
                </div>
            {/if}
        </form>
    </table>
</section>