<?php


abstract class BaseTsdetsal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refsal;


	
	protected $codart;


	
	protected $monsal;


	
	protected $monrec;


	
	protected $totsal;


	
	protected $stasal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefsal()
  {

    return trim($this->refsal);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getMonsal($val=false)
  {

    if($val) return number_format($this->monsal,2,',','.');
    else return $this->monsal;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getTotsal($val=false)
  {

    if($val) return number_format($this->totsal,2,',','.');
    else return $this->totsal;

  }
  
  public function getStasal()
  {

    return trim($this->stasal);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefsal($v)
	{

    if ($this->refsal !== $v) {
        $this->refsal = $v;
        $this->modifiedColumns[] = TsdetsalPeer::REFSAL;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = TsdetsalPeer::CODART;
      }
  
	} 
	
	public function setMonsal($v)
	{

    if ($this->monsal !== $v) {
        $this->monsal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdetsalPeer::MONSAL;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdetsalPeer::MONREC;
      }
  
	} 
	
	public function setTotsal($v)
	{

    if ($this->totsal !== $v) {
        $this->totsal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdetsalPeer::TOTSAL;
      }
  
	} 
	
	public function setStasal($v)
	{

    if ($this->stasal !== $v) {
        $this->stasal = $v;
        $this->modifiedColumns[] = TsdetsalPeer::STASAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsdetsalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refsal = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->monsal = $rs->getFloat($startcol + 2);

      $this->monrec = $rs->getFloat($startcol + 3);

      $this->totsal = $rs->getFloat($startcol + 4);

      $this->stasal = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsdetsal object", $e);
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
			$con = Propel::getConnection(TsdetsalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdetsalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdetsalPeer::DATABASE_NAME);
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
					$pk = TsdetsalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsdetsalPeer::doUpdate($this, $con);
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


			if (($retval = TsdetsalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdetsalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefsal();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getMonsal();
				break;
			case 3:
				return $this->getMonrec();
				break;
			case 4:
				return $this->getTotsal();
				break;
			case 5:
				return $this->getStasal();
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
		$keys = TsdetsalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefsal(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getMonsal(),
			$keys[3] => $this->getMonrec(),
			$keys[4] => $this->getTotsal(),
			$keys[5] => $this->getStasal(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdetsalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefsal($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setMonsal($value);
				break;
			case 3:
				$this->setMonrec($value);
				break;
			case 4:
				$this->setTotsal($value);
				break;
			case 5:
				$this->setStasal($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdetsalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefsal($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonsal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTotsal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStasal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdetsalPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdetsalPeer::REFSAL)) $criteria->add(TsdetsalPeer::REFSAL, $this->refsal);
		if ($this->isColumnModified(TsdetsalPeer::CODART)) $criteria->add(TsdetsalPeer::CODART, $this->codart);
		if ($this->isColumnModified(TsdetsalPeer::MONSAL)) $criteria->add(TsdetsalPeer::MONSAL, $this->monsal);
		if ($this->isColumnModified(TsdetsalPeer::MONREC)) $criteria->add(TsdetsalPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(TsdetsalPeer::TOTSAL)) $criteria->add(TsdetsalPeer::TOTSAL, $this->totsal);
		if ($this->isColumnModified(TsdetsalPeer::STASAL)) $criteria->add(TsdetsalPeer::STASAL, $this->stasal);
		if ($this->isColumnModified(TsdetsalPeer::ID)) $criteria->add(TsdetsalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdetsalPeer::DATABASE_NAME);

		$criteria->add(TsdetsalPeer::ID, $this->id);

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

		$copyObj->setRefsal($this->refsal);

		$copyObj->setCodart($this->codart);

		$copyObj->setMonsal($this->monsal);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setTotsal($this->totsal);

		$copyObj->setStasal($this->stasal);


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
			self::$peer = new TsdetsalPeer();
		}
		return self::$peer;
	}

} 