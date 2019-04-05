<?php

include_once 'db.php';
//funcionalidades de una pelicula 
class Pelicula extends DB{
    
    function obtenerPeliculas(){
        $query = $this->connect()->query('SELECT * FROM pelicula'); //Obtiene objetos de la bd
        return $query;
    }

    function obtenerPelicula($id){
        $query = $this->connect()->prepare('SELECT * FROM pelicula WHERE id = :id'); // busca una pelicula en espedifico en la bd
        $query->execute(['id' => $id]);
        return $query;
    }

    function nuevaPelicula($pelicula){
        $query = $this->connect()->prepare('INSERT INTO pelicula (nombre, imagen) VALUES (:nombre, :imagen)');
        $query->execute(['nombre' => $pelicula['nombre'], 'imagen' => $pelicula['imagen']]);
        return $query;
    }

}

?>