<?php


abstract class BaseCcprocred extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccprogra_id;


	
	protected $cccredit_id;

	
	protected $aCcprogra;

	
	protected $aCccredit;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcprograId()
  {

    return $this->ccprogra_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcprocredPeer::ID;
      }
  
	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcprocredPeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcprocredPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccprogra_id = $rs->getInt($startcol + 1);

      $this->cccredit_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccprocred object", $e);
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
			$con = Propel::getConnection(CcprocredPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcprocredPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcprocredPeer::DATABASE_NAME);
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


												
			if ($this->aCcprogra !== null) {
				if ($this->aCcprogra->isModified()) {
					$affectedRows += $this->aCcprogra->save($con);
				}
				$this->setCcprogra($this->aCcprogra);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcprocredPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcprocredPeer::doUpdate($this, $con);
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


												
			if ($this->aCcprogra !== null) {
				if (!$this->aCcprogra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcprogra->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}


			if (($retval = CcprocredPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcprocredPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcprograId();
				break;
			case 2:
				return $this->getCccreditId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcprocredPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcprograId(),
			$keys[2] => $this->getCccreditId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcprocredPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcprograId($value);
				break;
			case 2:
				$this->setCccreditId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcprocredPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcprograId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCccreditId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcprocredPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcprocredPeer::ID)) $criteria->add(CcprocredPeer::ID, $this->id);
		if ($this->isColumnModified(CcprocredPeer::CCPROGRA_ID)) $criteria->add(CcprocredPeer::CCPROGRA_ID, $this->ccprogra_id);
		if ($this->isColumnModified(CcprocredPeer::CCCREDIT_ID)) $criteria->add(CcprocredPeer::CCCREDIT_ID, $this->cccredit_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcprocredPeer::DATABASE_NAME);

		$criteria->add(CcprocredPeer::ID, $this->id);

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

		$copyObj->setCcprograId($this->ccprogra_id);

		$copyObj->setCccreditId($this->cccredit_id);


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
			self::$peer = new CcprocredPeer();
		}
		return self::$peer;
	}

	
	public function setCcprogra($v)
	{


		if ($v === null) {
			$this->setCcprograId(NULL);
		} else {
			$this->setCcprograId($v->getId());
		}


		$this->aCcprogra = $v;
	}


	
	public function getCcprogra($con = null)
	{
		if ($this->aCcprogra === null && ($this->ccprogra_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcprograPeer.php';

      $c = new Criteria();
      $c->add(CcprograPeer::ID,$this->ccprogra_id);
      
			$this->aCcprogra = CcprograPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcprogra;
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

} 