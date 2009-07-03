<?php


abstract class BaseNpbenefiemb extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedrif;


	
	protected $nomben;


	
	protected $fecnacben;


	
	protected $fecreg;


	
	protected $dirben;


	
	protected $telben;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getFecnacben($format = 'Y-m-d')
  {

    if ($this->fecnacben === null || $this->fecnacben === '') {
      return null;
    } elseif (!is_int($this->fecnacben)) {
            $ts = adodb_strtotime($this->fecnacben);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnacben] as date/time value: " . var_export($this->fecnacben, true));
      }
    } else {
      $ts = $this->fecnacben;
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

  
  public function getDirben()
  {

    return trim($this->dirben);

  }
  
  public function getTelben()
  {

    return trim($this->telben);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = NpbenefiembPeer::CEDRIF;
      }
  
	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = NpbenefiembPeer::NOMBEN;
      }
  
	} 
	
	public function setFecnacben($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnacben] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnacben !== $ts) {
      $this->fecnacben = $ts;
      $this->modifiedColumns[] = NpbenefiembPeer::FECNACBEN;
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
      $this->modifiedColumns[] = NpbenefiembPeer::FECREG;
    }

	} 
	
	public function setDirben($v)
	{

    if ($this->dirben !== $v) {
        $this->dirben = $v;
        $this->modifiedColumns[] = NpbenefiembPeer::DIRBEN;
      }
  
	} 
	
	public function setTelben($v)
	{

    if ($this->telben !== $v) {
        $this->telben = $v;
        $this->modifiedColumns[] = NpbenefiembPeer::TELBEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpbenefiembPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedrif = $rs->getString($startcol + 0);

      $this->nomben = $rs->getString($startcol + 1);

      $this->fecnacben = $rs->getDate($startcol + 2, null);

      $this->fecreg = $rs->getDate($startcol + 3, null);

      $this->dirben = $rs->getString($startcol + 4);

      $this->telben = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npbenefiemb object", $e);
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
			$con = Propel::getConnection(NpbenefiembPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpbenefiembPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpbenefiembPeer::DATABASE_NAME);
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
					$pk = NpbenefiembPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpbenefiembPeer::doUpdate($this, $con);
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


			if (($retval = NpbenefiembPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpbenefiembPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedrif();
				break;
			case 1:
				return $this->getNomben();
				break;
			case 2:
				return $this->getFecnacben();
				break;
			case 3:
				return $this->getFecreg();
				break;
			case 4:
				return $this->getDirben();
				break;
			case 5:
				return $this->getTelben();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpbenefiembPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedrif(),
			$keys[1] => $this->getNomben(),
			$keys[2] => $this->getFecnacben(),
			$keys[3] => $this->getFecreg(),
			$keys[4] => $this->getDirben(),
			$keys[5] => $this->getTelben(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpbenefiembPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedrif($value);
				break;
			case 1:
				$this->setNomben($value);
				break;
			case 2:
				$this->setFecnacben($value);
				break;
			case 3:
				$this->setFecreg($value);
				break;
			case 4:
				$this->setDirben($value);
				break;
			case 5:
				$this->setTelben($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpbenefiembPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedrif($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomben($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecnacben($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecreg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDirben($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelben($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpbenefiembPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpbenefiembPeer::CEDRIF)) $criteria->add(NpbenefiembPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(NpbenefiembPeer::NOMBEN)) $criteria->add(NpbenefiembPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(NpbenefiembPeer::FECNACBEN)) $criteria->add(NpbenefiembPeer::FECNACBEN, $this->fecnacben);
		if ($this->isColumnModified(NpbenefiembPeer::FECREG)) $criteria->add(NpbenefiembPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(NpbenefiembPeer::DIRBEN)) $criteria->add(NpbenefiembPeer::DIRBEN, $this->dirben);
		if ($this->isColumnModified(NpbenefiembPeer::TELBEN)) $criteria->add(NpbenefiembPeer::TELBEN, $this->telben);
		if ($this->isColumnModified(NpbenefiembPeer::ID)) $criteria->add(NpbenefiembPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpbenefiembPeer::DATABASE_NAME);

		$criteria->add(NpbenefiembPeer::ID, $this->id);

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

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomben($this->nomben);

		$copyObj->setFecnacben($this->fecnacben);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDirben($this->dirben);

		$copyObj->setTelben($this->telben);


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
			self::$peer = new NpbenefiembPeer();
		}
		return self::$peer;
	}

} 