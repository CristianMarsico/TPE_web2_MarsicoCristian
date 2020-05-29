<?php
require_once 'libs/Smarty.class.php';

class PublicViews{
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
    public function showAllGenres($detalles, $error=null){ 
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
    }
     
    //MUESTRO EL "DETALLES" DE "LISTA COMPLETA"
     public function showDetails($detalles, $temas = null){
        // var_dump($detalles);die;
       //  $this->smarty->assign('datos', $detalles);
      //   $this->smarty->assign('can', $temas);
       // $this->smarty->display('templates/showDetails.tpl');


     echo $this->header();

        echo'<div class="card" style="width: 18rem;">';
        foreach ($detalles as $datos) {
            
        
            if (!empty($datos->image)){
        echo'        <img src="'.$datos->image.'" class="card-img-top" alt="...">';
            }else{
            echo'    <img src="images/cds/error.jpg" class="card-img-top" alt="...">';
            }
        echo'    <img src="css/cover.jpg" class="card-img-top" alt="...">
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
}






