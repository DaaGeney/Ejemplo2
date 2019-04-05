<?php

include_once 'db.php';
//funcionalidades de una pelicula 
class Pelicula extends DB{
    
    //Obtiene todas las películas de la base de datos
    function obtenerPeliculas(){
        $query = $this->connect()->query('SELECT * FROM pelicula'); //Obtiene objetos de la bd
        return $query;
    }

    //Obtiene una película en específico de la BD
    function obtenerPelicula($id){
        $query = $this->connect()->prepare('SELECT * FROM pelicula WHERE id = :id'); // busca una pelicula en espedifico en la bd
        $query->execute(['id' => $id]);
        return $query;
    }

    //Crea una nueva película insertandola en la base de datos
    function nuevaPelicula($pelicula){
        $query = $this->connect()->prepare('INSERT INTO pelicula (nombre, imagen) VALUES (:nombre, :imagen)');
        $query->execute(['nombre' => $pelicula['nombre'], 'imagen' => $pelicula['imagen']]);
        return $query;
    }

    //Elimina una película de la BD
    function eliminarPelicula($id){
        //DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';
        $query = $this->connect()->prepare('DELETE FROM pelicula WHERE id = :id');
        $query->execute(['id' => $id]);
    }

}

?>