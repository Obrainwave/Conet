<?php

try{
    $email = post('email');
    $name = post('name');
    $phone = post('phone');
    $userid = post('id');
    $gender = post('gender');
    $dob = post('date_of_birth');
    $address = post('address');
    $file = files('image');
    $token = post('token');
    
    if(isMethod('POST')){
       try{
            //required('email', $email, $_POST);
            requireAll($_POST);
            isEmail($email);
            checkFileSize('image', 2000000);
            //unique('users', 'email', $email);
            $detail = first('details', 'user_id', auth('id'));

            if(empty($detail)){
                update('users', ['name' => $name, 'email' => $email, 'phone' => $phone], 'id', $userid, $token);
                create('details', ['user_id' => $userid, 'address' => $address, 'dob' => $dob, 'gender' => $gender]);
                backWith('message', 'Successfully updated.');
            }else{
                $user = update('users', ['name' => $name, 'email' => $email, 'phone' => $phone], 'id', $userid, $token);
                update('details', ['address' => $address, 'dob' => $dob, 'gender' => $gender], 'user_id', $userid, $token);
                backWith('message', 'Successfully updated.');
                
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


