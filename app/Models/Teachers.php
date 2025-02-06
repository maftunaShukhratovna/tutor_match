<?php 

namespace App\Models;

use App\Models\DB;

class Teachers extends DB{

    public function create(int $teacher_id, string $full_name, string $email, string $password) {
        $conn = $this->getConnection();
    
        $query_teachers = "INSERT INTO teachers (teacher_id, full_name, email, password) VALUES (?, ?, ?, ?)";
        $stmt_teachers = $conn->prepare($query_teachers);
        $stmt_teachers->bind_param('isss', $teacher_id, $full_name, $email, $password);
        
        if ($stmt_teachers->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    

    public function update(int $teacher_id, string $full_name, string $email, string $birth_date, string $province, string $description, string $password) {
        $conn = $this->getConnection();
    
    
        $query_teachers = "UPDATE teachers SET full_name = ?, email = ?, password=?, birth_date = ?, province=?, description = ? WHERE teacher_id = ?";
        $stmt_teachers = $conn->prepare($query_teachers);
        
        $stmt_teachers->bind_param('ssssssi', $full_name, $email, $password, $birth_date, $province, $description, $teacher_id);
        
        
        if ($stmt_teachers->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function educationInfo(int $teacher_id, string $university, string $degree){
        $conn = $this->getConnection();
    
        $query_teachers = "INSERT INTO education (teacher_id, university_name, degree) VALUES (?, ?, ?)";
        $stmt_teachers = $conn->prepare($query_teachers);
        $stmt_teachers->bind_param('iss', $teacher_id, $university, $degree);
        
        if ($stmt_teachers->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function experienceInfo(int $teacher_id, int $student_numbers, int $experience_years, string $subject, string $workplace){
        $conn = $this->getConnection();
    
        $query_teachers = "INSERT INTO experience (teacher_id, student_numbers, experience_years, subject, workplace) VALUES (?, ?, ?, ?, ?)";
        $stmt_teachers = $conn->prepare($query_teachers);
        $stmt_teachers->bind_param('iiiss', $teacher_id, $student_numbers, $experience_years, $subject, $workplace);
        
        if ($stmt_teachers->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function getTeacher(int $teacher_id) {
        $conn = $this->getConnection();
    
        $query_teachers = "SELECT * FROM teachers WHERE teacher_id = ?";
        $stmt_teachers = $conn->prepare($query_teachers);
        $stmt_teachers->bind_param('i', $teacher_id);
        $stmt_teachers->execute();
        $result_teachers = $stmt_teachers->get_result();
        $teacher = $result_teachers->fetch_assoc();
    
        return $teacher;
    }

    public function getNewTeachers() {
        $conn = $this->getConnection();
    
        // Pending statusdagi ustozlarni olish
        $query_teachers = "SELECT * FROM teachers WHERE status = ?";
        $stmt_teachers = $conn->prepare($query_teachers);
        $status = "pending";
        $stmt_teachers->bind_param('s', $status);
        $stmt_teachers->execute();
        $result_teachers = $stmt_teachers->get_result();
        $teachers = $result_teachers->fetch_all(MYSQLI_ASSOC);
    
        // Har bir ustoz uchun education va experience qo'shish
        foreach ($teachers as &$teacher) {
            $teacher_id = $teacher['id'];
    
            // Education ma'lumotlarini olish
            $query_education = "SELECT * FROM education WHERE teacher_id = ?";
            $stmt_education = $conn->prepare($query_education);
            $stmt_education->bind_param('i', $teacher_id);
            $stmt_education->execute();
            $result_education = $stmt_education->get_result();
            $teacher['education'] = $result_education->fetch_all(MYSQLI_ASSOC);
    
            // Experience ma'lumotlarini olish
            $query_experience = "SELECT * FROM experience WHERE teacher_id = ?";
            $stmt_experience = $conn->prepare($query_experience);
            $stmt_experience->bind_param('i', $teacher_id);
            $stmt_experience->execute();
            $result_experience = $stmt_experience->get_result();
            $teacher['experience'] = $result_experience->fetch_all(MYSQLI_ASSOC);
        }
    
        return $teachers ?: [];
    }
    

    public function getEducation(int $teacher_id){
        $conn = $this->getConnection();
    
        $query_teachers = "SELECT * FROM education WHERE teacher_id = ?";
        $stmt_teachers = $conn->prepare($query_teachers);
        $stmt_teachers->bind_param('i', $teacher_id);
        $stmt_teachers->execute();
        $result_teachers = $stmt_teachers->get_result();
    
        $teachers = $result_teachers->fetch_all(MYSQLI_ASSOC);
    
        return $teachers ?: []; 

    }

    public function getExperience(int $teacher_id){
        $conn = $this->getConnection();
    
        $query_teachers = "SELECT * FROM experience WHERE teacher_id = ?";
        $stmt_teachers = $conn->prepare($query_teachers);
        $stmt_teachers->bind_param('i', $teacher_id);
        $stmt_teachers->execute();
        $result_teachers = $stmt_teachers->get_result();
    
        $teachers = $result_teachers->fetch_all(MYSQLI_ASSOC);
    
        return $teachers ?: []; 

    }
    
    
}