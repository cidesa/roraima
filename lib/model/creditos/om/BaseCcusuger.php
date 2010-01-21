<?php


abstract class BaseCcusuger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccgerenc_id;


	
	protected $ccusuint_id;

	
	protected $aCcgerenc;

	
	protected $aCcusuint;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcgerencId()
  {

    return $this->ccgerenc_id;

  }
  
  public function getCcusuintId()
  {

    return $this->ccusuint_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcusugerPeer::ID;
      }
  
	} 
	
	public function setCcgerencId($v)
	{

    if ($this->ccgerenc_id !== $v) {
        $this->ccgerenc_id = $v;
        $this->modifiedColumns[] = CcusugerPeer::CCGERENC_ID;
      }
  
		if ($this->aCcgerenc !== null && $this->aCcgerenc->getId() !== $v) {
			$this->aCcgerenc = null;
		}

	} 
	
	public function setCcusuintId($v)
	{

    if ($this->ccusuint_id !== $v) {
        $this->ccusuint_id = $v;
        $this->modifiedColumns[] = CcusugerPeer::CCUSUINT_ID;
      }
  
		if ($this->aCcusuint !== null && $this->aCcusuint->getId() !== $v) {
			$this->aCcusuint = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccgerenc_id = $rs->getInt($startcol + 1);

      $this->ccusuint_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccusuger object", $e);
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
			$con = Propel::getConnection(CcusugerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcusugerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcusugerPeer::DATABASE_NAME);
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


												
			if ($this->aCcgerenc !== null) {
				if ($this->aCcgerenc->isModified()) {
					$affectedRows += $this->aCcgerenc->save($con);
				}
				$this->setCcgerenc($this->aCcgerenc);
			}

			if ($this->aCcusuint !== null) {
				if ($this->aCcusuint->isModified()) {
					$affectedRows += $this->aCcusuint->save($con);
				}
				$this->setCcusuint($this->aCcusuint);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcusugerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcusugerPeer::doUpdate($this, $con);
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


												
			if ($this->aCcgerenc !== null) {
				if (!$this->aCcgerenc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerenc->getValidationFailures());
				}
			}

			if ($this->aCcusuint !== null) {
				if (!$this->aCcusuint->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuint->getValidationFailures());
				}
			}


			if (($retval = CcusugerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcusugerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcgerencId();
				break;
			case 2:
				return $this->getCcusuintId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcusugerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcgerencId(),
			$keys[2] => $this->getCcusuintId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcusugerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcgerencId($value);
				break;
			case 2:
				$this->setCcusuintId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcusugerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcgerencId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcusuintId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcusugerPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcusugerPeer::ID)) $criteria->add(CcusugerPeer::ID, $this->id);
		if ($this->isColumnModified(CcusugerPeer::CCGERENC_ID)) $criteria->add(CcusugerPeer::CCGERENC_ID, $this->ccgerenc_id);
		if ($this->isColumnModified(CcusugerPeer::CCUSUINT_ID)) $criteria->add(CcusugerPeer::CCUSUINT_ID, $this->ccusuint_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcusugerPeer::DATABASE_NAME);

		$criteria->add(CcusugerPeer::ID, $this->id);

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

		$copyObj->setCcgerencId($this->ccgerenc_id);

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
			self::$peer = new CcusugerPeer();
		}
		return self::$peer;
	}

	
	public function setCcgerenc($v)
	{


		if ($v === null) {
			$this->setCcgerencId(NULL);
		} else {
			$this->setCcgerencId($v->getId());
		}


		$this->aCcgerenc = $v;
	}


	
	public function getCcgerenc($con = null)
	{
		if ($this->aCcgerenc === null && ($this->ccgerenc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerenc_id);
      
			$this->aCcgerenc = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerenc;
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