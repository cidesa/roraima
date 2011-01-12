<?php


abstract class BaseCcvarbalger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecvarbalger;


	
	protected $monvarbalger;


	
	protected $ccbalger_id;


	
	protected $ccvariab_id;

	
	protected $aCcbalger;

	
	protected $aCcvariab;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecvarbalger($format = 'Y-m-d')
  {

    if ($this->fecvarbalger === null || $this->fecvarbalger === '') {
      return null;
    } elseif (!is_int($this->fecvarbalger)) {
            $ts = adodb_strtotime($this->fecvarbalger);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvarbalger] as date/time value: " . var_export($this->fecvarbalger, true));
      }
    } else {
      $ts = $this->fecvarbalger;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonvarbalger($val=false)
  {

    if($val) return number_format($this->monvarbalger,2,',','.');
    else return $this->monvarbalger;

  }
  
  public function getCcbalgerId()
  {

    return $this->ccbalger_id;

  }
  
  public function getCcvariabId()
  {

    return $this->ccvariab_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcvarbalgerPeer::ID;
      }
  
	} 
	
	public function setFecvarbalger($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvarbalger] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvarbalger !== $ts) {
      $this->fecvarbalger = $ts;
      $this->modifiedColumns[] = CcvarbalgerPeer::FECVARBALGER;
    }

	} 
	
	public function setMonvarbalger($v)
	{

    if ($this->monvarbalger !== $v) {
        $this->monvarbalger = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcvarbalgerPeer::MONVARBALGER;
      }
  
	} 
	
	public function setCcbalgerId($v)
	{

    if ($this->ccbalger_id !== $v) {
        $this->ccbalger_id = $v;
        $this->modifiedColumns[] = CcvarbalgerPeer::CCBALGER_ID;
      }
  
		if ($this->aCcbalger !== null && $this->aCcbalger->getId() !== $v) {
			$this->aCcbalger = null;
		}

	} 
	
	public function setCcvariabId($v)
	{

    if ($this->ccvariab_id !== $v) {
        $this->ccvariab_id = $v;
        $this->modifiedColumns[] = CcvarbalgerPeer::CCVARIAB_ID;
      }
  
		if ($this->aCcvariab !== null && $this->aCcvariab->getId() !== $v) {
			$this->aCcvariab = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecvarbalger = $rs->getDate($startcol + 1, null);

      $this->monvarbalger = $rs->getFloat($startcol + 2);

      $this->ccbalger_id = $rs->getInt($startcol + 3);

      $this->ccvariab_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccvarbalger object", $e);
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
			$con = Propel::getConnection(CcvarbalgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcvarbalgerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcvarbalgerPeer::DATABASE_NAME);
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


												
			if ($this->aCcbalger !== null) {
				if ($this->aCcbalger->isModified()) {
					$affectedRows += $this->aCcbalger->save($con);
				}
				$this->setCcbalger($this->aCcbalger);
			}

			if ($this->aCcvariab !== null) {
				if ($this->aCcvariab->isModified()) {
					$affectedRows += $this->aCcvariab->save($con);
				}
				$this->setCcvariab($this->aCcvariab);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcvarbalgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcvarbalgerPeer::doUpdate($this, $con);
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


												
			if ($this->aCcbalger !== null) {
				if (!$this->aCcbalger->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbalger->getValidationFailures());
				}
			}

			if ($this->aCcvariab !== null) {
				if (!$this->aCcvariab->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcvariab->getValidationFailures());
				}
			}


			if (($retval = CcvarbalgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcvarbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecvarbalger();
				break;
			case 2:
				return $this->getMonvarbalger();
				break;
			case 3:
				return $this->getCcbalgerId();
				break;
			case 4:
				return $this->getCcvariabId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcvarbalgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecvarbalger(),
			$keys[2] => $this->getMonvarbalger(),
			$keys[3] => $this->getCcbalgerId(),
			$keys[4] => $this->getCcvariabId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcvarbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecvarbalger($value);
				break;
			case 2:
				$this->setMonvarbalger($value);
				break;
			case 3:
				$this->setCcbalgerId($value);
				break;
			case 4:
				$this->setCcvariabId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcvarbalgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecvarbalger($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonvarbalger($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcbalgerId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcvariabId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcvarbalgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcvarbalgerPeer::ID)) $criteria->add(CcvarbalgerPeer::ID, $this->id);
		if ($this->isColumnModified(CcvarbalgerPeer::FECVARBALGER)) $criteria->add(CcvarbalgerPeer::FECVARBALGER, $this->fecvarbalger);
		if ($this->isColumnModified(CcvarbalgerPeer::MONVARBALGER)) $criteria->add(CcvarbalgerPeer::MONVARBALGER, $this->monvarbalger);
		if ($this->isColumnModified(CcvarbalgerPeer::CCBALGER_ID)) $criteria->add(CcvarbalgerPeer::CCBALGER_ID, $this->ccbalger_id);
		if ($this->isColumnModified(CcvarbalgerPeer::CCVARIAB_ID)) $criteria->add(CcvarbalgerPeer::CCVARIAB_ID, $this->ccvariab_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcvarbalgerPeer::DATABASE_NAME);

		$criteria->add(CcvarbalgerPeer::ID, $this->id);

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

		$copyObj->setFecvarbalger($this->fecvarbalger);

		$copyObj->setMonvarbalger($this->monvarbalger);

		$copyObj->setCcbalgerId($this->ccbalger_id);

		$copyObj->setCcvariabId($this->ccvariab_id);


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
			self::$peer = new CcvarbalgerPeer();
		}
		return self::$peer;
	}

	
	public function setCcbalger($v)
	{


		if ($v === null) {
			$this->setCcbalgerId(NULL);
		} else {
			$this->setCcbalgerId($v->getId());
		}


		$this->aCcbalger = $v;
	}


	
	public function getCcbalger($con = null)
	{
		if ($this->aCcbalger === null && ($this->ccbalger_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';

      $c = new Criteria();
      $c->add(CcbalgerPeer::ID,$this->ccbalger_id);
      
			$this->aCcbalger = CcbalgerPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbalger;
	}

	
	public function setCcvariab($v)
	{


		if ($v === null) {
			$this->setCcvariabId(NULL);
		} else {
			$this->setCcvariabId($v->getId());
		}


		$this->aCcvariab = $v;
	}


	
	public function getCcvariab($con = null)
	{
		if ($this->aCcvariab === null && ($this->ccvariab_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcvariabPeer.php';

      $c = new Criteria();
      $c->add(CcvariabPeer::ID,$this->ccvariab_id);
      
			$this->aCcvariab = CcvariabPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcvariab;
	}

} 