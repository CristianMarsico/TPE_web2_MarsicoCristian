<?php
require_once 'models/admin.model.php';
require_once 'views/admin.views.php';
require_once 'models/list.model.php';
require_once 'models/bands.model.php';



class AdminController{

    private $modelGenres;
    private $modelAdmin;
    private $listAdmin;
    private $bandsModel;

    private $view;


    public function __construct(){
        $this->modelAdmin = new AdminModel();
        $this->view = new AdminViews();
        $this->modelGenres = new GenresModel();
        $this->listAdmin = new ListModel();
        $this->bandsModel = new BandsModel();

        

    } 
    public function showForm(){
        $this->view->viewForm();
    }
    
    public function loggin(){
      if(empty($_POST['username']) || empty($_POST['pass'])){
         echo'<script>alert("No ingreso todos los datos requeridos")</script>';
       }
        else{
          
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $administradores = $this->modelAdmin->getAllAdmin();
            
            foreach ($administradores as $admin) {
                    $name = $admin->name_admin;
                    if (($admin->user_name == $username) && ($admin->pass == $pass)){
                        echo'<script>alert("Hola administrador '.$name.'")</script>';
                        $this->view->accessGranted($name);
                        die();
                    }else{
                        //header('Location: ' . BASE_URL . 'admin');
                        echo $username. 'desconociodo';
                        echo'<script>alert("Usuario desconocido")</script>';
                    }        
             }
        }     
    }
    public function adminOption (){
    
        $this->view->choseTask();   
    }

    public function show_A_B_M_Bands(){
      
        $bandas = $this->listAdmin->getAllBands();
        $this->view->showOptionsBands($bandas);
    }

    public function addBand(){

        $bandas = $this->modelGenres->getGenres();//ACA TENGO QUE PEDIR DE GENEROS

        $this->view->showFormBand($bandas);
    }

    public function saveBand(){
        if (empty($_POST['nombre']) 
            || empty($_POST['album']) 
            || empty($_POST['canciones'])
            || empty($_POST['año']) 
            || empty($_POST['genero'])){
            echo'deber ingresar todos los datos';    
        }
        else{
            $nombreCD = $this->modelAdmin->get($_POST['album']);
           // var_dump($name, $album);die;
            if($nombreCD == ($_POST['album'])){
                echo'el cd ya existe';
            }else{
                $this->modelAdmin->insert($_POST['nombre'], $_POST['album'], $_POST['canciones'], 
                                            $_POST['año'], $_POST['genero']);
                echo'bien';
            }
        }
        header('Location: ' . BASE_URL . 'ABMbandas');
    }

    public function removeBand($id){
        $this->bandsModel->detele_band($id);
        header('Location: ' . BASE_URL . 'ABMbandas');

    }

    public function edit_Band($id){
        $obtenerId = $this->bandsModel->get($id);
       //var_dump($obtenerId);
        $this->view->showFormEditForBands($obtenerId);
    }

    public function save_edit_band(){
       // var_dump($_POST);
        //echo empty($_POST['nombre']);
       if( empty($_POST['nombre'])
            ||empty($_POST['album'])
            ||empty($_POST['cancion'])
            ||empty($_POST['anio'])){
            echo' los campos estan vacios';
        }
        
        
            $this->bandsModel->update($_POST['id'],
                                      $_POST['nombre'],
                                      $_POST['album'], 
                                      $_POST['cancion'],
                                      $_POST['anio']);
        
      //  header('Location: ' . BASE_URL . 'ABMbandas');

    
    }

    public function show_A_B_M_Genres(){
       $generos = $this->modelGenres->getGenres();
       $this->view->showOptionsGenres($generos);
    }

    public function addGenres(){
        $this->view->showAddGenres();
    }

    public function saveGenre(){
        if (empty($_POST['nombre_genero'])){
           
          //  echo'ingrese datos';
        }else{
           /* $generos = $this->modelGenres->getGenres();
            if ($generos == $_POST['nombre_genero']){
                var_dump($_POST);die;
                echo'el genero ya existe';
            }else{
                $this->modelGenres->inset($_POST['nombre_genero']);
                echo'genero guardado';
            }*/
          $this->modelGenres->inset($_POST['nombre_genero']);
          var_dump($_POST);
        }  
    }
    // TODO CREAR EL ACCESO PERMITIDO Y EL DENEGADO
    //TODO CREAR LOS TEMPLATES
}