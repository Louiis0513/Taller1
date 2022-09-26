<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=db_taller1', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
$id = $_POST['ID'];
try { 
    $Datos=$mbd->prepare("SELECT * from tabla2 WHERE ID = ?");
    $Datos->bindParam(1, $_POST['ID']);
    $Datos->execute();  
    $Datos2=$mbd->prepare("SELECT * from tabla1 WHERE ID = ?");
    $Datos2->bindParam(1, $_POST['ID']);
    $Datos2->execute();
    $statement=$mbd->prepare("DELETE from tabla2 WHERE ID = ?");
    $statement->bindParam(1, $_POST['ID']);
    $statement->execute();
    $results = $Datos->fetch(PDO::FETCH_ASSOC);
    $results2 = $Datos2->fetch(PDO::FETCH_ASSOC);
    $mbd = null;
    
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'eLIMINADO' => $results,$results2
    ]);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>