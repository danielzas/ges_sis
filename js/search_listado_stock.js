addEventListener("DOMContentLoaded", inicializarEventos, false);

/* let cantidad=document.getElementById('stock_cantidad');
let reservado=document.getElementById('stock_reservado');
let total=document.getElementById('stock_reservado'); */

function inicializarEventos() {
  cargar_arrayTipos();
  document
    .getElementById("search")
    .addEventListener("keyup", iniciarBusqueda_n);
  document
    .getElementById("select_tipo")
    .addEventListener("change", iniciarBusqueda_t);
}

let conexion;
function iniciarBusqueda_n(e) {
  let word = e.target.value;
  conexion = new XMLHttpRequest();
  conexion.onreadystatechange = mostrarResultados;
  conexion.open(
    "GET",
    "./stock_info_buscar_articulos.php?nombre=" + word,
    true
  );
  conexion.send();
}
function iniciarBusqueda_t(e) {
  let tipo = e.target.value;
  console.log(tipo);
  conexion = new XMLHttpRequest();
  conexion.onreadystatechange = mostrarResultados;
  conexion.open("GET", "./stock_info_buscar_articulos.php?tipo=" + tipo, true);
  conexion.send();
}

let table = document.getElementById("table");

function mostrarResultados() {
  limpiarTabla();
 /*  document.getElementById('paginacionLista').innerHTML='';
  let art_PorPagina=3;
  let num_Paginas=0; */
  let row; //fila de una tabla
  let data; //campo de una tabla
  let info; //texto de un data
  let c = 0;
  let cantidad = 0,
    reservado = 0,
    total = 0;
  if (conexion.readyState == 4) {
    var arr = JSON.parse(conexion.responseText);
   /*  num_Paginas=Math.ceil(arr.length / art_PorPagina); *///calcular numero de paginas
    while (c < arr.length) {
      cantidad++;
      row = document.createElement("tr");
      let c2 = 1;
      while (c2 <= 5) {
        data = document.createElement("td");
        info = document.createTextNode(arr[c][c2]);
        if(c2==4)
        {
          info = document.createTextNode(arr_tipos[arr[c][4]]);//sobreescribo la variable info antes creada
        }
        if(c2 == 5 && arr[c][c2]==1)
        {
          info = document.createElement("a"); //sobreescribo la variable info antes creada
          info.setAttribute("href","#?id="+arr[c][0]);//creo enlace con el id del articulo
          info_txt = arr[c][c2]==1 ? document.createTextNode("Si"):document.createTextNode("No");
          info.appendChild(info_txt);
        }else
        if(c2 == 5)
        {
          info=document.createTextNode("No");//sobreescribo la variable info antes creada
        }
        data.appendChild(info);
        row.appendChild(data);
        c2++;
      }
      if (arr[c][5] == 1) {
        reservado++;
      }
      table.appendChild(row);
      c++;
    }
  } else {
    //determinar un sitio donde escribir el mensaje
    /* table.innerHTML= "Cargando..."; */
  }
  dibujarList(num_Paginas);
  document.getElementById("stock_cantidad").value = cantidad;
  document.getElementById("stock_reservado").value = reservado;
  document.getElementById("stock_total").value = cantidad - reservado;
}

/* function dibujarList(num)
{
  let c=1;
  let lista=document.getElementById('paginacionLista');
  let elemento_lista=document.createElement('li');
  while (c <= num)
  {
    let num=document.createTextNode(c);
    elemento_lista.appendChild(num);
    lista.appendChild(elemento_lista);
    c++;
  }
} */

function limpiarTabla() {
  let c = 1;
  while (c < table.rows.length) {
    table.rows[c].remove();
  }
}

function mostrarCantidad_total_reservado() {
  let c = 0;
  while (c < table.rows.length) {
    console.log(table.rows[c]);
  }
}


let arr_tipos=[];
function cargar_arrayTipos()
{
  let select = document.getElementById("select_tipo").options;
 
  let c=0;
  while (c < select.length)
  {
    arr_tipos[parseInt(select[c].value)]=select[c].text;
    c++;
  }
  console.log(arr_tipos);
}
/** */
