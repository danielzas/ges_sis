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
    echo 'tipo:'.$this->reservado.' ' .'tipo dato:'. gettype($this->reservado);
    //INSERT INTO articulos() VALUES(NULL,'monitor hp 19','monitor negro antigua puesto 3 facturacion',default,4,b'');
    $query=$this->connect()->prepare("INSERT INTO articulos VALUES(null,:nombre,:descripcion,:sn,:tipo,b'')");
    $query->execute(['nombre'=>$this->nombre,'descripcion'=>$this->descripcion,'sn'=>$this->sn,'tipo'=>$this->tipo]); 
}

}


$abm=new abm($_POST['nombre'],$_POST['descripcion'],$_POST['sn'],$_POST['tipo']);

echo 'entro';
if($_POST['submit']=='alta')
        {
            $abm->new_art();
        }
?>
