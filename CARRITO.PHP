<?php
session_start();
if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
  $paquete = [
    'hotel' => $_POST['hotel'],
    'ciudad' => $_POST['ciudad'],
    'pais' => $_POST['pais'],
    'fecha' => $_POST['fecha'],
    'duracion' => $_POST['duracion']
  ];
  $_SESSION['carrito'][] = $paquete;
  echo "<div class='notificacion'> Se ha agregado correctamente al carrito.</div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vaciar'])) {
  $_SESSION['carrito'] = [];
  echo "<div class='notificacion'>🧹 Carrito vaciado.</div>";
}
?>
