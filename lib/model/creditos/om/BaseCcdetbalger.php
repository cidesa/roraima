<?php


abstract class BaseCcdetbalger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $monbalger;


	
	protected $fecdetbalger;


	
	protected $ccbalger_id;


	
	protected $ccconbalger_id;

	
	protected $aCcbalger;

	
	protected $aCcconbalger;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getMonbalger($val=false)
  {

    if($val) return number_format($this->monbalger,2,',','.');
    else return $this->monbalger;

  }
  
  public function getFecdetbalger($format = 'Y-m-d')
  {

    if ($this->fecdetbalger === null || $this->fecdetbalger === '') {
      return null;
    } elseif (!is_int($this->fecdetbalger)) {
            $ts = adodb_strtotime($this->fecdetbalger);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdetbalger] as date/time value: " . var_export($this->fecdetbalger, true));
      }
    } else {
      $ts = $this->fecdetbalger;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCcbalgerId()
  {

    return $this->ccbalger_id;

  }
  
  public function getCcconbalgerId()
  {

    return $this->ccconbalger_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdetbalgerPeer::ID;
      }
  
	} 
	
	public function setMonbalger($v)
	{

    if ($this->monbalger !== $v) {
        $this->monbalger = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdetbalgerPeer::MONBALGER;
      }
  
	} 
	
	public function setFecdetbalger($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdetbalger] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdetbalger !== $ts) {
      $this->fecdetbalger = $ts;
      $this->modifiedColumns[] = CcdetbalgerPeer::FECDETBALGER;
    }

	} 
	
	public function setCcbalgerId($v)
	{

    if ($this->ccbalger_id !== $v) {
        $this->ccbalger_id = $v;
        $this->modifiedColumns[] = CcdetbalgerPeer::CCBALGER_ID;
      }
  
		if ($this->aCcbalger !== null && $this->aCcbalger->getId() !== $v) {
			$this->aCcbalger = null;
		}

	} 
	
	public function setCcconbalgerId($v)
	{

    if ($this->ccconbalger_id !== $v) {
        $this->ccconbalger_id = $v;
        $this->modifiedColumns[] = CcdetbalgerPeer::CCCONBALGER_ID;
      }
  
		if ($this->aCcconbalger !== null && $this->aCcconbalger->getId() !== $v) {
			$this->aCcconbalger = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->monbalger = $rs->getFloat($startcol + 1);

      $this->fecdetbalger = $rs->getDate($startcol + 2, null);

      $this->ccbalger_id = $rs->getInt($startcol + 3);

      $this->ccconbalger_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdetbalger object", $e);
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
			$con = Propel::getConnection(CcdetbalgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdetbalgerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdetbalgerPeer::DATABASE_NAME);
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

			if ($this->aCcconbalger !== null) {
				if ($this->aCcconbalger->isModified()) {
					$affectedRows += $this->aCcconbalger->save($con);
				}
				$this->setCcconbalger($this->aCcconbalger);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcdetbalgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdetbalgerPeer::doUpdate($this, $con);
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

			if ($this->aCcconbalger !== null) {
				if (!$this->aCcconbalger->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcconbalger->getValidationFailures());
				}
			}


			if (($retval = CcdetbalgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdetbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMonbalger();
				break;
			case 2:
				return $this->getFecdetbalger();
				break;
			case 3:
				return $this->getCcbalgerId();
				break;
			case 4:
				return $this->getCcconbalgerId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdetbalgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMonbalger(),
			$keys[2] => $this->getFecdetbalger(),
			$keys[3] => $this->getCcbalgerId(),
			$keys[4] => $this->getCcconbalgerId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdetbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMonbalger($value);
				break;
			case 2:
				$this->setFecdetbalger($value);
				break;
			case 3:
				$this->setCcbalgerId($value);
				break;
			case 4:
				$this->setCcconbalgerId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdetbalgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonbalger($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecdetbalger($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcbalgerId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcconbalgerId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdetbalgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdetbalgerPeer::ID)) $criteria->add(CcdetbalgerPeer::ID, $this->id);
		if ($this->isColumnModified(CcdetbalgerPeer::MONBALGER)) $criteria->add(CcdetbalgerPeer::MONBALGER, $this->monbalger);
		if ($this->isColumnModified(CcdetbalgerPeer::FECDETBALGER)) $criteria->add(CcdetbalgerPeer::FECDETBALGER, $this->fecdetbalger);
		if ($this->isColumnModified(CcdetbalgerPeer::CCBALGER_ID)) $criteria->add(CcdetbalgerPeer::CCBALGER_ID, $this->ccbalger_id);
		if ($this->isColumnModified(CcdetbalgerPeer::CCCONBALGER_ID)) $criteria->add(CcdetbalgerPeer::CCCONBALGER_ID, $this->ccconbalger_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdetbalgerPeer::DATABASE_NAME);

		$criteria->add(CcdetbalgerPeer::ID, $this->id);

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

		$copyObj->setMonbalger($this->monbalger);

		$copyObj->setFecdetbalger($this->fecdetbalger);

		$copyObj->setCcbalgerId($this->ccbalger_id);

		$copyObj->setCcconbalgerId($this->ccconbalger_id);


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
			self::$peer = new CcdetbalgerPeer();
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

	
	public function setCcconbalger($v)
	{


		if ($v === null) {
			$this->setCcconbalgerId(NULL);
		} else {
			$this->setCcconbalgerId($v->getId());
		}


		$this->aCcconbalger = $v;
	}


	
	public function getCcconbalger($con = null)
	{
		if ($this->aCcconbalger === null && ($this->ccconbalger_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcconbalgerPeer.php';

      $c = new Criteria();
      $c->add(CcconbalgerPeer::ID,$this->ccconbalger_id);
      
			$this->aCcconbalger = CcconbalgerPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcconbalger;
	}

} 