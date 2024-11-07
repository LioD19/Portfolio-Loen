<?php

$bd_name;
$db_pass;
$db_host;
$settings = [];
$pdo;

function getPDO() {
    try {
        $pdo = new PDO('mysql:dbname=porfolio;host=localhost', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch( PDOException $exception ) {
        echo "Connection error :" . $exception->getMessage();
    }
}


function query($statement, $class_name = null, $one = false){
    $req = getPDO()->query($statement);
    if(
        strpos($statement, 'UPDATE') === 0 ||
        strpos($statement, 'INSERT') === 0 ||
        strpos($statement, 'DELETE') === 0 
    
    ){
        return $req;
    }
    if($class_name === null){
        $req->setFetchMode(PDO::FETCH_OBJ);
    }else {
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }
    if($one){
        $datas = $req->fetch();    
    }else{
        $datas = $req->fetchAll();    
    }
    return $datas;
}

function prepare($statement, $attributes, $class_name = null, $one = false){
    $req = getPDO()->prepare($statement);
    $res = $req->execute($attributes);
    if(
        strpos($statement, 'UPDATE') === 0 ||
        strpos($statement, 'INSERT') === 0 ||
        strpos($statement, 'DELETE') === 0
    ) {
        return $res;
    }
    if($class_name === null){
        $req->setFetchMode(PDO::FETCH_OBJ);
    } else {
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }
    if($one) {
        $datas = $req->fetch();
    } else {
        $datas = $req->fetchAll();
    }
    return $datas;
}
