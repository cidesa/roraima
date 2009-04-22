<?php
class Bienes
{
  /*
   * Función Principal para validar datos del formulario Bieregactmued
   */
  public static function validarBnregmue($articulo) {
      return self::validarCodact($articulo);
    }


  public static function validarCodact($articulo)
  {
         $codact=$articulo->getCodact();
         $codmue=$articulo->getCodmue();

     $c = new Criteria();
     //$c->add(BnregmuePeer::CODACT,$codact);
     $c->add(BnregmuePeer::CODMUE,$codmue);
     $objBnregmue = BnregmuePeer::doSelectOne($c);

     if ($objBnregmue)
       return 203;
     else
        return -1;

  }

  /*
   * Función Principal para validar datos del formulario Bieregactinm
   */
  public static function validarBnreginm($articulo)
  {
      return self::validarCodmue($articulo);
  }


  public static function validarCodmue($articulo)
  {
     $codact=$articulo->getCodact();
     $codinm=$articulo->getCodinm();

     $c = new Criteria();
     //$c->add(BnreginmPeer::CODACT,$codact);
     $c->add(BnreginmPeer::CODINM,$codinm);
     $objBnreginm = BnreginmPeer::doSelectOne($c);

     if ($objBnreginm)
       return 203;
     else
        return -1;
  }



}
?>
