<?php
$host = 'localhost';
$dbname = 'alquiladora';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_cliente = $_POST['id_cliente'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $fecha_devolucion = $_POST['fecha_devolucion'];
        $cantidad_total_pago = $_POST['cantidad_total_pago'];
        $cantidad_adelantada = $_POST['cantidad_adelantada'];
        $sql = "INSERT INTO pedidos (id_cliente, fecha_entrega, fecha_devolucion, cantidad_total_pago, cantidad_adelantada) 
                VALUES (:id_cliente, :fecha_entrega, :fecha_devolucion, :cantidad_total_pago, :cantidad_adelantada)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':fecha_entrega', $fecha_entrega);
        $stmt->bindParam(':fecha_devolucion', $fecha_devolucion);
        $stmt->bindParam(':cantidad_total_pago', $cantidad_total_pago);
        $stmt->bindParam(':cantidad_adelantada', $cantidad_adelantada);
        $stmt->execute();
        echo "Pedido registrado exitosamente.";
    }
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
