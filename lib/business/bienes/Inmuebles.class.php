<?php
class Inmuebles
{

    /**************************************************************************
	 **         Registro de Inmueble Formulario Bieregseginm                  **
	 **                       Jesus Lobaton                                   **
	 **************************************************************************/
	/**
	 * Función para registrar un Seguro de Inmuebles
	 *
	 * @static
	 * @param $Bnseginm Object a guardar
	 * @return void
	 */
  public static function salvarbieregseginm($Bnseginm)
  {
  	return self::salvarseginm($Bnseginm);
  }

  public static function salvarseginm($bnseginm)
  {
   if (date('Y-m-d') > $bnseginm->getFecsegven())
   	{
   		$bnseginm->setStaseginm('V');
   	}else{
   		$bnseginm->setStaseginm('A');
   	}
  	$bnseginm->save();
  return '-1';
  }
    /**************************************************************************
	 **                           FIN                                         **
	 **                       Jesus Lobaton                                   **
	 **************************************************************************/

 public static function validarBieregseginm($bnseginm,&$msj)
 {
    $c= new Criteria();
  	$c->add(BnseginmPeer::CODACT,$bnseginm->getCodact());
  	$c->add(BnseginmPeer::CODMUE,$bnseginm->getCodmue());
  	$c->add(BnseginmPeer::NROSEGINM,$bnseginm->getNroseginm());
  	$resul= BnseginmPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $msj=200;
  	}
  	else
  	{
  		return $msj=-1;
  	}

 }

public static function Validar_biedisactinm($valor1,$valor2)
{
	$val = -1;
	{


               	    if ($valor1>= $valor2)
               	     { // print 'entre';exit;
               	     	$val=416;

               	     }

        return $val;
 }
}

}
?>