/**
 * Envía y recibe datos en formato JSON
 * @param {string} url - URL del servicio
 * @returns {Promise<Object>} Respuesta del servidor
 */
export async function enviaJson(url) {
  // Primero obtenemos los datos de JSONPlaceholder
  const respuesta = await fetch(url);

  if (!respuesta.ok) {
    throw new Error(`Error ${respuesta.status}: ${respuesta.statusText}`);
  }

  // Obtenemos el primer usuario de ejemplo
  const usuario = await respuesta.json();
  const primerUsuario = Array.isArray(usuario) ? usuario[0] : usuario;

  // Enviamos el usuario a nuestro servidor PHP
  const respuestaPhp = await fetch("srv/json.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(primerUsuario),
  });

  if (!respuestaPhp.ok) {
    throw new Error(`Error del servidor: ${respuestaPhp.status}`);
  }

  const resultado = await respuestaPhp.json();
  return {
    ok: true,
    texto: resultado.texto,
  };
}
