{include 'templates/header.tpl'}

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
                        <td><a href = "guardar_genero">Agregar<a>
                    </tr>
                </tbody>
            </form>
        </table>
    </section>