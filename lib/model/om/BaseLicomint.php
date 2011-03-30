<?php


abstract class BaseLicomint extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcomint;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $tipcon;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $codclacomp;


	
	protected $moncom;


	
	protected $codtiplic;


	
	protected $codmon;


	
	protected $tipcom;


	
	protected $status;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcomint()
  {

    return trim($this->numcomint);

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
  
  public function getTipcon()
  {

    return trim($this->tipcon);

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

  
  public function getCodclacomp()
  {

    return trim($this->codclacomp);

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getCodtiplic()
  {

    return trim($this->codtiplic);

  }
  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcomint($v)
	{

    if ($this->numcomint !== $v) {
        $this->numcomint = $v;
        $this->modifiedColumns[] = LicomintPeer::NUMCOMINT;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LicomintPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LicomintPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LicomintPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LicomintPeer::CODUNISTE;
      }
  
	} 
	
	public function setTipcon($v)
	{

    if ($this->tipcon !== $v) {
        $this->tipcon = $v;
        $this->modifiedColumns[] = LicomintPeer::TIPCON;
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
      $this->modifiedColumns[] = LicomintPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LicomintPeer::DIAS;
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
      $this->modifiedColumns[] = LicomintPeer::FECVEN;
    }

	} 
	
	public function setCodclacomp($v)
	{

    if ($this->codclacomp !== $v) {
        $this->codclacomp = $v;
        $this->modifiedColumns[] = LicomintPeer::CODCLACOMP;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicomintPeer::MONCOM;
      }
  
	} 
	
	public function setCodtiplic($v)
	{

    if ($this->codtiplic !== $v) {
        $this->codtiplic = $v;
        $this->modifiedColumns[] = LicomintPeer::CODTIPLIC;
      }
  
	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = LicomintPeer::CODMON;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = LicomintPeer::TIPCOM;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LicomintPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LicomintPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcomint = $rs->getString($startcol + 0);

      $this->codempadm = $rs->getString($startcol + 1);

      $this->coduniadm = $rs->getString($startcol + 2);

      $this->codempeje = $rs->getString($startcol + 3);

      $this->coduniste = $rs->getString($startcol + 4);

      $this->tipcon = $rs->getString($startcol + 5);

      $this->fecreg = $rs->getDate($startcol + 6, null);

      $this->dias = $rs->getInt($startcol + 7);

      $this->fecven = $rs->getDate($startcol + 8, null);

      $this->codclacomp = $rs->getString($startcol + 9);

      $this->moncom = $rs->getFloat($startcol + 10);

      $this->codtiplic = $rs->getString($startcol + 11);

      $this->codmon = $rs->getString($startcol + 12);

      $this->tipcom = $rs->getString($startcol + 13);

      $this->status = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Licomint object", $e);
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
			$con = Propel::getConnection(LicomintPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LicomintPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LicomintPeer::DATABASE_NAME);
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
					$pk = LicomintPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LicomintPeer::doUpdate($this, $con);
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


			if (($retval = LicomintPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LicomintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcomint();
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
				return $this->getTipcon();
				break;
			case 6:
				return $this->getFecreg();
				break;
			case 7:
				return $this->getDias();
				break;
			case 8:
				return $this->getFecven();
				break;
			case 9:
				return $this->getCodclacomp();
				break;
			case 10:
				return $this->getMoncom();
				break;
			case 11:
				return $this->getCodtiplic();
				break;
			case 12:
				return $this->getCodmon();
				break;
			case 13:
				return $this->getTipcom();
				break;
			case 14:
				return $this->getStatus();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicomintPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcomint(),
			$keys[1] => $this->getCodempadm(),
			$keys[2] => $this->getCoduniadm(),
			$keys[3] => $this->getCodempeje(),
			$keys[4] => $this->getCoduniste(),
			$keys[5] => $this->getTipcon(),
			$keys[6] => $this->getFecreg(),
			$keys[7] => $this->getDias(),
			$keys[8] => $this->getFecven(),
			$keys[9] => $this->getCodclacomp(),
			$keys[10] => $this->getMoncom(),
			$keys[11] => $this->getCodtiplic(),
			$keys[12] => $this->getCodmon(),
			$keys[13] => $this->getTipcom(),
			$keys[14] => $this->getStatus(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LicomintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcomint($value);
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
				$this->setTipcon($value);
				break;
			case 6:
				$this->setFecreg($value);
				break;
			case 7:
				$this->setDias($value);
				break;
			case 8:
				$this->setFecven($value);
				break;
			case 9:
				$this->setCodclacomp($value);
				break;
			case 10:
				$this->setMoncom($value);
				break;
			case 11:
				$this->setCodtiplic($value);
				break;
			case 12:
				$this->setCodmon($value);
				break;
			case 13:
				$this->setTipcom($value);
				break;
			case 14:
				$this->setStatus($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicomintPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcomint($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodempadm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoduniadm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempeje($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniste($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecreg($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDias($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecven($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodclacomp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMoncom($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodtiplic($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodmon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipcom($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setStatus($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LicomintPeer::DATABASE_NAME);

		if ($this->isColumnModified(LicomintPeer::NUMCOMINT)) $criteria->add(LicomintPeer::NUMCOMINT, $this->numcomint);
		if ($this->isColumnModified(LicomintPeer::CODEMPADM)) $criteria->add(LicomintPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LicomintPeer::CODUNIADM)) $criteria->add(LicomintPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LicomintPeer::CODEMPEJE)) $criteria->add(LicomintPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LicomintPeer::CODUNISTE)) $criteria->add(LicomintPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LicomintPeer::TIPCON)) $criteria->add(LicomintPeer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(LicomintPeer::FECREG)) $criteria->add(LicomintPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LicomintPeer::DIAS)) $criteria->add(LicomintPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LicomintPeer::FECVEN)) $criteria->add(LicomintPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LicomintPeer::CODCLACOMP)) $criteria->add(LicomintPeer::CODCLACOMP, $this->codclacomp);
		if ($this->isColumnModified(LicomintPeer::MONCOM)) $criteria->add(LicomintPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(LicomintPeer::CODTIPLIC)) $criteria->add(LicomintPeer::CODTIPLIC, $this->codtiplic);
		if ($this->isColumnModified(LicomintPeer::CODMON)) $criteria->add(LicomintPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(LicomintPeer::TIPCOM)) $criteria->add(LicomintPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(LicomintPeer::STATUS)) $criteria->add(LicomintPeer::STATUS, $this->status);
		if ($this->isColumnModified(LicomintPeer::ID)) $criteria->add(LicomintPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LicomintPeer::DATABASE_NAME);

		$criteria->add(LicomintPeer::ID, $this->id);

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

		$copyObj->setNumcomint($this->numcomint);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCodclacomp($this->codclacomp);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setCodtiplic($this->codtiplic);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setStatus($this->status);


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
			self::$peer = new LicomintPeer();
		}
		return self::$peer;
	}

} 