<?php


abstract class BaseBndisinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codmue;


	
	protected $nrodisinm;


	
	protected $motdisinm;


	
	protected $tipdisinm;


	
	protected $fecdisinm;


	
	protected $fecdevdis;


	
	protected $mondisinm;


	
	protected $detdisinm;


	
	protected $codubiori;


	
	protected $codubides;


	
	protected $obsdisinm;


	
	protected $stadisinm;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodmue()
  {

    return trim($this->codmue);

  }
  
  public function getNrodisinm()
  {

    return trim($this->nrodisinm);

  }
  
  public function getMotdisinm()
  {

    return trim($this->motdisinm);

  }
  
  public function getTipdisinm()
  {

    return trim($this->tipdisinm);

  }
  
  public function getFecdisinm($format = 'Y-m-d')
  {

    if ($this->fecdisinm === null || $this->fecdisinm === '') {
      return null;
    } elseif (!is_int($this->fecdisinm)) {
            $ts = adodb_strtotime($this->fecdisinm);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdisinm] as date/time value: " . var_export($this->fecdisinm, true));
      }
    } else {
      $ts = $this->fecdisinm;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecdevdis($format = 'Y-m-d')
  {

    if ($this->fecdevdis === null || $this->fecdevdis === '') {
      return null;
    } elseif (!is_int($this->fecdevdis)) {
            $ts = adodb_strtotime($this->fecdevdis);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdevdis] as date/time value: " . var_export($this->fecdevdis, true));
      }
    } else {
      $ts = $this->fecdevdis;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMondisinm($val=false)
  {

    if($val) return number_format($this->mondisinm,2,',','.');
    else return $this->mondisinm;

  }
  
  public function getDetdisinm()
  {

    return trim($this->detdisinm);

  }
  
  public function getCodubiori()
  {

    return trim($this->codubiori);

  }
  
  public function getCodubides()
  {

    return trim($this->codubides);

  }
  
  public function getObsdisinm()
  {

    return trim($this->obsdisinm);

  }
  
  public function getStadisinm()
  {

    return trim($this->stadisinm);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = BndisinmPeer::CODACT;
      }
  
	} 
	
	public function setCodmue($v)
	{

    if ($this->codmue !== $v) {
        $this->codmue = $v;
        $this->modifiedColumns[] = BndisinmPeer::CODMUE;
      }
  
	} 
	
	public function setNrodisinm($v)
	{

    if ($this->nrodisinm !== $v) {
        $this->nrodisinm = $v;
        $this->modifiedColumns[] = BndisinmPeer::NRODISINM;
      }
  
	} 
	
	public function setMotdisinm($v)
	{

    if ($this->motdisinm !== $v) {
        $this->motdisinm = $v;
        $this->modifiedColumns[] = BndisinmPeer::MOTDISINM;
      }
  
	} 
	
	public function setTipdisinm($v)
	{

    if ($this->tipdisinm !== $v) {
        $this->tipdisinm = $v;
        $this->modifiedColumns[] = BndisinmPeer::TIPDISINM;
      }
  
	} 
	
	public function setFecdisinm($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdisinm] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdisinm !== $ts) {
      $this->fecdisinm = $ts;
      $this->modifiedColumns[] = BndisinmPeer::FECDISINM;
    }

	} 
	
	public function setFecdevdis($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdevdis] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdevdis !== $ts) {
      $this->fecdevdis = $ts;
      $this->modifiedColumns[] = BndisinmPeer::FECDEVDIS;
    }

	} 
	
	public function setMondisinm($v)
	{

    if ($this->mondisinm !== $v) {
        $this->mondisinm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BndisinmPeer::MONDISINM;
      }
  
	} 
	
	public function setDetdisinm($v)
	{

    if ($this->detdisinm !== $v) {
        $this->detdisinm = $v;
        $this->modifiedColumns[] = BndisinmPeer::DETDISINM;
      }
  
	} 
	
	public function setCodubiori($v)
	{

    if ($this->codubiori !== $v) {
        $this->codubiori = $v;
        $this->modifiedColumns[] = BndisinmPeer::CODUBIORI;
      }
  
	} 
	
	public function setCodubides($v)
	{

    if ($this->codubides !== $v) {
        $this->codubides = $v;
        $this->modifiedColumns[] = BndisinmPeer::CODUBIDES;
      }
  
	} 
	
	public function setObsdisinm($v)
	{

    if ($this->obsdisinm !== $v) {
        $this->obsdisinm = $v;
        $this->modifiedColumns[] = BndisinmPeer::OBSDISINM;
      }
  
	} 
	
	public function setStadisinm($v)
	{

    if ($this->stadisinm !== $v) {
        $this->stadisinm = $v;
        $this->modifiedColumns[] = BndisinmPeer::STADISINM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BndisinmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->codmue = $rs->getString($startcol + 1);

      $this->nrodisinm = $rs->getString($startcol + 2);

      $this->motdisinm = $rs->getString($startcol + 3);

      $this->tipdisinm = $rs->getString($startcol + 4);

      $this->fecdisinm = $rs->getDate($startcol + 5, null);

      $this->fecdevdis = $rs->getDate($startcol + 6, null);

      $this->mondisinm = $rs->getFloat($startcol + 7);

      $this->detdisinm = $rs->getString($startcol + 8);

      $this->codubiori = $rs->getString($startcol + 9);

      $this->codubides = $rs->getString($startcol + 10);

      $this->obsdisinm = $rs->getString($startcol + 11);

      $this->stadisinm = $rs->getString($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bndisinm object", $e);
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
			$con = Propel::getConnection(BndisinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndisinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndisinmPeer::DATABASE_NAME);
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
					$pk = BndisinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BndisinmPeer::doUpdate($this, $con);
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


			if (($retval = BndisinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndisinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodmue();
				break;
			case 2:
				return $this->getNrodisinm();
				break;
			case 3:
				return $this->getMotdisinm();
				break;
			case 4:
				return $this->getTipdisinm();
				break;
			case 5:
				return $this->getFecdisinm();
				break;
			case 6:
				return $this->getFecdevdis();
				break;
			case 7:
				return $this->getMondisinm();
				break;
			case 8:
				return $this->getDetdisinm();
				break;
			case 9:
				return $this->getCodubiori();
				break;
			case 10:
				return $this->getCodubides();
				break;
			case 11:
				return $this->getObsdisinm();
				break;
			case 12:
				return $this->getStadisinm();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndisinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodmue(),
			$keys[2] => $this->getNrodisinm(),
			$keys[3] => $this->getMotdisinm(),
			$keys[4] => $this->getTipdisinm(),
			$keys[5] => $this->getFecdisinm(),
			$keys[6] => $this->getFecdevdis(),
			$keys[7] => $this->getMondisinm(),
			$keys[8] => $this->getDetdisinm(),
			$keys[9] => $this->getCodubiori(),
			$keys[10] => $this->getCodubides(),
			$keys[11] => $this->getObsdisinm(),
			$keys[12] => $this->getStadisinm(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndisinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodmue($value);
				break;
			case 2:
				$this->setNrodisinm($value);
				break;
			case 3:
				$this->setMotdisinm($value);
				break;
			case 4:
				$this->setTipdisinm($value);
				break;
			case 5:
				$this->setFecdisinm($value);
				break;
			case 6:
				$this->setFecdevdis($value);
				break;
			case 7:
				$this->setMondisinm($value);
				break;
			case 8:
				$this->setDetdisinm($value);
				break;
			case 9:
				$this->setCodubiori($value);
				break;
			case 10:
				$this->setCodubides($value);
				break;
			case 11:
				$this->setObsdisinm($value);
				break;
			case 12:
				$this->setStadisinm($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndisinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNrodisinm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMotdisinm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipdisinm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecdisinm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecdevdis($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondisinm($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDetdisinm($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodubiori($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodubides($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setObsdisinm($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStadisinm($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndisinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndisinmPeer::CODACT)) $criteria->add(BndisinmPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndisinmPeer::CODMUE)) $criteria->add(BndisinmPeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BndisinmPeer::NRODISINM)) $criteria->add(BndisinmPeer::NRODISINM, $this->nrodisinm);
		if ($this->isColumnModified(BndisinmPeer::MOTDISINM)) $criteria->add(BndisinmPeer::MOTDISINM, $this->motdisinm);
		if ($this->isColumnModified(BndisinmPeer::TIPDISINM)) $criteria->add(BndisinmPeer::TIPDISINM, $this->tipdisinm);
		if ($this->isColumnModified(BndisinmPeer::FECDISINM)) $criteria->add(BndisinmPeer::FECDISINM, $this->fecdisinm);
		if ($this->isColumnModified(BndisinmPeer::FECDEVDIS)) $criteria->add(BndisinmPeer::FECDEVDIS, $this->fecdevdis);
		if ($this->isColumnModified(BndisinmPeer::MONDISINM)) $criteria->add(BndisinmPeer::MONDISINM, $this->mondisinm);
		if ($this->isColumnModified(BndisinmPeer::DETDISINM)) $criteria->add(BndisinmPeer::DETDISINM, $this->detdisinm);
		if ($this->isColumnModified(BndisinmPeer::CODUBIORI)) $criteria->add(BndisinmPeer::CODUBIORI, $this->codubiori);
		if ($this->isColumnModified(BndisinmPeer::CODUBIDES)) $criteria->add(BndisinmPeer::CODUBIDES, $this->codubides);
		if ($this->isColumnModified(BndisinmPeer::OBSDISINM)) $criteria->add(BndisinmPeer::OBSDISINM, $this->obsdisinm);
		if ($this->isColumnModified(BndisinmPeer::STADISINM)) $criteria->add(BndisinmPeer::STADISINM, $this->stadisinm);
		if ($this->isColumnModified(BndisinmPeer::ID)) $criteria->add(BndisinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndisinmPeer::DATABASE_NAME);

		$criteria->add(BndisinmPeer::ID, $this->id);

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

		$copyObj->setCodmue($this->codmue);

		$copyObj->setNrodisinm($this->nrodisinm);

		$copyObj->setMotdisinm($this->motdisinm);

		$copyObj->setTipdisinm($this->tipdisinm);

		$copyObj->setFecdisinm($this->fecdisinm);

		$copyObj->setFecdevdis($this->fecdevdis);

		$copyObj->setMondisinm($this->mondisinm);

		$copyObj->setDetdisinm($this->detdisinm);

		$copyObj->setCodubiori($this->codubiori);

		$copyObj->setCodubides($this->codubides);

		$copyObj->setObsdisinm($this->obsdisinm);

		$copyObj->setStadisinm($this->stadisinm);


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
			self::$peer = new BndisinmPeer();
		}
		return self::$peer;
	}

} 