<?php

namespace src;

use App\Models\DB;

Trait Auth{
    public static function check(){
        $headers=getallheaders();
        if(!isset($headers['Authorization'])){
            apiResponse([
                'message'=>'Unauthorized'
            ], 403);
        }

        if(!str_starts_with($headers['Authorization'],'Bearer ')){
            apiResponse([
                'message'=>'format is invalid, allowed format is bearer'
            ], 400);
        }

        $token=str_replace('Bearer ','',$headers['Authorization']);

        $db=new DB();
        $conn=$db->getConnection();
        $query='SELECT * FROM user_api_tokens WHERE token=?';
        $stmt=$conn->prepare($query);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $user=$stmt->fetch();
        if(!$user){
            apiResponse([
                'message'=>'Unauthorized'
            ],403);
        }

        return true;

        
    }


}