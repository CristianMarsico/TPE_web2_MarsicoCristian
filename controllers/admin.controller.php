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
        /**
         * no pongo el checklogged acá porque no me permitiria
         * acceso a la vista del form
         */
    }

    //verifica que exista un usuario loggeado 
    private function checklogged(){
        session_start();
      // var_dump($_SESSION);die;
        if (!isset($_SESSION['ID_USER'])){
            header('Location: ' . BASE_URL . 'admin');
            die();
        }
    }

    public function showForm(){
        
        $this->view->viewForm();
    }
    
    public function adminOption (){
        //barrera de seguridad
        $this->checklogged();
    
        $this->view->choseTask();   
    }

    public function show_A_B_M_Bands(){
        $this->checklogged();
      
        $bandas = $this->listAdmin->getAllBands();
        $this->view->showOptionsBands($bandas);
    }

    public function addBand(){
        $this->checklogged();

        $bandas = $this->modelGenres->getGenres();//ACA TENGO QUE PEDIR DE GENEROS

        $this->view->showFormBand($bandas);
    }

    public function saveBand(){
        $this->checklogged();

        if (empty($_POST['nombre']) 
            || empty($_POST['album']) 
            || empty($_POST['canciones'])
            || empty($_POST['anio']) 
            || empty($_POST['genero'])){
        $genero = $this->modelGenres->getGenres();//ACA TENGO QUE PEDIR DE GENEROS
        $this->view->showFormBand($genero, "Ud debe completar todos los campos");
       
        //var_dump($bandas); die;
        }
        else{
            $nombre = $_POST['nombre'];
            $album = $_POST['album'];
            $cancion=  $_POST['canciones'];
            $año= $_POST['anio'];
            $genero= $_POST['genero'];
            
            $this->modelAdmin->insert($nombre, $album, $cancion, $año, $genero);
         
           header('Location: ' . BASE_URL . 'ABMbandas');
        }
    }

    public function removeBand($id){
        $this->checklogged();

        $this->bandsModel->detele_band($id);
        header('Location: ' . BASE_URL . 'ABMbandas');

    }

    public function edit_Band($id){
        $this->checklogged();

        $obtenerId = $this->bandsModel->get($id);
       //var_dump($obtenerId);die;
        $this->view->showFormEditForBands($obtenerId);
    }

    public function save_edit_band(){//AGREGAR CONDICIONES
        $this->checklogged();
     
       if( empty($_POST['nombre'])
            ||empty($_POST['album'])
            ||empty($_POST['cancion'])
            ||empty($_POST['anio'])){
            echo' los campos estan vacios';
        }     
        $this->bandsModel->update($_POST['nombre'],
                                  $_POST['album'], 
                                  $_POST['cancion'],
                                  $_POST['anio'],
                                  $_POST['id']);
        
       header('Location: ' . BASE_URL . 'ABMbandas');   
    }

    public function show_A_B_M_Genres(){
        $this->checklogged();

        $generos = $this->modelGenres->getGenres();
       $this->view->showOptionsGenres($generos);
    }

    public function addGenres(){
        $this->checklogged();

        $this->view->showAddGenres();
    }

    public function saveGenre(){ //AGREGAR CONDICIONES
        $this->checklogged();

        if (empty($_POST['nombre_genero'])){
            $this->view->showAddGenres("Debe completar los campos");

        }else{
           $genero = $_POST['nombre_genero'];
           $this->modelGenres->insert($genero);
           header('Location: ' . BASE_URL . 'ABMgeneros');     
        }  
    }

    public function deleteGenre($id){
        $this->checklogged();

        $this->modelGenres->delete($id);
         header('Location: ' . BASE_URL . 'ABMgeneros');
    }

    public function editGenre($id){
        $this->checklogged();

        $obtenerId = $this->modelGenres->get($id);
      //var_dump($obtenerId);die;
      $this->view->showFormEditForGenres($obtenerId);
    }

    public function save_edit_genre(){
        $this->checklogged();

        if (empty($_POST['nombre_generos'])){
            echo' los campos estan vacios';
        }
        else{
            $this->modelGenres->update($_POST['id_genero'], $_POST['nombre_generos']);
             header('Location: ' . BASE_URL . 'ABMgeneros');
        }
    }
    
}