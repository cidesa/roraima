<?php

/**
 * Subclass for representing a row from the 'tssalcaj' table.
 *
 *
 *
 * @package lib.model
 */
class Tssalcaj extends BaseTssalcaj
{
  protected $obj=array();
  protected $nomben="";
  protected $ctapag="";
  protected $agregabenefi="N";
  protected $numcue="";
  protected $tipdoc="";

  public function getNomben()
  {
   return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }

  public function getCtapag()
  {
   return Herramientas::getX('CEDRIF','Opbenefi','Codcta',self::getCedrif());
  }
}
