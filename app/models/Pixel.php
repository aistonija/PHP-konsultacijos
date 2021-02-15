<?php

class Pixel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Add New Pixel to database and action to activity log
    public function addPixel($data)
    {
        $this->db->query('INSERT INTO pixels (user_id, pixel_x, pixel_y, color, size) VALUES(:user_id, :pixel_x, :pixel_y, :color, :size)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':pixel_x', $data['pixel_x']);
        $this->db->bind(':pixel_y', $data['pixel_y']);
        $this->db->bind(':color', $data['color']);
        $this->db->bind(':size', $data['size']);

        //Execute
        if ($this->db->execute()) {
            $this->addPixelToActivityLog($this->db->lastInsertedId(), $data, 'Created');
            return true;
        } else {
            return false;
        }
    }

    // // Add New Pixel to database and action to activity log
    // public function validateCoordinatesAddPixel($data)
    // {
    //     $this->db->query('INSERT INTO pixels (user_id, pixel_x, pixel_y, color, size) VALUES(:user_id, :pixel_x, :pixel_y, :color, :size)');

    //     $this->db->bind(':user_id', $data['user_id']);
    //     $this->db->bind(':pixel_x', $data['pixel_x']);
    //     $this->db->bind(':pixel_y', $data['pixel_y']);
    //     $this->db->bind(':color', $data['color']);
    //     $this->db->bind(':size', $data['size']);

    //     //Execute
    //     if ($this->db->execute()) {
    //         $this->addPixelToActivityLog($this->db->lastInsertedId(), $data, 'Created');
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // Retrieve all users pixels from database
    public function getAllPixels()
    {
        $this->db->query('SELECT * FROM pixels');
        return $this->db->resultSet();
    }

    // Retrieve logged user pixels
    public function getUserPixels($user_id)
    {
        $this->db->query("SELECT * FROM pixels WHERE user_id = :user_id");
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    //Add pixel to activity log
    public function addPixelToActivityLog($id, $data, $action)
    {
        $this->db->query('INSERT INTO activity_log (pixel_id, user_id, pixel_x, pixel_y, color, size, action) VALUES(:pixel_id, :user_id, :pixel_x, :pixel_y, :color, :size, :action)');

        $this->db->bind(':pixel_id', $id);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':pixel_x', $data['pixel_x']);
        $this->db->bind(':pixel_y', $data['pixel_y']);
        $this->db->bind(':color', $data['color']);
        $this->db->bind(':size', $data['size']);
        $this->db->bind(':action', $action);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get one pixel by id
    public function getPixelById($pixel_id)
    {
        $this->db->query('SELECT * FROM pixels WHERE pixel_id = :pixel_id');
        $this->db->bind(':pixel_id', $pixel_id);
        return $this->db->single();
    }

    // Update Pixel and add action to activity log
    public function updatePixel($data)
    {
        $this->db->query('UPDATE pixels SET pixel_x = :pixel_x, pixel_y = :pixel_y, color = :color, size = :size WHERE pixel_id = :pixel_id');

        $this->db->bind(':pixel_id', $data['pixel_id']);
        $this->db->bind(':pixel_x', $data['pixel_x']);
        $this->db->bind(':pixel_y', $data['pixel_y']);
        $this->db->bind(':color', $data['color']);
        $this->db->bind(':size', $data['size']);

        // Execute
        if ($this->db->execute()) {
            $this->addPixelToActivityLog($data['pixel_id'], $data, 'Edited');
            return true;
        } else {
            return false;
        }
    }

    //Delete pixel from db and add action to activity log
    public function deletePixel($id)
    {
        //Save copy of pixel information before deleting
        $currentPixel = $this->getPixelById($id);

        $this->db->query("DELETE FROM pixels WHERE pixel_id = :pixel_id");
        $this->db->bind(':pixel_id', $id);
        // make query 
        if ($this->db->execute()) {
            $this->addPixelToActivityLog($id, $currentPixel, 'Deleted');
            return true;
        } else {
            return false;
        }
    }

    public function getUserPixelsActivity($user_id)
    {
        $this->db->query("SELECT * FROM activity_log WHERE user_id = :user_id");
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }
}