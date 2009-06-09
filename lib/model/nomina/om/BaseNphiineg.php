<?php


abstract class BaseNphiineg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecing;


	
	protected $fecegr;


	
	protected $observ;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecing($format = 'Y-m-d')
  {

    if ($this->fecing === null || $this->fecing === '') {
      return null;
    } elseif (!is_int($this->fecing)) {
            $ts = adodb_strtotime($this->fecing);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
      }
    } else {
      $ts = $this->fecing;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecegr($format = 'Y-m-d')
  {

    if ($this->fecegr === null || $this->fecegr === '') {
      return null;
    } elseif (!is_int($this->fecegr)) {
            $ts = adodb_strtotime($this->fecegr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecegr] as date/time value: " . var_export($this->fecegr, true));
      }
    } else {
      $ts = $this->fecegr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NphiinegPeer::CODEMP;
      }
  
	} 
	
	public function setFecing($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecing !== $ts) {
      $this->fecing = $ts;
      $this->modifiedColumns[] = NphiinegPeer::FECING;
    }

	} 
	
	public function setFecegr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecegr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecegr !== $ts) {
      $this->fecegr = $ts;
      $this->modifiedColumns[] = NphiinegPeer::FECEGR;
    }

	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = NphiinegPeer::OBSERV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NphiinegPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->fecing = $rs->getDate($startcol + 1, null);

      $this->fecegr = $rs->getDate($startcol + 2, null);

      $this->observ = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nphiineg object", $e);
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
			$con = Propel::getConnection(NphiinegPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NphiinegPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NphiinegPeer::DATABASE_NAME);
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
					$pk = NphiinegPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NphiinegPeer::doUpdate($this, $con);
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


			if (($retval = NphiinegPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphiinegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecing();
				break;
			case 2:
				return $this->getFecegr();
				break;
			case 3:
				return $this->getObserv();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphiinegPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecing(),
			$keys[2] => $this->getFecegr(),
			$keys[3] => $this->getObserv(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphiinegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecing($value);
				break;
			case 2:
				$this->setFecegr($value);
				break;
			case 3:
				$this->setObserv($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphiinegPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecing($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecegr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObserv($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NphiinegPeer::DATABASE_NAME);

		if ($this->isColumnModified(NphiinegPeer::CODEMP)) $criteria->add(NphiinegPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NphiinegPeer::FECING)) $criteria->add(NphiinegPeer::FECING, $this->fecing);
		if ($this->isColumnModified(NphiinegPeer::FECEGR)) $criteria->add(NphiinegPeer::FECEGR, $this->fecegr);
		if ($this->isColumnModified(NphiinegPeer::OBSERV)) $criteria->add(NphiinegPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(NphiinegPeer::ID)) $criteria->add(NphiinegPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NphiinegPeer::DATABASE_NAME);

		$criteria->add(NphiinegPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecing($this->fecing);

		$copyObj->setFecegr($this->fecegr);

		$copyObj->setObserv($this->observ);


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
			self::$peer = new NphiinegPeer();
		}
		return self::$peer;
	}

} 