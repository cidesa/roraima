<?php

/**
 * Subclass for representing a row from the 'caentalm'.
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
class Caentalm extends BaseCaentalm
{
    public function getMonrcp($val=false)
	{
		return parent::getMonrcp(true);

	}
	public function getNomalm()
	{
		return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
	}
	public function getNompro()
	{
		return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
	}
	public function getNomtip()
	{
		return Herramientas::getX('CODTIPENT','Catipent','Destipent',self::getTipmov());
	}

	public function getRifpro()
	{
	  return Herramientas::getX('codpro','caprovee','rifpro',self::getCodpro());
	}

	public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
	}

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

}
