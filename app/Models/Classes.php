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
    

    
}