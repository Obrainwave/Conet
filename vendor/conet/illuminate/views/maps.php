<?php
session_start();
function getFolder($home){
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
                    === 'on' ? "https" : "http") . "://" . 
            $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 

    // Get the present URL 
    $url = $_SERVER['REQUEST_URI'];

    // Get the project URL
    $urllen = strlen(BASEPATH);
    $ch = substr($link,$urllen);   
    $reqmethod = $_SERVER['REQUEST_METHOD'];

    switch($reqmethod){
        case 'POST':
            // This explode and take the control url
            $loneurl = explode('/', $ch);
            $last = end($loneurl);
            
            require __DIR__.'/../../../../app/controls/'.$last.'.php';
        break;
        
        case 'GET':

            $data = explode("=", $ch);
            $check = $data[0];
            $slim = explode("?", $check);
            $takelast = substr($link, -1);
            
            
            if($ch == "" || is_file(__DIR__.'/../../../../views/'.$ch.'.php') || $takelast = "|"){
                if($ch == ""){
                   
                    require __DIR__.'/../../../../views/'.$home.'.php';

                }
                elseif(!is_file(__DIR__.'/../../../../views/'.$ch.'.php') && $takelast = "|"){
                    $loneurl = explode('/', $ch);
                    $last = end($loneurl);
                    $take = substr($link, $urllen);
                    
                    $sub = explode("/", $take);

                    $sublen = strlen(end($sub));
                    $sublast = substr($take, 0, -$sublen);
                
                    $exp = explode('?', $last);
                    $sid = $exp[0];
                    $getid = explode('=', end($sub));
                    $id = substr($getid[1], 0, -1);
                    
                    $_SESSION['urlid'] = $id;
                    if(is_file(__DIR__.'/../../../../views/'.$sublast.$sid.'.php')){
                        require __DIR__.'/../../../../views/'.$sublast.$sid.'.php';
                    }else{
                        require __DIR__.'/../../../../views/errors/404.php';
                    }
                
                }
                else{
                    
                    require __DIR__.'/../../../../views/'.$ch.'.php';
                }
            }elseif(isset($slim[1]) && $slim[1] == "token" && !is_file(__DIR__.'/../../../../views/'.$ch.'.php')){
                
                require __DIR__.'/../errors/400.php';
            }else{
                
                require __DIR__.'/../../../../views/errors/404.php';
                
            }
        break;

        default:
            handle_error($reqmethod);
        break;

    }
}

function urlId(){
    return $_SESSION['urlid'];
}

function url($link){
    $domain = BASEPATH;
    if($link == "/"){
        echo $domain;
    }else{
        echo $domain.$link;
    }

}

function redirect($link){
    if($link == "/"){
        $domain = BASEPATH;
        header('Location: '.$domain);
        exit;
    }else{
        header('Location: '.$link);
    exit;
    }

}

function redirectWith($name, $message, $link){
    if($link == "/"){
        $_SESSION[$name] = $message;
        $domain = BASEPATH;
        header('Location: '.$domain);
        exit;
    }else{
        $_SESSION[$name] = $message;
        header('Location: '.$link);
        exit;
    }
   return true;
}

function back(){
    if(isset($_SERVER['HTTP_REFERER'])){
        $prevurl = $_SERVER['HTTP_REFERER'];
        header('Location: '.$prevurl);
    
    }
    return true;
}

function backWith($name, $message){
    if(isset($_SERVER['HTTP_REFERER'])){
        $_SESSION[$name] = $message;
        $prevurl = $_SERVER['HTTP_REFERER'];
        header('Location: '.$prevurl);
        exit;
    }
    return true;
}

function message($name){
    if($name == "error"){
        if(!empty($_SESSION[$name])){
            echo "<div style='text-align: center; margin-bottom: 10px'><span style='color: white; background: red; width:100%; padding: 10px'>".$_SESSION[$name]."</span></div>";
            unset($_SESSION[$name]);
        }else{
            return false;
        }
    }else{
        if(!empty($_SESSION[$name])){
            echo "<div style='text-align: center; margin-bottom: 10px'><span style='color: white; background: green; width:100%; padding: 10px'>".$_SESSION[$name]."</span></div>";
            unset($_SESSION[$name]);
        }else{
            return false;
        }
    }
}

function pageName($name){
    return $name;
}