<?php
$host = 'localhost';
$dbname = 'alquiladora';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_producto = $_POST['nombre_producto'];
        $precio_producto = $_POST['precio_producto'];
        $cantidad_total = $_POST['cantidad_total'];

        $sql = "INSERT INTO productos (nombre_producto, precio_producto, cantidad_total) VALUES (:nombre_producto, :precio_producto, :cantidad_total)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->bindParam(':precio_producto', $precio_producto);
        $stmt->bindParam(':cantidad_total', $cantidad_total);

        $stmt->execute();

        echo "Producto registrado exitosamente.";
    }
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
