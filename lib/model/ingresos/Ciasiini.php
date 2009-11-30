<?php

/**
 * Subclass for representing a row from the 'ciasiini'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Ciasiini.php 32416 2009-09-02 02:21:12Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Ciasiini extends BaseCiasiini
{
  protected $grid= array();
  protected $movimiento='';
  protected $montos=0;
  protected $porc=0;

  public function getNompre()
  {
    // Se obtiene Nomnom de la tabla Npasicaremp

    $c = new Criteria();
    $c->add(CideftitPeer::CODPRE,self::getCodpre());
    $registro = CideftitPeer::doSelectOne($c);
    if($registro) return $registro->getNompre();
    else return null;
  }

  public function getAnopre()
  {
   return substr(Herramientas::getX('codemp','cidefniv','fecper','001'),0,4);
  }

}
