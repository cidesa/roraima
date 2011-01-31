<?php


abstract class BaseCobtransa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $fectra;


	
	protected $codcli;


	
	protected $destra;


	
	protected $montra;


	
	protected $totdsc;


	
	protected $totrec;


	
	protected $tottra;


	
	protected $status;


	
	protected $numcom;


	
	protected $feccom;


	
	protected $fatipmov_id;


	
	protected $id;

	
	protected $aFatipmov;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumtra()
  {

    return trim($this->numtra);

  }
  
  public function getFectra($format = 'Y-m-d')
  {

    if ($this->fectra === null || $this->fectra === '') {
      return null;
    } elseif (!is_int($this->fectra)) {
            $ts = adodb_strtotime($this->fectra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
      }
    } else {
      $ts = $this->fectra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getDestra()
  {

    return trim($this->destra);

  }
  
  public function getMontra($val=false)
  {

    if($val) return number_format($this->montra,2,',','.');
    else return $this->montra;

  }
  
  public function getTotdsc($val=false)
  {

    if($val) return number_format($this->totdsc,2,',','.');
    else return $this->totdsc;

  }
  
  public function getTotrec($val=false)
  {

    if($val) return number_format($this->totrec,2,',','.');
    else return $this->totrec;

  }
  
  public function getTottra($val=false)
  {

    if($val) return number_format($this->tottra,2,',','.');
    else return $this->tottra;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFatipmovId()
  {

    return $this->fatipmov_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumtra($v)
	{

    if ($this->numtra !== $v) {
        $this->numtra = $v;
        $this->modifiedColumns[] = CobtransaPeer::NUMTRA;
      }
  
	} 
	
	public function setFectra($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectra !== $ts) {
      $this->fectra = $ts;
      $this->modifiedColumns[] = CobtransaPeer::FECTRA;
    }

	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = CobtransaPeer::CODCLI;
      }
  
	} 
	
	public function setDestra($v)
	{

    if ($this->destra !== $v) {
        $this->destra = $v;
        $this->modifiedColumns[] = CobtransaPeer::DESTRA;
      }
  
	} 
	
	public function setMontra($v)
	{

    if ($this->montra !== $v) {
        $this->montra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobtransaPeer::MONTRA;
      }
  
	} 
	
	public function setTotdsc($v)
	{

    if ($this->totdsc !== $v) {
        $this->totdsc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobtransaPeer::TOTDSC;
      }
  
	} 
	
	public function setTotrec($v)
	{

    if ($this->totrec !== $v) {
        $this->totrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobtransaPeer::TOTREC;
      }
  
	} 
	
	public function setTottra($v)
	{

    if ($this->tottra !== $v) {
        $this->tottra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobtransaPeer::TOTTRA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = CobtransaPeer::STATUS;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = CobtransaPeer::NUMCOM;
      }
  
	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = CobtransaPeer::FECCOM;
    }

	} 
	
	public function setFatipmovId($v)
	{

    if ($this->fatipmov_id !== $v) {
        $this->fatipmov_id = $v;
        $this->modifiedColumns[] = CobtransaPeer::FATIPMOV_ID;
      }
  
		if ($this->aFatipmov !== null && $this->aFatipmov->getId() !== $v) {
			$this->aFatipmov = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CobtransaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numtra = $rs->getString($startcol + 0);

      $this->fectra = $rs->getDate($startcol + 1, null);

      $this->codcli = $rs->getString($startcol + 2);

      $this->destra = $rs->getString($startcol + 3);

      $this->montra = $rs->getFloat($startcol + 4);

      $this->totdsc = $rs->getFloat($startcol + 5);

      $this->totrec = $rs->getFloat($startcol + 6);

      $this->tottra = $rs->getFloat($startcol + 7);

      $this->status = $rs->getString($startcol + 8);

      $this->numcom = $rs->getString($startcol + 9);

      $this->feccom = $rs->getDate($startcol + 10, null);

      $this->fatipmov_id = $rs->getInt($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cobtransa object", $e);
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
			$con = Propel::getConnection(CobtransaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobtransaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobtransaPeer::DATABASE_NAME);
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


												
			if ($this->aFatipmov !== null) {
				if ($this->aFatipmov->isModified()) {
					$affectedRows += $this->aFatipmov->save($con);
				}
				$this->setFatipmov($this->aFatipmov);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CobtransaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CobtransaPeer::doUpdate($this, $con);
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


												
			if ($this->aFatipmov !== null) {
				if (!$this->aFatipmov->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFatipmov->getValidationFailures());
				}
			}


			if (($retval = CobtransaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobtransaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getFectra();
				break;
			case 2:
				return $this->getCodcli();
				break;
			case 3:
				return $this->getDestra();
				break;
			case 4:
				return $this->getMontra();
				break;
			case 5:
				return $this->getTotdsc();
				break;
			case 6:
				return $this->getTotrec();
				break;
			case 7:
				return $this->getTottra();
				break;
			case 8:
				return $this->getStatus();
				break;
			case 9:
				return $this->getNumcom();
				break;
			case 10:
				return $this->getFeccom();
				break;
			case 11:
				return $this->getFatipmovId();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobtransaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getFectra(),
			$keys[2] => $this->getCodcli(),
			$keys[3] => $this->getDestra(),
			$keys[4] => $this->getMontra(),
			$keys[5] => $this->getTotdsc(),
			$keys[6] => $this->getTotrec(),
			$keys[7] => $this->getTottra(),
			$keys[8] => $this->getStatus(),
			$keys[9] => $this->getNumcom(),
			$keys[10] => $this->getFeccom(),
			$keys[11] => $this->getFatipmovId(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobtransaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setFectra($value);
				break;
			case 2:
				$this->setCodcli($value);
				break;
			case 3:
				$this->setDestra($value);
				break;
			case 4:
				$this->setMontra($value);
				break;
			case 5:
				$this->setTotdsc($value);
				break;
			case 6:
				$this->setTotrec($value);
				break;
			case 7:
				$this->setTottra($value);
				break;
			case 8:
				$this->setStatus($value);
				break;
			case 9:
				$this->setNumcom($value);
				break;
			case 10:
				$this->setFeccom($value);
				break;
			case 11:
				$this->setFatipmovId($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobtransaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDestra($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMontra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotdsc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotrec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTottra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStatus($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumcom($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFeccom($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFatipmovId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobtransaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobtransaPeer::NUMTRA)) $criteria->add(CobtransaPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(CobtransaPeer::FECTRA)) $criteria->add(CobtransaPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(CobtransaPeer::CODCLI)) $criteria->add(CobtransaPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobtransaPeer::DESTRA)) $criteria->add(CobtransaPeer::DESTRA, $this->destra);
		if ($this->isColumnModified(CobtransaPeer::MONTRA)) $criteria->add(CobtransaPeer::MONTRA, $this->montra);
		if ($this->isColumnModified(CobtransaPeer::TOTDSC)) $criteria->add(CobtransaPeer::TOTDSC, $this->totdsc);
		if ($this->isColumnModified(CobtransaPeer::TOTREC)) $criteria->add(CobtransaPeer::TOTREC, $this->totrec);
		if ($this->isColumnModified(CobtransaPeer::TOTTRA)) $criteria->add(CobtransaPeer::TOTTRA, $this->tottra);
		if ($this->isColumnModified(CobtransaPeer::STATUS)) $criteria->add(CobtransaPeer::STATUS, $this->status);
		if ($this->isColumnModified(CobtransaPeer::NUMCOM)) $criteria->add(CobtransaPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CobtransaPeer::FECCOM)) $criteria->add(CobtransaPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(CobtransaPeer::FATIPMOV_ID)) $criteria->add(CobtransaPeer::FATIPMOV_ID, $this->fatipmov_id);
		if ($this->isColumnModified(CobtransaPeer::ID)) $criteria->add(CobtransaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobtransaPeer::DATABASE_NAME);

		$criteria->add(CobtransaPeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setFectra($this->fectra);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setDestra($this->destra);

		$copyObj->setMontra($this->montra);

		$copyObj->setTotdsc($this->totdsc);

		$copyObj->setTotrec($this->totrec);

		$copyObj->setTottra($this->tottra);

		$copyObj->setStatus($this->status);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setFatipmovId($this->fatipmov_id);


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
			self::$peer = new CobtransaPeer();
		}
		return self::$peer;
	}

	
	public function setFatipmov($v)
	{


		if ($v === null) {
			$this->setFatipmovId(NULL);
		} else {
			$this->setFatipmovId($v->getId());
		}


		$this->aFatipmov = $v;
	}


	
	public function getFatipmov($con = null)
	{
		if ($this->aFatipmov === null && ($this->fatipmov_id !== null)) {
						include_once 'lib/model/om/BaseFatipmovPeer.php';

			$this->aFatipmov = FatipmovPeer::retrieveByPK($this->fatipmov_id, $con);

			
		}
		return $this->aFatipmov;
	}

} 