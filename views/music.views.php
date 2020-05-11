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
            <form action="home" method="get">
                <a class="btn btn-outline-success" href="home"> Home </a>
            </form>
            <form action="generos" method="get">
                <a class="btn btn-outline-success" href="generos"> Generos </a>
            </form>
            <form action="bandas" method="get">
                <a class="btn btn-outline-success" href="bandas">Lista Completa</a>
            </form>
        </nav>'; 
    }

    public function home(){
        echo $this->doctype();
        echo $this->nav();
    }
    
    //MUESTROS SOLAMENTE LOS GENEROS QUE TIENE LA TABLA
    public function showAllGenres($generos){    
        
        echo $this->doctype();
        echo $this->nav();


      echo '<ul>'; 
        foreach ($generos as $genres){
            $idGenres = $genres->id_g;
            echo'
               <li>'.$genres->genres.'<a
               
                href ="generos_musicales/'.$idGenres.'">Ver</a></li>';
            
        }
        echo '</ul>';  

    }

    //MUESTRO TODAS LAS BANDAS Y DETALLES ($bandas--> id_b, genero, album, nombre, canciones, año)
    public function showAllBands($bandas){
        //var_dump($bandas);die;
        echo $this->doctype();
        echo $this->nav();
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
                             <a class="btn btn-outline-dark" name="detalles" href="detalles/'.$bands->id_b.'"> Detalles </a> 
                        </div>    
                    </div>        
                </div>       
                ';
            }
        echo '</div>';
    }

}
