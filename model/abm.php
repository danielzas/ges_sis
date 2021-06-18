<?php
include '../controller/bbdd.php';

class abm extends bd
{
    private $nombre;
    private $sn;
    private $descripcion;
    private $tipo;
    private $reservado;
    function __construct($nombre,$descripcion,$sn,$tipo)
    {
        parent::__construct();
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->sn=$sn;
        $this->tipo=intval($tipo);
        $this->reservado=0;
    }

function new_art()
{
 try{    
    //INSERT INTO articulos() VALUES(NULL,'monitor hp 19','monitor negro antigua puesto 3 facturacion',default,4,b'');
    $query=$this->connect()->prepare("INSERT INTO articulos VALUES(null,:nombre,:descripcion,:sn,:tipo,b'0',b'0')");
    $query->execute(['nombre'=>$this->nombre,'descripcion'=>$this->descripcion,'sn'=>$this->sn,'tipo'=>$this->tipo]); 
    echo  '<p class="stock__alta--mensaje exito" id="mensaje_txt">Los datos se guardaron correctamente</p>';
}catch(PDOException $e){
    echo  '<p class="stock__alta--mensaje error" id="mensaje_txt">Error.No se guardaron los datos:'.$e->getMessage().'</p>';
    /* print_r("Error.No se guardaron los datos:" . $e->getMessage()); */
}
}

}


$abm=new abm($_POST['nombre'],$_POST['descripcion'],$_POST['sn'],$_POST['tipo']);


if($_POST['submit']=='alta')
        {
            $abm->new_art();
        }
?>
