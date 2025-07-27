<?php
if (isset($_POST['insertar_vuelo'])) {
  $stmt = $pdo->prepare("INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$_POST['origen'], $_POST['destino'], $_POST['fecha_vuelo'], $_POST['plazas'], $_POST['precio']]);
  echo "<div class='notificacion'> Vuelo registrado.</div>";
}
?>
