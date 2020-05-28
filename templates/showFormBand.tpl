{include 'templates/header.tpl'}
    
    <div>
        <a class="navbar-brand" href="cerrar_sesion"><b>Cerrar Sesion</b></a>
    </div>
     <h1>Lista</h1>
        <form action="guardar_banda" method="POST">
          <label>nombre banda</label>
          <input type="text" name="nombre" placeholder="ingrese nombre de la banda" >

          <label>nombre del album</label>
          <input type="text" name="album" placeholder="ingrese nombre del cd" >

           <label>Ingrese temas del cd</label>
           <input type="text" name="canciones" placeholder="ingrese temas del cd separado por ," >

           <label>Ingrese año</label>
           <input type="text" name="anio">

           <label>Genero</label>
           <select name="genero">
                {foreach from=$bandas item= $band}
                   <option>{$band->id_g}</option>
                {/foreach}
            </select>
                   
            <input type="submit">

            {if $error}
                <div class="alert alert-danger">
                 {$error}
                </div>
            {/if}
        </form>

       