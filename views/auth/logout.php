<?php

if(auth()){
    logout();
    redirectWith("error", "You have successfully logged out", "/");

}else{
    backWith("error", "You are not logged in");
}