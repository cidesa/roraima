<?php


abstract class BaseCcestcre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecha;


	
	protected $ccestatu_id;


	
	protected $cccredit_id;


	
	protected $ccusuint_id;

	
	protected $aCcestatu;

	
	protected $aCccredit;

	
	protected $aCcusuint;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCcestatuId()
  {

    return $this->ccestatu_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcusuintId()
  {

    return $this->ccusuint_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcestcrePeer::ID;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = CcestcrePeer::FECHA;
    }

	} 
	
	public function setCcestatuId($v)
	{

    if ($this->ccestatu_id !== $v) {
        $this->ccestatu_id = $v;
        $this->modifiedColumns[] = CcestcrePeer::CCESTATU_ID;
      }
  
		if ($this->aCcestatu !== null && $this->aCcestatu->getId() !== $v) {
			$this->aCcestatu = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcestcrePeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcusuintId($v)
	{

    if ($this->ccusuint_id !== $v) {
        $this->ccusuint_id = $v;
        $this->modifiedColumns[] = CcestcrePeer::CCUSUINT_ID;
      }
  
		if ($this->aCcusuint !== null && $this->aCcusuint->getId() !== $v) {
			$this->aCcusuint = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecha = $rs->getDate($startcol + 1, null);

      $this->ccestatu_id = $rs->getInt($startcol + 2);

      $this->cccredit_id = $rs->getInt($startcol + 3);

      $this->ccusuint_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccestcre object", $e);
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
			$con = Propel::getConnection(CcestcrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcestcrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcestcrePeer::DATABASE_NAME);
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


												
			if ($this->aCcestatu !== null) {
				if ($this->aCcestatu->isModified()) {
					$affectedRows += $this->aCcestatu->save($con);
				}
				$this->setCcestatu($this->aCcestatu);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcusuint !== null) {
				if ($this->aCcusuint->isModified()) {
					$affectedRows += $this->aCcusuint->save($con);
				}
				$this->setCcusuint($this->aCcusuint);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcestcrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcestcrePeer::doUpdate($this, $con);
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


												
			if ($this->aCcestatu !== null) {
				if (!$this->aCcestatu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcestatu->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcusuint !== null) {
				if (!$this->aCcusuint->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuint->getValidationFailures());
				}
			}


			if (($retval = CcestcrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcestcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecha();
				break;
			case 2:
				return $this->getCcestatuId();
				break;
			case 3:
				return $this->getCccreditId();
				break;
			case 4:
				return $this->getCcusuintId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcestcrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecha(),
			$keys[2] => $this->getCcestatuId(),
			$keys[3] => $this->getCccreditId(),
			$keys[4] => $this->getCcusuintId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcestcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecha($value);
				break;
			case 2:
				$this->setCcestatuId($value);
				break;
			case 3:
				$this->setCccreditId($value);
				break;
			case 4:
				$this->setCcusuintId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcestcrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecha($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcestatuId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCccreditId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcusuintId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcestcrePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcestcrePeer::ID)) $criteria->add(CcestcrePeer::ID, $this->id);
		if ($this->isColumnModified(CcestcrePeer::FECHA)) $criteria->add(CcestcrePeer::FECHA, $this->fecha);
		if ($this->isColumnModified(CcestcrePeer::CCESTATU_ID)) $criteria->add(CcestcrePeer::CCESTATU_ID, $this->ccestatu_id);
		if ($this->isColumnModified(CcestcrePeer::CCCREDIT_ID)) $criteria->add(CcestcrePeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcestcrePeer::CCUSUINT_ID)) $criteria->add(CcestcrePeer::CCUSUINT_ID, $this->ccusuint_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcestcrePeer::DATABASE_NAME);

		$criteria->add(CcestcrePeer::ID, $this->id);

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

		$copyObj->setFecha($this->fecha);

		$copyObj->setCcestatuId($this->ccestatu_id);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcusuintId($this->ccusuint_id);


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
			self::$peer = new CcestcrePeer();
		}
		return self::$peer;
	}

	
	public function setCcestatu($v)
	{


		if ($v === null) {
			$this->setCcestatuId(NULL);
		} else {
			$this->setCcestatuId($v->getId());
		}


		$this->aCcestatu = $v;
	}


	
	public function getCcestatu($con = null)
	{
		if ($this->aCcestatu === null && ($this->ccestatu_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcestatuPeer.php';

      $c = new Criteria();
      $c->add(CcestatuPeer::ID,$this->ccestatu_id);
      
			$this->aCcestatu = CcestatuPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcestatu;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function setCcusuint($v)
	{


		if ($v === null) {
			$this->setCcusuintId(NULL);
		} else {
			$this->setCcusuintId($v->getId());
		}


		$this->aCcusuint = $v;
	}


	
	public function getCcusuint($con = null)
	{
		if ($this->aCcusuint === null && ($this->ccusuint_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcusuintPeer.php';

      $c = new Criteria();
      $c->add(CcusuintPeer::ID,$this->ccusuint_id);
      
			$this->aCcusuint = CcusuintPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcusuint;
	}

} 