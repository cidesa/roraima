<?php


abstract class BaseFcreginm2 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroinm;


	
	protected $codcatfis;


	
	protected $coduso;


	
	protected $codcarinm;


	
	protected $codsitinm;


	
	protected $rifcon;


	
	protected $fecpag;


	
	protected $feccal;


	
	protected $fecreg;


	
	protected $dirinm;


	
	protected $linnor;


	
	protected $linsur;


	
	protected $linest;


	
	protected $linoes;


	
	protected $mtrter;


	
	protected $mtrcon;


	
	protected $bster;


	
	protected $bscon;


	
	protected $docpro;


	
	protected $rifrep;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $estinm;


	
	protected $estdec;


	
	protected $codcatinm;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $clacon;


	
	protected $fecadq;


	
	protected $valinm;


	
	protected $codman;


	
	protected $codsec;


	
	protected $codpar;


	
	protected $nroinmant;


	
	protected $totter;


	
	protected $totcon;


	
	protected $total;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroinm()
  {

    return trim($this->nroinm);

  }
  
  public function getCodcatfis()
  {

    return trim($this->codcatfis);

  }
  
  public function getCoduso()
  {

    return trim($this->coduso);

  }
  
  public function getCodcarinm()
  {

    return trim($this->codcarinm);

  }
  
  public function getCodsitinm()
  {

    return trim($this->codsitinm);

  }
  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccal($format = 'Y-m-d')
  {

    if ($this->feccal === null || $this->feccal === '') {
      return null;
    } elseif (!is_int($this->feccal)) {
            $ts = adodb_strtotime($this->feccal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccal] as date/time value: " . var_export($this->feccal, true));
      }
    } else {
      $ts = $this->feccal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDirinm()
  {

    return trim($this->dirinm);

  }
  
  public function getLinnor()
  {

    return trim($this->linnor);

  }
  
  public function getLinsur()
  {

    return trim($this->linsur);

  }
  
  public function getLinest()
  {

    return trim($this->linest);

  }
  
  public function getLinoes()
  {

    return trim($this->linoes);

  }
  
  public function getMtrter($val=false)
  {

    if($val) return number_format($this->mtrter,2,',','.');
    else return $this->mtrter;

  }
  
  public function getMtrcon($val=false)
  {

    if($val) return number_format($this->mtrcon,2,',','.');
    else return $this->mtrcon;

  }
  
  public function getBster($val=false)
  {

    if($val) return number_format($this->bster,2,',','.');
    else return $this->bster;

  }
  
  public function getBscon($val=false)
  {

    if($val) return number_format($this->bscon,2,',','.');
    else return $this->bscon;

  }
  
  public function getDocpro()
  {

    return trim($this->docpro);

  }
  
  public function getRifrep()
  {

    return trim($this->rifrep);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEstinm()
  {

    return trim($this->estinm);

  }
  
  public function getEstdec()
  {

    return trim($this->estdec);

  }
  
  public function getCodcatinm()
  {

    return trim($this->codcatinm);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getClacon()
  {

    return trim($this->clacon);

  }
  
  public function getFecadq($format = 'Y-m-d')
  {

    if ($this->fecadq === null || $this->fecadq === '') {
      return null;
    } elseif (!is_int($this->fecadq)) {
            $ts = adodb_strtotime($this->fecadq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecadq] as date/time value: " . var_export($this->fecadq, true));
      }
    } else {
      $ts = $this->fecadq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getValinm($val=false)
  {

    if($val) return number_format($this->valinm,2,',','.');
    else return $this->valinm;

  }
  
  public function getCodman()
  {

    return trim($this->codman);

  }
  
  public function getCodsec()
  {

    return trim($this->codsec);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getNroinmant()
  {

    return trim($this->nroinmant);

  }
  
  public function getTotter($val=false)
  {

    if($val) return number_format($this->totter,2,',','.');
    else return $this->totter;

  }
  
  public function getTotcon($val=false)
  {

    if($val) return number_format($this->totcon,2,',','.');
    else return $this->totcon;

  }
  
  public function getTotal($val=false)
  {

    if($val) return number_format($this->total,2,',','.');
    else return $this->total;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroinm($v)
	{

    if ($this->nroinm !== $v) {
        $this->nroinm = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::NROINM;
      }
  
	} 
	
	public function setCodcatfis($v)
	{

    if ($this->codcatfis !== $v) {
        $this->codcatfis = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::CODCATFIS;
      }
  
	} 
	
	public function setCoduso($v)
	{

    if ($this->coduso !== $v) {
        $this->coduso = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::CODUSO;
      }
  
	} 
	
	public function setCodcarinm($v)
	{

    if ($this->codcarinm !== $v) {
        $this->codcarinm = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::CODCARINM;
      }
  
	} 
	
	public function setCodsitinm($v)
	{

    if ($this->codsitinm !== $v) {
        $this->codsitinm = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::CODSITINM;
      }
  
	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::RIFCON;
      }
  
	} 
	
	public function setFecpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = Fcreginm2Peer::FECPAG;
    }

	} 
	
	public function setFeccal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccal !== $ts) {
      $this->feccal = $ts;
      $this->modifiedColumns[] = Fcreginm2Peer::FECCAL;
    }

	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = Fcreginm2Peer::FECREG;
    }

	} 
	
	public function setDirinm($v)
	{

    if ($this->dirinm !== $v) {
        $this->dirinm = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::DIRINM;
      }
  
	} 
	
	public function setLinnor($v)
	{

    if ($this->linnor !== $v) {
        $this->linnor = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::LINNOR;
      }
  
	} 
	
	public function setLinsur($v)
	{

    if ($this->linsur !== $v) {
        $this->linsur = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::LINSUR;
      }
  
	} 
	
	public function setLinest($v)
	{

    if ($this->linest !== $v) {
        $this->linest = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::LINEST;
      }
  
	} 
	
	public function setLinoes($v)
	{

    if ($this->linoes !== $v) {
        $this->linoes = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::LINOES;
      }
  
	} 
	
	public function setMtrter($v)
	{

    if ($this->mtrter !== $v) {
        $this->mtrter = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm2Peer::MTRTER;
      }
  
	} 
	
	public function setMtrcon($v)
	{

    if ($this->mtrcon !== $v) {
        $this->mtrcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm2Peer::MTRCON;
      }
  
	} 
	
	public function setBster($v)
	{

    if ($this->bster !== $v) {
        $this->bster = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm2Peer::BSTER;
      }
  
	} 
	
	public function setBscon($v)
	{

    if ($this->bscon !== $v) {
        $this->bscon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm2Peer::BSCON;
      }
  
	} 
	
	public function setDocpro($v)
	{

    if ($this->docpro !== $v) {
        $this->docpro = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::DOCPRO;
      }
  
	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::RIFREP;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::FUNREC;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = Fcreginm2Peer::FECREC;
    }

	} 
	
	public function setEstinm($v)
	{

    if ($this->estinm !== $v) {
        $this->estinm = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::ESTINM;
      }
  
	} 
	
	public function setEstdec($v)
	{

    if ($this->estdec !== $v) {
        $this->estdec = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::ESTDEC;
      }
  
	} 
	
	public function setCodcatinm($v)
	{

    if ($this->codcatinm !== $v) {
        $this->codcatinm = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::CODCATINM;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::DIRCON;
      }
  
	} 
	
	public function setClacon($v)
	{

    if ($this->clacon !== $v) {
        $this->clacon = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::CLACON;
      }
  
	} 
	
	public function setFecadq($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecadq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecadq !== $ts) {
      $this->fecadq = $ts;
      $this->modifiedColumns[] = Fcreginm2Peer::FECADQ;
    }

	} 
	
	public function setValinm($v)
	{

    if ($this->valinm !== $v) {
        $this->valinm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm2Peer::VALINM;
      }
  
	} 
	
	public function setCodman($v)
	{

    if ($this->codman !== $v) {
        $this->codman = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::CODMAN;
      }
  
	} 
	
	public function setCodsec($v)
	{

    if ($this->codsec !== $v) {
        $this->codsec = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::CODSEC;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::CODPAR;
      }
  
	} 
	
	public function setNroinmant($v)
	{

    if ($this->nroinmant !== $v) {
        $this->nroinmant = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::NROINMANT;
      }
  
	} 
	
	public function setTotter($v)
	{

    if ($this->totter !== $v) {
        $this->totter = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm2Peer::TOTTER;
      }
  
	} 
	
	public function setTotcon($v)
	{

    if ($this->totcon !== $v) {
        $this->totcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm2Peer::TOTCON;
      }
  
	} 
	
	public function setTotal($v)
	{

    if ($this->total !== $v) {
        $this->total = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcreginm2Peer::TOTAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Fcreginm2Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroinm = $rs->getString($startcol + 0);

      $this->codcatfis = $rs->getString($startcol + 1);

      $this->coduso = $rs->getString($startcol + 2);

      $this->codcarinm = $rs->getString($startcol + 3);

      $this->codsitinm = $rs->getString($startcol + 4);

      $this->rifcon = $rs->getString($startcol + 5);

      $this->fecpag = $rs->getDate($startcol + 6, null);

      $this->feccal = $rs->getDate($startcol + 7, null);

      $this->fecreg = $rs->getDate($startcol + 8, null);

      $this->dirinm = $rs->getString($startcol + 9);

      $this->linnor = $rs->getString($startcol + 10);

      $this->linsur = $rs->getString($startcol + 11);

      $this->linest = $rs->getString($startcol + 12);

      $this->linoes = $rs->getString($startcol + 13);

      $this->mtrter = $rs->getFloat($startcol + 14);

      $this->mtrcon = $rs->getFloat($startcol + 15);

      $this->bster = $rs->getFloat($startcol + 16);

      $this->bscon = $rs->getFloat($startcol + 17);

      $this->docpro = $rs->getString($startcol + 18);

      $this->rifrep = $rs->getString($startcol + 19);

      $this->funrec = $rs->getString($startcol + 20);

      $this->fecrec = $rs->getDate($startcol + 21, null);

      $this->estinm = $rs->getString($startcol + 22);

      $this->estdec = $rs->getString($startcol + 23);

      $this->codcatinm = $rs->getString($startcol + 24);

      $this->nomcon = $rs->getString($startcol + 25);

      $this->dircon = $rs->getString($startcol + 26);

      $this->clacon = $rs->getString($startcol + 27);

      $this->fecadq = $rs->getDate($startcol + 28, null);

      $this->valinm = $rs->getFloat($startcol + 29);

      $this->codman = $rs->getString($startcol + 30);

      $this->codsec = $rs->getString($startcol + 31);

      $this->codpar = $rs->getString($startcol + 32);

      $this->nroinmant = $rs->getString($startcol + 33);

      $this->totter = $rs->getFloat($startcol + 34);

      $this->totcon = $rs->getFloat($startcol + 35);

      $this->total = $rs->getFloat($startcol + 36);

      $this->id = $rs->getInt($startcol + 37);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 38; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcreginm2 object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Fcreginm2Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcreginm2Peer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Fcreginm2Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = Fcreginm2Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Fcreginm2Peer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = Fcreginm2Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcreginm2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroinm();
				break;
			case 1:
				return $this->getCodcatfis();
				break;
			case 2:
				return $this->getCoduso();
				break;
			case 3:
				return $this->getCodcarinm();
				break;
			case 4:
				return $this->getCodsitinm();
				break;
			case 5:
				return $this->getRifcon();
				break;
			case 6:
				return $this->getFecpag();
				break;
			case 7:
				return $this->getFeccal();
				break;
			case 8:
				return $this->getFecreg();
				break;
			case 9:
				return $this->getDirinm();
				break;
			case 10:
				return $this->getLinnor();
				break;
			case 11:
				return $this->getLinsur();
				break;
			case 12:
				return $this->getLinest();
				break;
			case 13:
				return $this->getLinoes();
				break;
			case 14:
				return $this->getMtrter();
				break;
			case 15:
				return $this->getMtrcon();
				break;
			case 16:
				return $this->getBster();
				break;
			case 17:
				return $this->getBscon();
				break;
			case 18:
				return $this->getDocpro();
				break;
			case 19:
				return $this->getRifrep();
				break;
			case 20:
				return $this->getFunrec();
				break;
			case 21:
				return $this->getFecrec();
				break;
			case 22:
				return $this->getEstinm();
				break;
			case 23:
				return $this->getEstdec();
				break;
			case 24:
				return $this->getCodcatinm();
				break;
			case 25:
				return $this->getNomcon();
				break;
			case 26:
				return $this->getDircon();
				break;
			case 27:
				return $this->getClacon();
				break;
			case 28:
				return $this->getFecadq();
				break;
			case 29:
				return $this->getValinm();
				break;
			case 30:
				return $this->getCodman();
				break;
			case 31:
				return $this->getCodsec();
				break;
			case 32:
				return $this->getCodpar();
				break;
			case 33:
				return $this->getNroinmant();
				break;
			case 34:
				return $this->getTotter();
				break;
			case 35:
				return $this->getTotcon();
				break;
			case 36:
				return $this->getTotal();
				break;
			case 37:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcreginm2Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroinm(),
			$keys[1] => $this->getCodcatfis(),
			$keys[2] => $this->getCoduso(),
			$keys[3] => $this->getCodcarinm(),
			$keys[4] => $this->getCodsitinm(),
			$keys[5] => $this->getRifcon(),
			$keys[6] => $this->getFecpag(),
			$keys[7] => $this->getFeccal(),
			$keys[8] => $this->getFecreg(),
			$keys[9] => $this->getDirinm(),
			$keys[10] => $this->getLinnor(),
			$keys[11] => $this->getLinsur(),
			$keys[12] => $this->getLinest(),
			$keys[13] => $this->getLinoes(),
			$keys[14] => $this->getMtrter(),
			$keys[15] => $this->getMtrcon(),
			$keys[16] => $this->getBster(),
			$keys[17] => $this->getBscon(),
			$keys[18] => $this->getDocpro(),
			$keys[19] => $this->getRifrep(),
			$keys[20] => $this->getFunrec(),
			$keys[21] => $this->getFecrec(),
			$keys[22] => $this->getEstinm(),
			$keys[23] => $this->getEstdec(),
			$keys[24] => $this->getCodcatinm(),
			$keys[25] => $this->getNomcon(),
			$keys[26] => $this->getDircon(),
			$keys[27] => $this->getClacon(),
			$keys[28] => $this->getFecadq(),
			$keys[29] => $this->getValinm(),
			$keys[30] => $this->getCodman(),
			$keys[31] => $this->getCodsec(),
			$keys[32] => $this->getCodpar(),
			$keys[33] => $this->getNroinmant(),
			$keys[34] => $this->getTotter(),
			$keys[35] => $this->getTotcon(),
			$keys[36] => $this->getTotal(),
			$keys[37] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcreginm2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroinm($value);
				break;
			case 1:
				$this->setCodcatfis($value);
				break;
			case 2:
				$this->setCoduso($value);
				break;
			case 3:
				$this->setCodcarinm($value);
				break;
			case 4:
				$this->setCodsitinm($value);
				break;
			case 5:
				$this->setRifcon($value);
				break;
			case 6:
				$this->setFecpag($value);
				break;
			case 7:
				$this->setFeccal($value);
				break;
			case 8:
				$this->setFecreg($value);
				break;
			case 9:
				$this->setDirinm($value);
				break;
			case 10:
				$this->setLinnor($value);
				break;
			case 11:
				$this->setLinsur($value);
				break;
			case 12:
				$this->setLinest($value);
				break;
			case 13:
				$this->setLinoes($value);
				break;
			case 14:
				$this->setMtrter($value);
				break;
			case 15:
				$this->setMtrcon($value);
				break;
			case 16:
				$this->setBster($value);
				break;
			case 17:
				$this->setBscon($value);
				break;
			case 18:
				$this->setDocpro($value);
				break;
			case 19:
				$this->setRifrep($value);
				break;
			case 20:
				$this->setFunrec($value);
				break;
			case 21:
				$this->setFecrec($value);
				break;
			case 22:
				$this->setEstinm($value);
				break;
			case 23:
				$this->setEstdec($value);
				break;
			case 24:
				$this->setCodcatinm($value);
				break;
			case 25:
				$this->setNomcon($value);
				break;
			case 26:
				$this->setDircon($value);
				break;
			case 27:
				$this->setClacon($value);
				break;
			case 28:
				$this->setFecadq($value);
				break;
			case 29:
				$this->setValinm($value);
				break;
			case 30:
				$this->setCodman($value);
				break;
			case 31:
				$this->setCodsec($value);
				break;
			case 32:
				$this->setCodpar($value);
				break;
			case 33:
				$this->setNroinmant($value);
				break;
			case 34:
				$this->setTotter($value);
				break;
			case 35:
				$this->setTotcon($value);
				break;
			case 36:
				$this->setTotal($value);
				break;
			case 37:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcreginm2Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroinm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcatfis($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoduso($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcarinm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodsitinm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRifcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFeccal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecreg($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDirinm($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLinnor($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLinsur($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLinest($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLinoes($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMtrter($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMtrcon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setBster($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setBscon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDocpro($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setRifrep($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFunrec($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecrec($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setEstinm($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setEstdec($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodcatinm($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setNomcon($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setDircon($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setClacon($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFecadq($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setValinm($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodman($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCodsec($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCodpar($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNroinmant($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setTotter($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setTotcon($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setTotal($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setId($arr[$keys[37]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcreginm2Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcreginm2Peer::NROINM)) $criteria->add(Fcreginm2Peer::NROINM, $this->nroinm);
		if ($this->isColumnModified(Fcreginm2Peer::CODCATFIS)) $criteria->add(Fcreginm2Peer::CODCATFIS, $this->codcatfis);
		if ($this->isColumnModified(Fcreginm2Peer::CODUSO)) $criteria->add(Fcreginm2Peer::CODUSO, $this->coduso);
		if ($this->isColumnModified(Fcreginm2Peer::CODCARINM)) $criteria->add(Fcreginm2Peer::CODCARINM, $this->codcarinm);
		if ($this->isColumnModified(Fcreginm2Peer::CODSITINM)) $criteria->add(Fcreginm2Peer::CODSITINM, $this->codsitinm);
		if ($this->isColumnModified(Fcreginm2Peer::RIFCON)) $criteria->add(Fcreginm2Peer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(Fcreginm2Peer::FECPAG)) $criteria->add(Fcreginm2Peer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(Fcreginm2Peer::FECCAL)) $criteria->add(Fcreginm2Peer::FECCAL, $this->feccal);
		if ($this->isColumnModified(Fcreginm2Peer::FECREG)) $criteria->add(Fcreginm2Peer::FECREG, $this->fecreg);
		if ($this->isColumnModified(Fcreginm2Peer::DIRINM)) $criteria->add(Fcreginm2Peer::DIRINM, $this->dirinm);
		if ($this->isColumnModified(Fcreginm2Peer::LINNOR)) $criteria->add(Fcreginm2Peer::LINNOR, $this->linnor);
		if ($this->isColumnModified(Fcreginm2Peer::LINSUR)) $criteria->add(Fcreginm2Peer::LINSUR, $this->linsur);
		if ($this->isColumnModified(Fcreginm2Peer::LINEST)) $criteria->add(Fcreginm2Peer::LINEST, $this->linest);
		if ($this->isColumnModified(Fcreginm2Peer::LINOES)) $criteria->add(Fcreginm2Peer::LINOES, $this->linoes);
		if ($this->isColumnModified(Fcreginm2Peer::MTRTER)) $criteria->add(Fcreginm2Peer::MTRTER, $this->mtrter);
		if ($this->isColumnModified(Fcreginm2Peer::MTRCON)) $criteria->add(Fcreginm2Peer::MTRCON, $this->mtrcon);
		if ($this->isColumnModified(Fcreginm2Peer::BSTER)) $criteria->add(Fcreginm2Peer::BSTER, $this->bster);
		if ($this->isColumnModified(Fcreginm2Peer::BSCON)) $criteria->add(Fcreginm2Peer::BSCON, $this->bscon);
		if ($this->isColumnModified(Fcreginm2Peer::DOCPRO)) $criteria->add(Fcreginm2Peer::DOCPRO, $this->docpro);
		if ($this->isColumnModified(Fcreginm2Peer::RIFREP)) $criteria->add(Fcreginm2Peer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(Fcreginm2Peer::FUNREC)) $criteria->add(Fcreginm2Peer::FUNREC, $this->funrec);
		if ($this->isColumnModified(Fcreginm2Peer::FECREC)) $criteria->add(Fcreginm2Peer::FECREC, $this->fecrec);
		if ($this->isColumnModified(Fcreginm2Peer::ESTINM)) $criteria->add(Fcreginm2Peer::ESTINM, $this->estinm);
		if ($this->isColumnModified(Fcreginm2Peer::ESTDEC)) $criteria->add(Fcreginm2Peer::ESTDEC, $this->estdec);
		if ($this->isColumnModified(Fcreginm2Peer::CODCATINM)) $criteria->add(Fcreginm2Peer::CODCATINM, $this->codcatinm);
		if ($this->isColumnModified(Fcreginm2Peer::NOMCON)) $criteria->add(Fcreginm2Peer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(Fcreginm2Peer::DIRCON)) $criteria->add(Fcreginm2Peer::DIRCON, $this->dircon);
		if ($this->isColumnModified(Fcreginm2Peer::CLACON)) $criteria->add(Fcreginm2Peer::CLACON, $this->clacon);
		if ($this->isColumnModified(Fcreginm2Peer::FECADQ)) $criteria->add(Fcreginm2Peer::FECADQ, $this->fecadq);
		if ($this->isColumnModified(Fcreginm2Peer::VALINM)) $criteria->add(Fcreginm2Peer::VALINM, $this->valinm);
		if ($this->isColumnModified(Fcreginm2Peer::CODMAN)) $criteria->add(Fcreginm2Peer::CODMAN, $this->codman);
		if ($this->isColumnModified(Fcreginm2Peer::CODSEC)) $criteria->add(Fcreginm2Peer::CODSEC, $this->codsec);
		if ($this->isColumnModified(Fcreginm2Peer::CODPAR)) $criteria->add(Fcreginm2Peer::CODPAR, $this->codpar);
		if ($this->isColumnModified(Fcreginm2Peer::NROINMANT)) $criteria->add(Fcreginm2Peer::NROINMANT, $this->nroinmant);
		if ($this->isColumnModified(Fcreginm2Peer::TOTTER)) $criteria->add(Fcreginm2Peer::TOTTER, $this->totter);
		if ($this->isColumnModified(Fcreginm2Peer::TOTCON)) $criteria->add(Fcreginm2Peer::TOTCON, $this->totcon);
		if ($this->isColumnModified(Fcreginm2Peer::TOTAL)) $criteria->add(Fcreginm2Peer::TOTAL, $this->total);
		if ($this->isColumnModified(Fcreginm2Peer::ID)) $criteria->add(Fcreginm2Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcreginm2Peer::DATABASE_NAME);

		$criteria->add(Fcreginm2Peer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNroinm($this->nroinm);

		$copyObj->setCodcatfis($this->codcatfis);

		$copyObj->setCoduso($this->coduso);

		$copyObj->setCodcarinm($this->codcarinm);

		$copyObj->setCodsitinm($this->codsitinm);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setFeccal($this->feccal);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDirinm($this->dirinm);

		$copyObj->setLinnor($this->linnor);

		$copyObj->setLinsur($this->linsur);

		$copyObj->setLinest($this->linest);

		$copyObj->setLinoes($this->linoes);

		$copyObj->setMtrter($this->mtrter);

		$copyObj->setMtrcon($this->mtrcon);

		$copyObj->setBster($this->bster);

		$copyObj->setBscon($this->bscon);

		$copyObj->setDocpro($this->docpro);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setEstinm($this->estinm);

		$copyObj->setEstdec($this->estdec);

		$copyObj->setCodcatinm($this->codcatinm);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setClacon($this->clacon);

		$copyObj->setFecadq($this->fecadq);

		$copyObj->setValinm($this->valinm);

		$copyObj->setCodman($this->codman);

		$copyObj->setCodsec($this->codsec);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setNroinmant($this->nroinmant);

		$copyObj->setTotter($this->totter);

		$copyObj->setTotcon($this->totcon);

		$copyObj->setTotal($this->total);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new Fcreginm2Peer();
		}
		return self::$peer;
	}

} 