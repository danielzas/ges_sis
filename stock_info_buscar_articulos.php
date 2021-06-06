<?php
include_once './controller/bbdd.php';
include_once './array_tipos.php';
$bd = new bd();

if (isset($_GET['nombre'])) {
    $busqueda = $_GET['nombre'];
    $query = $bd->connect()->prepare('SELECT * FROM articulos WHERE nombre like ? or descripcion like ? or sn like ?', [
        PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
    ]);
    $parametros = ["$busqueda%","%$busqueda%","%$busqueda%"];
    $query->execute($parametros);
    echo json_encode($query->fetchAll());
    /* echo json_encode($query->fetchAll()); */
} else {
    if (isset($_GET['tipo'])) {
        $busqueda = intval($_GET['tipo']);
        if ($busqueda != 0) {
            $query = $bd->connect()->prepare('SELECT * FROM articulos WHERE tipo = ' . $busqueda);
            $query->execute();
            echo json_encode($query->fetchAll());
        } else {
            $query = $bd->connect()->query('SELECT * FROM articulos')->fetchAll();
            echo json_encode($query);
        } 
    } 
    
}
/* echo json_encode($query->fetchAll()); */
/* while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $reservado=$row['reservado']==1?'si':'no';
    $link_reservado=$row['reservado']==1?'<a href="#">':'';
    $cierre_link=$row['reservado']==1?'</a>':'';
    echo '<tr>' . '<td>' . $row['nombre'] . '</td>' . '<td>' . $row['descripcion'] .
        '</td>' . '<td>' . $row['sn'] . '</td>' . '<td>' .$tipos[$row['tipo']] . '</td>' . '<td>'.$link_reservado.
        $reservado.$cierre_link.'</td>' . '</tr>'; }*/

      


//utilizar json. 
//en js recorrer el json, arman las filas. borrar la busqueda limpiando resultados. 
