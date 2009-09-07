<?php

/**
 * Subclass for representing a row from the 'tsmovlib'.
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
class Tsmovlib extends BaseTsmovlib
{
  protected $ctacon = '';
  protected $debcre = '';
  protected $check = '';

	public function getNomcue()
    {
		return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcue());
    }

	public function getDestip()
    {
		return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipmov());
    }

	public function getIdrefer()
	{
		return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
	}

	public function getDescom()
	{
		return Herramientas::getX_vacio('numcom','contabc','descom',self::getNumcom());
	}

	public function __toString()
    {
		return $this->getReflib();
    }


}
