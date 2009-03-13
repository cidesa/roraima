<?php

/**
 * Subclass for representing a row from the 'npsalint' table.
 *
 *
 *
 * @package lib.model
 */
class Npsalint extends BaseNpsalint
{
	protected $nomnom='';
	protected $codnom='';
	protected $feccal='';
	protected $nomemp='';
	protected $periodo='';
	protected $codnomasi='';

 	  public function getDestipcon()
  {
  	  	  return Herramientas::getX('codtipcon','nptipcon','destipcon',self::getCodcon());
  }

  public function getCodnom()
  {
  	  	  $dato= Herramientas::getX('codemp','npasicaremp','codnom',self::getCodemp());
      return Herramientas::getX('codnom','npnomina','codnom',$dato);
  }
	  public function getNomemp()
  {
  	  	  $dato= Herramientas::getX('codemp','npasiempcont','nomemp',self::getCodemp());
  	      return Herramientas::getX('nomemp','npasiempcont','nomemp',$dato);
  }
	  public function getFeccal()
  {
  	  	  $dato= Herramientas::getX('codemp','npasiempcont','feccal',self::getCodemp());
  	      return Herramientas::getX('feccal','npasiempcont','feccal',$dato);
  }


  public function getNomnom()
  {

  	$dato= Herramientas::getX('codemp','npasicaremp','codnom',self::getCodemp());
    return Herramientas::getX('codnom','npnomina','nomnom',$dato);

  }
}