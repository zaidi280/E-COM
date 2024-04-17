<?php

class connexion
{
    public function CNXbase()
    {
        $dbc = new PDO('mysql:host=localhost;dbname=ecomds', 'root', '');
        return $dbc;
    }
}
?>
