<?php
class allViews{

    public function header(){
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Trabajo practico especial</title>
        </head>
        <body>';
        echo '
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand"> <b>Mi musica de compu</b> </a>        
            <a class="btn btn-outline-success" name="home" href="home"> Home </a>
            <a class="btn btn-outline-success" name ="generos" href="generos"> Generos </a>
            <a class="btn btn-outline-success" name= "bandas" href="bandas">Lista Completa</a>     
        </nav>'; 

        return $html;        
    }
    

    public function home(){
        echo $this->header();        
    }
 

    //MUESTROS "GENEROS"
    public function showAllGenres($detalles){    
        
      
        echo $this->home();

      echo '<ul>'; 
        foreach ($detalles as $genres){
            echo'
               <li>'.$genres->genres.'<a
               href ="generosmusicales/'.$genres->id_g.'">Ver</a></li>';    
        }
        echo '</ul>';  

    }
    
    //MUESTRO QUE TIENE EL "VER" DE "GENEROS" (GENEROS -> VER)
    public function showBandsForGenres($detalles){
        //var_dump($detalles);die;
        echo $this->home();     
       $titulo = $detalles[0]->genres; //obtengo una variable que uso en el titulo.
     
        echo'
             <div class="card-header">    
                <h1 >'.$titulo.'</h1>';          //imprimo la variable
        echo'</div>';
        echo '<div class="conteiner-fluid"> <div class="row">';
        foreach ($detalles as $ge){
            //var_dump($detalles);die;
            echo'
                <div class="col-3">
                    <div class="card border-light mb-3" style="max-width: 18rem;"">
                        <img src="css/cover.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$ge->name.'</h5>
                            <p class="card-text">CD: '.$ge->album.'</p>
                            <a class="btn btn-outline-dark" href="detalles/'.$ge->id_b.'"> vercd </a> 
                        </div>    
                    </div>        
                </div>       
            ';
        }
        echo '</div>';
    }


    //MUESTRO "LISTA COMPLETA" ($bandas--> id_b, genero, album, nombre, canciones, año)
    public function showAllBands($bandas){
        //var_dump($bandas);die;
        echo $this->home();
        echo '
        <div class="list-group-item list-group-item-warning border border-dark">
            Todos los Generos 
        </div>';
        
        
        echo '<div class="conteiner-fluid"> <div class="row">';    
            foreach ($bandas as $bands) {
               
                echo'
                <div class="col-3">
                <div class="card border-light mb-3" style="max-width: 18rem;"">
                    <div class="card-header">'.$bands->genres.'</div>
                     <img src="css/cover.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$bands->name.'</h5>
                            <p class="card-text">CD: '.$bands->album.'</p>
                             <a class="btn btn-outline-dark" href="detalles/'.$bands->id_b.'"> Detalles </a> 
                        </div>    
                    </div>        
                </div>       
                ';
            }
        echo '</div>';

    }
     
    //MUESTRO EL "DETALLES" DE "LISTA COMPLETA"
     public function showDetails($detalles){
        echo $this->home();
        $canciones = $detalles[0]->songs; //en una variable meto las canciones
        $temas = explode(",", $canciones);//hago un array de todas las canciones
        
        echo'<div class="card" style="width: 18rem;">';
        foreach ($detalles as $datos) {
            
            echo'
            <img src="css/cover.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h3 class="card-title">'.$datos->name.'</h3>
                <h5 class="card-title">Album: '.$datos->album.'</h5>
                <h5 class="card-text">Año: '.$datos->year.'</h5>
            </div>';     
                 echo'<ol class="list-group list-group-flush">';
                     foreach ($temas as $can) {
                      echo'<li class="list-group-item">'.$can.'</li>';                
                      }
                 echo'</ol>
                 ';       
        } 
        echo'</div>';    
    }

    //----------------------------------------ADMINISTRADOR-------------------------------------->
   
}
