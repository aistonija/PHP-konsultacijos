<?php
// User class 
// for getting and setting database values 

class Balance
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function changeBalance($data)
    {
        $this->db->query('UPDATE users SET balance = :balance WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':balance', $data['balance']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addBalance($id, $value)
    {
        $this->db->query('UPDATE users SET balance = balance + :value WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':value', $value);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function withdrawBalance($id, $value)
    {
        $this->db->query('UPDATE users SET balance = balance - :value WHERE id = :id AND balance >= :value');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':value', $value);

        // Execute
        if ($this->db->execute()) {
            return $this->db->rowCount() > 0;
        }
    }

    public function getBalanceById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->singleRow();
        return $row['balance'];
    }
}