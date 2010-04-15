<?php

/**
 * Subclass for representing a row from the 'octipret'.
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
class Octipret extends BaseOctipret
{
	private $base = '';
  private $montorete = '';

  public function getDescta()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcon());
  }

  public function getConsustra()
  {
  if (self::getPorret()!=0)
   return 'N';
  else
   return 'S';
  }



  public function setBase($val)
  {
  $this->base = $val;
  }

  public function getBase()
  {
  return $this->base;
  }

  public function setMontorete($val)
  {
  $this->montorete = $val;
  }

  public function getMontorete()
  {
  return $this->montorete;
  }


  public function getCodret()
  {
  return '';
  }
}
