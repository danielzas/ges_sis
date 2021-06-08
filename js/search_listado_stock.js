addEventListener("DOMContentLoaded", iniciar, false);



if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
  document.getElementById('select_tipo').value="0";
} else {
  console.info( "This page is not reloaded");
}
//////////////variables paginacion///////////
var pageNumber = 1; //numero de pagina de inicio
var pageSize = 2; //eltos x pagina
var articulosHtml = "";
var pagination;
var arr;

/* var arr; */
//////////////fin variables paginacion////////

/* let cantidad=document.getElementById('stock_cantidad');
let reservado=document.getElementById('stock_reservado');
let total=document.getElementById('stock_reservado'); */
function iniciar()
{
  cargar_arrayTipos();
  cargarTodosLosArticulos();
  inicializarEventos();
}
function inicializarEventos() {
  /* cargar_arrayTipos(); */
  document
    .getElementById("search")
    .addEventListener("keyup", iniciarBusqueda_n);
  document
    .getElementById("select_tipo")
    .addEventListener("change", iniciarBusqueda_t);
}

function cargarTodosLosArticulos()
{
  let tipo = "0";
  conexion = new XMLHttpRequest();
  conexion.onreadystatechange = mostrarResultados;
  conexion.open("GET", "./stock_info_buscar_articulos.php?tipo=" + tipo, true);
  conexion.send();
}

let conexion;
function iniciarBusqueda_n(e) {
  pageNumber=1;
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
  pageNumber=1;
  let tipo = e.target.value != undefined ? e.target.value:"0";
  
  conexion = new XMLHttpRequest();
  conexion.onreadystatechange = mostrarResultados;
  conexion.open("GET", "./stock_info_buscar_articulos.php?tipo=" + tipo, true);
  conexion.send();
}

let table = document.getElementById("table");

function mostrarResultados() {
  limpiarTabla();
  let row; //fila de una tabla
  let data; //campo de una tabla
  let info; //texto de un data
  let c = 0;
  let cantidad = 0,
    reservado = 0,
    total = 0;
  if (conexion.readyState == 4) {
   arr = JSON.parse(conexion.responseText);
   console.log('una vez');
    mostrarArticulos(arr);
    console.log(arr);
    /*  while (c < arr.length) {
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
    } */
  } else {
    //determinar un sitio donde escribir el mensaje
    /* table.innerHTML= "Cargando..."; */
  }
  /* dibujarList(num_Paginas); */
  document.getElementById("stock_cantidad").value = cantidad;
  document.getElementById("stock_reservado").value = reservado;
  document.getElementById("stock_total").value = cantidad - reservado;
}

////*********************PAGINACION************************///// */
function mostrarArticulos() {
  limpiarTabla();
  let row; //fila de una tabla
  let data; //campo de una tabla
  let info; //texto de un data
  /* let c = 0; */
  let cantidad = 0,
    reservado = 0,
    total = 0;
    var pageCont = Math.ceil(arr.length / pageSize);
   var pagination = paginate(arr, pageSize, pageNumber);
  /*aqui va el  dibujo de la tabla */
  pagination.forEach(art =>{
    cantidad++;
    row = document.createElement("tr");
    let c2=1;
    while(c2<=5)
    {
      data = document.createElement("td");
      info = document.createTextNode(art[c2]);
      if (c2 == 4) {
        info = document.createTextNode(arr_tipos[art[4]]); //sobreescribo la variable info antes creada
      }
      if (c2 == 5 && art[c2] == 1) {
        info = document.createElement("a"); //sobreescribo la variable info antes creada
        info.setAttribute("href", "#?id=" + art[0]); //creo enlace con el id del articulo
        info_txt =
          art[c2] == 1
            ? document.createTextNode("Si")
            : document.createTextNode("No");
        info.appendChild(info_txt);
      } else if (c2 == 5) {
        info = document.createTextNode("No"); //sobreescribo la variable info antes creada
      }
      /********************* */
      if (c2 == 6 && art[c2] == 1) {
        console.log('entraste acá');
        info = document.createElement("a"); //sobreescribo la variable info antes creada
        info.setAttribute("href", "#?id=" + art[0]); //creo enlace con el id del articulo
        info_txt =
          art[c2] == 1
            ? document.createTextNode("Si")
            : document.createTextNode("No");
        info.appendChild(info_txt);
      } else if (c2 == 5) {
        info = document.createTextNode("No"); //sobreescribo la variable info antes creada
      }
      /********************* */
      data.appendChild(info);
      row.appendChild(data);
      c2++;
    }
    if (art[5] == 1) {
      reservado++;
    }
    table.appendChild(row);
    /* c++; */
    
  });
  buttonNext_previus=pageNumber >1  ? " <button onclick='previusPage()'>Anterior</button>":"";
  buttonNext_previus+= pageNumber < pageCont ?(" <button onclick='nextPage()'>Siguiente</button>"):"" ;
  document.getElementById('buttons_next_previus').innerHTML="";
  document.getElementById('buttons_next_previus').innerHTML=buttonNext_previus;
}


  /************ */
  /* while (c < arr.length) {
    cantidad++;
    row = document.createElement("tr");
    let c2 = 1;
    while (c2 <= 5) {
      data = document.createElement("td");
      info = document.createTextNode(arr[c][c2]);
      if (c2 == 4) {
        info = document.createTextNode(arr_tipos[arr[c][4]]); //sobreescribo la variable info antes creada
      }
      if (c2 == 5 && arr[c][c2] == 1) {
        info = document.createElement("a"); //sobreescribo la variable info antes creada
        info.setAttribute("href", "#?id=" + arr[c][0]); //creo enlace con el id del articulo
        info_txt =
          arr[c][c2] == 1
            ? document.createTextNode("Si")
            : document.createTextNode("No");
        info.appendChild(info_txt);
      } else if (c2 == 5) {
        info = document.createTextNode("No"); //sobreescribo la variable info antes creada
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
  } */

  /*fin del dibujo de la tabla*/


function paginate(array, page_size, page_number) {
  return array.slice((page_number - 1) * page_size, page_number * page_size); //posicion del array
}
function nextPage() {
  pageNumber++;
  mostrarArticulos(pagination);
}
function previusPage() {
  pageNumber--;
  mostrarArticulos(pagination);
}

////////////////////////FIN PAGINACION////////////////////////////////

function dibujarList(num) {
  let c = 1;
  let lista = document.getElementById("paginacionLista");
  let elemento_lista = document.createElement("li");
  while (c <= num) {
    let num = document.createTextNode(c);
    elemento_lista.appendChild(num);
    lista.appendChild(elemento_lista);
    c++;
  }
}

function limpiarTabla() {
  let c = 1;
  while (c < table.rows.length) {
    table.rows[c].remove();
  }
}

function mostrarCantidad_total_reservado() {
  let c = 0;
  while (c < table.rows.length) {
   /*  console.log(table.rows[c]); */
  }
}

let arr_tipos = [];
function cargar_arrayTipos() {
  let select = document.getElementById("select_tipo").options;

  let c = 0;
  while (c < select.length) {
    arr_tipos[parseInt(select[c].value)] = select[c].text;
    c++;
  }
  /* console.log(arr_tipos); */
}
/** */
