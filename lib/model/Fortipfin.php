<?php

/**
 * Subclass for representing a row from the 'fortipfin'.
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
class Fortipfin extends BaseFortipfin
{
	 private $monfin = '';
	 protected $montofor;
	 protected $monasi  = 0;
	 protected $monasi2 = 0;
	 protected $codpre  = '';
	 protected $tiedatrel="";

    public function AfterHydrate()
    {
    }

     public function getDestipfin()
	  {
	  	if (self::getTipfin()=='O')
	  	       return 'Ordinario';
	  	else if (self::getTipfin()=='E')
	  	       return 'Extraordinario';
	    else return 'Indefinido';
	  }

	public static function getMonfin22()
	{
      return Herramientas::getXx('Fordisfuefinpryaccmet',array('Codpro','Codaccesp','Codpre'),array('2-01','2-01-08','2-01-08-15-403-09-02-00'),'monfin');
	}

	public function getMonfin11()
	{
        //return $this->monfin;
        return Herramientas::getXx('Fordisfuefinpryaccmet',array('Codpro','Codaccesp','Codpre'),array(self::getCodfin(),self::getCodaccesp(),self::getCodpre()),'monfin');
//return Herramientas::getXx('Fordisfuefinpryaccmet',array('Codpro','Codaccesp','Codpre'),array(self::getCodfin(),$codaccesp,$codpre),'monfin');
		//return Herramientas::getXx('Fordisfuefinpryaccmet',array('Codpro','Codaccesp','Codpre'),array('2-01','2-01-08','2-01-08-15-403-09-02-00'),'monfin');
	}

	public function setMonfin55($val)
	{
		$this->monfin= $val;
	}

	public function getMontofor()
	{
	    $valor=0;
		$sql="SELECT
			    SUM(fordisfuefinpryaccmet.MONFIN) as MONFIN
			  FROM
			    fordisfuefinpryaccmet WHERE fordisfuefinpryaccmet.ACTFUE='S' AND
			    fordisfuefinpryaccmet.CODPARING = '".self::getCodfin()."'";

	    if (Herramientas::BuscarDatos($sql,&$result))
	    {
	         $valor=$result[0]['monfin'];
		}
		return $valor;
	}

    public function getMonasi()
	{
	  return H::FormatoMonto(Herramientas::getXx('cpdisfuefin',array('codpre','fuefin'),array($this->getCodpre(),self::getCodfin()),'monasi'));
	}

    public function getMonasi2()
	{
	  return $this->monasi;
	}

	public function getNomext2()
	{
	  return self::getNomext();
	}

	public function getTipfin()
	{
	  return self::getCodfin();
	}

  public function getTiedatrel()
  {
  	  $valor="N";
  	  $d= new Criteria();
  	  $d->add(OpordpagPeer::TIPFIN,self::getCodfin());
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
}
