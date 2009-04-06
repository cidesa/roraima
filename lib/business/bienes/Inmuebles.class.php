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
  public static function salvarbieregseginm($bnseginm,$grid)
  {
  	if ( self::salvarseginm($bnseginm)==-1)
  	{
  	 	//salvar detalle
  	$codact = $bnseginm->getCodact();
  	$codmue = $bnseginm->getCodmue();
    $nrosegmue = $bnseginm->getNroseginm();

    $x = $grid[0];
    $j = 0;

    while ($j < count($x)) {
      $x[$j]->setCodact($codact);
      $x[$j]->setCodinm($codmue);
      $x[$j]->setNrosegmue($nrosegmue);
      $x[$j]->save();
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
   return -1;
  	}
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