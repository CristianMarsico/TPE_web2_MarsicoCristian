{include 'templates/headerHome.tpl'}

<div class="list-group-item list-group-item-warning border border-dark">
    <h2>Todos los Generos <h2>
</div>


<div class="conteiner-fluid">
    <div class="row">
        {foreach from=$bandas item= bands}
            <div class="col-3">
                <div class="card border-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">{$bands->genres}</div>
    
                    {if !empty ($bands->image)}
                        <img src="{$bands->image}" class="card-img-top" alt="...">
                    {else}
                        <img src="images/cds/error.jpg" class="card-img-top" alt="...">
                    {/if}
                    <!-- <img src="css/cover.jpg" class="card-img-top" alt="...">-->
                    <div class="card-body">
                        <h5 class="card-title">{$bands->name}</h5>
                        <p class="card-text">CD: {$bands->album}</p>
                        <a class="btn btn-outline-dark" href="detalles/{$bands->id_b}"> Detalles </a>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>