<?php
include_once 'array_tipos.php';
$bd_art = new bd();
$bd_tipo=new bd();
$query = $bd_art->connect()->prepare('SELECT * FROM articulos');
$query->execute();
$query2=$bd_tipo->connect()->prepare('SELECT id_tipo,nombre FROM tipo');
$query2->execute();
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $link_reservado=$row['reservado']==1?'<a href="#"?id='.$row['id_art'].'>Si':'No';
    $cierre_link=$row['reservado']==1?'</a>':'';
    echo '<tr>' . '<td>' . $row['nombre'] . '</td>' . '<td>' . $row['descripcion'] .
        '</td>' . '<td>' . $row['sn'] . '</td>' . '<td>' .$tipos[$row['tipo']] . '</td>' . '<td>'.$link_reservado.
        $cierre_link.'</td>' . '</tr>';

}

//1-agregar paginación