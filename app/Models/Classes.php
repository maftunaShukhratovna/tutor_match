<?php 

namespace App\Models;

use App\Models\DB;

class Classes extends DB{
    public function create(int $teacher_id, string $name, string $subject, string $format, string $place, string $duration, string $time, int $cost, string $description, int $seats) {
        $conn = $this->getConnection();
    
        $query = "INSERT INTO classes (teacher_id, name, subject, format, place, duration, time, cost, description, seats) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('issssssisi', $teacher_id, $name, $subject, $format, $place, $duration, $time, $cost, $description, $seats);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getClasses(int $teacher_id) {
        $conn = $this->getConnection();
    
        $query_classes = "SELECT * FROM classes WHERE teacher_id = ?";
        $stmt_classes = $conn->prepare($query_classes);
        $stmt_classes->bind_param('i', $teacher_id);
        $stmt_classes->execute();
        $result_classes = $stmt_classes->get_result();
        
        $classes = $result_classes->fetch_all(MYSQLI_ASSOC);
    
        return $classes;
    }

    public function getClassById(int $class_id) {
        $conn = $this->getConnection();
    
        $query_class = "SELECT * FROM classes WHERE id = ?";
        $stmt_class = $conn->prepare($query_class);
        $stmt_class->bind_param('i', $class_id);
        $stmt_class->execute();
        $result_class = $stmt_class->get_result();
        $class = $result_class->fetch_assoc();
    
        return $class;
    }
    
    public function updateClass(int $class_id, string $class_name, string $subject, string $format, string $place, string $duration, string $time, int $cost, string $description, int $seats) {
        $conn = $this->getConnection();
        
        $query = "UPDATE classes SET name = ?, subject = ?, format = ?, place = ?, duration = ?, time = ?, cost = ?, description = ?, seats = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssisii', $class_name, $subject, $format, $place, $duration, $time, $cost, $description, $seats, $class_id);
        
        return $stmt->execute();
    }
    
    public function delete(int $class_id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("DELETE FROM classes WHERE id = ?");
        $stmt->bind_param("i", $class_id);
        $stmt->execute();
        $stmt->close();
    }

    public function getAllClasses($studentId) {
        $conn = $this->getConnection();
    
        $query = "
            SELECT 
                c.*, 
                CASE 
                    WHEN r.student_id IS NOT NULL THEN 1 
                    ELSE 0 
                END AS is_registered
            FROM classes c
            LEFT JOIN register r 
                ON c.id = r.class_id AND r.student_id = ?
        ";
    
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $studentId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $classes = $result->fetch_all(MYSQLI_ASSOC);
    
        return $classes;
    }

    public function getMyClasses($studentId) {
        $conn = $this->getConnection();
    
        $query = "
            SELECT c.* 
            FROM classes c
            INNER JOIN register r 
                ON c.id = r.class_id 
            WHERE r.student_id = ?
        ";
    
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $studentId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    
    public function registerClass($student_id, $class_id){
        $conn = $this->getConnection();

    $query = "INSERT INTO register (student_id, class_id) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $student_id, $class_id);

    if ($stmt->execute()) {
        return true; 
    } else {
        return false; 
    }

    }
    
    public function deleteClass($student_id, $class_id){
        $conn = $this->getConnection();
        $stmt = $conn->prepare("DELETE FROM register WHERE student_id = ? AND class_id = ?");
        $stmt->bind_param("ii", $student_id, $class_id);
        $stmt->execute();
        $stmt->close();
    }
    

    
}