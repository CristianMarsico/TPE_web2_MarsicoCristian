

        <div class="card" style="width: 18rem;">
            {foreach from= $detalles item=datos}
               <!-- {if !empty($datos->image)}
                    <img src="{$datos->image}" class="card-img-top" alt="...">
                {else}
                    <img src="images/cds/error.jpg" class="card-img-top" alt="...">
                 {/if} -->
                <div class="card-body">
                    <h3 class="card-title">{$datos->name}</h3>
                    <h5 class="card-title">Album: {$datos->album}</h5>
                    <h5 class="card-text">Año: {$datos->year}</h5>
                </div>   
                  <!--  <ol class="list-group list-group-flush">
                        {foreach from=$temas item= can}
                            <li class="list-group-item">{$can}</li>            
                        {/foreach}
                    </ol> -->
                            
            {/foreach}
        </div>  
    }