<?php

/**
 * Subclass for representing a row from the 'caartdph' table.
 *
 *
 *
 * @package lib.model
 */
class Caartdph extends BaseCaartdph
{
	protected $cannodes=0.0;

	public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);

		$sql = "select cantot as cantot from faartfac where codart = '" . self::getCodart() . "' and reffac in (select reqart from cadphart where tipref = 'F' and dphart = '" . self::getDphart() . "' and stadph = 'A')";
		if (Herramientas :: BuscarDatos($sql, & $resul)) {
			$canfac = $resul[0]["cantot"];
		} else {
			$canfac = 0;
		}

      $this->cannodes=$canfac - self::getCandph() ;

   }

	public function getDesart()
	{
		return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
	}

	public function getUnimed()
	{
		return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
	}

	public function getCospro()
	{
		return Herramientas::getX('CODART','Caregart','Cospro',self::getCodart());
	}

	public function getDesfal()
	{
		return Herramientas::getX('CODFAL','Camotfal','Desfal',self::getCodfal());
	}

    public function getNomalm()
    {
	  return Herramientas::getX('CODALM','Cadefalm','Nomalm',$this->getCodalm());
    }

    public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',$this->getCodubi());
	}

    public function getMontotdes()
	{
		return self::getMontot();
	}

}
