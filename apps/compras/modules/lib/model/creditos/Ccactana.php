<?php

/**
 * Subclass for representing a row from the 'ccactana' table.
 *
 *
 *
 * @package lib.model
 */
class Ccactana extends BaseCcactana
{
     protected $numexp="";
     protected $nomben="";
     protected $mondep = 0;
     protected $envfax = null;
     protected $feccompag = null;
     protected $fecdep = null;
     protected $fecges = "";
     protected $fecrec = null;
     protected $numdep = "";
     protected $cctiptra = "";
	 protected $ccbanco = "";
	 protected $coment = "";
	 protected $idccgescob = "";


     public function getNumexp(){
    return Herramientas::getX('id','cccredit','numexp',self::getCccreditId());
  }

  public function getNomben(){
    return Herramientas::getX('id','cccredit','nomben',self::getCccreditId());
  }

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    parent::hydrate($rs, $startcol);
    $c= new Criteria();
    $c->add(CcgescobPeer::CCACTANA_ID,self::getId());
    $data=CcgescobPeer::doSelectOne($c);
    if ($data)
    {
      $this->fecges=date('d/m/Y',strtotime($data->getFecges()));
      $this->feccompag=$data->getFeccompag();
      $this->fecdep=$data->getFecdep();
      $this->fecrec=$data->getFecrec();
      $this->envfax=$data->getEnvfax();
      $this->coment=$data->getComent();
      if ($data->getCcbancoId()!='')
      $this->ccbanco=$data->getCcbancoId();
      else $this->ccbanco="";
      if ($data->getCctiptraId()!='')
      $this->cctiptra=$data->getCctiptraId();
      else $this->cctiptra="";
      $this->numdep=$data->getNumdep();
      $this->mondep=number_format($data->getMondep(),2,',','.');
      $this->idccgescob=$data->getId();
    }
    else
    {
      $this->fecges="";
      $this->feccompag=null;
      $this->fecdep=null;
      $this->fecrec=null;
      $this->envfax=null;
      $this->coment='';
      $this->ccbanco="";
      $this->cctiptra="";
      $this->numdep='';
      $this->mondep=0;
      $this->idccgescob="";
    }
   }

   	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v) && $v !== '') {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
    }

	}

	public function setFecdep($v)
	{

    if ($v !== null && !is_int($v) && $v !== '') {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdep] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdep !== $ts) {
      $this->fecdep = $ts;
    }

	}

    public function setCctiptra($v)
	{
       $this->cctiptra = $v;
	}

	public function setCcbanco($v)
	{
       $this->ccbanco = $v;
	}

	public function setFeccompag($v)
	{

    if ($v !== null && !is_int($v) && $v !== '') {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccompag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccompag !== $ts) {
      $this->feccompag = $ts;
    }

	}

	public function setIdccgescob($v)
	{
       $this->idccgescob = $v;
	}


}
