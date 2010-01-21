<?php


abstract class BaseCcsecsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccsececo_id;


	
	protected $ccbieadq_id;

	
	protected $aCcsececo;

	
	protected $aCcbieadq;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcsececoId()
  {

    return $this->ccsececo_id;

  }
  
  public function getCcbieadqId()
  {

    return $this->ccbieadq_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsecsolPeer::ID;
      }
  
	} 
	
	public function setCcsececoId($v)
	{

    if ($this->ccsececo_id !== $v) {
        $this->ccsececo_id = $v;
        $this->modifiedColumns[] = CcsecsolPeer::CCSECECO_ID;
      }
  
		if ($this->aCcsececo !== null && $this->aCcsececo->getId() !== $v) {
			$this->aCcsececo = null;
		}

	} 
	
	public function setCcbieadqId($v)
	{

    if ($this->ccbieadq_id !== $v) {
        $this->ccbieadq_id = $v;
        $this->modifiedColumns[] = CcsecsolPeer::CCBIEADQ_ID;
      }
  
		if ($this->aCcbieadq !== null && $this->aCcbieadq->getId() !== $v) {
			$this->aCcbieadq = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccsececo_id = $rs->getInt($startcol + 1);

      $this->ccbieadq_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsecsol object", $e);
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
			$con = Propel::getConnection(CcsecsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsecsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsecsolPeer::DATABASE_NAME);
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


												
			if ($this->aCcsececo !== null) {
				if ($this->aCcsececo->isModified()) {
					$affectedRows += $this->aCcsececo->save($con);
				}
				$this->setCcsececo($this->aCcsececo);
			}

			if ($this->aCcbieadq !== null) {
				if ($this->aCcbieadq->isModified()) {
					$affectedRows += $this->aCcbieadq->save($con);
				}
				$this->setCcbieadq($this->aCcbieadq);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcsecsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsecsolPeer::doUpdate($this, $con);
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


												
			if ($this->aCcsececo !== null) {
				if (!$this->aCcsececo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsececo->getValidationFailures());
				}
			}

			if ($this->aCcbieadq !== null) {
				if (!$this->aCcbieadq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbieadq->getValidationFailures());
				}
			}


			if (($retval = CcsecsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsecsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcsececoId();
				break;
			case 2:
				return $this->getCcbieadqId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsecsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcsececoId(),
			$keys[2] => $this->getCcbieadqId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsecsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcsececoId($value);
				break;
			case 2:
				$this->setCcbieadqId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsecsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcsececoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcbieadqId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsecsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsecsolPeer::ID)) $criteria->add(CcsecsolPeer::ID, $this->id);
		if ($this->isColumnModified(CcsecsolPeer::CCSECECO_ID)) $criteria->add(CcsecsolPeer::CCSECECO_ID, $this->ccsececo_id);
		if ($this->isColumnModified(CcsecsolPeer::CCBIEADQ_ID)) $criteria->add(CcsecsolPeer::CCBIEADQ_ID, $this->ccbieadq_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsecsolPeer::DATABASE_NAME);

		$criteria->add(CcsecsolPeer::ID, $this->id);

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

		$copyObj->setCcsececoId($this->ccsececo_id);

		$copyObj->setCcbieadqId($this->ccbieadq_id);


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
			self::$peer = new CcsecsolPeer();
		}
		return self::$peer;
	}

	
	public function setCcsececo($v)
	{


		if ($v === null) {
			$this->setCcsececoId(NULL);
		} else {
			$this->setCcsececoId($v->getId());
		}


		$this->aCcsececo = $v;
	}


	
	public function getCcsececo($con = null)
	{
		if ($this->aCcsececo === null && ($this->ccsececo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsececoPeer.php';

      $c = new Criteria();
      $c->add(CcsececoPeer::ID,$this->ccsececo_id);
      
			$this->aCcsececo = CcsececoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsececo;
	}

	
	public function setCcbieadq($v)
	{


		if ($v === null) {
			$this->setCcbieadqId(NULL);
		} else {
			$this->setCcbieadqId($v->getId());
		}


		$this->aCcbieadq = $v;
	}


	
	public function getCcbieadq($con = null)
	{
		if ($this->aCcbieadq === null && ($this->ccbieadq_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';

      $c = new Criteria();
      $c->add(CcbieadqPeer::ID,$this->ccbieadq_id);
      
			$this->aCcbieadq = CcbieadqPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbieadq;
	}

} 