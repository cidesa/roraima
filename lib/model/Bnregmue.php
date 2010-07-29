<?php

/**
 * Subclass for representing a row from the 'bnregmue'.
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
class Bnregmue extends BaseBnregmue
{
	protected $savenumord="";
        protected $etifeccal="";

	public function getNomprovee()
	{
		return Herramientas::getX('codpro','caprovee','nompro',trim(self::getCodpro()));
	}

	public function getNomdispos()
	{
		return Herramientas::getX('coddis','Bndisbie','Desdis',trim(self::getCoddis()));
	}

	public function getNomubicac()
	{
		return Herramientas::getX('codubi','Bnubibie','Desubi',trim(self::getCodubi()));
	}

  public function getVidutiactual()
  {
    $des = 0;
    $des = $this->getViduti()+ $this->getAumviduti()- $this->getDimviduti() ;
    return $des;
  }

  public function getValactual()
  {
    $des = 0;
    $des = $this->getValini()+ $this->getValadi();
    return $des;
  }

  public function getNomrespat()
  {
  	 return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodrespat());
  }

  public function getNomresuso()
  {
  	 return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodresuso());
  }

	public function getDespro()
	{
	  return Herramientas::getX('CODPRO','Catippro','Despro',self::getTippro());
	}

  public function getSavenumord()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactmued',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('savenumord',$varemp['aplicacion']['bienes']['modulos']['bieregactmued']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactmued']['savenumord'];
}
         }
     return $dato;
  }

  public function setSavenumord()
  {
  	return $this->savenumord;
  }

  public function getEtifeccal()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactmued',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('etifeccal',$varemp['aplicacion']['bienes']['modulos']['bieregactmued']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactmued']['etifeccal'];
	       }
         }
     return $dato;
  }

  public function setEtifeccal()
  {
  	return $this->etifeccal;
  }

    public function getNomuse()
    {
            return Herramientas::getX('loguse','Usuarios','Nomuse',trim(self::getLogusu()));
}

    public function getDesubiadm()
    {
            return Herramientas::getX('codubi','Bnubica','Desubi',trim(self::getCodubiadm()));
    }

}


