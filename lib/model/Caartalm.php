<?php

/**
 * Subclass for representing a row from the 'caartalm'.
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
class Caartalm extends BaseCaartalm
{
	//private $exiact = '';
	private $exiact2 = '';
	private $ubicacion = '';

	public function getNomalm()
	{
		return Herramientas::getX('CODALM', 'Cadefalm', 'Nomalm',self::getCodalm());

	}

	public function getNomubi()
	{
		return Herramientas::getX('CODUBI', 'Cadefubi', 'Nomubi', self::getCodubi());

	}

	public function getDesart()
	{
		return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
	}

    public function getUnimed()
	{
		return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
	}

    public function getUnimed2()
	{
		return Herramientas::getX('CODART','Caregart','Unialt',self::getCodart());
	}


	/*public function setExiact($val){

		$this->exiact = $val;
	}

	public function getExiact(){

		return $this->exiact;
	}*/

	public function setExiact2($val){

		$this->exiact2 = $val;
	}

	public function getExiact2(){

		return $this->exiact2;
	}

  public function setUbicacion($val)
  {
	$this->ubicacion = $val;
  }

  public function getUbicacion()
  {
     return $this->ubicacion;
  }

}
