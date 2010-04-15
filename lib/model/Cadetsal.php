<?php

/**
 * Subclass for representing a row from the 'cadetsal'.
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
class Cadetsal extends BaseCadetsal
{
  public function getDesart()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }
  public function getNomalm()
  {
	return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
  }
  public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
	}

 }
