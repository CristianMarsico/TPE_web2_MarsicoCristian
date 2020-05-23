<?php

require_once 'libs/Smarty.class.php';

class AdminViews{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }
    
        
    

    public function viewForm (){
        $this->smarty->display('templates/viewForm.tpl');

       
     /*   echo'
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Trabajo practico especial</title>
        </head>
        <body>
        
        
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center bg-danger text-white">Acceso privado</h3>
                    <form action= "logging" method= "POST">
                        <div class="form-group">
                            <label><b>Nombre/Usuario/correo</b></label>
                            <input type="text" class="form-control" name="username" placeholder="Name/User/email">
                        </div>   
                        <div class="form-group">
                            <label><b>Contraseña</b></label>
                             <input type="password" class="form-control" name="pass" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Cargar</button>   
                    </form>
                </div>
            </div>
        </div>
       ';    
        //INCLUIR FOOTER
        */  
    }
    public function accessGranted($name){
        //INCLUIR HEADER
        echo'
        <div>
            <a class="navbar-brand" href="cerrar_sesion"><b>Cerrar Sesion</b></a>
        </div>
        <h1> Bienvenido <b>' .$name. '</b>'.'</h1>
        <p>ud está autorizado para acceder al A/B/M de la base de datos</p>
        <a href= "tareas">ACCEDER<a/>
        ';
        //INCLUIR FOOTER
    }
    public function choseTask(){
        echo'<html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Trabajo practico especial</title>
        </head>
        <body>';
        echo' 
        
                 
                 <form action="ABMbandas" method="POST">
                    <label>A/B/M de las bandas</label>
                     <button type="submit">Ir a ABM</button>
                 </form>
                   
                <form action="ABMgeneros" method="POST">
                     <label>A/B/M de los generos</label>
                     <button type="submit">Ir o ABM</button>
                 </form>
     
        ';
        //INCLUIR FOOTER
    }
    public function showOptionsBands($bandas){
        //var_dump($_POST);die;
        echo'<html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/stylos.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Trabajo practico especial</title>
        </head>
        <body>';
        echo
        '<div>
            <h1>ABM DE LAS BANDAS</h1>
            <b class="navbar-brand">En esta sección usted podrá hacer ALTAS, BAJAS y MODIFICACIONES de Bandas.</b><br>
            <b class="navbar-brand">Seleccione una OPCIÓN.</b>
        </div>
        <form action="agregar_banda" method="POST">
            <label><b>Agregar una nueva banda a la BBDD</b></label>
            <button type="submit">Dar de Alta</button>
        </form>
        
        
                <section class="container">
                <table class="table">
                    <caption>LISTA DE PRODUCTOS</caption>
                    <thead>
                        <tr>
                            <th>nombre</th>
                            <th>album</th>
                            <th>canciones</th>
                            <th>año</th>
                            <th>Botones</th>
                        </tr>
                    </thead>
                    <tbody id="lista">
                    <tr>';
                    foreach ($bandas as $datos) {
                        echo'<td>'.$datos->name.'</td>';
                        echo'<td>'.$datos->album.'</td>';
                        echo'<td>'.$datos->songs.'</td>';
                        echo'<td>'.$datos->year.'</td>';
                        echo'<td><a href = "eliminar_banda/'.$datos->id_b.'">eliminar<a>'." / ".'<a href = "editar_banda/'.$datos->id_b.'">editar<a></td>';
                        echo' </tr>';
                    }
                echo' 
                  </tbody>
                </table>
                 </section>
        
        
        ';



    }
    public function showFormBand($bandas){
        //var_dump($bandas);

        echo'  <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/stylos.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Trabajo practico especial</title>
        </head>
        
            <h1>Lista</h1>
            <form action="guardar_banda" method="POST">
                <label>nombre banda</label>
                <input type="text" name="nombre" placeholder="ingrese nombre de la banda" >

                <label>nombre del album</label>
                <input type="text" name="album" placeholder="ingrese nombre del cd" >

                <label>Ingrese temas del cd</label>
                <input type="text" name="canciones" placeholder="ingrese temas del cd separado por "," >

                <label>Ingrese año</label>
                <input type="text" name="año" placeholder="ingrese año">

                <label>Genero</label>
                <select name="genero">';
                    foreach ($bandas as $band){
                        echo'<option>'.$band->id_g.'</option>';
                    }
                 echo'</select>
                   
                    <input type="submit">
            </form>
            ';
        }
        
        public function showFormEditForBands($id){
           
          
            echo'  <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/stylos.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Trabajo practico especial</title>
        </head>
            
            
        <h1>Aca podrá hacer cambios en la tabla</h1>';
        echo' <section class="container">
        
        <table class="table">
            <caption>LISTA DE PRODUCTOS</caption>
                    <thead>
                    <tr>
                            <th>nombre</th>
                            <th>album</th>
                            <th>canciones</th>
                            <th>año</th>
                            <th>Botones</th>
                        </tr>
                    </thead>
                    <tbody id="lista">
                    <tr>
                    
            
                        ';
                        
                                
                        echo' <form action="guardar_edicion_banda" method="POST">';
                                foreach ($id as $datos) {
                                    echo'<input type="hidden" name="id" value="'. $datos->id_b.'">';
                                    echo'<td> <input type="text" name="nombre" value="'. $datos->name.'"></td>';
                                    echo ' <td><input type="text" name="album" value="'. $datos->album.'"></td>';
                                    echo ' <td><input type="text" name="cancion" value="'. $datos->songs.'"></td>';
                                    echo '<td> <input type="text" name="año" value="'. $datos->year.'"></td>';
                                    echo'<td><button type="submit">Modificar datos</button>';
                                    echo' </tr>';
                                }
                                echo' </form>';
                                echo' 
            </tbody>
            </table>
             </section>';
            
          
      
   
    }
    
}