{include 'templates/header.tpl'}

    <h1>Aca podrá hacer cambios en la tabla</h1>
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