<?php


abstract class BaseBndefact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $desact;


	
	protected $canact;


	
	protected $staact;


	
	protected $viduti;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodact()
	{

		return $this->codact; 		
	}
	
	public function getDesact()
	{

		return $this->desact; 		
	}
	
	public function getCanact()
	{

		return number_format($this->canact,2,',','.');
		
	}
	
	public function getStaact()
	{

		return $this->staact; 		
	}
	
	public function getViduti()
	{

		return number_format($this->viduti,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = BndefactPeer::CODACT;
		}

	} 
	
	public function setDesact($v)
	{

		if ($this->desact !== $v) {
			$this->desact = $v;
			$this->modifiedColumns[] = BndefactPeer::DESACT;
		}

	} 
	
	public function setCanact($v)
	{

		if ($this->canact !== $v) {
			$this->canact = $v;
			$this->modifiedColumns[] = BndefactPeer::CANACT;
		}

	} 
	
	public function setStaact($v)
	{

		if ($this->staact !== $v) {
			$this->staact = $v;
			$this->modifiedColumns[] = BndefactPeer::STAACT;
		}

	} 
	
	public function setViduti($v)
	{

		if ($this->viduti !== $v) {
			$this->viduti = $v;
			$this->modifiedColumns[] = BndefactPeer::VIDUTI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BndefactPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codact = $rs->getString($startcol + 0);

			$this->desact = $rs->getString($startcol + 1);

			$this->canact = $rs->getFloat($startcol + 2);

			$this->staact = $rs->getString($startcol + 3);

			$this->viduti = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bndefact object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BndefactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndefactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndefactPeer::DATABASE_NAME);
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
					$pk = BndefactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BndefactPeer::doUpdate($this, $con);
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


			if (($retval = BndefactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getDesact();
				break;
			case 2:
				return $this->getCanact();
				break;
			case 3:
				return $this->getStaact();
				break;
			case 4:
				return $this->getViduti();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndefactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getDesact(),
			$keys[2] => $this->getCanact(),
			$keys[3] => $this->getStaact(),
			$keys[4] => $this->getViduti(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setDesact($value);
				break;
			case 2:
				$this->setCanact($value);
				break;
			case 3:
				$this->setStaact($value);
				break;
			case 4:
				$this->setViduti($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndefactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStaact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setViduti($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndefactPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndefactPeer::CODACT)) $criteria->add(BndefactPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndefactPeer::DESACT)) $criteria->add(BndefactPeer::DESACT, $this->desact);
		if ($this->isColumnModified(BndefactPeer::CANACT)) $criteria->add(BndefactPeer::CANACT, $this->canact);
		if ($this->isColumnModified(BndefactPeer::STAACT)) $criteria->add(BndefactPeer::STAACT, $this->staact);
		if ($this->isColumnModified(BndefactPeer::VIDUTI)) $criteria->add(BndefactPeer::VIDUTI, $this->viduti);
		if ($this->isColumnModified(BndefactPeer::ID)) $criteria->add(BndefactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndefactPeer::DATABASE_NAME);

		$criteria->add(BndefactPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setDesact($this->desact);

		$copyObj->setCanact($this->canact);

		$copyObj->setStaact($this->staact);

		$copyObj->setViduti($this->viduti);


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
			self::$peer = new BndefactPeer();
		}
		return self::$peer;
	}

} 