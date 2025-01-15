<?php

namespace App\Models;

use App\Models\DB;

class Quizzes extends DB{
    public function create($data){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("INSERT INTO quizzes (title, description, user_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $data['title'], $data['description'], $data['user_id']);
        $stmt->execute();
        $stmt->close();
    }
    
    public function get($id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM quizzes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }
    
    public function getAll(){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM quizzes");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function update($data){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE quizzes SET title = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $data['title'], $data['description'], $data['id']);
        $stmt->execute();
        $stmt->close();
    }
    
    public function delete($id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("DELETE FROM quizzes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}