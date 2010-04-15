<?php

/**
 * Subclase para representar una fila de la tabla  'catcarconinm'.
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
class Catcarconinm extends BaseCatcarconinm
{
	protected $total;
	protected $tipocons;

  public function getTotal()
  {
	return H::FormatoMonto(self::getCancar() * self::getMetare());
  }


  public function getNomcarcon()
  {
    return Herramientas::getX('id','catcarcon','Nomcarcon',self::getCatcarconid());
  }


  public function getTipocons()
  {
    $c = new Criteria();
    $lista = CatcarconPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
    	$modulos += array($arr->getTipo() => $arr->getTipo());
    }
	return $modulos;
  }


}
