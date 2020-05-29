{include 'templates/header.tpl'}

<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Editar</a>
                <a class="btn btn-outline-dark" href="ABMbandas">volver</a>
                <a class="btn btn-outline-dark" href="cerrar_sesion">Logout</a>
            </nav>
        </div>
    </div>
</div>
{include 'templates/head.table.tpl'}

<form action="guardar_edicion_banda" method="POST">
    {foreach from=$id item= datos}
        <input type="hidden" name="id" value="{$datos->id_b}">
        <td> <input type="text" name="nombre" value="{$datos->name}"></td>
        <td><input type="text" name="album" value="{$datos->album}"></td>
        <td><input type="text" name="cancion" value="{$datos->songs}"></td>
        <td> <input type="text" name="anio" value="{$datos->year}"></td>
        <td><button type="submit">Modificar datos</button>
            </tr>
        {/foreach}
</form>

</tbody>
</table>
</section>