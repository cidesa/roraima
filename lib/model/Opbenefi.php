<?php

/**
 * Subclass for representing a row from the 'opbenefi'.
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
class Opbenefi extends BaseOpbenefi
{
	protected $tiedatrel="";
	protected $oculsave="";

   public function __toString()
  {
    return $this->cedrif;
  }

	public function getNomcuentacont()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodcta()));
	}
	public function getNomcuentaord()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodord()));
	}
	public function getNomcuentapercon()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodpercon()));
	}
	public function getTipobene()
	{
		return Herramientas::getX('CodTipBen','OpTipBen','DesTipBen',trim(self::getCodtipben()));
	}
	public function getNomcuentacontsecun()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodctasec()));
	}
	public function getNomcuentaordsecun()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodordadi()));
	}
	public function getNomcuentaperconsecun()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodperconadi()));
	}
	public function getNomctacajchi()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodctacajchi()));
	}

  public function getTiedatrel()
  {
  	  $valor="N";
  	  $d= new Criteria();
  	  $d->add(OpordpagPeer::CEDRIF,self::getCedrif());
  	  $resul= OpordpagPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  } else $valor= 'N';
  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }

  public function getOculsave()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagbenfic',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('oculsave',$varemp['aplicacion']['tesoreria']['modulos']['pagbenfic']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagbenfic']['oculsave'];
	       }
         }
     return $dato;
  }

  public function setOculsave()
  {
  	return $this->oculsave;
  }
}
