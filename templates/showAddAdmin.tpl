   {include 'templates/header.tpl'}

   <div class="container">
       <div class="row">
           <div class="col-12">
               <nav class="navbar navbar-light bg-light">
                   <a class="navbar-brand">Agregar</a>
                   <a class="btn btn-outline-dark" href="ABMuser">Volver</a>
                   <a class="btn btn-outline-dark" href="cerrar_sesion">Logout</a>
               </nav>
           </div>
       </div>
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