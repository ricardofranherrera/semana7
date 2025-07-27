function validarPaquete() {
  const hotel = document.getElementsByName("hotel")[0].value.trim();
  const ciudad = document.getElementsByName("ciudad")[0].value.trim();
  const pais = document.getElementsByName("pais")[0].value.trim();
  const fecha = document.getElementsByName("fecha")[0].value;
  const duracion = document.getElementsByName("duracion")[0].value;

  if (!hotel || !ciudad || !pais || !fecha || duracion <= 0) {
    alert("Por favor completa todos los campos del paquete antes de enviar.");
    return false;
  }
  return true;
}

function validarFormularioVuelo() {
  const origen = document.querySelector('input[name="origen"]').value;
  const destino = document.querySelector('input[name="destino"]').value;
  const plazas = document.querySelector('input[name="plazas"]').value;

  if (origen.trim() === "" || destino.trim() === "" || plazas <= 0) {
    alert("Por favor completa los campos correctamente antes de enviar.");
    return false;
  }
  return true;
}
