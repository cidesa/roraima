<?php

/**
 * Subclass for representing a row from the 'caartreqser'.
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
class Caartreqser extends BaseCaartreqser
{
  public function getDesart()
  {
  	return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }
	 private $nomemp = '';
	 private $dphobs = '';

	public function getNomart()
	{
		return Herramientas::getX('CODART','Caregart','Desart',trim(self::getCodart()));
	}

	public function setNomemp($val){

		$this->nomemp = $val;
	}

	public function getNomemp(){

		return $this->nomemp;
	}

	public function setDphobs($val){

		$this->dphobs = $val;
	}

	public function getDphobs(){

		return $this->dphobs;
	}

   public function getNomcat()
   {
  	return Herramientas::getX('CODCAT','Npcatpre','Nomcat',self::getCodcat());
   }

   public function getFecrea($format = 'Y-m-d')
   {
  	if (parent::getFecrea()=='') return date('Y-m-d');//'1990-10-10';//Herramientas::getX('CODCAT','Npcatpre','Nomcat',self::getCodcat());
  	}




}
