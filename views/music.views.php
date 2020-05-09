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
            <form action="cursos" method="get">
                <a class="btn btn-outline-success" href="cursos">Lista Completa</a>
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

}
