<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "alquiladora";
$conn = new mysqli($servidor, $usuario, $contrasena, $base_datos);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_telefono = $_POST['numero_telefono'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido_cliente = $_POST['apellido_cliente'];
    $correo_cliente = $_POST['correo_cliente'];
    $codigo_postal = $_POST['codigo_postal'];
    $calle = $_POST['calle'];
    $numero_calle = $_POST['numero_calle'];
    $sql = "INSERT INTO clientes (numero_telefono, nombre_cliente, apellido_cliente, correo_cliente, codigo_postal, calle, numero_calle) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $numero_telefono, $nombre_cliente, $apellido_cliente, $correo_cliente, $codigo_postal, $calle, $numero_calle);

    if ($stmt->execute()) {
        echo "Cliente registrado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
