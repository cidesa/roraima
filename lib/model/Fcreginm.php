<?php

/**
 * Subclass for representing a row from the 'fcreginm' table.
 *
 *
 *
 * @package lib.model
 */
class Fcreginm extends BaseFcreginm
{
    protected $nacconcon="";
    protected $tipconcon="";
    protected $nacconrep="";
    protected $tipconrep="";
    /*Dueño anterior*/
    protected $fcconreprifcon="";
    protected $fcconrepdircon="";
    protected $fcconrepnomcon="";
    /* otros */
    protected $mascara= "";
    protected $grid= array();
    protected $codest="";
    protected $desestinm="";
    protected $anoava="";
    protected $codzon="";
    protected $deszon="";
    protected $total_avaluo="";

  public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->desestinm=Herramientas::getX_vacio('nroinm','fcdetinm','desestinm',self::getNroinm());
      $this->anoava=Herramientas::getX_vacio('nroinm','fcdetinm','anoava',self::getNroinm());
      $this->codzon=Herramientas::getX_vacio('nroinm','fcdetinm','anoava',self::getNroinm());
      $this->deszon=Herramientas::getX_vacio('nroinm','fcdetinm','deszon',self::getNroinm());
      $c = new Criteria();
      $c->add(FctrainmPeer::NROINM,self::getNroinm());
      $reg = FctrainmPeer::doSelectOne($c);
      if ($reg)
      {
       $c = new Criteria();
       $c->add(FconrepPeer::RIFCON,$reg->getRifcon());
       $regi = FconrepPeer::doSelectOne($c);
       if ($regi)
       {
         $this->fcconreprifcon=$regi->getRifcon();
         $this->fcconrepnomcon=$regi->getNomcon();
         $this->fcconrepdircon=$regi->getDircon();
       }
      }
      else
      {
         $this->fcconreprifcon="";
         $this->fcconrepnomcon="";
         $this->fcconrepdircon="";
      }
   }

    public function getCatcon()
    {
      return self::getCodcatinm();
    }

    public function getNomcatrasto()
    {
  	  return self::getNomcon();
    }

	public function getNacconcon()
	{
		return Herramientas::getX('rifcon','Fcconrep','naccon',self::getRifcon());
	}

	public function getTipconcon()
	{
		return Herramientas::getX('rifcon','Fcconrep','tipcon',self::getRifcon());
	}

	public function getNacconrep()
	{
		return Herramientas::getX('rifrep','Fcconrep','naccon',self::getRifrep());
	}

	public function getTipconrep()
	{
		return Herramientas::getX('rifrep','Fcconrep','tipcon',self::getRifrep());
	}


	public function getDesubicat()
	{
		return Herramientas::getX('codcatinm','fcreginm','nomcon',self::getCodcatinm());
	}

	public function getNomcatfis()
	{
		return Herramientas::getX('codcatfis','Fccatfis','nomcatfis',self::getCodcatfis());
	}

	public function getNomcarinm()
	{
		return Herramientas::getX('Codcarinm','fccarinm','nomcarinm',self::getCodcarinm());
	}

	public function getDeszon()
	{
		return Herramientas::getX('Codzon','fcvalinm','deszon',Herramientas::getX_vacio('Nroinm','fcdetinm','codzon',self::getNroinm()));
	}


    public function getCodusoinm()
    {
       return self::getCoduso();
    }

	public function getDescripcionuso()
	{
		return Herramientas::getX('codusoinm','Fcusoinm','nomusoinm',self::getCoduso());
	}

	public function getDescripcioncodsit()
	{
		return Herramientas::getX('codsitinm','fcsitjurinm','nomsitinm',self::getCodsitinm());
	}

}


