<?php


abstract class BaseBnsegsem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codsem;


	
	protected $nrosegsem;


	
	protected $fecsegsem;


	
	protected $nomsegsem;


	
	protected $cobsegsem;


	
	protected $monsegsem;


	
	protected $fecsegven;


	
	protected $prosegsem;


	
	protected $obssegsem;


	
	protected $stasegsem;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodsem()
  {

    return trim($this->codsem);

  }
  
  public function getNrosegsem()
  {

    return trim($this->nrosegsem);

  }
  
  public function getFecsegsem($format = 'Y-m-d')
  {

    if ($this->fecsegsem === null || $this->fecsegsem === '') {
      return null;
    } elseif (!is_int($this->fecsegsem)) {
            $ts = adodb_strtotime($this->fecsegsem);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsegsem] as date/time value: " . var_export($this->fecsegsem, true));
      }
    } else {
      $ts = $this->fecsegsem;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNomsegsem()
  {

    return trim($this->nomsegsem);

  }
  
  public function getCobsegsem()
  {

    return trim($this->cobsegsem);

  }
  
  public function getMonsegsem($val=false)
  {

    if($val) return number_format($this->monsegsem,2,',','.');
    else return $this->monsegsem;

  }
  
  public function getFecsegven($format = 'Y-m-d')
  {

    if ($this->fecsegven === null || $this->fecsegven === '') {
      return null;
    } elseif (!is_int($this->fecsegven)) {
            $ts = adodb_strtotime($this->fecsegven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsegven] as date/time value: " . var_export($this->fecsegven, true));
      }
    } else {
      $ts = $this->fecsegven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getProsegsem()
  {

    return trim($this->prosegsem);

  }
  
  public function getObssegsem()
  {

    return trim($this->obssegsem);

  }
  
  public function getStasegsem()
  {

    return trim($this->stasegsem);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = BnsegsemPeer::CODACT;
      }
  
	} 
	
	public function setCodsem($v)
	{

    if ($this->codsem !== $v) {
        $this->codsem = $v;
        $this->modifiedColumns[] = BnsegsemPeer::CODSEM;
      }
  
	} 
	
	public function setNrosegsem($v)
	{

    if ($this->nrosegsem !== $v) {
        $this->nrosegsem = $v;
        $this->modifiedColumns[] = BnsegsemPeer::NROSEGSEM;
      }
  
	} 
	
	public function setFecsegsem($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsegsem] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsegsem !== $ts) {
      $this->fecsegsem = $ts;
      $this->modifiedColumns[] = BnsegsemPeer::FECSEGSEM;
    }

	} 
	
	public function setNomsegsem($v)
	{

    if ($this->nomsegsem !== $v) {
        $this->nomsegsem = $v;
        $this->modifiedColumns[] = BnsegsemPeer::NOMSEGSEM;
      }
  
	} 
	
	public function setCobsegsem($v)
	{

    if ($this->cobsegsem !== $v) {
        $this->cobsegsem = $v;
        $this->modifiedColumns[] = BnsegsemPeer::COBSEGSEM;
      }
  
	} 
	
	public function setMonsegsem($v)
	{

    if ($this->monsegsem !== $v) {
        $this->monsegsem = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnsegsemPeer::MONSEGSEM;
      }
  
	} 
	
	public function setFecsegven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsegven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsegven !== $ts) {
      $this->fecsegven = $ts;
      $this->modifiedColumns[] = BnsegsemPeer::FECSEGVEN;
    }

	} 
	
	public function setProsegsem($v)
	{

    if ($this->prosegsem !== $v) {
        $this->prosegsem = $v;
        $this->modifiedColumns[] = BnsegsemPeer::PROSEGSEM;
      }
  
	} 
	
	public function setObssegsem($v)
	{

    if ($this->obssegsem !== $v) {
        $this->obssegsem = $v;
        $this->modifiedColumns[] = BnsegsemPeer::OBSSEGSEM;
      }
  
	} 
	
	public function setStasegsem($v)
	{

    if ($this->stasegsem !== $v) {
        $this->stasegsem = $v;
        $this->modifiedColumns[] = BnsegsemPeer::STASEGSEM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnsegsemPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->codsem = $rs->getString($startcol + 1);

      $this->nrosegsem = $rs->getString($startcol + 2);

      $this->fecsegsem = $rs->getDate($startcol + 3, null);

      $this->nomsegsem = $rs->getString($startcol + 4);

      $this->cobsegsem = $rs->getString($startcol + 5);

      $this->monsegsem = $rs->getFloat($startcol + 6);

      $this->fecsegven = $rs->getDate($startcol + 7, null);

      $this->prosegsem = $rs->getString($startcol + 8);

      $this->obssegsem = $rs->getString($startcol + 9);

      $this->stasegsem = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnsegsem object", $e);
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
			$con = Propel::getConnection(BnsegsemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnsegsemPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnsegsemPeer::DATABASE_NAME);
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
					$pk = BnsegsemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnsegsemPeer::doUpdate($this, $con);
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


			if (($retval = BnsegsemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnsegsemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodsem();
				break;
			case 2:
				return $this->getNrosegsem();
				break;
			case 3:
				return $this->getFecsegsem();
				break;
			case 4:
				return $this->getNomsegsem();
				break;
			case 5:
				return $this->getCobsegsem();
				break;
			case 6:
				return $this->getMonsegsem();
				break;
			case 7:
				return $this->getFecsegven();
				break;
			case 8:
				return $this->getProsegsem();
				break;
			case 9:
				return $this->getObssegsem();
				break;
			case 10:
				return $this->getStasegsem();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnsegsemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodsem(),
			$keys[2] => $this->getNrosegsem(),
			$keys[3] => $this->getFecsegsem(),
			$keys[4] => $this->getNomsegsem(),
			$keys[5] => $this->getCobsegsem(),
			$keys[6] => $this->getMonsegsem(),
			$keys[7] => $this->getFecsegven(),
			$keys[8] => $this->getProsegsem(),
			$keys[9] => $this->getObssegsem(),
			$keys[10] => $this->getStasegsem(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnsegsemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodsem($value);
				break;
			case 2:
				$this->setNrosegsem($value);
				break;
			case 3:
				$this->setFecsegsem($value);
				break;
			case 4:
				$this->setNomsegsem($value);
				break;
			case 5:
				$this->setCobsegsem($value);
				break;
			case 6:
				$this->setMonsegsem($value);
				break;
			case 7:
				$this->setFecsegven($value);
				break;
			case 8:
				$this->setProsegsem($value);
				break;
			case 9:
				$this->setObssegsem($value);
				break;
			case 10:
				$this->setStasegsem($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnsegsemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodsem($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNrosegsem($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecsegsem($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomsegsem($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCobsegsem($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonsegsem($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecsegven($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setProsegsem($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObssegsem($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStasegsem($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnsegsemPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnsegsemPeer::CODACT)) $criteria->add(BnsegsemPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BnsegsemPeer::CODSEM)) $criteria->add(BnsegsemPeer::CODSEM, $this->codsem);
		if ($this->isColumnModified(BnsegsemPeer::NROSEGSEM)) $criteria->add(BnsegsemPeer::NROSEGSEM, $this->nrosegsem);
		if ($this->isColumnModified(BnsegsemPeer::FECSEGSEM)) $criteria->add(BnsegsemPeer::FECSEGSEM, $this->fecsegsem);
		if ($this->isColumnModified(BnsegsemPeer::NOMSEGSEM)) $criteria->add(BnsegsemPeer::NOMSEGSEM, $this->nomsegsem);
		if ($this->isColumnModified(BnsegsemPeer::COBSEGSEM)) $criteria->add(BnsegsemPeer::COBSEGSEM, $this->cobsegsem);
		if ($this->isColumnModified(BnsegsemPeer::MONSEGSEM)) $criteria->add(BnsegsemPeer::MONSEGSEM, $this->monsegsem);
		if ($this->isColumnModified(BnsegsemPeer::FECSEGVEN)) $criteria->add(BnsegsemPeer::FECSEGVEN, $this->fecsegven);
		if ($this->isColumnModified(BnsegsemPeer::PROSEGSEM)) $criteria->add(BnsegsemPeer::PROSEGSEM, $this->prosegsem);
		if ($this->isColumnModified(BnsegsemPeer::OBSSEGSEM)) $criteria->add(BnsegsemPeer::OBSSEGSEM, $this->obssegsem);
		if ($this->isColumnModified(BnsegsemPeer::STASEGSEM)) $criteria->add(BnsegsemPeer::STASEGSEM, $this->stasegsem);
		if ($this->isColumnModified(BnsegsemPeer::ID)) $criteria->add(BnsegsemPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnsegsemPeer::DATABASE_NAME);

		$criteria->add(BnsegsemPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodsem($this->codsem);

		$copyObj->setNrosegsem($this->nrosegsem);

		$copyObj->setFecsegsem($this->fecsegsem);

		$copyObj->setNomsegsem($this->nomsegsem);

		$copyObj->setCobsegsem($this->cobsegsem);

		$copyObj->setMonsegsem($this->monsegsem);

		$copyObj->setFecsegven($this->fecsegven);

		$copyObj->setProsegsem($this->prosegsem);

		$copyObj->setObssegsem($this->obssegsem);

		$copyObj->setStasegsem($this->stasegsem);


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
			self::$peer = new BnsegsemPeer();
		}
		return self::$peer;
	}

} 