<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=db_taller1', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try{
$sql = "INSERT INTO tabla1(descripcion, Clase, Salon) VALUES (:ddd,:ccc,:sss)";
 $statement=$mbd->prepare($sql);

 $statement->bindParam(':ddd', $Descripcion);
 $statement->bindParam(':ccc', $Clase);
 $statement->bindParam(':sss', $Salon); 

 $Descripcion = $_POST['descripcion'];
 $Clase        = $_POST['Clase'];
 $Salon     = $_POST['Salon'];
 
 $statement->execute();

 header('Content-type:application/json;charset=utf-8');    
 echo json_encode([
     'tabla1' => $_POST
 ]);

} catch (PDOException $e) {
 header('Content-type:application/json;charset=utf-8');    
 echo json_encode([
     'error' => [
         'codigo' =>$e->getCode() ,
         'mensaje' => $e->getMessage()
     ]
 ]);
}

?>

