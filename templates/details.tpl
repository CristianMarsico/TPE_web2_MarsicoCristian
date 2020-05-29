{include 'templates/headerHome.tpl'}

<div class="card" style="width: 18rem;">
    {foreach from=$valor item= detalles}
    
    
        {if !empty($detalles->image)}
            <img src="{$detalles->image}" class="card-img-top" alt="...">
        {else}
            <img src="images/cds/error.jpg" class="card-img-top" alt="...">
        {/if}
    
        <div class="card-body">
            <h3 class="card-title">{$detalles->name}</h3>
            <h5 class="card-title">Album: {$detalles->album}</h5>
            <h5 class="card-text">Año: {$detalles->year}</h5>
        </div>
        <ol class="list-group list-group-flush">
            {foreach from=$temas item= tema}
                <li class="list-group-item">{$tema}</li>
            {/foreach}
        </ol>
    
    {/foreach}
</div>