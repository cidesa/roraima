<?php

/**
 * Subclass for representing a row from the 'ciajuste' table.
 *
 *
 *
 * @package lib.model
 */
class Ciajuste extends BaseCiajuste
{
  protected $grid= array();
  protected $gridmov= array();
  protected $refing="";
  protected $desing="";
  protected $refmov="";

   public function getDesing()
    {
      return Herramientas::getX('REFING','Cireging','Desing',self::getRefere());
    }

  public function getRefing()
    {
      return Herramientas::getX('REFAJU','Ciajuste','Refere',self::getRefaju());
    }

  public function getRefiere(){
    if (self::getRefere()!='NULO'){return 'S';}else{return 'N';}
  }

    public function getLongpre()
      {
      return strlen(Herramientas::getX_vacio('CODEMP','Cidefniv','Forpre','001'));
      }

}
