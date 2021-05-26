<?php
include_once 'array_tipos.php';
$bd_art = new bd();
$bd_tipo=new bd();
$pagina=isset($_GET['pagina'])?(int)$_GET['pagina']:1;//n° pagina
$artPorPagina=3;//cantidad de articulos mostrados por pagina
$inicio=($pagina > 1)?($pagina*$artPorPagina-$artPorPagina):0;//calcular el indice a partir del cual mostrar resultados
$articulos = $bd_art->connect()->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio,$artPorPagina");
$articulos->execute();
$query2=$bd_tipo->connect()->prepare('SELECT id_tipo,nombre FROM tipo');
$query2->execute();
$cant_paginas= $bd_art->connect()->query("SELECT count(*) as total from articulos");
$cant_paginas=$cant_paginas->fetch()['total'];
$num_paginas=ceil($cant_paginas/$artPorPagina);
while ($row = $articulos->fetch(PDO::FETCH_ASSOC)) {
    $link_reservado=$row['reservado']==1?'<a href="#"?id='.$row['id_art'].'>Si':'No';
    $link_prestado=$row['prestado']==1?'<a href="#"?id='.$row['id_art'].'>Si':'No';
    $cierre_link_reservado=$row['reservado']==1?'</a>':'';
    $cierre_link_prestado=$row['prestado']==1?'</a>':'';
    echo '<tr>' . '<td>' . $row['nombre'] . '</td>' . '<td>' . $row['descripcion'] .
        '</td>' . '<td>' . $row['sn'] . '</td>' . '<td>' .$tipos[$row['tipo']] . '</td>' . '<td>'.$link_reservado.
        $cierre_link_reservado.'</td>' .'<td>'.$link_prestado.$cierre_link_prestado.'</td>' . '</tr>';

}

//1-agregar paginación