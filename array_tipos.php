<?php
//trabajar incluyendo bbdd.php anteriormente.
include_once './controller/bbdd.php';
$bd_tipo=new bd();
$query2=$bd_tipo->connect()->prepare('SELECT id_tipo,nombre FROM tipo');
$query2->execute();
$tipos=array();
$b=0;
while($row=$query2->fetch(PDO::FETCH_ASSOC))
{
   $tipos[$row['id_tipo']]=$row['nombre'];

}

return json_encode($tipos);
function dibujarSelect()
{
    global $tipos;

    foreach($tipos as $key=>$value)
        {
            if($key!='')
            {
                 echo '<option value="'.$key.'">'.$value.'</option>';
            }
        }
}
?>