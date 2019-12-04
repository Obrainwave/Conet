<?php
/* This checks database table for uniqueness*/
function unique($table, $column, $val){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        
        $stmt = $conn->prepare("SELECT * FROM $table WHERE email=:val");
        $stmt->bindParam(':val', $val);
        $stmt->execute();
        $result = $stmt -> fetch();
        if ($result > 0){
            backWith("error", "That $column already exists.");
            
        }
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
}

/*This ruquires all form field to be field*/
function requireAll(array $formvals)
{
// test that each variable has a value
	foreach ($formvals as $key => $value)
	{
		if (!isset($key) || ($value == ''))
        backWith("error", "All form fields are required.");
        
	}
	return true;
}

/*This check only one form field*/
function required($name, $val, array $post)
{    
    if(!empty($post)){
        if(empty($val)){
            backWith("error", "The field $name is required.");
        }
    }
	return true;
}

/*This confirms two form field to be matched*/
function confirm($name, $val1, $val2){
    if ($val1 != $val2)
    {
        backWith("error", "The $name confirmation does not match.");
    }
    return true;
}

/*This checks minimum value of a form field*/
function minVal($name, $val, $no){
    if (strlen($val) < $no)
    {
        backWith("error", "Your $name must be at least $no characters long.");
    }
    return true;
}

/*This checks maximum value of a form field*/
function maxVal($name, $val, $no){
    if (strlen($val) > $no)
    {
        backWith("error", "Your $name must not be greater than $no characters long.");
    }
    return true;
}

/*This checks both minimum and maximum values of a form field*/
function minMax($name, $val, $minno, $maxno){
    if (strlen($val) < $minno)
    {
        backWith("error", "Your $name must be at least $minno characters long.");
    }
    if (strlen($val) > $maxno)
    {
        backWith("error", "Your $name must not be greater than $maxno characters long.");
    }

    return true;
}

/*This confirms email address*/
function isEmail($email)
{
    $valid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($valid){
        return true;
    }else{
        backWith("error", "You must enter a valid email address");
    }
}

function post($name){
    try{
        $post = isset($_POST[$name]) ? $_POST[$name] : '';
        return $post;
    }catch(Exception $e){
        throw new Exception("Undefined index $name");

    }
}


function files($name){
    try{
        $file = isset($_FILES[$name]) ? $_FILES[$name] : '';
        return $file;
    }catch(Exception $e){
        throw new Exception("Undefined index $name");

    }
}

function isMethod($method){
    try{
        $meth = isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === $method;
        return $meth;
    }catch(Exception $e){
        throw new Exception("Bad method");
    }
}

/*This hash a form field value*/
function encHash($value){
    $costs = [
        'cost' => 12,
    ];
    $pass = PASSWORD_HASH($value, PASSWORD_BCRYPT, $costs);
    return $pass;
}

function checkFileSize($filename, $maxsize){
    $size = $_FILES[$filename]['size'];
    if ($size > $maxsize)
    {
        backWith("error", "Your uploaded file is too large. Upload a file not more than ".($maxsize/1000000)."MB");
    }
    return true;
}

function fileName($filename){
    $name = $_FILES[$filename]['name'];
    return $name;
}

function fileTyp($filename){
    $type = $_FILES[$filename]['type'];
    return $type;
}

function fileTemp($filename){
    $temp = $_FILES[$filename]['tmp_name'];
    return $temp;
}

function csrf(){
    if (empty($_SESSION['token'])){
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['time'] = time();
    }
    $token = $_SESSION['token'];

    echo "<input type='hidden' name='token' value=$token readonly>";
}

function checkToken($token){
    
        if(!empty($token) && !empty($_SESSION['token'])){
            if(hash_equals($_SESSION['token'], $token)){
                return true;
            }else{
                
                exit(require __DIR__.'/../errors/403.php');
            }
        }else{
            
            exit(require __DIR__.'/../errors/403.php');
        }
    
}