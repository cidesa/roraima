<?php

/**
 * Subclass for representing a row from the 'tsdefrengas'.
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
class Tsdefrengas extends BaseTsdefrengas
{
  public function getNomext()
  {
	return Herramientas::getX('TIPCAU','Cpdoccau','Nomext',self::getPagrepcaj());
  }
  
  public function getDestip()
  {
	return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getMovreicaj());
  }
  
  public function getDescta()
  {
	return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtarepcaj());
  }
  
  public function getDescta2()
  {
	return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtacheant());
  }
}
