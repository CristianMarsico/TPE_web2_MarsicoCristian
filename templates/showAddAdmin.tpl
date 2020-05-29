   {include 'templates/header.tpl'}
   
   <div>
        <a class="navbar-brand" href="cerrar_sesion"><b>Cerrar Sesion</b></a>
    </div>
    <section class="container">
        <table class="table">
            <caption>Agregar Adminstrador</caption>
            <thead>
                <tr>
                    <th>Apellido/nombre</th>
                    <th>Nombre de usuario</th>
                    <th>Contraseña</th>
                    <th>Botón</th>
                </tr>
            </thead>
            
            <form action="guardar_user" method="POST">
                <tbody id="lista">
                    <tr>   
                        <td> <input type="text" name="apellido_nombre"></td>
                        <td> <input type="text" name="nombre_usuario"></td>
                        <td> <input type="text" name="pass"></td>
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
    <button type="submit" value="https://bcrypt-generator.com/">aca</button>