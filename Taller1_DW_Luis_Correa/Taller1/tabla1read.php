<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=db_taller1', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

$id = $_GET['id'];


try {    
    
    $statement=$mbd->prepare("SELECT * from tabla1 WHERE ID = ?");

    $statement->bindParam(1, $_GET['id']);
    $statement->execute();
    $results = $statement->fetch(PDO::FETCH_ASSOC);
    $mbd = null;
    
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'tabla1' => $results
    ]);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}








?>