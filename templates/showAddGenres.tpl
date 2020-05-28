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
            <form action="guardar_genero" method="POST">
                <tbody id="lista">
                    <tr>   
                        <td> <input type="text" name="nombre_genero"></td>
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