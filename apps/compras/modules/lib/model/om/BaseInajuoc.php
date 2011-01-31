<?php


abstract class BaseInajuoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ajuoc;


	
	protected $ordcom;


	
	protected $fecaju;


	
	protected $desaju;


	
	protected $monaju;


	
	protected $staaju;


	
	protected $refaju;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAjuoc()
  {

    return trim($this->ajuoc);

  }
  
  public function getOrdcom()
  {

    return trim($this->ordcom);

  }
  
  public function getFecaju($format = 'Y-m-d')
  {

    if ($this->fecaju === null || $this->fecaju === '') {
      return null;
    } elseif (!is_int($this->fecaju)) {
            $ts = adodb_strtotime($this->fecaju);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaju] as date/time value: " . var_export($this->fecaju, true));
      }
    } else {
      $ts = $this->fecaju;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesaju()
  {

    return trim($this->desaju);

  }
  
  public function getMonaju($val=false)
  {

    if($val) return number_format($this->monaju,2,',','.');
    else return $this->monaju;

  }
  
  public function getStaaju()
  {

    return trim($this->staaju);

  }
  
  public function getRefaju()
  {

    return trim($this->refaju);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAjuoc($v)
	{

    if ($this->ajuoc !== $v) {
        $this->ajuoc = $v;
        $this->modifiedColumns[] = InajuocPeer::AJUOC;
      }
  
	} 
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = InajuocPeer::ORDCOM;
      }
  
	} 
	
	public function setFecaju($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaju] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaju !== $ts) {
      $this->fecaju = $ts;
      $this->modifiedColumns[] = InajuocPeer::FECAJU;
    }

	} 
	
	public function setDesaju($v)
	{

    if ($this->desaju !== $v) {
        $this->desaju = $v;
        $this->modifiedColumns[] = InajuocPeer::DESAJU;
      }
  
	} 
	
	public function setMonaju($v)
	{

    if ($this->monaju !== $v) {
        $this->monaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InajuocPeer::MONAJU;
      }
  
	} 
	
	public function setStaaju($v)
	{

    if ($this->staaju !== $v) {
        $this->staaju = $v;
        $this->modifiedColumns[] = InajuocPeer::STAAJU;
      }
  
	} 
	
	public function setRefaju($v)
	{

    if ($this->refaju !== $v) {
        $this->refaju = $v;
        $this->modifiedColumns[] = InajuocPeer::REFAJU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InajuocPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ajuoc = $rs->getString($startcol + 0);

      $this->ordcom = $rs->getString($startcol + 1);

      $this->fecaju = $rs->getDate($startcol + 2, null);

      $this->desaju = $rs->getString($startcol + 3);

      $this->monaju = $rs->getFloat($startcol + 4);

      $this->staaju = $rs->getString($startcol + 5);

      $this->refaju = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inajuoc object", $e);
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
			$con = Propel::getConnection(InajuocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InajuocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InajuocPeer::DATABASE_NAME);
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
					$pk = InajuocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += InajuocPeer::doUpdate($this, $con);
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


			if (($retval = InajuocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InajuocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAjuoc();
				break;
			case 1:
				return $this->getOrdcom();
				break;
			case 2:
				return $this->getFecaju();
				break;
			case 3:
				return $this->getDesaju();
				break;
			case 4:
				return $this->getMonaju();
				break;
			case 5:
				return $this->getStaaju();
				break;
			case 6:
				return $this->getRefaju();
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
		$keys = InajuocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAjuoc(),
			$keys[1] => $this->getOrdcom(),
			$keys[2] => $this->getFecaju(),
			$keys[3] => $this->getDesaju(),
			$keys[4] => $this->getMonaju(),
			$keys[5] => $this->getStaaju(),
			$keys[6] => $this->getRefaju(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InajuocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAjuoc($value);
				break;
			case 1:
				$this->setOrdcom($value);
				break;
			case 2:
				$this->setFecaju($value);
				break;
			case 3:
				$this->setDesaju($value);
				break;
			case 4:
				$this->setMonaju($value);
				break;
			case 5:
				$this->setStaaju($value);
				break;
			case 6:
				$this->setRefaju($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InajuocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAjuoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOrdcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecaju($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStaaju($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefaju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InajuocPeer::DATABASE_NAME);

		if ($this->isColumnModified(InajuocPeer::AJUOC)) $criteria->add(InajuocPeer::AJUOC, $this->ajuoc);
		if ($this->isColumnModified(InajuocPeer::ORDCOM)) $criteria->add(InajuocPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(InajuocPeer::FECAJU)) $criteria->add(InajuocPeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(InajuocPeer::DESAJU)) $criteria->add(InajuocPeer::DESAJU, $this->desaju);
		if ($this->isColumnModified(InajuocPeer::MONAJU)) $criteria->add(InajuocPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(InajuocPeer::STAAJU)) $criteria->add(InajuocPeer::STAAJU, $this->staaju);
		if ($this->isColumnModified(InajuocPeer::REFAJU)) $criteria->add(InajuocPeer::REFAJU, $this->refaju);
		if ($this->isColumnModified(InajuocPeer::ID)) $criteria->add(InajuocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InajuocPeer::DATABASE_NAME);

		$criteria->add(InajuocPeer::ID, $this->id);

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

		$copyObj->setAjuoc($this->ajuoc);

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setFecaju($this->fecaju);

		$copyObj->setDesaju($this->desaju);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStaaju($this->staaju);

		$copyObj->setRefaju($this->refaju);


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
			self::$peer = new InajuocPeer();
		}
		return self::$peer;
	}

} 