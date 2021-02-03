<?php
// User class 
// for getting and setting database values 

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (nickname, password) VALUES(:nickname, :password)');

        //Bind Values
        $this->db->bind(':nickname', $data['nickname']);
        $this->db->bind(':password', $data['password']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($nickname, $password)
    {
        $this->db->query('SELECT * FROM users WHERE nickname = :nickname');
        $this->db->bind(':nickname', $nickname);

        $row = $this->db->singleRow();

        $hashed_password = $row['password'];
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function findUserByNickname($nickname)
    {
        $this->db->query('SELECT * FROM users WHERE nickname = :nickname');

        // Bind values
        $this->db->bind(':nickname', $nickname);

        $row = $this->db->singleRow();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $row = $this->db->singleRow();

        return $row;
    }
}