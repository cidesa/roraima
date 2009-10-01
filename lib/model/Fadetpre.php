<?php

/**
 * Subclass for representing a row from the 'fadetpre'.
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
class Fadetpre extends BaseFadetpre
{
	protected $obj = array();
    protected $desart="";
	protected $canord="0,00";
	protected $candes="0,00";
	protected $canaju="0,00";
	protected $cantot="0,00";
	protected $preart="0,00";
	protected $precioe="0,00";
	protected $totart2="0,00";


  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

   public function afterHydrate()
  {
    if (self::getPrecio()!=0)
    {
      $this->precioe=number_format(self::getPrecio(), 2, ',', '.');
    }

    $this->canord=number_format(self::getCansol(), 2, ',', '.');
    $this->preart=number_format(self::getPrecio(), 2, ',', '.');
    $this->cantot=number_format(self::getCansol(), 2, ',', '.');
    $val=self::getPrecio() * self::getCansol();
    $this->totart2=number_format($val, 2, ',', '.');

  }


}
