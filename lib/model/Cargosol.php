<?php

/**
 * Subclass for representing a row from the 'cargosol'.
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
class Cargosol extends BaseCargosol
{
    private $monrgo2 = 0.00;
	private $recargototal = 0.00;
	private $tiprgodos='';
	private $por_monrgo=0.00;

  public function getNomrgo()
  {
    return Herramientas::getX('CODRGO','Carecarg','Nomrgo',self::getCodrgo());
  }

  public function getCodpar()
  {
    return Herramientas::getX('CODRGO','Carecarg','CODPRE',self::getCodrgo());
  }

  public function getMonrgoc()
  {
    return Herramientas::getX('CODRGO','Carecarg','monrgo',self::getCodrgo());

  }

  public function getTiprgo()
  {
    return Herramientas::getX('CODRGO','Carecarg','tiprgo',self::getCodrgo());
  }


 /* public function getMonrgo($val=false)
    {
    return parent::getMonrgo(true);
    }
*/
    public function getMonrgo2($va=false)
    {
      if (self::getId()!="")
      {
        $var = parent::getMonrgo($va);
      }
      else
      {
      $var = $this->monrgo2;
      }
     return $var;
    }



    public function setMonrgo2($val)
    {
       $this->monrgo2 = $val;
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
		$var = self::getMonrgo();
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


}
