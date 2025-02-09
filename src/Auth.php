<?php

namespace src;

use App\Models\DB;
use App\Models\User;
use App\Models\Students;
use App\Models\Teachers;

class Auth
{
    public static function getToken ()
    {
        $headers = getallheaders();
        if(!isset($headers['Authorization'])){
            apiResponse(['error' => 'Unauthorized'], 401);
        }
        if(!str_starts_with( $headers['Authorization'], 'Bearer '))
        {
            apiResponse([
                'message' => 'Authorization format is invalid, allowed format is Bearer'
            ], 400);
        }
        return str_replace('Bearer ', '', $headers['Authorization']);

    }

    public static function getUserCorrectToken() {
        $token = self::getToken(); 
        $db = new DB();
        $conn = $db->getConnection();
    
        $query = 'SELECT * FROM user_api_tokens WHERE token = ? AND expires_at >= NOW() LIMIT 1';
        $stmt = $conn->prepare($query);
        
        if (!$stmt) {
            apiResponse(['message' => 'Database error'], 500);
            exit;
        }
    
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) {
            apiResponse(['message' => 'Unauthorized'], 403);
            exit;
        }
    
        return $result->fetch_assoc();
    }
    

    public static function check()
    {
        if(!self::getUserCorrectToken()){
            apiResponse([
                'error' => 'Unauthorized'
            ], 401);
        }
        return true;
    }

    public static function user(){
        $token = self::getUserCorrectToken();
        if(!$token){
            apiResponse([
                'errors' => ['message'=>'Unauthorized']
            ],401);
        }


        $user=new User;
        $students = new Students();
        $teacher=new Teachers();

        $info=$user->getUserById($token['user_id']);
        

        if($info['status']==="Learner"){
            return $students->getStudent($token['user_id']);
        } else if($info['status']==="Teacher"){
            $id=$teacher->getTeacher($token['user_id']);
            return $teacher->getTeacherId($id['teacher_id']);
         }
    }
}