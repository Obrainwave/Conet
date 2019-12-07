<?php

require __DIR__.'/../../../../constant/database/credentials/config.php'; 

function create($table, array $array, $token)
{
    
    checkToken($token);
    $argno = func_num_args();
    $arglist = func_get_args();
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST"){
        $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
        try{
        

            $placeholders = substr(str_repeat('?,', count($array)), 0, -1);
            
            $stmt = $conn->prepare('INSERT INTO '.$table.'('.implode(',', array_keys($array)).') VALUES ('.$placeholders.')');
            $values = [];
            foreach($array as $key => $value){
                $values[] = $value;
            }
           
            
            $result = $stmt->execute($values);
          
            if($result){
                $lastid = $conn->lastInsertId();
                $row = first($table, 'id', $lastid);
                return $row;
            }else{
                return false;
            }
    
       
        }catch(PDOException $e){
            echo "error in connection";
        }

   
    }
}

function getAll($table){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table";
        $sql = $conn->prepare($query);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }


}

function getAllOrder($table, $orderkey, $order){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table ORDER BY $orderkey $order";
        $sql = $conn->prepare($query);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}

function getLimit($table, $offset){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table LIMIT ?";
        $sql = $conn->prepare($query);
        $sql->bindValue(1, $offset, PDO::PARAM_INT);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
}

function getOrderLimit($table, $offset, $orderkey, $order){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table ORDER BY $orderkey $order LIMIT ?";
        $sql = $conn->prepare($query);
        $sql->bindValue(1, $offset, PDO::PARAM_INT);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
}


