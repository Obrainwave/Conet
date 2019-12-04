<?php

try{
    
    $email = post('email');
    $password = post('password');
    $token = post('token');

    if(isMethod('POST')){
       try{
           
            requireAll($_POST);     
        
            if(login('users', 'email', $email, $password, $token))
            {
                redirectWith('message', 'Successfully logged in.', 'pages/profile');
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
       
        
    
    }
    
}catch (Exception $e)
{
    echo $e->getMessage();
   
    exit;
}