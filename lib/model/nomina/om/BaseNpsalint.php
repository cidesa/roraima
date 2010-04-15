<?php


abstract class BaseNpsalint extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codemp;


	
	protected $codasi;


	
	protected $monasi;


	
	protected $fecinicon;


	
	protected $fecfincon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodasi()
  {

    return trim($this->codasi);

  }
  
  public function getMonasi($val=false)
  {

    if($val) return number_format($this->monasi,2,',','.');
    else return $this->monasi;

  }
  
  public function getFecinicon($format = 'Y-m-d')
  {

    if ($this->fecinicon === null || $this->fecinicon === '') {
      return null;
    } elseif (!is_int($this->fecinicon)) {
            $ts = adodb_strtotime($this->fecinicon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinicon] as date/time value: " . var_export($this->fecinicon, true));
      }
    } else {
      $ts = $this->fecinicon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfincon($format = 'Y-m-d')
  {

    if ($this->fecfincon === null || $this->fecfincon === '') {
      return null;
    } elseif (!is_int($this->fecfincon)) {
            $ts = adodb_strtotime($this->fecfincon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfincon] as date/time value: " . var_export($this->fecfincon, true));
      }
    } else {
      $ts = $this->fecfincon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpsalintPeer::CODCON;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpsalintPeer::CODEMP;
      }
  
	} 
	
	public function setCodasi($v)
	{

    if ($this->codasi !== $v) {
        $this->codasi = $v;
        $this->modifiedColumns[] = NpsalintPeer::CODASI;
      }
  
	} 
	
	public function setMonasi($v)
	{

    if ($this->monasi !== $v) {
        $this->monasi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpsalintPeer::MONASI;
      }
  
	} 
	
	public function setFecinicon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinicon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinicon !== $ts) {
      $this->fecinicon = $ts;
      $this->modifiedColumns[] = NpsalintPeer::FECINICON;
    }

	} 
	
	public function setFecfincon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfincon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfincon !== $ts) {
      $this->fecfincon = $ts;
      $this->modifiedColumns[] = NpsalintPeer::FECFINCON;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpsalintPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->codasi = $rs->getString($startcol + 2);

      $this->monasi = $rs->getFloat($startcol + 3);

      $this->fecinicon = $rs->getDate($startcol + 4, null);

      $this->fecfincon = $rs->getDate($startcol + 5, null);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npsalint object", $e);
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
			$con = Propel::getConnection(NpsalintPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpsalintPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpsalintPeer::DATABASE_NAME);
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
					$pk = NpsalintPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpsalintPeer::doUpdate($this, $con);
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


			if (($retval = NpsalintPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpsalintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodasi();
				break;
			case 3:
				return $this->getMonasi();
				break;
			case 4:
				return $this->getFecinicon();
				break;
			case 5:
				return $this->getFecfincon();
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
		$keys = NpsalintPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodasi(),
			$keys[3] => $this->getMonasi(),
			$keys[4] => $this->getFecinicon(),
			$keys[5] => $this->getFecfincon(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpsalintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodasi($value);
				break;
			case 3:
				$this->setMonasi($value);
				break;
			case 4:
				$this->setFecinicon($value);
				break;
			case 5:
				$this->setFecfincon($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpsalintPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodasi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonasi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecinicon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecfincon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpsalintPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpsalintPeer::CODCON)) $criteria->add(NpsalintPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpsalintPeer::CODEMP)) $criteria->add(NpsalintPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpsalintPeer::CODASI)) $criteria->add(NpsalintPeer::CODASI, $this->codasi);
		if ($this->isColumnModified(NpsalintPeer::MONASI)) $criteria->add(NpsalintPeer::MONASI, $this->monasi);
		if ($this->isColumnModified(NpsalintPeer::FECINICON)) $criteria->add(NpsalintPeer::FECINICON, $this->fecinicon);
		if ($this->isColumnModified(NpsalintPeer::FECFINCON)) $criteria->add(NpsalintPeer::FECFINCON, $this->fecfincon);
		if ($this->isColumnModified(NpsalintPeer::ID)) $criteria->add(NpsalintPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpsalintPeer::DATABASE_NAME);

		$criteria->add(NpsalintPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodasi($this->codasi);

		$copyObj->setMonasi($this->monasi);

		$copyObj->setFecinicon($this->fecinicon);

		$copyObj->setFecfincon($this->fecfincon);


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
			self::$peer = new NpsalintPeer();
		}
		return self::$peer;
	}

} 