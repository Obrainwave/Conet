<?php

try{
    $email = post('email');
    $name = post('name');
    $password = post('password');
    $passwd2 = post('password2');
    $phone = post('phone');
    $token = post('token');

    if(isMethod('POST')){
       try{
           
            //requireAll($_POST);
            isEmail($email);
            minMax('password', $password, 6, 8);
            required('name', $name, $_POST);
            unique('users', 'email', $email);
            confirm('password', $password, $passwd2);
           
        
            if($user = create('users', ['name' => $name, 'email' => $email, 'password' => encHash($password), 'phone' => $phone], $token))
            {
                login('users', 'email', $email, $password);
                backWith('message', 'Your account has been created successfully.');
                
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
}catch (Exception $e)
{
    echo $e->getMessage();
   
    exit;
}