<?php

namespace App\Models;

use App\Models\DB;

class Questions extends DB{
    public function create($quiz_id, $question_text){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("INSERT INTO questions (question_text, quiz_id, created_at, updated_at) VALUES (?, ?, NOW(), NOW())");
        $stmt->bind_param("si", $question_text, $quiz_id);
        $stmt->execute();
        $stmt->close();
        return $conn->insert_id;
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
    
    public function update($id, $question_text){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE questions SET question_text = ? WHERE id = ?");
        $stmt->bind_param("si", $question_text, $id);
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