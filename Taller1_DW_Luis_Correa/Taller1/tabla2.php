<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=db_taller1', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try {    
    $sql = "SELECT * from tabla2 LIMIT 100";
    $statement=$mbd->prepare("SELECT * from tabla2 LIMIT 100");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $mbd = null;
    
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($results);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}








?>