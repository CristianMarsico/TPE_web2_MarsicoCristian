<?php
class MusicViews{

    public function doctype(){
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>IDC</title>
        </head>
        <body>';

        return $html;
        
    }
    public function nav(){
        echo '
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand"> <b>Mi musica de compu</b> </a>        
            <a class="btn btn-outline-success" name="home" href="home"> Home </a>
            <a class="btn btn-outline-success" name ="generos" href="generos"> Generos </a>
            <a class="btn btn-outline-success" name= "bandas" href="bandas">Lista Completa</a>
            
        </nav>'; 
    }

    public function home(){
        echo $this->doctype();
        echo $this->nav();
    }
 

    //MUESTROS "GENEROS"
    public function showAllGenres($generos){    
        
      
        echo $this->home();

      echo '<ul>'; 
        foreach ($generos as $genres){
            echo'
               <li>'.$genres->genres.'<a
               href ="generosmusicales/'.$genres->id_g.'">Ver</a></li>';    
        }
        echo '</ul>';  

    }
    
    //MUESTRO QUE TIENE EL "VER" DE "GENEROS" (GENEROS -> VER)
    public function showBandsForGenres($generos){
        echo $this->doctype();
        echo $this->nav();
        
       $titulo = $generos[0]->genres; //obtengo una variable que uso en el titulo.
     
        echo'<h1>'.$titulo.'</h1>';//imprimo la variable

        echo'<ol>';
        foreach ($generos as $ge){
            echo'
               
                <li>'.$ge-> name.'</li>
                <li>'.$ge-> album.'</li>
                <a class="btn btn-outline-dark" href="detalles/'.$ge->id_b.'">Ver CD</a>
            ';
            
        }
        echo'</ol>';   
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
        $canciones = $detalles[0]->songs; //en una variable meto las canciones
        $temas = explode(",", $canciones);//hago un array de todas las canciones
        
       
       
       
        foreach ($detalles as $datos) {
             echo'
                 <h3>Banda/Artista: '.$datos->name.'</h3><p>
                 <h4>Album: '.$datos->album.'</h4>
                 <h4>Año: '.$datos->year.'</h4>';
                 echo'<ol>';
                     foreach ($temas as $can) {
                      echo' <li><b>'.$can.'</b></li>';                
                      }
                 echo'</ol>
                 ';       
        }      
     

    
    }
    

    
    
   



   
}
