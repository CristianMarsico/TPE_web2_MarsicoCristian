{include 'templates/headerHome.tpl'}

   {$titulo = $detalles[0]->genres}
       
        <div class="card-header">    
                <h1 >{$titulo}</h1>
        </div>
        <div class="conteiner-fluid"> <div class="row">
        {foreach from=$detalles item= ge}
                <div class="col-3">
                    <div class="card border-light mb-3" style="max-width: 18rem;"">
                        <img src="css/cover.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{$ge->name}</h5>
                            <p class="card-text">CD: {$ge->album}</p>
                            <a class="btn btn-outline-dark" href="detalles/{$ge->id_b}"> ver CD </a> 
                        </div>    
                    </div>        
                </div>       
            
        {/foreach}
        </div>
        