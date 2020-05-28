{include 'templates/header.tpl'}

    

    <div>
        <a class="navbar-brand" href="cerrar_sesion"><b>Cerrar Sesion</b></a>
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