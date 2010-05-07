<?php

/**
 * Subclass for representing a row from the 'opdefemp'.
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
class Opdefemp extends BaseOpdefemp
{
	protected $aprmonche="";

	public function getNomemp()
	{
		return Herramientas::getX('codemp','empresa','nomemp',self::getCodemp());
	}
	public function getDiremp()
	{
		return Herramientas::getX('codemp','empresa','diremp',self::getCodemp());
	}
	public function getNomctapag()
	{
		return Herramientas::getX('codcta','contabb','descta',self::getCtapag());
	}
	public function getNomctades()
	{
		return Herramientas::getX('codcta','contabb','descta',self::getCtades());
	}
	public function getNomtipnom()
	{
		return Herramientas::getX('tipcau','cpdoccau','nomext',self::getOrdnom());
	}
	public function getNomttipobr()
	{
		return Herramientas::getX('tipcau','cpdoccau','nomext',self::getOrdobr());
	}
	public function getNomtipeje()
	{
		return Herramientas::getX('codtip','tstipmov','destip',self::getTipeje());
	}
	public function getNomtipliq()
	{
		return Herramientas::getX('tipcau','cpdoccau','nomext',self::getOrdliq());
	}

	public function getNomtipfid()
	{
		return Herramientas::getX('tipcau','cpdoccau','nomext',self::getOrdfid());
	}

	public function getNomtipobr()
	{
		return Herramientas::getX('tipcau','cpdoccau','nomext',self::getOrdval());
	}

	public function getNomcuecajchi()
	{
		return Herramientas::getX('numcue','Tsdefban','nomcue',self::getCuecajchi());
	}

    public function getNomtipcajchi()
	{
		return Herramientas::getX('codtip','Tstipmov','destip',self::getTipcajchi());
	}

    public function getNomtiprencajchi()
	{
		return Herramientas::getX('tipcau','Cpdoccau','nomext',self::getTiprencajchi());
	}

	 public function getNomben()
	{
		return Herramientas::getX('cedrif','Opbenefi','nomben',self::getCedrifcajchi());
	}

    public function getNomcat()
	{
		return Herramientas::getX('codcat','Npcatpre','nomcat',self::getCodcatcajchi());
	}

	public function getNomtipret()
	{
		return Herramientas::getX('tipcau','cpdoccau','nomext',self::getOrdret());
	}

	public function getNomtiptna()
	{
		return Herramientas::getX('tipcau','cpdoccau','nomext',self::getOrdtna());
	}

	public function getNomtiptba()
	{
		return Herramientas::getX('tipcau','cpdoccau','nomext',self::getOrdtba());
	}

  public function getAprmonche()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('aprmonche',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['aprmonche'];
	       }
         }
     return $dato;
  }

  public function setAprmonche()
  {
  	return $this->aprmonche;
  }
}
