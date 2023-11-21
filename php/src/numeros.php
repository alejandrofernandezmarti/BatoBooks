<?php
include_once "load.php";

include_once "views/accesos.view.php";
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


function printCela($n) {
    if ($n % 2 == 0){
        echo "<td style='padding: 8px; border: 1px solid black; background-color: blue;'>$n</td>";
    }else{
        echo "<td style='padding: 8px; border: 1px solid black; background-color: red;'>$n</td>";
    }

}


$matriz = generaMatriu(10, 10);


function sumaFilas($matriz) {
    $sumas = array();
    foreach ($matriz as $fila) {
        $sumas[] = array_sum($fila);
    }
    return $sumas;
}


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


$sumasFilas = sumaFilas($matriz);
$sumasColumnas = sumaColumnas($matriz);

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
