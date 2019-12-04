<?php

function dbConnect($dbhost, $dbuser, $dbpass, $dbname){
    
        try{

        $con = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            if($con){
                //echo "PDO Connected";
                return $con;
            }
        }catch(Exception $e) {
            echo $e->getMessage();
            echo "<br>";
            echo "<br>";
            echo $e->getTraceAsString();
            
        }
    



}