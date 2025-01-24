<?php 

namespace App\Models;

use App\Models\DB;

class Students extends DB{

    public function create(int $student_id, string $full_name, string $email, string $password) {
        $conn = $this->getConnection();
    
        $query_students = "INSERT INTO students (student_id, full_name, email, password) VALUES (?, ?, ?, ?)";
        $stmt_students = $conn->prepare($query_students);
        $stmt_students->bind_param('isss', $student_id, $full_name, $email, $password);
        
        if ($stmt_students->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    

    public function update(int $student_id, string $full_name, string $email, int $age, string $description, string $password) {
        $conn = $this->getConnection();
    
    
        $query_students = "UPDATE students SET full_name = ?, email = ?, password=?, age = ?, description = ? WHERE student_id = ?";
        $stmt_students = $conn->prepare($query_students);
        $stmt_students->bind_param('sssisi', $full_name, $email, $password, $age, $description, $student_id);
        
        
        if ($stmt_students->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function getStudent(int $student_id) {
        $conn = $this->getConnection();
    
        $query_students = "SELECT * FROM students WHERE student_id = ?";
        $stmt_students = $conn->prepare($query_students);
        $stmt_students->bind_param('i', $student_id);
        $stmt_students->execute();
        $result_students = $stmt_students->get_result();
        $student = $result_students->fetch_assoc();
    
        return $student;
    }
    
}