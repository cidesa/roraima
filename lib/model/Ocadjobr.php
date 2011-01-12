<?php

/**
 * Subclass for representing a row from the 'ocadjobr'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Ocadjobr extends BaseOcadjobr
{
  public function getDesobr()
  {
    return Herramientas::getX('CODOBR','Ocregobr','desobr',self::getCodobr());
  }

  public function getCodtipobr()
  {
    return Herramientas::getX('CODOBR','Ocregobr','codtipobr',self::getCodobr());
  }

    public function getDestipobr()
  {
    return Herramientas::getX('CODTIPOBR','Octipobr','Destipobr',self::getCodtipobr());
  }

  public function getFecini()
  {
  	if (self::getCodobr())
  	$fecini=date('d/m/Y',strtotime(Herramientas::getX('CODOBR','Ocregobr','Fecini',self::getCodobr())));
  	else $fecini='';
    return $fecini;
  }

  public function getFecfin()
  {
  	if (self::getCodobr())
  	$fecfin=date('d/m/Y',strtotime(Herramientas::getX('CODOBR','Ocregobr','Fecfin',self::getCodobr())));
  	else $fecfin='';
    return $fecfin;
  }

  public function getMonobr()
  {
  	if (self::getCodobr())
  	$monto=number_format(Herramientas::getX('CODOBR','Ocregobr','Monobr',self::getCodobr()),2,',','.');
  	else $monto='0,00';
    return $monto;
  }

  public function getDespro()
  {
    return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodprogan());
  }

  public function getCodpre()
  {
    return Herramientas::getX('CODOBR','Ocregobr','Codpre',self::getCodobr());
  }

  public function getNompre()
  {
    return Herramientas::getX('CODPRE','Cpdeftit','Nompre',self::getCodpre());
  }
}
