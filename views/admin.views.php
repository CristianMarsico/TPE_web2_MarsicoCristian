<?php

class AdminViews{

    public function admin_Form (){

        echo'
            <form action= "admin" method= "POST">
                <input type="text" name="username" placeholder="nombre Usuario/Correo">
                <input type="password" name="pass" placeholder="contraseña">
                <button type="submit">Cargar</button>   
            </form>
        ';

    }
}