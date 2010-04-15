<?php

/**
 * Subclass for representing a row from the 'fcsollic' table.
 *
 *
 *
 * @package lib.model
 */
class Fcsollic extends BaseFcsollic
{
    protected $nacconcon="";
    protected $nomcon="";
    protected $tipconcon="";
    protected $nomconrep="";
    protected $dirconrep="";
    protected $nacconrep="";
    protected $tipconrep="";
    protected $refmod="";
    protected $fecmod="";
    protected $motmod="";
    /*campos de cambios*/
    protected $idlic="";
    protected $fechlic="";
    protected $comnlic="";
    /*otros */
    protected $mascara= "";
    protected $lonubi = 0;
    protected $desubicat= "";
    protected $grid= array();
    /*negacion campos*/
    protected $numneg="";
    protected $funneg="";
    protected $tomon="";
    protected $numeron="";
    protected $resolu="";
    protected $folion="";
    protected $motneg="";
    protected $fecneg="";
    protected $licnegada='';
    protected $licmodificada='';
	protected $tipo_licencia="";
	/*Suspencion*/
    protected $numsus="";
    protected $fecsus="";
    protected $funsus="";
    protected $motsus="";
    protected $solsus="";
    protected $folsus="";
    protected $actsus="";
    protected $resolsus="";
    /*operaciones licencias*/
    protected $operacion="";

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->numneg=Herramientas::getX_vacio('numsol','fcsolneg','numneg',self::getNumsol());
      $this->funneg=Herramientas::getX_vacio('numsol','fcsolneg','funneg',self::getNumsol());
      $this->tomon=Herramientas::getX_vacio('numsol','fcsolneg','tomon',self::getNumsol());
      $this->numeron=Herramientas::getX_vacio('numsol','fcsolneg','numeron',self::getNumsol());
      $this->folion=Herramientas::getX_vacio('numsol','fcsolneg','folion',self::getNumsol());
      $this->motneg=Herramientas::getX_vacio('numsol','fcsolneg','motneg',self::getNumsol());
      $this->fecneg=Herramientas::getX_vacio('numsol','fcsolneg','fecneg',self::getNumsol());
      $this->resolu=Herramientas::getX_vacio('numsol','fcsolneg','resolu',self::getNumsol());
/*suspenciones*/
      $this->numsus=Herramientas::getX_vacio('numsol','fcsuscan','numsus',self::getNumsol());
      $this->fecsus=Herramientas::getX_vacio('numsol','fcsuscan','fecsus',self::getNumsol());
      $this->funsus=Herramientas::getX_vacio('numsol','fcsuscan','funsus',self::getNumsol());
      $this->motsus=Herramientas::getX_vacio('numsol','fcsuscan','motsus',self::getNumsol());
      $this->solsus=Herramientas::getX_vacio('numsol','fcsuscan','tomo',self::getNumsol());
      $this->folsus=Herramientas::getX_vacio('numsol','fcsuscan','folio',self::getNumsol());
      $this->actsus=Herramientas::getX_vacio('numsol','fcsuscan','numero',self::getNumsol());
      $this->resolsus=Herramientas::getX_vacio('numsol','fcsuscan','resolu',self::getNumsol());
   }


	public function getNomcatrasto()
	{
		return Herramientas::getX('codcatinm','fcreginm','nomcon',self::getCatcon());
	}

	public function getDescripcionruta()
	{
		return Herramientas::getX('codrut','fcrutas','desrut',self::getCodrut());
	}

	public function getRefmod()
	{
      $c= new Criteria();
	  $c->add(FcmodlicPeer::NUMSOL,self::getNumsol().'%',Criteria::LIKE);
      $reg = FcmodlicPeer::doSelectOne($c);
      if (count($reg)>0) return $reg->getRefmod();
	  else return "";
	}

	public function getNomcon()
	{
		return Herramientas::getX('rifcon','fcconrep','nomcon',self::getRifcon());
	}

	public function getFecmod()
	{
      $c= new Criteria();
	  $c->add(FcmodlicPeer::NUMSOL,self::getNumsol().'%',Criteria::LIKE);
      $reg = FcmodlicPeer::doSelectOne($c);
      if (count($reg)>0) return $reg->getFecmod();
	  else return "";
	}

	public function getMotmod()
	{
      $c= new Criteria();
	  $c->add(FcmodlicPeer::NUMSOL,self::getNumsol().'%',Criteria::LIKE);
      $reg = FcmodlicPeer::doSelectOne($c);
      if (count($reg)>0) return $reg->getMotmod();
	  else return "";
	}

	public function getNomconrep()
	{
		return Herramientas::getX('rifcon','fcconrep','nomcon',self::getRifrep());
	}
	public function getDesubicat()
	{
		return Herramientas::getX('codcatinm','fcreginm','nomcon',self::getCatcon());
	}
 }



