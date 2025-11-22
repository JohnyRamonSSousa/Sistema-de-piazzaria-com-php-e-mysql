<?php

 include_once("conn.php");
 
 $method = $_SERVER["REQUEST_METHOD"];
 
 //Resgate de dados, montagem do pedido
 if($method === "GET"){

    $bordasQuery = $conn->query("SELECT * FROM bordas;");
    $bordas = $bordasQuery->fetchall();

    $massasQuery = $conn->query("SELECT * FROM massas;");
    $massas = $massasQuery->fetchall();

    $saboresQuery = $conn->query("SELECT * FROM sabores;");
    $sabores = $saboresQuery->fetchall();


 // Criação do pedido   
 }else if($method === "POST"){
     
    $data = $_POST;

    $borda = $data["borda"];
    $massa = $data["massa"];
    $sabores = $data["sabores"];

    //validação de sabores máximos
    if(count($sabores) > 3) {

        $_SESSION["msg"] = "Selecione no máximo 3 sabores!";
        $_SESSION["status"] = "Warning";

    }else {

        echo "passou da validação";
        exit;

    }

    // Retorna para página inicial
    header("Location: ..");
 }

?>