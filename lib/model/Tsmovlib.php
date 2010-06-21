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
  protected $codcon="";
  protected $savecedrif="";
  protected $ctaeje="";
  protected $savemovcero="";


  public function afterHydrate()
  {
    $c=new Criteria();
    $contaba = ContabaPeer::doSelectOne($c);
    if($contaba)
    {
    	$this->ctaeje=$contaba->getCodctapageje();
    }   
  }

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

  public function getSavecedrif()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovseglib',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('savecedrif',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['savecedrif'];
	       }
         }
     return $dato;
  }

  public function setSavecedrif()
  {
  	return $this->savecedrif;
  }

    public function getNomben()
    {
       return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCedrif());
    }

  public function getSavemovcero()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovseglib',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('savemovcero',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['savemovcero'];
	       }
         }
     return $dato;
  }

  public function setSavemovcero()
  {
  	return $this->savemovcero;
  }

}
