<?php

class Dbh
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'movies';

    private function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    public function getAllMovies()
    {
        $sql = "SELECT * FROM movies";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getMovie($id)
    {
        $sql = "SELECT * FROM movies WHERE id = '$id'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll()[0];
    }

    public function insertMovie($movie_img, $movie_title, $movie_year, $movie_genre)
    {
        $sql = "INSERT INTO movies(movie_img, movie_title, movie_year, movie_genre) VALUES(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$movie_img, $movie_title, $movie_year, $movie_genre]);
    }

    public function updateMovie($id, $movie_img, $movie_title, $movie_year, $movie_genre)
    {
        $sql = "UPDATE movies SET movie_img=?, movie_title=?, movie_year=?, movie_genre=? WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$movie_img, $movie_title, $movie_year, $movie_genre, $id]);
    }

    public function deleteMovie($id)
    {
        $sql = 'DELETE FROM movies WHERE id=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}