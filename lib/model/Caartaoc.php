<?php

/**
 * Subclass for representing a row from the 'caartaoc'.
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
class Caartaoc extends BaseCaartaoc
{

  function getCosart()
  {
    if  (self::getCanaju()!=0)
      return self::getMonaju() / self::getCanaju();
   else
      return 0.00;

  }

  function getDesart()
  {

    return Herramientas::getX('codart','caregart','desart',self::getCodart());

  }

  function getUnimed()
  {

    return Herramientas::getX('codart','caregart','unimed',self::getCodart());

  }



}
