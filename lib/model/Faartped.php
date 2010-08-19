<?php

/**
 * Subclass for representing a row from the 'faartped'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Faartped.php 33699 2009-10-01 22:15:36Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faartped extends BaseFaartped
{
	protected $obj = array();
    protected $desart="";
//	protected $canord="0,00";
	protected $canent="0,00";
	protected $canentregar="0,00";
	///protected $canaju="0,00";
	protected $canajustada="0,00";
	protected $candes="0,00";
	protected $candesp="0,00";
	protected $cantot="0,00";
	protected $candev="0,00";
	protected $preart="0,00";
	protected $totart="0,00";
	protected $montot="0,00";
	protected $precioe="0,00";
	protected $porrgo="0,00";
	protected $mondes="0,00";
        protected $monaju="0,00";
        protected $canlotreal="0,00";
        protected $canpuedaju="0,00";
        protected $canrealped="0,00";
        protected $canrealdes="0,00";
        protected $candistrib="0,00";
        protected $tipo="";
        protected $preaju="0,00";
        protected $recaju="0,00";
        protected $fecven="";
        protected $exist="0,00";

	public $codfal = '';
	public $costo=0.0;
	public $cannodes=0.0;
	public $cannodesaux=0.0;
    public $montotdes=0.0;

	protected $codalm="";
	protected $codubi="";
	protected $nomubi="";
	protected $nomalm="";
	protected $numlot="";

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);

	   //Se suma la cantidad entregada por notas de entrega para el pedido
	   $sql = "select sum(canent) as canent, sum(totart/canent) as montotent, sum(canent * preart) as costoent from faartnot where codart = '" . self::getCodart() . "' and nronot in (select nronot from fanotent where tipref='P' and codref = '" . self::getNroped() . "' and status = 'A')";
		if (Herramientas :: BuscarDatos($sql, & $resul)) {
			$canent = $resul[0]["canent"];
			$montotent = $resul[0]["montotent"];
			$costoent = $resul[0]["costoent"];
		} else {
			$canent = 0;
			$montotent = 0;
			$costoent = 0;
		}

		$sql = "select sum(candph) as candph, sum(montot) as montotdph, sum(montot/candph) as costodph from caartdph where codart = '" . self::getCodart() . "' and dphart in (select dphart from cadphart where tipref = 'P' and reqart = '" . self::getNroped() . "' and stadph = 'A')";
		if (Herramientas :: BuscarDatos($sql, & $resul)) {
			$candes = $resul[0]["candph"];
			$montotdes = $resul[0]["montotdph"];
			$costodes = $resul[0]["costodph"];
		} else {
			$candes = 0;
			$montotent = 0;
			$costodes = 0;
		}

      //$this->candes= 0.0;
      $this->cannodes=self::getCanord() - ($candes + $canent);
      $this->cannodesaux=self::getCanord() - ($candes + $canent);
      $valor=self::getPreart() * self::getCanord();
      $this->montot=number_format($valor, 2, ',', '.');
      $this->preaju=number_format(self::getPreart(), 2, ',', '.');
      //$this->costo=$costodes + $costoent;
      if (self::getPreart()!=0)
      {
        $this->precioe=number_format(self::getPreart(), 2, ',', '.');
      }

      if (self::getMondesc()!=0)
      {
        $this->mondes=number_format(self::getMondesc(), 2, ',', '.');
      }

	    $porcrgo=0;
	    $c= new Criteria();
	    $c->add(FarecargPeer::TIPRGO,'P');
	    $this->sql = "codrgo in (select codrgo from farecart where codart = '".self::getCodart()."')";
		$c->add(FarecargPeer::CODRGO,$this->sql,Criteria :: CUSTOM);
	    $reg=FarecargPeer::doSelect($c);
		if ($reg){
		 foreach ($reg as $sum)
		 {
		   $porcrgo += $sum->getMonrgo();
		 }
		}
	    $this->porrgo=number_format($porcrgo,2,',','.');

   }

  public function getPrecio()
  {
   return self::getPreart();
  }

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function getCansol()
  {
  	$val=self::getCanord();
    return $val;
  }
  public function getCodalm()
    {
	  return Herramientas::getX('CODART','Caartalm','Codalm',$this->getCodart());
    }

    public function getCodubi()
    {
          return Herramientas::getX('CODALM','Caalmubi','Codubi',$this->getCodalm());
}

    public function getNomalm()
    {
	  return Herramientas::getX('CODALM','Cadefalm','Nomalm',$this->getCodalm());
    }

    public function getNomubi()
    {
            return Herramientas::getX('CODUBI','Cadefubi','Nomubi',$this->getCodubi());
    }

  public function getTipo()
  {
   return Herramientas::getX('CODART','Caregart','Tipo',self::getCodart());
  }

}
