<?php

namespace src;

use App\Models\DB;
use App\Models\Students;
use App\Models\Teachers;
use App\Models\User;

trait Auth {
    public function getToken() {
        $headers = getallheaders();

        if (!isset($headers['Authorization'])) {
            apiResponse([
                'message' => 'Unauthorized'
            ], 401);
        }

        if (!str_starts_with($headers['Authorization'], 'Bearer ')) {
            apiResponse([
                'message' => 'Format is invalid, allowed format is Bearer'
            ], 400);
        }

        return str_replace('Bearer ', '', $headers['Authorization']);
    }

    public function getUserCorrectToken() {
        $token = $this->getToken();
        $db = new DB();
        $conn = $db->getConnection();

        $query = 'SELECT * FROM user_api_tokens WHERE token = ? AND expires_at >= NOW()';
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $token);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            apiResponse([
                'message' => 'Unauthorized'
            ], 403);
        }

        return $result->fetch_assoc();
    }

    public function user() {
        $token = $this->getUserCorrectToken();

        if (!$token) {
            apiResponse([
                'message' => 'Unauthorized'
            ], 401);
        }


        $user=new User;
        $students = new Students();
        $teacher=new Teachers();

        $info=$user->getUserById($token['user_id']);
        

        if($info['status']==="Learner"){
            return $students->getStudent($token['user_id']);
        }

         else if($info['status']==="Teacher"){
            $id=$teacher->getTeacher($token['user_id']);
            return $teacher->getTeacherId($id['teacher_id']);
         }

    }
}

