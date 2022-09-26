<?php
try {
    $mbd = new PDO('mysql:host=localhost;dbname=db_taller1', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try {

    $statement = $mbd->prepare("UPDATE tabla2 SET ID_TABLA1 = :ID_T,  Nombre = :NN, Estado_civil = :ES, fecha_registro = NOW(), Fecha_nacimiento = :FN, cc = :IDN, Peso = :P, Email = :CP  WHERE ID = :id");
    $statement->bindParam(':id', $id);
    $statement->bindParam(':ID_T', $Identit1);
    $statement->bindParam(':NN', $Nombre);
    $statement->bindParam(':ES', $Estado);
    $statement->bindParam(':FN', $Fecha_Na); 
    $statement->bindParam(':IDN', $IdentiP);
    $statement->bindParam(':P', $Peso);
    $statement->bindParam(':CP', $Correo);

    $id = $_POST['ID'];
    $Identit1 = $_POST['ID_TABLA1'];
    $Nombre        = $_POST['Nombre'];
    $Estado     = $_POST['Estado_Civil'];
    $Fecha_Na     = $_POST['Fecha_Nacimiento'];
    $IdentiP     = $_POST['cc'];
    $Peso     = $_POST['Peso'];
    $Correo     = $_POST['Email'];


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