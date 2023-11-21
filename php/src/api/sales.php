<?php
include_once '../app/QueryBuilder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idBook = $_POST['idBook'] ?? null;
    $idUser = $_POST['idUser'] ?? null;


    if ($idBook !== null && $idUser !== null) {
        $values = ['idBook' => $idBook,'idUser'=>$idUser];
        \BatBook\QueryBuilder::insert(\BatBook\Sales::class,$values);
        $response = [
            'success' => true,
            'message' => 'Venta realizada con éxito.'
        ];
    } else {

        $response = [
            'success' => false,
            'error' => 'Faltan parámetros en la solicitud.'
        ];
    }
} else {
    $response = [
        'success' => false,
        'error' => 'Se esperaba una petición POST.'
    ];
}

header('HTTP/1.1 404 Not Found');

// Enviar la respuesta en formato JSON
echo json_encode($response);

