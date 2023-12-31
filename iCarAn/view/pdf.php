<?php
include('config.php');

$query = "SELECT * from vehiculo";
$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query error' . mysqli_error($connection));
}

$reportContent = "Vehiculo\n\n";
while ($row = $result->fetch_assoc()) {
    $reportContent .= "ID pedido: " . $row["id"] . ", Patente: " . $row["patente"] . ", Modelo: " . $row["modelo"] . ", Marca: " . $row["Marca"] . "\n\n\n";
}

if (mysqli_num_rows($result) > 0) {
    $response = array(
        "success" => true,
        "data" => $reportContent
    );
} else {
    $response = array(
        "success" => false,
        "message" => "No se encontraron registros de pedidos"
    );
}

header('Content-Type: application/json');
echo json_encode($response);
?>