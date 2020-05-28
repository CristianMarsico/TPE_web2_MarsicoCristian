<?php
require_once 'libs/Smarty.class.php';
class allViews{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }


    public function header(){
        $this->smarty->display('templates/headerHome.tpl'); 


    }
    
    public function home(){
        echo $this->header();
        echo'<div class= "container">
        <div class="row">
        <div class="col-6">
        <img src="img/portada.jpg" class="img-fluid" alt="portada del sitio"  >
        </div>
        <div class="col-6">
        <img src="img/portada2.jpg" class="img-fluid" alt="portada del sitio"  >
        </div>
        <div class="col-6">
        <img src="img/portada3.jpg" class="img-fluid" alt="portada del sitio"  >
        </div>
        <div class="col-6">
        <img src="img/portada4.jpg" class="img-fluid" alt="portada del sitio"  >
        </div>
        </div>
        </div>
        
        </body>
        </html>      ';  
    }
 

    //MUESTROS "GENEROS"
    public function showAllGenres($detalles){ 
       // var_dump($detalles) ;die;
       $this->smarty->assign('detalles', $detalles);
      // $this->smarty->assign('error', $detalles);
       $this->smarty->display('templates/showAllGenres.tpl'); 
    }
    
    //MUESTRO QUE TIENE EL "VER" DE "GENEROS" (GENEROS -> VER)
    public function showBandsForGenres($detalles){
       $this->smarty->assign('detalles', $detalles);
       $this->smarty->display('templates/showBandsForGenres.tpl');
    }


    //MUESTRO "LISTA COMPLETA" ($bandas--> id_b, genero, album, nombre, canciones, año)
    public function showAllBands($bandas){
        $this->smarty->assign('bandas', $bandas);
        $this->smarty->display('templates/showAllBands.tpl');
        //var_dump($bandas);die;
      
      
      /*  echo $this->header();
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
            */
    }
     
    //MUESTRO EL "DETALLES" DE "LISTA COMPLETA"
     public function showDetails($detalles){
        echo $this->header();
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

public function error(){
    echo'falta cd';
}
    //----------------------------------------ADMINISTRADOR-------------------------------------->
   
}
