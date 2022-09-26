<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=db_taller1', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try{
$sql = "INSERT INTO tabla2(ID_TABLA1,Nombre,Estado_civil,fecha_registro,Fecha_Nacimiento,cc,Peso,Email)VALUES(:ID_T,:NN,:ES,NOW(),:FN,:IDN,:P,:CP)";
 $statement=$mbd->prepare($sql);

 $statement->bindParam(':ID_T', $Identit1);
 $statement->bindParam(':NN', $Nombre);
 $statement->bindParam(':ES', $Estado);
 $statement->bindParam(':FN', $Fecha_Na); 
 $statement->bindParam(':IDN', $IdentiP);
 $statement->bindParam(':P', $Peso);
 $statement->bindParam(':CP', $Correo);

 $Identit1 = $_POST['ID_TABLA1'];
 $Nombre        = $_POST['Nombre'];
 $Estado     = $_POST['Estado_Civil'];
 $Fecha_Na     = $_POST['Fecha_Nacimiento'];
 $IdentiP     = $_POST['cc'];
 $Peso     = $_POST['Peso'];
 $Correo     = $_POST['Email'];
 
 $statement->execute();

 $id = $_POST['ID_TABLA1'];
 $statement=$mbd->prepare("SELECT * from tabla1 WHERE ID = ?");
 $statement->bindParam(1, $_POST['ID_TABLA1']);
 $statement->execute();
 $results = $statement->fetch(PDO::FETCH_ASSOC);
 $mbd = null;

 header('Content-type:application/json;charset=utf-8');    
 echo json_encode([
     'tabla2' => $_POST,
     'tabla1' => $results
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
