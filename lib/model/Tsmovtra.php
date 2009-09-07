<?php

/**
 * Subclass for representing a row from the 'tsmovtra'.
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
class Tsmovtra extends BaseTsmovtra
{
	protected $ctacon_ori='';
	protected $ctacon_des='';
	protected $reftraanu='';
	protected $destraanu='';
	protected $numcomanu='';

	public function getNombancodesde()
	{
		return Herramientas::getX('numcue','tsdefban','nomcue',self::getCtaori());
	}

	public function getNombancohasta()
	{
		return Herramientas::getX('numcue','tsdefban','nomcue',self::getCtades());
	}

	public function getTipmovdesd()
	{
		$c = new Criteria();
		$c->add(TsmovlibPeer::NUMCUE,self::getCtades());
		$c->add(TsmovlibPeer::REFLIB,self::getReftra());
		$registro = TsmovlibPeer::doSelectOne($c);
		if($registro) return $registro->getTipmov();
		else return null;
	}

	public function getTipmovhast()
	{
		$c = new Criteria();
		$c->add(TsmovlibPeer::NUMCUE,self::getCtaori());
		$c->add(TsmovlibPeer::REFLIB,self::getReftra());
		$registro = TsmovlibPeer::doSelectOne($c);
		if($registro) return $registro->getTipmov();
		else return null;
	}

	public function getDestipmovdeb()
	{
		return Herramientas::getX('codtip','Tstipmov','DesTip',self::getTipmovdesd());
	}

	public function getDestipmovcre()
	{
		return Herramientas::getX('codtip','Tstipmov','DesTip',self::getTipmovhast());
	}

	public function getDesnumcom()
	{
		return self::getDestra();
	}

	public function getFectracon()
	{
		return self::getFectra();
	}

	public function getNommovim()
	{
		return Herramientas::getX('CodTip','TsTipMov','destip',self::getTipmov());
	}

	public function getIdrefer()
	{
		return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
	}


}
