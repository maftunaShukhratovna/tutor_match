<?php 

namespace App\Models;

use App\Models\DB;

class Options extends DB{
    public function create($question_id, $option_text, $is_correct){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("INSERT INTO options (option_text, question_id, is_correct) VALUES (?, ?, ?)");
        $is_correct = (int)$is_correct;
        $stmt->bind_param("sii", $option_text, $question_id, $is_correct);
        $stmt->execute();
        $stmt->close();
    }
    
    public function get($id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM options WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }
    
    public function getAll(){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM options");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    
    public function update($id, $option_text, $is_correct){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE options SET option_text = ?, is_correct=? WHERE id = ?");
        $is_correct = (int) $is_correct;
        $stmt->bind_param("ssi", $option_text, $is_correct, $id);
        $stmt->execute();
        $stmt->close();
    }
    
    public function delete($id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("DELETE FROM options WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}