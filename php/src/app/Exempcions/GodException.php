<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class GodException extends \Exception{

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null){
        $log = new Logger('Excepcio');
        $log->pushHandler(new StreamHandler('../../logs/exception.log',Logger::DEBUG));
        $log->info("Excepcio llançada ");
        parent::__construct($message, $code, $previous);
    }

}

/*<?php
session_start();

// Verifica si es la primera vez que visita la página
if (!isset($_SESSION['last_visit'])) {
    echo "Benvingut/uda per primera vegada";
} else {
    echo "Benvingut/uda, la teua darrera visita va ser el: " . $_SESSION['last_visit'];
}

// Actualiza la fecha y hora de la última visita
$_SESSION['last_visit'] = date('Y-m-d H:i:s');
?>


/*

// Función para generar la matriz
function generaMatriu($n, $m) {
    $matriz = array();
    for ($i = 0; $i < $n; $i++) {
        $fila = array();
        for ($j = 0; $j < $m; $j++) {
            $fila[] = rand(1, 500);
        }
        $matriz[] = $fila;
    }
    return $matriz;
}

// Función para imprimir una celda con colores
function printCela($n) {
    echo "<td style='padding: 8px; border: 1px solid black; background-color: $n;'>$n</td>";
}

// Generar la matriz 10x10
$matriz = generaMatriu(10, 10);

// Función para calcular la suma de filas
function sumaFilas($matriz) {
    $sumas = array();
    foreach ($matriz as $fila) {
        $sumas[] = array_sum($fila);
    }
    return $sumas;
}

// Función para calcular la suma de columnas
function sumaColumnas($matriz) {
    $numFilas = count($matriz);
    $numColumnas = count($matriz[0]);
    $sumas = array_fill(0, $numColumnas, 0);

    for ($i = 0; $i < $numColumnas; $i++) {
        for ($j = 0; $j < $numFilas; $j++) {
            $sumas[$i] += $matriz[$j][$i];
        }
    }

    return $sumas;
}

// Calcular sumas de filas y columnas
$sumasFilas = sumaFilas($matriz);
$sumasColumnas = sumaColumnas($matriz);

// Mostrar la información en una tabla
echo "<table style='border-collapse: collapse;'>";
echo "<tr>";
for ($i = 0; $i < count($matriz); $i++) {
    echo "<tr>";
    for ($j = 0; $j < count($matriz[$i]); $j++) {
        printCela($matriz[$i][$j]);
    }
    echo "<td style='padding: 8px; border: 1px solid black;'>{$sumasFilas[$i]}</td>";
    echo "</tr>";
}
echo "<tr>";
for ($i = 0; $i < count($sumasColumnas); $i++) {
    echo "<td style='padding: 8px; border: 1px solid black;'>{$sumasColumnas[$i]}</td>";
}
echo "<td></td>";
echo "</tr>";
echo "</table>";

