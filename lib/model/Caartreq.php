<?php

/**
 * Subclass for representing a row from the 'caartreq' table.
 *
 *
 *
 * @package lib.model
 */
class Caartreq extends BaseCaartreq
{
   public $codfal = '';
   public $costo=0.0;
   public $candes=0.0;
   public $cannodes=0.0;
   public $montotdes=0.0;
   protected $codalm="";
   protected $codubi="";

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->candes=self::getCanreq() - self::getCanrec();
      $this->cannodes=0.0;
      $this->montotdes=$this->candes * self::getCospro();
       if (self::getCanreq()!=0 and self::getMontot()!=0 )
       {
  	  	$this->costo= (self::getMontot() /  self::getCanreq());
	    }
   	  else
   	   {
   	 	$this->costo=0.0;
	   }
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
		return Herramientas::getX('CODFAL','Camotfal','Desfal',self::getRelart());
	}

    public function getNomcat()
	{
		return Herramientas::getX('codcat','npcatpre','nomcat',self::getCodcat());
	}

	public function setCodfal($val){

		$this->codfal = $val;
	}

	public function getCodfal(){

		return $this->codfal;
	}

   public function getCandesreal()
	{
	    $candes=self::getCanreq() - self::getCanrec();
	    return $candes;
	}


  public function getNomalm()
  {
	return Herramientas::getX('CODALM','Cadefalm','Nomalm',$this->getCodalm());
  }

  public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',$this->getCodubi());
	}

}
