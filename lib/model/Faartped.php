<?php

/**
 * Subclass for representing a row from the 'faartped' table.
 *
 *
 *
 * @package lib.model
 */
class Faartped extends BaseFaartped
{
	protected $obj = array();
    protected $desart="";
	protected $canord="0,00";
	protected $canent="0,00";
	protected $canentregar="0,00";
	protected $canaju="0,00";
	protected $canajustada="0,00";
	protected $candes="0,00";
	protected $candesp="0,00";
	protected $cantot="0,00";
	protected $candev="0,00";
	protected $preart="0,00";
	protected $totart="0,00";
	protected $montot="0,00";
	protected $precioe="0,00";

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
      //$this->costo=$costodes + $costoent;
      if (self::getPreart()!=0)
      {
        $this->precioe=number_format(self::getPreart(), 2, ',', '.');
      }

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

}
