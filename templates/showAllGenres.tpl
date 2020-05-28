{include 'templates/headerHome.tpl'}

  <div class= "container">
     <div class="row">
          <div class="col-12">                
               <ul class="list-group">
                    <li class="list-group-item bg-dark text-white">Lista de Generos</li>
               <ul class="list-group">
      
        {foreach from=$detalles item= genres}
               <li class="list-group-item"> {$genres->genres} <a class="btn btn-light text-dark float-right"
               href ="generosmusicales/{$genres->id_g}">Ver</a></li>
        {/foreach}
                 </ul>
         </div>
      </div>
   </div>
                        