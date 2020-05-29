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
        <h1>ABM DE LAS BANDAS</h1>
        <b class="navbar-brand">En esta sección usted podrá hacer ALTAS, BAJAS y MODIFICACIONES de Bandas.</b><br>
        <b class="navbar-brand">Seleccione una OPCIÓN.</b>
    </div>
    <form action="agregar_banda" method="POST">
        <label><b>Agregar una nueva banda a la BBDD</b></label>
        <button type="submit">Dar de Alta</button>
    </form>
    
    {include 'templates/head.table.tpl'}
        {foreach from=$bandas item= datos}
                <td>{$datos->name}</td>
                <td>{$datos->album}</td>
                <td>{$datos->songs}</td>
                <td>{$datos->year}</td>
                <td><a href = "eliminar_banda/{$datos->id_b}">eliminar<a> | <a href =" editar_banda/{$datos->id_b}">editar<a></td>
            </tr>            
        {/foreach}
        </tbody>
     </table>
    </section>
    