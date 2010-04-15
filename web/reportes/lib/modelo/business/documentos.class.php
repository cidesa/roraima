<?php
require_once("../../lib/modelo/baseClases.class.php");

class documentos extends baseClases {

  public static function getNomuni($id)
  {
    $doc = new documentos();
    $o=$doc->select("select nomuni from acunidad where id = ".$id."");
    if($o) return $o[0];
    else '<!- Registro no encontrado -!>';
  }

   public static function catalogo_coddoc_dfatendoc($objhtml)
  {
    $sql="SELECT coddoc ,desdoc, fecdoc FROM dfatendoc order by coddoc";

    $catalogo = array(
        $sql,
        array('Código Documento','Descripcion','Fecha'),
        array($objhtml),
        array('coddoc'),
        100
        );

      return $catalogo;
  }



}
?>
