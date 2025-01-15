<?php

namespace App\Models;

use App\Models\DB;

class Questions extends DB{
    public function create($data){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("INSERT INTO questions (question, quiz_id) VALUES (?, ?)");
        $stmt->bind_param("si", $data['question'], $data['quiz_id']);
        $stmt->execute();
        $stmt->close();
    }
    
    public function get($id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }
    
    public function getAll(){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM questions");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function update($data){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE questions SET question = ? WHERE id = ?");
        $stmt->bind_param("si", $data['question'], $data['id']);
        $stmt->execute();
        $stmt->close();
    }
    
    public function delete($id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}