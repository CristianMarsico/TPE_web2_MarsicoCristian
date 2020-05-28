{include 'templates/header.tpl'}
    
    <div>
        <a class="navbar-brand" href="cerrar_sesion"><b>Cerrar Sesion</b></a>
    </div>
    <div>
        <h2>ABM DE LOS GENEROS</h2>
        <b class="navbar-brand">En esta sección usted podrá hacer ALTAS, BAJAS y MODIFICACIONES de Generos.</b><br>
        <b class="navbar-brand">Seleccione una OPCIÓN.</b>
    </div>
    <form action="agregar_genero" method="POST">
        <label><b>Agregar un nuevo genero a la BBDD</b></label>
        <button type="submit">Dar de Alta</button>
    </form>

    <section class="container">
      <table class="table">
        <caption>LISTA GENEROS</caption>
            <thead>
                <tr>
                    <th>Genero Musical</th>
                    <th>Botones</th>
                </tr>
            </thead>
        <tbody id="lista">
            <tr> 

            {foreach from=$generos item=$datos}
                <td>{$datos->genres}</td>
                <td><a href = "eliminar_genero/{$datos->id_g}">eliminar<a> | <a href = "editar_genero/{$datos->id_g}">editar<a></td>
                </tr>
            {/foreach}       
                
    
        </tbody>
      </table>
    </section>
        