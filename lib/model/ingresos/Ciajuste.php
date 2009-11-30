<?php

/**
 * Subclass for representing a row from the 'ciajuste'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Ciajuste.php 32416 2009-09-02 02:21:12Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
