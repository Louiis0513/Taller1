<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=db_taller1', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try {

    $statement = $mbd->prepare("UPDATE tabla1 SET descripcion = :ddd,  Clase = :ccc, Salon = :sss WHERE ID = :id");

    $statement->bindParam(':id', $id);
    $statement->bindParam(':ddd', $Descripcion);
    $statement->bindParam(':ccc', $Clase);
    $statement->bindParam(':sss', $Salon); 
   
    $id = $_POST['ID'];
    $Descripcion = $_POST['descripcion'];
    $Clase        = $_POST['Clase'];
    $Salon     = $_POST['Salon'];


    $statement->execute();
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        "mensaje" => "Registro actualizado satisfactoriamente",
        "data" => [
            "id" => $id,
            "descripcion" => $_POST
        ]
    ]);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}
    
?>
