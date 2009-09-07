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
}


