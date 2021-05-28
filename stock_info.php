<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet" />
  <title>GES_SIS</title>
</head>

<body>
  <h1 class="title">XL Gestión Sistemas</h1>
  <main class="contenedor">
    <nav class="menu">
      <ul>
        <li>
          Stock
          <ul>
            <li>Info
            </li>
            <li><a href="stock_movimientos.php">Movimientos</a></li>
            <li><a href="stock_abm.php">ABM</a></li>
          </ul>
        </li>
        <li>
          Contraseñas
          <ul>
            <li>Mostrar</li>
            <li>ABM
            </li>
          </ul>
        </li>
      </ul>
    </nav>

    <div class="pagina">
      <!--pagina de stock info-->
      <div class="stock">
        <div class="search_filter">
          <div class="search_filter--item">
            <label for="search">Buscar:</label>
            <input type="search" id="search" />
          </div>
          <div class="search_filter--item">
            <label for="">Filtrar:</label>
            <select name="" id='select_tipo'>
              <option value="0">Todos</option>
              <!--  <option value="1">Mouse</option>
                <option value="2">Pendrive</option>
                <option>Impresoras</option> -->
              <?php
              include_once './array_tipos.php';
              dibujarSelect();
              ?>
            </select>

          </div>
        </div>
        <div class="productos">
          <table class="productos__table" id="table">
            <tr class="productos__encabezado">
              <th>Nombre</th>
              <th>Descripción</th>
              <th>SN</th>
              <th>Tipo</th>
              <th>Reservado</th>
              <th>Prestado</th>
            </tr>
            <?php
            /*php*/
            include 'stock_info_listar_articulos.php';
            ?>
          </table>
          <div class="paginacion" id="paginacion">
          <ul id="paginacionLista">
            <?php
            if (isset($num_paginas)) {
              $p = 1;
              while ($p <= $num_paginas) {
                echo '<li><a href="stock_info.php?pagina='.$p.'">'.$p.'</a></li>';
                $p++;
              }
            }
            ?>
            </ul>
          </div>
        </div>
        <div class="stock__total">

          <div class="stock__total--item">
            <label for="stock_cantidad">Cantidad:</label>
            <input type="text" id="stock_cantidad">
          </div>
          <div class="stock__total--item">
            <label for="stock_reservado">Reservado:</label>
            <input type="text" id="stock_reservado">
          </div>
          <div class="stock__total--item">
            <label for="stock_total">Total:</label>
            <input type="text" id="stock_total">
          </div>
        </div>

      </div>
      <script src="js/search_listado_stock.js"></script>
      <!--fin pagina stock-->
  </main>
</body>

</html>