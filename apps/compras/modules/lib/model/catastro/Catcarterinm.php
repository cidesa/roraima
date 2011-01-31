<?php

/**
 * Subclase para representar una fila de la tabla  'catcarterinm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.catastro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Catcarterinm extends BaseCatcarterinm
{
	protected $total;
	protected $tipoterr;

  public function getTotal()
  {
  	return H::FormatoMonto(self::getDimensiones() * self::getValor());
  }


  public static function CargarTerrenos()
  {
    $c = new Criteria();
    $lista = CatcarterPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
      $modulos += array($arr->getId() => $arr->getDester());
    }
    return $modulos;
  }


  public function getTipoterr()
  {
    $c = new Criteria();
    $lista = CatcarterPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
    	$modulos += array($arr->getTertip() => $arr->getTertip());
    }
	return $modulos;
  }


  public function getDester()
  {
    return Herramientas::getX('id','catcarter','dester',self::getCatcarterid());
  }
}
