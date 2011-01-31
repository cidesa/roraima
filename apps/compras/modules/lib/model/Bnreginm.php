<?php

/**
 * Subclass for representing a row from the 'bnreginm'.
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
class Bnreginm extends BaseBnreginm
{
	protected $codcla='';
	protected $descla='';
	protected $etifeccal="";
        protected $savenumord="";
	
	public function hydrate(ResultSet $rs, $startcol = 1)
    {
      parent::hydrate($rs, $startcol);
      $this->codcla=self::getClafun();
    }
	
	public function getDescla()
	{
		 return Herramientas::getX('codcla','bnclafun','descla',trim(self::getClafun()));
	}

	public function getNomprovee()
	{
		 return Herramientas::getX('codpro','caprovee','nompro',trim(self::getCodpro()));
	}

	public function getDesubi()
	{
   	   return Herramientas::getX('codubi','bnubibie','desubi',trim(self::getCodubi()));
	}

	public function getDisposicion()
	{
   	   return Herramientas::getX('coddis','bndisbie','desdis',trim(self::getCoddis()));
	}

    public function getValactual()
	  {
	    $des = 0;
	    $des = $this->getValini()+ $this->getValadis();
	    return $des;
	  }

  public function getEtifeccal()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactinmd',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('etifeccal',$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']['etifeccal'];
}
         }
     return $dato;
  }

  public function setEtifeccal()
  {
  	return $this->etifeccal;
  }

    public function getSavenumord()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactinmd',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('savenumord',$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']['savenumord'];
	       }
         }
     return $dato;
  }

  public function setSavenumord()
  {
  	return $this->savenumord;
  }

    public function getMansolcor()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactinmd',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('mansolcor',$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']['mansolcor'];
	       }
         }
     return $dato;
  }

  public function setMansolcor()
  {
  	return $this->mansolcor;
  }

}
