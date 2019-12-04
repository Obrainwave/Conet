<?php

function login($table, $column, $value, $password, $token){
    if(isMethod('POST')){
        $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
        try{
            checkToken($token);
            $query = "SELECT * FROM $table WHERE $column= :$column";
            
            $sql = $conn->prepare($query);
            $sql->bindValue(":$column", $value);
            $sql->execute();
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            if($user === false){
                return false;
            }else{
                $validpass = password_verify($password, $user['password']);
                if($validpass){
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['logged_in'] = time();
                    return true;
                }else{
                    return false;
                }
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

function auth($session=null){
    
    if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in'])){
        if($session == null){
            return true;
        }else{
            $auth = first('users', 'id', $_SESSION['user_id']);
            return $auth[$session];
        }
    }else{
        return false;
    }
    
}


function logout(){
    unset($_SESSION['user_id']);
    unset($_SESSION['logged_in']);
    $_SESSION = array();
    session_destroy();
}