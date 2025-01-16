<?php

namespace App\Models;

use App\Models\DB;

class Quizzes extends DB{
    public function create($title, $description, $user_id, $time_limit){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("INSERT INTO quizzes (title, description, user_id, time_limit, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("ssii", $title, $description, $user_id, $time_limit);
        $stmt->execute();
        $stmt->close();
        return $conn->insert_id;
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
    
    public function update($title, $description, $id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE quizzes SET title = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $title, $description, $id);
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