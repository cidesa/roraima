<?php


abstract class BaseCcpagres extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $detres;


	
	protected $ccpago_id;


	
	protected $ccrespue_id;

	
	protected $aCcpago;

	
	protected $aCcrespue;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getDetres()
  {

    return trim($this->detres);

  }
  
  public function getCcpagoId()
  {

    return $this->ccpago_id;

  }
  
  public function getCcrespueId()
  {

    return $this->ccrespue_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcpagresPeer::ID;
      }
  
	} 
	
	public function setDetres($v)
	{

    if ($this->detres !== $v) {
        $this->detres = $v;
        $this->modifiedColumns[] = CcpagresPeer::DETRES;
      }
  
	} 
	
	public function setCcpagoId($v)
	{

    if ($this->ccpago_id !== $v) {
        $this->ccpago_id = $v;
        $this->modifiedColumns[] = CcpagresPeer::CCPAGO_ID;
      }
  
		if ($this->aCcpago !== null && $this->aCcpago->getId() !== $v) {
			$this->aCcpago = null;
		}

	} 
	
	public function setCcrespueId($v)
	{

    if ($this->ccrespue_id !== $v) {
        $this->ccrespue_id = $v;
        $this->modifiedColumns[] = CcpagresPeer::CCRESPUE_ID;
      }
  
		if ($this->aCcrespue !== null && $this->aCcrespue->getId() !== $v) {
			$this->aCcrespue = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->detres = $rs->getString($startcol + 1);

      $this->ccpago_id = $rs->getInt($startcol + 2);

      $this->ccrespue_id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccpagres object", $e);
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
			$con = Propel::getConnection(CcpagresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcpagresPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcpagresPeer::DATABASE_NAME);
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


												
			if ($this->aCcpago !== null) {
				if ($this->aCcpago->isModified()) {
					$affectedRows += $this->aCcpago->save($con);
				}
				$this->setCcpago($this->aCcpago);
			}

			if ($this->aCcrespue !== null) {
				if ($this->aCcrespue->isModified()) {
					$affectedRows += $this->aCcrespue->save($con);
				}
				$this->setCcrespue($this->aCcrespue);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcpagresPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcpagresPeer::doUpdate($this, $con);
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


												
			if ($this->aCcpago !== null) {
				if (!$this->aCcpago->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpago->getValidationFailures());
				}
			}

			if ($this->aCcrespue !== null) {
				if (!$this->aCcrespue->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcrespue->getValidationFailures());
				}
			}


			if (($retval = CcpagresPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcpagresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDetres();
				break;
			case 2:
				return $this->getCcpagoId();
				break;
			case 3:
				return $this->getCcrespueId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpagresPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDetres(),
			$keys[2] => $this->getCcpagoId(),
			$keys[3] => $this->getCcrespueId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcpagresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDetres($value);
				break;
			case 2:
				$this->setCcpagoId($value);
				break;
			case 3:
				$this->setCcrespueId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpagresPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDetres($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcpagoId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcrespueId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcpagresPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcpagresPeer::ID)) $criteria->add(CcpagresPeer::ID, $this->id);
		if ($this->isColumnModified(CcpagresPeer::DETRES)) $criteria->add(CcpagresPeer::DETRES, $this->detres);
		if ($this->isColumnModified(CcpagresPeer::CCPAGO_ID)) $criteria->add(CcpagresPeer::CCPAGO_ID, $this->ccpago_id);
		if ($this->isColumnModified(CcpagresPeer::CCRESPUE_ID)) $criteria->add(CcpagresPeer::CCRESPUE_ID, $this->ccrespue_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcpagresPeer::DATABASE_NAME);

		$criteria->add(CcpagresPeer::ID, $this->id);

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

		$copyObj->setDetres($this->detres);

		$copyObj->setCcpagoId($this->ccpago_id);

		$copyObj->setCcrespueId($this->ccrespue_id);


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
			self::$peer = new CcpagresPeer();
		}
		return self::$peer;
	}

	
	public function setCcpago($v)
	{


		if ($v === null) {
			$this->setCcpagoId(NULL);
		} else {
			$this->setCcpagoId($v->getId());
		}


		$this->aCcpago = $v;
	}


	
	public function getCcpago($con = null)
	{
		if ($this->aCcpago === null && ($this->ccpago_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';

      $c = new Criteria();
      $c->add(CcpagoPeer::ID,$this->ccpago_id);
      
			$this->aCcpago = CcpagoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpago;
	}

	
	public function setCcrespue($v)
	{


		if ($v === null) {
			$this->setCcrespueId(NULL);
		} else {
			$this->setCcrespueId($v->getId());
		}


		$this->aCcrespue = $v;
	}


	
	public function getCcrespue($con = null)
	{
		if ($this->aCcrespue === null && ($this->ccrespue_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcrespuePeer.php';

      $c = new Criteria();
      $c->add(CcrespuePeer::ID,$this->ccrespue_id);
      
			$this->aCcrespue = CcrespuePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcrespue;
	}

} 