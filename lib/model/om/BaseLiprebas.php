<?php


abstract class BaseLiprebas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpre;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $codclacomp;


	
	protected $fecreg;


	
	protected $horreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $tipcom;


	
	protected $codpre;


	
	protected $nompre;


	
	protected $codprio;


	
	protected $despro;


	
	protected $monpre;


	
	protected $codmon;


	
	protected $valcam;


	
	protected $feccam;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $status;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $prepor;


	
	protected $cargopre;


	
	protected $aprpor;


	
	protected $cargoapr;


	
	protected $tipcon;


	
	protected $acto;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpre()
  {

    return trim($this->numpre);

  }
  
  public function getCodempadm()
  {

    return trim($this->codempadm);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getCodempeje()
  {

    return trim($this->codempeje);

  }
  
  public function getCoduniste()
  {

    return trim($this->coduniste);

  }
  
  public function getCodclacomp()
  {

    return trim($this->codclacomp);

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

  
  public function getHorreg()
  {

    return trim($this->horreg);

  }
  
  public function getDias()
  {

    return $this->dias;

  }
  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getNompre()
  {

    return trim($this->nompre);

  }
  
  public function getCodprio()
  {

    return trim($this->codprio);

  }
  
  public function getDespro()
  {

    return trim($this->despro);

  }
  
  public function getMonpre($val=false)
  {

    if($val) return number_format($this->monpre,2,',','.');
    else return $this->monpre;

  }
  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getValcam($val=false)
  {

    if($val) return number_format($this->valcam,2,',','.');
    else return $this->valcam;

  }
  
  public function getFeccam($format = 'Y-m-d H:i:s')
  {

    if ($this->feccam === null || $this->feccam === '') {
      return null;
    } elseif (!is_int($this->feccam)) {
            $ts = strtotime($this->feccam);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccam] as date/time value: " . var_export($this->feccam, true));
      }
    } else {
      $ts = $this->feccam;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return strftime($format, $ts);
    } else {
      return date($format, $ts);
    }
  }

  
  public function getDocane1()
  {

    return trim($this->docane1);

  }
  
  public function getDocane2()
  {

    return trim($this->docane2);

  }
  
  public function getDocane3()
  {

    return trim($this->docane3);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getCargopre()
  {

    return trim($this->cargopre);

  }
  
  public function getAprpor()
  {

    return trim($this->aprpor);

  }
  
  public function getCargoapr()
  {

    return trim($this->cargoapr);

  }
  
  public function getTipcon()
  {

    return trim($this->tipcon);

  }
  
  public function getActo()
  {

    return trim($this->acto);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpre($v)
	{

    if ($this->numpre !== $v) {
        $this->numpre = $v;
        $this->modifiedColumns[] = LiprebasPeer::NUMPRE;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiprebasPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiprebasPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiprebasPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiprebasPeer::CODUNISTE;
      }
  
	} 
	
	public function setCodclacomp($v)
	{

    if ($this->codclacomp !== $v) {
        $this->codclacomp = $v;
        $this->modifiedColumns[] = LiprebasPeer::CODCLACOMP;
      }
  
	} 
	
	public function setFecreg($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = LiprebasPeer::FECREG;
    }

	} 
	
	public function setHorreg($v)
	{

    if ($this->horreg !== $v) {
        $this->horreg = $v;
        $this->modifiedColumns[] = LiprebasPeer::HORREG;
      }
  
	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LiprebasPeer::DIAS;
      }
  
	} 
	
	public function setFecven($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = LiprebasPeer::FECVEN;
    }

	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = LiprebasPeer::TIPCOM;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = LiprebasPeer::CODPRE;
      }
  
	} 
	
	public function setNompre($v)
	{

    if ($this->nompre !== $v) {
        $this->nompre = $v;
        $this->modifiedColumns[] = LiprebasPeer::NOMPRE;
      }
  
	} 
	
	public function setCodprio($v)
	{

    if ($this->codprio !== $v) {
        $this->codprio = $v;
        $this->modifiedColumns[] = LiprebasPeer::CODPRIO;
      }
  
	} 
	
	public function setDespro($v)
	{

    if ($this->despro !== $v) {
        $this->despro = $v;
        $this->modifiedColumns[] = LiprebasPeer::DESPRO;
      }
  
	} 
	
	public function setMonpre($v)
	{

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprebasPeer::MONPRE;
      }
  
	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = LiprebasPeer::CODMON;
      }
  
	} 
	
	public function setValcam($v)
	{

    if ($this->valcam !== $v) {
        $this->valcam = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprebasPeer::VALCAM;
      }
  
	} 
	
	public function setFeccam($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccam] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccam !== $ts) {
      $this->feccam = $ts;
      $this->modifiedColumns[] = LiprebasPeer::FECCAM;
    }

	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiprebasPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiprebasPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiprebasPeer::DOCANE3;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiprebasPeer::STATUS;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiprebasPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiprebasPeer::DETDECMOD;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiprebasPeer::PREPOR;
      }
  
	} 
	
	public function setCargopre($v)
	{

    if ($this->cargopre !== $v) {
        $this->cargopre = $v;
        $this->modifiedColumns[] = LiprebasPeer::CARGOPRE;
      }
  
	} 
	
	public function setAprpor($v)
	{

    if ($this->aprpor !== $v) {
        $this->aprpor = $v;
        $this->modifiedColumns[] = LiprebasPeer::APRPOR;
      }
  
	} 
	
	public function setCargoapr($v)
	{

    if ($this->cargoapr !== $v) {
        $this->cargoapr = $v;
        $this->modifiedColumns[] = LiprebasPeer::CARGOAPR;
      }
  
	} 
	
	public function setTipcon($v)
	{

    if ($this->tipcon !== $v) {
        $this->tipcon = $v;
        $this->modifiedColumns[] = LiprebasPeer::TIPCON;
      }
  
	} 
	
	public function setActo($v)
	{

    if ($this->acto !== $v) {
        $this->acto = $v;
        $this->modifiedColumns[] = LiprebasPeer::ACTO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiprebasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpre = $rs->getString($startcol + 0);

      $this->codempadm = $rs->getString($startcol + 1);

      $this->coduniadm = $rs->getString($startcol + 2);

      $this->codempeje = $rs->getString($startcol + 3);

      $this->coduniste = $rs->getString($startcol + 4);

      $this->codclacomp = $rs->getString($startcol + 5);

      $this->fecreg = $rs->getDate($startcol + 6, null);

      $this->horreg = $rs->getString($startcol + 7);

      $this->dias = $rs->getInt($startcol + 8);

      $this->fecven = $rs->getDate($startcol + 9, null);

      $this->tipcom = $rs->getString($startcol + 10);

      $this->codpre = $rs->getString($startcol + 11);

      $this->nompre = $rs->getString($startcol + 12);

      $this->codprio = $rs->getString($startcol + 13);

      $this->despro = $rs->getString($startcol + 14);

      $this->monpre = $rs->getFloat($startcol + 15);

      $this->codmon = $rs->getString($startcol + 16);

      $this->valcam = $rs->getFloat($startcol + 17);

      $this->feccam = $rs->getTimestamp($startcol + 18, null);

      $this->docane1 = $rs->getString($startcol + 19);

      $this->docane2 = $rs->getString($startcol + 20);

      $this->docane3 = $rs->getString($startcol + 21);

      $this->status = $rs->getString($startcol + 22);

      $this->lisicact_id = $rs->getInt($startcol + 23);

      $this->detdecmod = $rs->getString($startcol + 24);

      $this->prepor = $rs->getString($startcol + 25);

      $this->cargopre = $rs->getString($startcol + 26);

      $this->aprpor = $rs->getString($startcol + 27);

      $this->cargoapr = $rs->getString($startcol + 28);

      $this->tipcon = $rs->getString($startcol + 29);

      $this->acto = $rs->getString($startcol + 30);

      $this->id = $rs->getInt($startcol + 31);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 32; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liprebas object", $e);
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
			$con = Propel::getConnection(LiprebasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiprebasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiprebasPeer::DATABASE_NAME);
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


												
			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiprebasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiprebasPeer::doUpdate($this, $con);
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


												
			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LiprebasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiprebasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpre();
				break;
			case 1:
				return $this->getCodempadm();
				break;
			case 2:
				return $this->getCoduniadm();
				break;
			case 3:
				return $this->getCodempeje();
				break;
			case 4:
				return $this->getCoduniste();
				break;
			case 5:
				return $this->getCodclacomp();
				break;
			case 6:
				return $this->getFecreg();
				break;
			case 7:
				return $this->getHorreg();
				break;
			case 8:
				return $this->getDias();
				break;
			case 9:
				return $this->getFecven();
				break;
			case 10:
				return $this->getTipcom();
				break;
			case 11:
				return $this->getCodpre();
				break;
			case 12:
				return $this->getNompre();
				break;
			case 13:
				return $this->getCodprio();
				break;
			case 14:
				return $this->getDespro();
				break;
			case 15:
				return $this->getMonpre();
				break;
			case 16:
				return $this->getCodmon();
				break;
			case 17:
				return $this->getValcam();
				break;
			case 18:
				return $this->getFeccam();
				break;
			case 19:
				return $this->getDocane1();
				break;
			case 20:
				return $this->getDocane2();
				break;
			case 21:
				return $this->getDocane3();
				break;
			case 22:
				return $this->getStatus();
				break;
			case 23:
				return $this->getLisicactId();
				break;
			case 24:
				return $this->getDetdecmod();
				break;
			case 25:
				return $this->getPrepor();
				break;
			case 26:
				return $this->getCargopre();
				break;
			case 27:
				return $this->getAprpor();
				break;
			case 28:
				return $this->getCargoapr();
				break;
			case 29:
				return $this->getTipcon();
				break;
			case 30:
				return $this->getActo();
				break;
			case 31:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiprebasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpre(),
			$keys[1] => $this->getCodempadm(),
			$keys[2] => $this->getCoduniadm(),
			$keys[3] => $this->getCodempeje(),
			$keys[4] => $this->getCoduniste(),
			$keys[5] => $this->getCodclacomp(),
			$keys[6] => $this->getFecreg(),
			$keys[7] => $this->getHorreg(),
			$keys[8] => $this->getDias(),
			$keys[9] => $this->getFecven(),
			$keys[10] => $this->getTipcom(),
			$keys[11] => $this->getCodpre(),
			$keys[12] => $this->getNompre(),
			$keys[13] => $this->getCodprio(),
			$keys[14] => $this->getDespro(),
			$keys[15] => $this->getMonpre(),
			$keys[16] => $this->getCodmon(),
			$keys[17] => $this->getValcam(),
			$keys[18] => $this->getFeccam(),
			$keys[19] => $this->getDocane1(),
			$keys[20] => $this->getDocane2(),
			$keys[21] => $this->getDocane3(),
			$keys[22] => $this->getStatus(),
			$keys[23] => $this->getLisicactId(),
			$keys[24] => $this->getDetdecmod(),
			$keys[25] => $this->getPrepor(),
			$keys[26] => $this->getCargopre(),
			$keys[27] => $this->getAprpor(),
			$keys[28] => $this->getCargoapr(),
			$keys[29] => $this->getTipcon(),
			$keys[30] => $this->getActo(),
			$keys[31] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiprebasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpre($value);
				break;
			case 1:
				$this->setCodempadm($value);
				break;
			case 2:
				$this->setCoduniadm($value);
				break;
			case 3:
				$this->setCodempeje($value);
				break;
			case 4:
				$this->setCoduniste($value);
				break;
			case 5:
				$this->setCodclacomp($value);
				break;
			case 6:
				$this->setFecreg($value);
				break;
			case 7:
				$this->setHorreg($value);
				break;
			case 8:
				$this->setDias($value);
				break;
			case 9:
				$this->setFecven($value);
				break;
			case 10:
				$this->setTipcom($value);
				break;
			case 11:
				$this->setCodpre($value);
				break;
			case 12:
				$this->setNompre($value);
				break;
			case 13:
				$this->setCodprio($value);
				break;
			case 14:
				$this->setDespro($value);
				break;
			case 15:
				$this->setMonpre($value);
				break;
			case 16:
				$this->setCodmon($value);
				break;
			case 17:
				$this->setValcam($value);
				break;
			case 18:
				$this->setFeccam($value);
				break;
			case 19:
				$this->setDocane1($value);
				break;
			case 20:
				$this->setDocane2($value);
				break;
			case 21:
				$this->setDocane3($value);
				break;
			case 22:
				$this->setStatus($value);
				break;
			case 23:
				$this->setLisicactId($value);
				break;
			case 24:
				$this->setDetdecmod($value);
				break;
			case 25:
				$this->setPrepor($value);
				break;
			case 26:
				$this->setCargopre($value);
				break;
			case 27:
				$this->setAprpor($value);
				break;
			case 28:
				$this->setCargoapr($value);
				break;
			case 29:
				$this->setTipcon($value);
				break;
			case 30:
				$this->setActo($value);
				break;
			case 31:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiprebasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodempadm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoduniadm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempeje($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniste($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodclacomp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecreg($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setHorreg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDias($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecven($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipcom($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodpre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNompre($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodprio($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDespro($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMonpre($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodmon($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setValcam($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFeccam($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDocane1($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDocane2($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDocane3($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setStatus($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setLisicactId($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDetdecmod($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setPrepor($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCargopre($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setAprpor($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCargoapr($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTipcon($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setActo($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setId($arr[$keys[31]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiprebasPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiprebasPeer::NUMPRE)) $criteria->add(LiprebasPeer::NUMPRE, $this->numpre);
		if ($this->isColumnModified(LiprebasPeer::CODEMPADM)) $criteria->add(LiprebasPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiprebasPeer::CODUNIADM)) $criteria->add(LiprebasPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiprebasPeer::CODEMPEJE)) $criteria->add(LiprebasPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiprebasPeer::CODUNISTE)) $criteria->add(LiprebasPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiprebasPeer::CODCLACOMP)) $criteria->add(LiprebasPeer::CODCLACOMP, $this->codclacomp);
		if ($this->isColumnModified(LiprebasPeer::FECREG)) $criteria->add(LiprebasPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LiprebasPeer::HORREG)) $criteria->add(LiprebasPeer::HORREG, $this->horreg);
		if ($this->isColumnModified(LiprebasPeer::DIAS)) $criteria->add(LiprebasPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LiprebasPeer::FECVEN)) $criteria->add(LiprebasPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiprebasPeer::TIPCOM)) $criteria->add(LiprebasPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(LiprebasPeer::CODPRE)) $criteria->add(LiprebasPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(LiprebasPeer::NOMPRE)) $criteria->add(LiprebasPeer::NOMPRE, $this->nompre);
		if ($this->isColumnModified(LiprebasPeer::CODPRIO)) $criteria->add(LiprebasPeer::CODPRIO, $this->codprio);
		if ($this->isColumnModified(LiprebasPeer::DESPRO)) $criteria->add(LiprebasPeer::DESPRO, $this->despro);
		if ($this->isColumnModified(LiprebasPeer::MONPRE)) $criteria->add(LiprebasPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(LiprebasPeer::CODMON)) $criteria->add(LiprebasPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(LiprebasPeer::VALCAM)) $criteria->add(LiprebasPeer::VALCAM, $this->valcam);
		if ($this->isColumnModified(LiprebasPeer::FECCAM)) $criteria->add(LiprebasPeer::FECCAM, $this->feccam);
		if ($this->isColumnModified(LiprebasPeer::DOCANE1)) $criteria->add(LiprebasPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiprebasPeer::DOCANE2)) $criteria->add(LiprebasPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiprebasPeer::DOCANE3)) $criteria->add(LiprebasPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiprebasPeer::STATUS)) $criteria->add(LiprebasPeer::STATUS, $this->status);
		if ($this->isColumnModified(LiprebasPeer::LISICACT_ID)) $criteria->add(LiprebasPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiprebasPeer::DETDECMOD)) $criteria->add(LiprebasPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiprebasPeer::PREPOR)) $criteria->add(LiprebasPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiprebasPeer::CARGOPRE)) $criteria->add(LiprebasPeer::CARGOPRE, $this->cargopre);
		if ($this->isColumnModified(LiprebasPeer::APRPOR)) $criteria->add(LiprebasPeer::APRPOR, $this->aprpor);
		if ($this->isColumnModified(LiprebasPeer::CARGOAPR)) $criteria->add(LiprebasPeer::CARGOAPR, $this->cargoapr);
		if ($this->isColumnModified(LiprebasPeer::TIPCON)) $criteria->add(LiprebasPeer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(LiprebasPeer::ACTO)) $criteria->add(LiprebasPeer::ACTO, $this->acto);
		if ($this->isColumnModified(LiprebasPeer::ID)) $criteria->add(LiprebasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiprebasPeer::DATABASE_NAME);

		$criteria->add(LiprebasPeer::ID, $this->id);

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

		$copyObj->setNumpre($this->numpre);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setCodclacomp($this->codclacomp);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setHorreg($this->horreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setNompre($this->nompre);

		$copyObj->setCodprio($this->codprio);

		$copyObj->setDespro($this->despro);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValcam($this->valcam);

		$copyObj->setFeccam($this->feccam);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setStatus($this->status);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setCargopre($this->cargopre);

		$copyObj->setAprpor($this->aprpor);

		$copyObj->setCargoapr($this->cargoapr);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setActo($this->acto);


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
			self::$peer = new LiprebasPeer();
		}
		return self::$peer;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/om/BaseLisicactPeer.php';

      $c = new Criteria();
      $c->add(LisicactPeer::ID,$this->lisicact_id);
      
			$this->aLisicact = LisicactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLisicact;
	}

} 