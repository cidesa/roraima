<?php

/**
 * Subclass for representing a row from the 'fordefpry' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefpry extends BaseFordefpry
{
  public function getFrepagcon()
  {
	$data = parent::getProacc();
	if($data=='P') return 'Proyecto';
	if($data=='A') return 'Acción Centralizada';
  }


  public function getNomemp2()
  {
    return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodemp());
  }

  public function getDescat()
  {
    return Herramientas::getX('CODCAT','Fordefcatpre','Descat',self::getUniejepri());
  }

  public function getDesobj()
  {
    return Herramientas::getX('CODEQU','Fordefequ','desobj',self::getCodequ());
  }

  public function getDessta()
  {
    return Herramientas::getX('CODSTA','Fordefsta','Dessta',self::getCodsta());
  }

  public function getDesprg()
  {
    return Herramientas::getX('CODPRG','Fordefprg','Desprg',self::getCodprg());
  }

  public function getDesunimed()
  {
    return Herramientas::getX('CODUNIMED','Fordefunimed','Desunimed',self::getUnimedres());
  }

  public function getDesobjnva()
  {
  	return Herramientas::getX('CODOBJNVAETA','Fordefobjestnvaeta','Desobjnvaeta',self::getCodobjnvaeta());
  }
}
