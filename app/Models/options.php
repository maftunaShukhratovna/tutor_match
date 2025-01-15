<?php 

namespace App\Models;

use App\Models\DB;

class Options extends DB{
    public function create($data){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("INSERT INTO options (option, question_id) VALUES (?, ?)");
        $stmt->bind_param("si", $data['option'], $data['question_id']);
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
    
    public function update($data){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("UPDATE options SET option = ? WHERE id = ?");
        $stmt->bind_param("si", $data['option'], $data['id']);
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