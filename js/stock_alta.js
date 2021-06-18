document.addEventListener("DOMContentLoaded", iniciarEscucha, false);

let form=document.getElementById('form_alta');

if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
    form.reset();
  }

function iniciarEscucha() {
  document.getElementById("form_alta").addEventListener("submit", checkSubmit);
}

function checkSubmit(e) {
  e.preventDefault();
  enviarFormulario();
}

function retornarDatos() {
  console.log("entraste");
  var cad = "";
  var nombre = document.getElementById("nombre").value;
  var descripcion = document.getElementById("descripcion").value;
  var sn = document.getElementById("sn").value;
  var tipo = document.getElementById("tipo").value;
  var enviar = document.getElementById("guardar_art").value;
  cad =
    "nombre=" +
    encodeURIComponent(nombre) +
    "&descripcion=" +
    encodeURIComponent(descripcion) +
    "&sn=" +
    encodeURIComponent(sn) +
    "&tipo=" +
    encodeURIComponent(tipo) +
    "&submit=" +
    encodeURIComponent(enviar);
  console.log(cad);
  return cad;
}

let conexion;
function enviarFormulario() {
  conexion = new XMLHttpRequest();
  conexion.onreadystatechange = procesarEventos;
  conexion.open("POST", "model/abm.php", true);
  conexion.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );
  conexion.send(retornarDatos());
}

function procesarEventos() {
  var resultados = document.getElementById("mensaje");
  if (conexion.readyState == 4) {
    console.log("el final");
    resultados.innerHTML = conexion.responseText;
    let clases = document.getElementById("mensaje_txt").classList;
    if (clases[1] == "exito") {
        form.reset();
      setTimeout(function () {
        resultados.innerHTML = "";
      }, 5000);
    }
  } else {
    resultados.innerHTML =
      '<div class="tenor-gif-embed" data-postid="20622571" data-share-method="host" data-width="100%" data-aspect-ratio="1.0"><a href="https://tenor.com/view/loop-loading-loading-gif-20622571">Loop Loading GIF</a> from <a href="https://tenor.com/search/looploading-gifs">Looploading GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>';
  }
}

function timer() {
  console.log("hubo un cambio");
}
