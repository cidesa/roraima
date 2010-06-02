<?php

/**
 * Subclass for representing a row from the 'casalalm'.
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
class Casalalm extends BaseCasalalm
{
  private $tipo = '';

  public function getMonsal($val=false)
  {
    return parent::getMonsal(true);
  }

  public function getNomalm()
  {
	return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
  }

  public function getNompro()
  {
	return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }

  public function getDestipsal()
  {
	return Herramientas::getX('CODTIPSAL','Catipsal','Destipsal',self::getTipmov());
  }

  public function setTipo($val)
  {
	$this->tipo = $val;
  }

  public function getTipo()
  {
	return $this->tipo;
  }

  public function setRifpro($val)
  {
	$this->rifpro = $val;
  }

  public function getRifpro()
  {
	return Herramientas::getX('Codpro','Caprovee','Rifpro',self::getCodpro());
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
