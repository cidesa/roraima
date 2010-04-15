<?php


abstract class BaseNpvaccol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $disdes;


	
	protected $dishas;


	
	protected $fecreg;


	
	protected $diavac;


	
	protected $dianhab;


	
	protected $stareg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getDisdes($format = 'Y-m-d')
  {

    if ($this->disdes === null || $this->disdes === '') {
      return null;
    } elseif (!is_int($this->disdes)) {
            $ts = adodb_strtotime($this->disdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [disdes] as date/time value: " . var_export($this->disdes, true));
      }
    } else {
      $ts = $this->disdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDishas($format = 'Y-m-d')
  {

    if ($this->dishas === null || $this->dishas === '') {
      return null;
    } elseif (!is_int($this->dishas)) {
            $ts = adodb_strtotime($this->dishas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [dishas] as date/time value: " . var_export($this->dishas, true));
      }
    } else {
      $ts = $this->dishas;
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

  
  public function getDiavac($val=false)
  {

    if($val) return number_format($this->diavac,2,',','.');
    else return $this->diavac;

  }
  
  public function getDianhab($val=false)
  {

    if($val) return number_format($this->dianhab,2,',','.');
    else return $this->dianhab;

  }
  
  public function getStareg()
  {

    return trim($this->stareg);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpvaccolPeer::CODNOM;
      }
  
	} 
	
	public function setDisdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [disdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->disdes !== $ts) {
      $this->disdes = $ts;
      $this->modifiedColumns[] = NpvaccolPeer::DISDES;
    }

	} 
	
	public function setDishas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [dishas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->dishas !== $ts) {
      $this->dishas = $ts;
      $this->modifiedColumns[] = NpvaccolPeer::DISHAS;
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
      $this->modifiedColumns[] = NpvaccolPeer::FECREG;
    }

	} 
	
	public function setDiavac($v)
	{

    if ($this->diavac !== $v) {
        $this->diavac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvaccolPeer::DIAVAC;
      }
  
	} 
	
	public function setDianhab($v)
	{

    if ($this->dianhab !== $v) {
        $this->dianhab = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvaccolPeer::DIANHAB;
      }
  
	} 
	
	public function setStareg($v)
	{

    if ($this->stareg !== $v) {
        $this->stareg = $v;
        $this->modifiedColumns[] = NpvaccolPeer::STAREG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvaccolPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->disdes = $rs->getDate($startcol + 1, null);

      $this->dishas = $rs->getDate($startcol + 2, null);

      $this->fecreg = $rs->getDate($startcol + 3, null);

      $this->diavac = $rs->getFloat($startcol + 4);

      $this->dianhab = $rs->getFloat($startcol + 5);

      $this->stareg = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npvaccol object", $e);
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
			$con = Propel::getConnection(NpvaccolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvaccolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvaccolPeer::DATABASE_NAME);
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
					$pk = NpvaccolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvaccolPeer::doUpdate($this, $con);
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


			if (($retval = NpvaccolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvaccolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getDisdes();
				break;
			case 2:
				return $this->getDishas();
				break;
			case 3:
				return $this->getFecreg();
				break;
			case 4:
				return $this->getDiavac();
				break;
			case 5:
				return $this->getDianhab();
				break;
			case 6:
				return $this->getStareg();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvaccolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getDisdes(),
			$keys[2] => $this->getDishas(),
			$keys[3] => $this->getFecreg(),
			$keys[4] => $this->getDiavac(),
			$keys[5] => $this->getDianhab(),
			$keys[6] => $this->getStareg(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvaccolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setDisdes($value);
				break;
			case 2:
				$this->setDishas($value);
				break;
			case 3:
				$this->setFecreg($value);
				break;
			case 4:
				$this->setDiavac($value);
				break;
			case 5:
				$this->setDianhab($value);
				break;
			case 6:
				$this->setStareg($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvaccolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDisdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDishas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecreg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiavac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDianhab($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStareg($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvaccolPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvaccolPeer::CODNOM)) $criteria->add(NpvaccolPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpvaccolPeer::DISDES)) $criteria->add(NpvaccolPeer::DISDES, $this->disdes);
		if ($this->isColumnModified(NpvaccolPeer::DISHAS)) $criteria->add(NpvaccolPeer::DISHAS, $this->dishas);
		if ($this->isColumnModified(NpvaccolPeer::FECREG)) $criteria->add(NpvaccolPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(NpvaccolPeer::DIAVAC)) $criteria->add(NpvaccolPeer::DIAVAC, $this->diavac);
		if ($this->isColumnModified(NpvaccolPeer::DIANHAB)) $criteria->add(NpvaccolPeer::DIANHAB, $this->dianhab);
		if ($this->isColumnModified(NpvaccolPeer::STAREG)) $criteria->add(NpvaccolPeer::STAREG, $this->stareg);
		if ($this->isColumnModified(NpvaccolPeer::ID)) $criteria->add(NpvaccolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvaccolPeer::DATABASE_NAME);

		$criteria->add(NpvaccolPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setDisdes($this->disdes);

		$copyObj->setDishas($this->dishas);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDiavac($this->diavac);

		$copyObj->setDianhab($this->dianhab);

		$copyObj->setStareg($this->stareg);


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
			self::$peer = new NpvaccolPeer();
		}
		return self::$peer;
	}

} 