<?php


abstract class BaseLiregofe extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numofe;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $codpro;


	
	protected $codtipemp;


	
	protected $ofenro;


	
	protected $fecofe;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $docane4;


	
	protected $prepor;


	
	protected $cargopre;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $cargoana;


	
	protected $status;


	
	protected $monofe;


	
	protected $monrecofe;


	
	protected $porvan;


	
	protected $declar;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumofe()
  {

    return trim($this->numofe);

  }
  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

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

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodtipemp()
  {

    return trim($this->codtipemp);

  }
  
  public function getOfenro()
  {

    return trim($this->ofenro);

  }
  
  public function getFecofe($format = 'Y-m-d')
  {

    if ($this->fecofe === null || $this->fecofe === '') {
      return null;
    } elseif (!is_int($this->fecofe)) {
            $ts = adodb_strtotime($this->fecofe);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecofe] as date/time value: " . var_export($this->fecofe, true));
      }
    } else {
      $ts = $this->fecofe;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
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
  
  public function getDocane4()
  {

    return trim($this->docane4);

  }
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getCargopre()
  {

    return trim($this->cargopre);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getAnapor()
  {

    return trim($this->anapor);

  }
  
  public function getCargoana()
  {

    return trim($this->cargoana);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getMonofe($val=false)
  {

    if($val) return number_format($this->monofe,2,',','.');
    else return $this->monofe;

  }
  
  public function getMonrecofe($val=false)
  {

    if($val) return number_format($this->monrecofe,2,',','.');
    else return $this->monrecofe;

  }
  
  public function getPorvan($val=false)
  {

    if($val) return number_format($this->porvan,2,',','.');
    else return $this->porvan;

  }
  
  public function getDeclar()
  {

    return trim($this->declar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumofe($v)
	{

    if ($this->numofe !== $v) {
        $this->numofe = $v;
        $this->modifiedColumns[] = LiregofePeer::NUMOFE;
      }
  
	} 
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LiregofePeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LiregofePeer::NUMEXP;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiregofePeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiregofePeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiregofePeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiregofePeer::CODUNISTE;
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
      $this->modifiedColumns[] = LiregofePeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LiregofePeer::DIAS;
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
      $this->modifiedColumns[] = LiregofePeer::FECVEN;
    }

	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LiregofePeer::CODPRO;
      }
  
	} 
	
	public function setCodtipemp($v)
	{

    if ($this->codtipemp !== $v) {
        $this->codtipemp = $v;
        $this->modifiedColumns[] = LiregofePeer::CODTIPEMP;
      }
  
	} 
	
	public function setOfenro($v)
	{

    if ($this->ofenro !== $v) {
        $this->ofenro = $v;
        $this->modifiedColumns[] = LiregofePeer::OFENRO;
      }
  
	} 
	
	public function setFecofe($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecofe] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecofe !== $ts) {
      $this->fecofe = $ts;
      $this->modifiedColumns[] = LiregofePeer::FECOFE;
    }

	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiregofePeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiregofePeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiregofePeer::DOCANE3;
      }
  
	} 
	
	public function setDocane4($v)
	{

    if ($this->docane4 !== $v) {
        $this->docane4 = $v;
        $this->modifiedColumns[] = LiregofePeer::DOCANE4;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiregofePeer::PREPOR;
      }
  
	} 
	
	public function setCargopre($v)
	{

    if ($this->cargopre !== $v) {
        $this->cargopre = $v;
        $this->modifiedColumns[] = LiregofePeer::CARGOPRE;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiregofePeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiregofePeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LiregofePeer::ANAPOR;
      }
  
	} 
	
	public function setCargoana($v)
	{

    if ($this->cargoana !== $v) {
        $this->cargoana = $v;
        $this->modifiedColumns[] = LiregofePeer::CARGOANA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiregofePeer::STATUS;
      }
  
	} 
	
	public function setMonofe($v)
	{

    if ($this->monofe !== $v) {
        $this->monofe = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregofePeer::MONOFE;
      }
  
	} 
	
	public function setMonrecofe($v)
	{

    if ($this->monrecofe !== $v) {
        $this->monrecofe = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregofePeer::MONRECOFE;
      }
  
	} 
	
	public function setPorvan($v)
	{

    if ($this->porvan !== $v) {
        $this->porvan = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregofePeer::PORVAN;
      }
  
	} 
	
	public function setDeclar($v)
	{

    if ($this->declar !== $v) {
        $this->declar = $v;
        $this->modifiedColumns[] = LiregofePeer::DECLAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiregofePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numofe = $rs->getString($startcol + 0);

      $this->numplie = $rs->getString($startcol + 1);

      $this->numexp = $rs->getString($startcol + 2);

      $this->codempadm = $rs->getString($startcol + 3);

      $this->coduniadm = $rs->getString($startcol + 4);

      $this->codempeje = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->fecreg = $rs->getDate($startcol + 7, null);

      $this->dias = $rs->getInt($startcol + 8);

      $this->fecven = $rs->getDate($startcol + 9, null);

      $this->codpro = $rs->getString($startcol + 10);

      $this->codtipemp = $rs->getString($startcol + 11);

      $this->ofenro = $rs->getString($startcol + 12);

      $this->fecofe = $rs->getDate($startcol + 13, null);

      $this->docane1 = $rs->getString($startcol + 14);

      $this->docane2 = $rs->getString($startcol + 15);

      $this->docane3 = $rs->getString($startcol + 16);

      $this->docane4 = $rs->getString($startcol + 17);

      $this->prepor = $rs->getString($startcol + 18);

      $this->cargopre = $rs->getString($startcol + 19);

      $this->lisicact_id = $rs->getInt($startcol + 20);

      $this->detdecmod = $rs->getString($startcol + 21);

      $this->anapor = $rs->getString($startcol + 22);

      $this->cargoana = $rs->getString($startcol + 23);

      $this->status = $rs->getString($startcol + 24);

      $this->monofe = $rs->getFloat($startcol + 25);

      $this->monrecofe = $rs->getFloat($startcol + 26);

      $this->porvan = $rs->getFloat($startcol + 27);

      $this->declar = $rs->getString($startcol + 28);

      $this->id = $rs->getInt($startcol + 29);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 30; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liregofe object", $e);
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
			$con = Propel::getConnection(LiregofePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiregofePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiregofePeer::DATABASE_NAME);
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
					$pk = LiregofePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiregofePeer::doUpdate($this, $con);
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


			if (($retval = LiregofePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregofePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumofe();
				break;
			case 1:
				return $this->getNumplie();
				break;
			case 2:
				return $this->getNumexp();
				break;
			case 3:
				return $this->getCodempadm();
				break;
			case 4:
				return $this->getCoduniadm();
				break;
			case 5:
				return $this->getCodempeje();
				break;
			case 6:
				return $this->getCoduniste();
				break;
			case 7:
				return $this->getFecreg();
				break;
			case 8:
				return $this->getDias();
				break;
			case 9:
				return $this->getFecven();
				break;
			case 10:
				return $this->getCodpro();
				break;
			case 11:
				return $this->getCodtipemp();
				break;
			case 12:
				return $this->getOfenro();
				break;
			case 13:
				return $this->getFecofe();
				break;
			case 14:
				return $this->getDocane1();
				break;
			case 15:
				return $this->getDocane2();
				break;
			case 16:
				return $this->getDocane3();
				break;
			case 17:
				return $this->getDocane4();
				break;
			case 18:
				return $this->getPrepor();
				break;
			case 19:
				return $this->getCargopre();
				break;
			case 20:
				return $this->getLisicactId();
				break;
			case 21:
				return $this->getDetdecmod();
				break;
			case 22:
				return $this->getAnapor();
				break;
			case 23:
				return $this->getCargoana();
				break;
			case 24:
				return $this->getStatus();
				break;
			case 25:
				return $this->getMonofe();
				break;
			case 26:
				return $this->getMonrecofe();
				break;
			case 27:
				return $this->getPorvan();
				break;
			case 28:
				return $this->getDeclar();
				break;
			case 29:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregofePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumofe(),
			$keys[1] => $this->getNumplie(),
			$keys[2] => $this->getNumexp(),
			$keys[3] => $this->getCodempadm(),
			$keys[4] => $this->getCoduniadm(),
			$keys[5] => $this->getCodempeje(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getFecreg(),
			$keys[8] => $this->getDias(),
			$keys[9] => $this->getFecven(),
			$keys[10] => $this->getCodpro(),
			$keys[11] => $this->getCodtipemp(),
			$keys[12] => $this->getOfenro(),
			$keys[13] => $this->getFecofe(),
			$keys[14] => $this->getDocane1(),
			$keys[15] => $this->getDocane2(),
			$keys[16] => $this->getDocane3(),
			$keys[17] => $this->getDocane4(),
			$keys[18] => $this->getPrepor(),
			$keys[19] => $this->getCargopre(),
			$keys[20] => $this->getLisicactId(),
			$keys[21] => $this->getDetdecmod(),
			$keys[22] => $this->getAnapor(),
			$keys[23] => $this->getCargoana(),
			$keys[24] => $this->getStatus(),
			$keys[25] => $this->getMonofe(),
			$keys[26] => $this->getMonrecofe(),
			$keys[27] => $this->getPorvan(),
			$keys[28] => $this->getDeclar(),
			$keys[29] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregofePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumofe($value);
				break;
			case 1:
				$this->setNumplie($value);
				break;
			case 2:
				$this->setNumexp($value);
				break;
			case 3:
				$this->setCodempadm($value);
				break;
			case 4:
				$this->setCoduniadm($value);
				break;
			case 5:
				$this->setCodempeje($value);
				break;
			case 6:
				$this->setCoduniste($value);
				break;
			case 7:
				$this->setFecreg($value);
				break;
			case 8:
				$this->setDias($value);
				break;
			case 9:
				$this->setFecven($value);
				break;
			case 10:
				$this->setCodpro($value);
				break;
			case 11:
				$this->setCodtipemp($value);
				break;
			case 12:
				$this->setOfenro($value);
				break;
			case 13:
				$this->setFecofe($value);
				break;
			case 14:
				$this->setDocane1($value);
				break;
			case 15:
				$this->setDocane2($value);
				break;
			case 16:
				$this->setDocane3($value);
				break;
			case 17:
				$this->setDocane4($value);
				break;
			case 18:
				$this->setPrepor($value);
				break;
			case 19:
				$this->setCargopre($value);
				break;
			case 20:
				$this->setLisicactId($value);
				break;
			case 21:
				$this->setDetdecmod($value);
				break;
			case 22:
				$this->setAnapor($value);
				break;
			case 23:
				$this->setCargoana($value);
				break;
			case 24:
				$this->setStatus($value);
				break;
			case 25:
				$this->setMonofe($value);
				break;
			case 26:
				$this->setMonrecofe($value);
				break;
			case 27:
				$this->setPorvan($value);
				break;
			case 28:
				$this->setDeclar($value);
				break;
			case 29:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregofePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumofe($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumplie($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumexp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempeje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecreg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDias($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecven($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodpro($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodtipemp($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setOfenro($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecofe($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDocane1($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDocane2($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDocane3($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDocane4($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPrepor($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCargopre($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setLisicactId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDetdecmod($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setAnapor($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCargoana($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setStatus($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setMonofe($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setMonrecofe($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setPorvan($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setDeclar($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setId($arr[$keys[29]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiregofePeer::DATABASE_NAME);

		if ($this->isColumnModified(LiregofePeer::NUMOFE)) $criteria->add(LiregofePeer::NUMOFE, $this->numofe);
		if ($this->isColumnModified(LiregofePeer::NUMPLIE)) $criteria->add(LiregofePeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LiregofePeer::NUMEXP)) $criteria->add(LiregofePeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LiregofePeer::CODEMPADM)) $criteria->add(LiregofePeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiregofePeer::CODUNIADM)) $criteria->add(LiregofePeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiregofePeer::CODEMPEJE)) $criteria->add(LiregofePeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiregofePeer::CODUNISTE)) $criteria->add(LiregofePeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiregofePeer::FECREG)) $criteria->add(LiregofePeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LiregofePeer::DIAS)) $criteria->add(LiregofePeer::DIAS, $this->dias);
		if ($this->isColumnModified(LiregofePeer::FECVEN)) $criteria->add(LiregofePeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiregofePeer::CODPRO)) $criteria->add(LiregofePeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LiregofePeer::CODTIPEMP)) $criteria->add(LiregofePeer::CODTIPEMP, $this->codtipemp);
		if ($this->isColumnModified(LiregofePeer::OFENRO)) $criteria->add(LiregofePeer::OFENRO, $this->ofenro);
		if ($this->isColumnModified(LiregofePeer::FECOFE)) $criteria->add(LiregofePeer::FECOFE, $this->fecofe);
		if ($this->isColumnModified(LiregofePeer::DOCANE1)) $criteria->add(LiregofePeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiregofePeer::DOCANE2)) $criteria->add(LiregofePeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiregofePeer::DOCANE3)) $criteria->add(LiregofePeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiregofePeer::DOCANE4)) $criteria->add(LiregofePeer::DOCANE4, $this->docane4);
		if ($this->isColumnModified(LiregofePeer::PREPOR)) $criteria->add(LiregofePeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiregofePeer::CARGOPRE)) $criteria->add(LiregofePeer::CARGOPRE, $this->cargopre);
		if ($this->isColumnModified(LiregofePeer::LISICACT_ID)) $criteria->add(LiregofePeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiregofePeer::DETDECMOD)) $criteria->add(LiregofePeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiregofePeer::ANAPOR)) $criteria->add(LiregofePeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LiregofePeer::CARGOANA)) $criteria->add(LiregofePeer::CARGOANA, $this->cargoana);
		if ($this->isColumnModified(LiregofePeer::STATUS)) $criteria->add(LiregofePeer::STATUS, $this->status);
		if ($this->isColumnModified(LiregofePeer::MONOFE)) $criteria->add(LiregofePeer::MONOFE, $this->monofe);
		if ($this->isColumnModified(LiregofePeer::MONRECOFE)) $criteria->add(LiregofePeer::MONRECOFE, $this->monrecofe);
		if ($this->isColumnModified(LiregofePeer::PORVAN)) $criteria->add(LiregofePeer::PORVAN, $this->porvan);
		if ($this->isColumnModified(LiregofePeer::DECLAR)) $criteria->add(LiregofePeer::DECLAR, $this->declar);
		if ($this->isColumnModified(LiregofePeer::ID)) $criteria->add(LiregofePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiregofePeer::DATABASE_NAME);

		$criteria->add(LiregofePeer::ID, $this->id);

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

		$copyObj->setNumofe($this->numofe);

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodtipemp($this->codtipemp);

		$copyObj->setOfenro($this->ofenro);

		$copyObj->setFecofe($this->fecofe);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setDocane4($this->docane4);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setCargopre($this->cargopre);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setCargoana($this->cargoana);

		$copyObj->setStatus($this->status);

		$copyObj->setMonofe($this->monofe);

		$copyObj->setMonrecofe($this->monrecofe);

		$copyObj->setPorvan($this->porvan);

		$copyObj->setDeclar($this->declar);


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
			self::$peer = new LiregofePeer();
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