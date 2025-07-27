<?php
$sql = "SELECT HOTEL.nombre, COUNT(*) AS total_reservas
        FROM RESERVA
        JOIN HOTEL ON RESERVA.id_hotel = HOTEL.id_hotel
        GROUP BY HOTEL.id_hotel
        HAVING total_reservas > 2";
$resultado = $pdo->query($sql);
$reservas_hoteles = $resultado->fetchAll();
?>
