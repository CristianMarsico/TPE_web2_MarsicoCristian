<!DOCTYPE html>
<html lang="en">
        <head>
            <base href="{BASE_URL}">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="css/stylos.css">
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