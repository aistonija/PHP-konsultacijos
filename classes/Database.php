<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'game';

    private function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getUser($nickname)
    {
        $sql = "SELECT * FROM users WHERE nickname = '$nickname'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function createUser($nickname, $password)
    {
        $sql = "INSERT INTO users(nickname, password) VALUES(?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$nickname, $password]);
    }

    public function addBalance($id, $balance)
    {
        $sql = "UPDATE users SET balance=balance+? WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$balance, $id]);
    }

    public function removeBalance($id, $balance)
    {
        $sql = "UPDATE users SET balance=balance-? WHERE id=? AND balance >= ?";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute([$balance, $id, $balance])) {
            return $stmt->rowCount() > 0;
        }

        return false;
    }
}