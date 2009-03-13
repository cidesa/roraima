<?php

/**
 * Subclass for representing a row from the 'ocemppar' table.
 *
 *
 *
 * @package lib.model
 */
class Ocemppar extends BaseOcemppar
{
  protected $objempresas=array();

	public function getDesobr()
  {
    return Herramientas::getX('CODOBR','Ocregobr','Desobr',self::getCodobr());
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

  public function getNompro()
  {
    return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }
}
