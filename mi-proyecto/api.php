<?php
// Permisos para que React (localhost:3000) pueda leer este archivo
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$usuario_bd = "root";
$password_bd = ""; // En XAMPP por defecto va vacío
$nombre_bd = "proyecto_escolar";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$nombre_bd", $usuario_bd, $password_bd);
    
    $stmt = $conexion->prepare("SELECT id_usuario, nombre_usuario, email_usuario FROM usuarios");
    $stmt->execute();
    
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($datos);

} catch(PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>