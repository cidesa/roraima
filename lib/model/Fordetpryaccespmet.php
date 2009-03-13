<?php

/**
 * Subclass for representing a row from the 'fordetpryaccespmet' table.
 *
 *
 *
 * @package lib.model
 */
class Fordetpryaccespmet extends BaseFordetpryaccespmet
{
	private $codparing= '';
	private $datos= '';
	private $jesus= '';
	private $arreglo2= '';
	protected $cajaoculta2='';


	public function getDescat()
	{
	  return Herramientas::getX('codcat','Fordefcatpre','descat',self::getCodunieje());
	}

	public function getNomparegr()
	{
	  return Herramientas::getX('codparegr','Fordefparegr','nomparegr',self::getCodpar());
	}


	public function getNomext()
	{
		$valor = self::getCodparing();
		if ($valor=='MIXTO')
		  {
            return "DIVERSOS";
		  }else
		  {
		  	return Herramientas::getX('codfin','Fortipfin','nomext',self::getCodparing());
		  }
	}


	public function getCodparing()
	{
			$c= new Criteria();
			$c->add(FordisfuefinpryaccmetPeer::CODPRO,self::getCodpro());
			$c->add(FordisfuefinpryaccmetPeer::CODACCESP,self::getCodaccesp());
			$c->add(FordisfuefinpryaccmetPeer::CODMET,self::getCodmet());
			$c->add(FordisfuefinpryaccmetPeer::CODPRE,self::getCodpre());
			$datos = FordisfuefinpryaccmetPeer::doSelect($c);

			if (count($datos) > 1)
			  {
					return "MIXTO";
			  }elseif (count($datos) == 1)
			  {
			  		return $datos[0]->getCodparing();
			  }else{
			  		return '';
			  }
	}

    public function setCodparing($val)
    {
	   $this->codparing= $val;
	}

    public function getCodparing_()
    {
	   return $this->codparing;
	}

	public function getGrid()
	{
		$c = new Criteria();
		$c->add(FordismonprepryaccmetueaPeer::CODPRO,self::getCodpro());
		$c->add(FordismonprepryaccmetueaPeer::CODACCESP,self::getCodaccesp());
		$c->add(FordismonprepryaccmetueaPeer::CODMET,self::getCodmet());
        $c->add(FordismonprepryaccmetueaPeer::CODPRO,self::getCodpro());
        $c->add(FordismonprepryaccmetueaPeer::CODPAR,self::getCodpar());
        $c->addAscendingOrderByColumn(FordismonprepryaccmetueaPeer::PERPRE);
        $per = FordismonprepryaccmetueaPeer::doSelect($c);
        //$arreglo = array();
	    $arreglo='';
        foreach ($per as $arr){
        	$arreglo .= $arr->getMonper().'_';
        }

		return $arreglo;

	  //return Herramientas::getX('codpro','caprovee','rifpro',self::getCodpro());
	}

   public function setGrid($val)
    {
	   $this->datos = $val;
	}


   public function getGrid_()
    {
	   return $this->datos;
	}

    public function getGrid2()
    {
    	/*
    	 * 		"to_char(fortipfin.MONTODISAUX,'0000000000000') as MONTODISAUX, " .
		 * "to_char(COALESCE(fordisfuefinpryaccmet.MONFIN,0),'0000000000000') AS MONFIN " .
    	 *
    	 * "fortipfin.MONTOING, " .
		"fortipfin.MONTODIS, " .
		"to_char(fortipfin.MONTODISAUX,'0000000000000') as MONTODISAUX, " .
		"to_char(COALESCE(fordisfuefinpryaccmet.MONFIN,0),'0000000000000') AS MONFIN " .
    	 *
    	 *  */

		$sql="SELECT " .
		"fortipfin.CODFIN, " .
		"fortipfin.NOMEXT, " .
		"fortipfin.NOMABR, " .
		"fortipfin.APOFIS, " .
		"fortipfin.TIPFIN, " .
		"COALESCE(fortipfin.MONTOING,0), " .
		"COALESCE(fortipfin.MONTODIS,0), " .
		"to_char(fortipfin.MONTODISAUX,'0000000000000') as MONTODISAUX, " .
		"COALESCE(SUM(fordisfuefinpryaccmet.MONFIN),0) AS MONFIN " .
	"FROM " .
		"fortipfin LEFT JOIN fordisfuefinpryaccmet ON " .
		"(fortipfin.CODFIN=fordisfuefinpryaccmet.CODPARING AND fordisfuefinpryaccmet.CODPRO='".self::getCodpro()."' AND fordisfuefinpryaccmet.CODACCESP='".self::getCodaccesp()."' AND fordisfuefinpryaccmet.CODMET='".self::getCodmet()."' AND fordisfuefinpryaccmet.CODPRE='".self::getCodpre()."') " .
	"GROUP BY " .
		"fortipfin.CODFIN,fortipfin.NOMEXT," .
		"fortipfin.NOMABR," .
		"fortipfin.APOFIS," .
		"fortipfin.TIPFIN," .
		"fortipfin.MONTOING," .
		"fortipfin.MONTODIS," .
		"fortipfin.MONTODISAUX";

        $resp = Herramientas::BuscarDatos($sql,&$per);

	    $arreglo='';

        foreach ($per as $arr){
        	$arreglo .= $arr["monfin"].'_';
        	$this->arreglo2 .= $arr["codfin"].'_';
        }
           return $arreglo;
    }