function where($table, $where, $value){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table WHERE $where=?";
        $sql = $conn->prepare($query);
        $sql->execute([$value]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function whereOrder($table, $where, $value, $orderkey, $order){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table WHERE $where=? ORDER BY $orderkey $order";
        $sql = $conn->prepare($query);
        $sql->execute([$value]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    /*while ($row = $sql->fetch()){
         return $row;
         
    }*/
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function whereNot($table, $where, $value){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table WHERE $where !=?";
        $sql = $conn->prepare($query);
        $sql->execute([$value]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function biWhere($table, $col1, $value1, $col2, $value2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table WHERE $col1=? AND $col2=?";
        $sql = $conn->prepare($query);
        $sql->execute([$value1, $value2]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    /*while ($row = $sql->fetch()){
         return $row;
         
    }*/
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function biWhereSingleNot($table, $col1, $value1, $col2, $value2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table WHERE $col1=? AND $col2 !=?";
        $sql = $conn->prepare($query);
        $sql->execute([$value1, $value2]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function first($table, $col, $value){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table WHERE $col=?";
        $sql = $conn->prepare($query);
        $sql->execute([$value]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetch();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function biFirst($table, $col1, $value1, $col2, $value2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table WHERE $col1=? AND $col2=?";
        $sql = $conn->prepare($query);
        $sql->execute([$value1, $value2]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetch();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function countAll($table){
	$conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table";
        $sql = $conn->prepare($query);
        $sql->execute();
        $rows = $sql->rowCount();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function countWhere($table, $col, $val){
	$conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT * FROM $table WHERE $col=?";
        $sql = $conn->prepare($query);
        $sql->execute([$val]);
        $rows = $sql->rowCount();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
    

function update($table, array $array, $where, $val, $token)
{
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST"){
        $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
        try{
            checkToken($token);
            $implode = implode('=?, ', array_keys($array));
            $implode .='=?';
            
            $stmt = $conn->prepare("UPDATE $table SET $implode WHERE $where=?");
            
            $values = [];
            foreach($array as $key => $value){
                $values[] = $value;
            }
            array_push($values, $val);
            $result = $stmt->execute($values);
          
            if($result){
                
                return true;
            }else{
                return false;
            }
    
       
        }catch(PDOException $e){
            echo "error in connection";
        }

   
    }
}

function updateNoToken($table, array $array, $where, $val)
{
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "GET"){
        $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
        try{
            $implode = implode('=?, ', array_keys($array));
            $implode .='=?';
            
            
            $stmt = $conn->prepare("UPDATE $table SET $implode WHERE $where=?");
            
            $values = [];
            foreach($array as $key => $value){
                $values[] = $value;
            }
            array_push($values, $val);
            $result = $stmt->execute($values);
          
            if($result){
                
                return true;
            }else{
                return false;
            }
    
       
        }catch(PDOException $e){
            echo "error in connection";
        }

   
    }
}


/* This function operates LEFT JOIN. It joins two tables without considering common values:
 * table1 is the parent table,
 * rkey1 is the parent table's id,
 * tcol1 is the parent table's considering column,
 * tval1 is the value of the considering column.
 * table2 is the child table,
 * rkey2 is the relation key or id of the parent table.
*/

function leftJoin($table1, $rkey1, $tcol1, $tval1, $table2, $rkey2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT $table1.*, $table2.* FROM $table1 LEFT JOIN $table2 ON $table1.$rkey1=$table2.$rkey2 WHERE $table1.$tcol1=?";
        $sql = $conn->prepare($query);
        $sql->execute([$tval1]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}

/* This function operates INNER JOIN. It joins two tables that have common values:
 * table1 is the parent table,
 * rkey1 is the parent table's id,
 * tcol1 is the parent table's considering column,
 * tval1 is the value of the considering column.
 * table2 is the child table,
 * rkey2 is the relation key or id of the parent table.
*/
function inJoin($table1, $rkey1, $tcol1, $tval1, $table2, $rkey2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT $table1.*, $table2.* FROM $table1 INNER JOIN $table2 ON $table1.$rkey1=$table2.$rkey2 WHERE $table1.$tcol1=?";
        $sql = $conn->prepare($query);
        $sql->execute([$tval1]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}


/* This function operates INNER JOIN. It joins two tables that have common values and returns single row:
 * table1 is the parent table,
 * rkey1 is the parent table's id,
 * tcol1 is the parent table's considering column,
 * tval1 is the value of the considering column.
 * table2 is the child table,
 * rkey2 is the relation key or id of the parent table.
*/
function inJoinFirst($table1, $rkey1, $tcol1, $tval1, $table2, $rkey2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT $table1.*, $table2.* FROM $table1 INNER JOIN $table2 ON $table1.$rkey1=$table2.$rkey2 WHERE $table1.$tcol1=?";
        $sql = $conn->prepare($query);
        $sql->execute([$tval1]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetch();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}


/* This function operates LEFT JOIN. It joins two tables without considering common values and returns single row:
 * table1 is the parent table,
 * rkey1 is the parent table's id,
 * tcol1 is the parent table's considering column,
 * tval1 is the value of the considering column.
 * table2 is the child table,
 * rkey2 is the relation key or id of the parent table.
*/
function leftJoinFirst($table1, $rkey1, $tcol1, $tval1, $table2, $rkey2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT $table1.*, $table2.* FROM $table1 LEFT JOIN $table2 ON $table1.$rkey1=$table2.$rkey2 WHERE $table1.$tcol1=?";
        $sql = $conn->prepare($query);
        $sql->execute([$tval1]);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetch();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}


/* This function operates LEFT JOIN. It joins two tables without considering the common values:
 * table1 is the parent table,
 * rkey1 is the parent table's id,
 * tcol1 is the parent table's considering column,
 * table2 is the child table,
 * rkey2 is the relation key or id of the parent table.
*/
function genLeftJoin($table1, $rkey1, $tcol1, $table2, $rkey2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT $table1.*, $table2.* FROM $table1 LEFT JOIN $table2 ON $table1.$rkey1=$table2.$rkey2 WHERE $table1.$tcol1=$table2.$rkey2";
        $sql = $conn->prepare($query);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}

/* This function operates INNER JOIN. It joins two tables that have common values:
 * table1 is the parent table,
 * rkey1 is the parent table's id,
 * tcol1 is the parent table's considering column,
 * table2 is the child table,
 * rkey2 is the relation key or id of the parent table.
*/
function genInJoin($table1, $rkey1, $tcol1, $table2, $rkey2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT $table1.*, $table2.* FROM $table1 INNER JOIN $table2 ON $table1.$rkey1=$table2.$rkey2 WHERE $table1.$tcol1=$table2.$rkey2";
        $sql = $conn->prepare($query);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetchAll();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}

function genInJoinFirst($table1, $rkey1, $tcol1, $table2, $rkey2){
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "SELECT $table1.*, $table2.* FROM $table1 INNER JOIN $table2 ON $table1.$rkey1=$table2.$rkey2 WHERE $table1.$tcol1=$table2.$rkey2";
        $sql = $conn->prepare($query);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $sql->fetch();
        return $rows;
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}

function slug($value){
	$slug = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($value)));
	return $slug;
}

function orderBy(array $array, $order){
	if($order == "asc"){
		return asort($array);
	}elseif($order == "desc"){
		return arsort($array);
	}
}

function delete($table, $col, $value, $token){
	checkToken($token);
    $conn = dbConnect(HOST, USERNAME, PASSWORD, DATABASE);
    try{
        $query = "DELETE FROM $table WHERE $col=?";
        $sql = $conn->prepare($query);
        $rows = $sql->execute([$value]);
        if($rows){
			return true;
		}else{
			return false;
		}
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function chstr($text, $limit, $end=null){
	$value = substr($text, 0, $limit);
	if($end === null){
		return $value;
	}else{
		return $value.$end;
	}
}