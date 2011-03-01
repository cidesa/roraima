<?php

/**
 * Subclase para representar una fila de la tabla 'cacotdisrgo'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cacotdisrgo extends BaseCacotdisrgo
{
    	private $recargototal = 0.00;
	private $codigo_recargo = 0.00;
	private $tiprgodos='';
	private $por_monrgo=0.00;
        
	public function getNomrgo()
	{
		return Herramientas::getX('CodRgo','CaRecarg','NOMRGO',self::getCodrgo());
	}

		public function getCodpar()
	{
		return Herramientas::getX('CodRgo','CaRecarg','CODPRE',self::getCodrgo());
	}



	public function getRecargototal()
	{
		$var = number_format(self::getMonrgo(),2,',','.');
		return $var;
	}

	public function getRecargototal_()
	{
		return $this->recargototal;
	}


    public function setRecargototal($val)
    {
  		$this->recargototal = $val;
    }




	public function getTiprgodos()
	{
		$var = Herramientas::getX_vacio('CodRgo','CaRecarg','monrgo',self::getCodrgo());
		return $var;
	}

	public function getTiprgodos_()
	{
		return $this->tiprgo;
	}


    public function setTiprgodos($val)
    {
  		$this->tiprgo = $val;
    }



	public function getPor_monrgo()
	{
		$var = 0;
		return $var;
	}

	public function getPor_monrgo_()
	{
		return $this->por_monrgo;
	}


    public function setPor_monrgo($val)
    {
  		$this->por_monrgo = $val;
    }

  public function getMonrgoc()
  {
    return Herramientas::getX('CODRGO','Carecarg','monrgo',self::getCodrgo());

  }

  public function getTiprgo()
  {
    return Herramientas::getX('CODRGO','Carecarg','tiprgo',self::getCodrgo());
  }
}
