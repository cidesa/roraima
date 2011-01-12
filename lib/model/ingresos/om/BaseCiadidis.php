<?php


abstract class BaseCiadidis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refadi;


	
	protected $fecadi;


	
	protected $anoadi;


	
	protected $desadi;


	
	protected $desanu;


	
	protected $adidis;


	
	protected $totadi;


	
	protected $staadi;


	
	protected $fecanu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefadi()
  {

    return trim($this->refadi);

  }
  
  public function getFecadi($format = 'Y-m-d')
  {

    if ($this->fecadi === null || $this->fecadi === '') {
      return null;
    } elseif (!is_int($this->fecadi)) {
            $ts = adodb_strtotime($this->fecadi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecadi] as date/time value: " . var_export($this->fecadi, true));
      }
    } else {
      $ts = $this->fecadi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnoadi()
  {

    return trim($this->anoadi);

  }
  
  public function getDesadi()
  {

    return trim($this->desadi);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getAdidis()
  {

    return trim($this->adidis);

  }
  
  public function getTotadi($val=false)
  {

    if($val) return number_format($this->totadi,2,',','.');
    else return $this->totadi;

  }
  
  public function getStaadi()
  {

    return trim($this->staadi);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
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
	
	public function setRefadi($v)
	{

    if ($this->refadi !== $v) {
        $this->refadi = $v;
        $this->modifiedColumns[] = CiadidisPeer::REFADI;
      }
  
	} 
	
	public function setFecadi($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecadi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecadi !== $ts) {
      $this->fecadi = $ts;
      $this->modifiedColumns[] = CiadidisPeer::FECADI;
    }

	} 
	
	public function setAnoadi($v)
	{

    if ($this->anoadi !== $v) {
        $this->anoadi = $v;
        $this->modifiedColumns[] = CiadidisPeer::ANOADI;
      }
  
	} 
	
	public function setDesadi($v)
	{

    if ($this->desadi !== $v) {
        $this->desadi = $v;
        $this->modifiedColumns[] = CiadidisPeer::DESADI;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CiadidisPeer::DESANU;
      }
  
	} 
	
	public function setAdidis($v)
	{

    if ($this->adidis !== $v) {
        $this->adidis = $v;
        $this->modifiedColumns[] = CiadidisPeer::ADIDIS;
      }
  
	} 
	
	public function setTotadi($v)
	{

    if ($this->totadi !== $v) {
        $this->totadi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiadidisPeer::TOTADI;
      }
  
	} 
	
	public function setStaadi($v)
	{

    if ($this->staadi !== $v) {
        $this->staadi = $v;
        $this->modifiedColumns[] = CiadidisPeer::STAADI;
      }
  
	} 
	
	public function setFecanu($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = CiadidisPeer::FECANU;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CiadidisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refadi = $rs->getString($startcol + 0);

      $this->fecadi = $rs->getDate($startcol + 1, null);

      $this->anoadi = $rs->getString($startcol + 2);

      $this->desadi = $rs->getString($startcol + 3);

      $this->desanu = $rs->getString($startcol + 4);

      $this->adidis = $rs->getString($startcol + 5);

      $this->totadi = $rs->getFloat($startcol + 6);

      $this->staadi = $rs->getString($startcol + 7);

      $this->fecanu = $rs->getDate($startcol + 8, null);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ciadidis object", $e);
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
			$con = Propel::getConnection(CiadidisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CiadidisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CiadidisPeer::DATABASE_NAME);
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
					$pk = CiadidisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CiadidisPeer::doUpdate($this, $con);
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


			if (($retval = CiadidisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiadidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefadi();
				break;
			case 1:
				return $this->getFecadi();
				break;
			case 2:
				return $this->getAnoadi();
				break;
			case 3:
				return $this->getDesadi();
				break;
			case 4:
				return $this->getDesanu();
				break;
			case 5:
				return $this->getAdidis();
				break;
			case 6:
				return $this->getTotadi();
				break;
			case 7:
				return $this->getStaadi();
				break;
			case 8:
				return $this->getFecanu();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiadidisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefadi(),
			$keys[1] => $this->getFecadi(),
			$keys[2] => $this->getAnoadi(),
			$keys[3] => $this->getDesadi(),
			$keys[4] => $this->getDesanu(),
			$keys[5] => $this->getAdidis(),
			$keys[6] => $this->getTotadi(),
			$keys[7] => $this->getStaadi(),
			$keys[8] => $this->getFecanu(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiadidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefadi($value);
				break;
			case 1:
				$this->setFecadi($value);
				break;
			case 2:
				$this->setAnoadi($value);
				break;
			case 3:
				$this->setDesadi($value);
				break;
			case 4:
				$this->setDesanu($value);
				break;
			case 5:
				$this->setAdidis($value);
				break;
			case 6:
				$this->setTotadi($value);
				break;
			case 7:
				$this->setStaadi($value);
				break;
			case 8:
				$this->setFecanu($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiadidisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefadi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecadi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnoadi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesadi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesanu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdidis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotadi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaadi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecanu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CiadidisPeer::DATABASE_NAME);

		if ($this->isColumnModified(CiadidisPeer::REFADI)) $criteria->add(CiadidisPeer::REFADI, $this->refadi);
		if ($this->isColumnModified(CiadidisPeer::FECADI)) $criteria->add(CiadidisPeer::FECADI, $this->fecadi);
		if ($this->isColumnModified(CiadidisPeer::ANOADI)) $criteria->add(CiadidisPeer::ANOADI, $this->anoadi);
		if ($this->isColumnModified(CiadidisPeer::DESADI)) $criteria->add(CiadidisPeer::DESADI, $this->desadi);
		if ($this->isColumnModified(CiadidisPeer::DESANU)) $criteria->add(CiadidisPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CiadidisPeer::ADIDIS)) $criteria->add(CiadidisPeer::ADIDIS, $this->adidis);
		if ($this->isColumnModified(CiadidisPeer::TOTADI)) $criteria->add(CiadidisPeer::TOTADI, $this->totadi);
		if ($this->isColumnModified(CiadidisPeer::STAADI)) $criteria->add(CiadidisPeer::STAADI, $this->staadi);
		if ($this->isColumnModified(CiadidisPeer::FECANU)) $criteria->add(CiadidisPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CiadidisPeer::ID)) $criteria->add(CiadidisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CiadidisPeer::DATABASE_NAME);

		$criteria->add(CiadidisPeer::ID, $this->id);

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

		$copyObj->setRefadi($this->refadi);

		$copyObj->setFecadi($this->fecadi);

		$copyObj->setAnoadi($this->anoadi);

		$copyObj->setDesadi($this->desadi);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setAdidis($this->adidis);

		$copyObj->setTotadi($this->totadi);

		$copyObj->setStaadi($this->staadi);

		$copyObj->setFecanu($this->fecanu);


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
			self::$peer = new CiadidisPeer();
		}
		return self::$peer;
	}

} 