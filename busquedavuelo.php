<?php
$resultados_busqueda = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['buscar_vuelos'])) {
  $origen = $_POST['origen_buscar'] ?? '';
  $destino = $_POST['destino_buscar'] ?? '';

  $stmt = $pdo->prepare("SELECT * FROM VUELO WHERE origen LIKE ? AND destino LIKE ?");
  $stmt->execute(["%$origen%", "%$destino%"]);
  $resultados_busqueda = $stmt->fetchAll();
}
?>