   public function setGrid2($val)
    {
	   $this->jesus = $val;
	}

   public function getGrid2_()
    {
	   return $this->jesus;
	}

	public function getGrid244_bueno()
	{
		$c = new Criteria();
		/*$c->add(FordisfuefinpryaccmetPeer::CODPRO,self::getCodpro());
		$c->add(FordisfuefinpryaccmetPeer::CODACCESP,self::getCodaccesp());
		$c->add(FordisfuefinpryaccmetPeer::CODMET,self::getCodmet());
        $c->add(FordisfuefinpryaccmetPeer::CODPRE,self::getCodpre());
        //$c->addAscendingOrderByColumn(FordisfuefinpryaccmetPeer::PERPRE);
        $per = FordisfuefinpryaccmetPeer::doSelect($c);*/

        $c->addJoin(FortipfinPeer::CODFIN,FordisfuefinpryaccmetPeer::CODPARING.' AND '.FordisfuefinpryaccmetPeer::CODPRO.'= '.chr(39).self::getCodpro().chr(39).' AND '.FordisfuefinpryaccmetPeer::CODACCESP.'='.chr(39).self::getCodaccesp().chr(39).' AND '.FordisfuefinpryaccmetPeer::CODMET.'='.chr(39).self::getCodmet().chr(39).' AND '.FordisfuefinpryaccmetPeer::CODPRE.'='.chr(39).self::getCodpre().chr(39), Criteria::LEFT_JOIN);

        //$c->addAsColumn('MONFIN', 'COUNT('.FordisfuefinpryaccmetPeer::MONFIN.')');
        $c->addAsColumn('MONFIN', 'COALESCE('.FordisfuefinpryaccmetPeer::MONFIN.',0)');
        //$c->addAsColumn('MONFIN', 'FordisfuefinpryaccmetPeer::MONFIN');
        $c->addGroupByColumn(FortipfinPeer::CODFIN);
		$c->addGroupByColumn(FortipfinPeer::NOMEXT);

        $c->addGroupByColumn(FortipfinPeer::NOMABR);
        $c->addGroupByColumn(FortipfinPeer::APOFIS);
        $c->addGroupByColumn(FortipfinPeer::TIPFIN);
        $c->addGroupByColumn(FortipfinPeer::MONTOING);
        $c->addGroupByColumn(FortipfinPeer::MONTODIS);
        $c->addGroupByColumn(FortipfinPeer::MONTODISAUX);
        $c->addGroupByColumn(FortipfinPeer::ID);

		$c->addGroupByColumn(FortipfinPeer::MONTODISAUX);
		$c->addGroupByColumn(FordisfuefinpryaccmetPeer::MONFIN);
		$per = FortipfinPeer::doSelect($c);

        //$arreglo = array();
	    $arreglo='';
        foreach ($per as $arr){
        	$arreglo .= $arr->getMonfin().'_';
        }

		return $arreglo;
		//return '55555555555';

	  //return Herramientas::getX('codpro','caprovee','rifpro',self::getCodpro());
	}


	public function getDestip()
	{
	  return Herramientas::getX('codtip','Fortiptit','destip',self::getCodtip());
	}

	public function getCajaoculta()
	{
	  return self::getId();
	}

}
