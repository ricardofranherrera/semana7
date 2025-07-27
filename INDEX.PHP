<?php
require_once 'config/db.php';
require_once 'logic/carrito.php';
require_once 'logic/vuelo.php';
require_once 'logic/hotel.php';
require_once 'logic/consulta.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agencia de Viajes "Escapate.cl"</title>
  <link rel="stylesheet" href="../public/assets/style.css">
  <script src="../public/assets/script.js"></script>
</head>
<body>
  <h1>Agencia de Viajes "Escapate.cl"</h1>

  <div class="notificacion">🎉 ¡Solo por hoy! 30% de descuento en paquetes a Torres del Paine.</div>

  <h2>Registra tu intención de viaje</h2>
  <form method="POST" onsubmit="return validarPaquete()">
    <input type="hidden" name="agregar" value="1">
    <label>Nombre del Hotel:</label><input type="text" name="hotel" required>
    <label>Ciudad:</label><input type="text" name="ciudad" required>
    <label>País:</label><input type="text" name="pais" required>
    <label>Fecha de Viaje:</label><input type="date" name="fecha" required>
    <label>Duración (en días):</label><input type="number" name="duracion" required>
    <button type="submit">Enviar</button>
  </form>

  <h2>Registrar Vuelo</h2>
  <form method="POST" onsubmit="return validarFormularioVuelo()">
    <input type="hidden" name="insertar_vuelo" value="1">
    <label>Origen:</label><input type="text" name="origen" required>
    <label>Destino:</label><input type="text" name="destino" required>
    <label>Fecha:</label><input type="date" name="fecha_vuelo" required>
    <label>Plazas disponibles:</label><input type="number" name="plazas" required>
    <label>Precio:</label><input type="number" name="precio" required>
    <button type="submit">Registrar Vuelo</button>
  </form>

  <h2>Registrar Hotel</h2>
  <form method="POST">
    <input type="hidden" name="insertar_hotel" value="1">
    <label>Nombre:</label><input type="text" name="nombre" required>
    <label>Ubicación:</label><input type="text" name="ubicacion" required>
    <label>Habitaciones disponibles:</label><input type="number" name="habitaciones" required>
    <label>Tarifa por noche:</label><input type="number" name="tarifa" required>
    <button type="submit">Registrar Hotel</button>
  </form>

  <?php if (!empty($_SESSION['carrito'])): ?>
    <h3>Carrito de Viajes:</h3>
    <ul>
      <?php foreach ($_SESSION['carrito'] as $item): ?>
        <li>Destino: <?= htmlspecialchars($item['ciudad']) ?>, <?= htmlspecialchars($item['pais']) ?> | Hotel: <?= htmlspecialchars($item['hotel']) ?> | Fecha: <?= htmlspecialchars($item['fecha']) ?> | <?= htmlspecialchars($item['duracion']) ?> días</li>
      <?php endforeach; ?>
    </ul>
    <form method="POST">
      <button type="submit" name="vaciar">Vaciar Carrito</button>
    </form>
  <?php else: ?>
    <p>No hay paquetes en tu carrito aún.</p>
  <?php endif; ?>

  <h2>Hoteles con más de 2 reservas</h2>
  <?php foreach ($reservas_hoteles as $fila): ?>
    <div class="notificacion">
      Hotel: <?= htmlspecialchars($fila['nombre']) ?> - Reservas: <?= htmlspecialchars($fila['total_reservas']) ?>
    </div>
  <?php endforeach; ?>
</body>
</html>
