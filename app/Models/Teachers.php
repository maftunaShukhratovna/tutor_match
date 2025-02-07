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
    

    public function update(int $teacher_id, string $full_name, string $email, string $birth_date, string $province, string $description, string $password, string $phone) {
        $conn = $this->getConnection();
    
    
        $query_teachers = "UPDATE teachers SET full_name = ?, email = ?, password=?, birth_date = ?, province=?, description = ?, phone=? WHERE teacher_id = ?";
        $stmt_teachers = $conn->prepare($query_teachers);
        
        $stmt_teachers->bind_param('sssssssi', $full_name, $email, $password, $birth_date, $province, $description, $phone, $teacher_id);
        
        
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

    public function updateStatus(int $teacher_id, string $status){
        $conn = $this->getConnection();
    
    
        $query_teachers = "UPDATE teachers SET status=? WHERE id = ?";
        $stmt_teachers = $conn->prepare($query_teachers);
        
        $stmt_teachers->bind_param('si', $status, $teacher_id);
        
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

    public function rejections($teacher_id, $reason){
    $conn = $this->getConnection();

    $query = "INSERT INTO rejections (teacher_id, reason) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $teacher_id, $reason);

    if ($stmt->execute()) {
        return true; 
    } else {
        return false; 
    }
    }   


    public function getTeachers(string $status) {
        $conn = $this->getConnection();
    
        $query_teachers = "SELECT * FROM teachers WHERE status = ?";
        $stmt_teachers = $conn->prepare($query_teachers);
        $stmt_teachers->bind_param('s', $status);
        $stmt_teachers->execute();
        $result_teachers = $stmt_teachers->get_result();
        $teachers = $result_teachers->fetch_all(MYSQLI_ASSOC);
    
        foreach ($teachers as &$teacher) {
            $teacher_id = $teacher['id'];
    
            $query_education = "SELECT * FROM education WHERE teacher_id = ?";
            $stmt_education = $conn->prepare($query_education);
            $stmt_education->bind_param('i', $teacher_id);
            $stmt_education->execute();
            $result_education = $stmt_education->get_result();
            $teacher['education'] = $result_education->fetch_all(MYSQLI_ASSOC);
    
            $query_experience = "SELECT * FROM experience WHERE teacher_id = ?";
            $stmt_experience = $conn->prepare($query_experience);
            $stmt_experience->bind_param('i', $teacher_id);
            $stmt_experience->execute();
            $result_experience = $stmt_experience->get_result();
            $teacher['experience'] = $result_experience->fetch_all(MYSQLI_ASSOC);
    
        
            if ($teacher['status'] === 'rejected') {
                $query_rejections = "SELECT reason FROM rejections WHERE teacher_id = ?";
                $stmt_rejections = $conn->prepare($query_rejections);
                $stmt_rejections->bind_param('i', $teacher_id);
                $stmt_rejections->execute();
                $result_rejections = $stmt_rejections->get_result();
                $teacher['rejection_reason'] = $result_rejections->fetch_assoc()['reason'] ?? null;
            }
        }
    
        return $teachers ?: [];
    }
    

    public function getTeacherById($teacher_id) {
        $conn = $this->getConnection();
        
        $query_teacher = "SELECT * FROM teachers WHERE id = ?";
        $stmt_teacher = $conn->prepare($query_teacher);
        $stmt_teacher->bind_param('i', $teacher_id);
        $stmt_teacher->execute();
        $result_teacher = $stmt_teacher->get_result();
        $teacher = $result_teacher->fetch_assoc();
    

        $query_education = "SELECT * FROM education WHERE teacher_id = ?";
        $stmt_education = $conn->prepare($query_education);
        $stmt_education->bind_param('i', $teacher_id);
        $stmt_education->execute();
        $result_education = $stmt_education->get_result();
        $teacher['education'] = $result_education->fetch_all(MYSQLI_ASSOC);
    
        
        $query_experience = "SELECT * FROM experience WHERE teacher_id = ?";
        $stmt_experience = $conn->prepare($query_experience);
        $stmt_experience->bind_param('i', $teacher_id);
        $stmt_experience->execute();
        $result_experience = $stmt_experience->get_result();
        $teacher['experience'] = $result_experience->fetch_all(MYSQLI_ASSOC);
    
        if ($teacher['status'] == 'rejected') {
            $query_rejection = "SELECT * FROM rejections WHERE teacher_id = ?";
            $stmt_rejection = $conn->prepare($query_rejection);
            $stmt_rejection->bind_param('i', $teacher_id);
            $stmt_rejection->execute();
            $result_rejection = $stmt_rejection->get_result();
            
            if ($result_rejection->num_rows > 0) {
                $rejection = $result_rejection->fetch_assoc();
                $teacher['rejection_reason'] = $rejection['reason'];  
            } else {
                $teacher['rejection_reason'] = "No reason provided"; 
            }
        }
    
        return $teacher;
    }

    public function getTeacherId(int $teacher_id){
        $conn = $this->getConnection();
    
        $query_teachers = "SELECT id FROM teachers WHERE teacher_id = ?";
        $stmt_teachers = $conn->prepare($query_teachers);
        $stmt_teachers->bind_param('i', $teacher_id);
        $stmt_teachers->execute();
        $result_teachers = $stmt_teachers->get_result();
        $teacher = $result_teachers->fetch_assoc();
    
        return $teacher['id'] ?? null;

    }

    
    
}