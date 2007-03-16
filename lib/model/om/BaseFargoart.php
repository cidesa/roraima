<?php


abstract class BaseFargoart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrgo;


	
	protected $codart;


	
	protected $refdoc;


	
	protected $monrgo;


	
	protected $tipdoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodrgo()
	{

		return $this->codrgo;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getRefdoc()
	{

		return $this->refdoc;
	}

	
	public function getMonrgo()
	{

		return $this->monrgo;
	}

	
	public function getTipdoc()
	{

		return $this->tipdoc;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodrgo($v)
	{

		if ($this->codrgo !== $v) {
			$this->codrgo = $v;
			$this->modifiedColumns[] = FargoartPeer::CODRGO;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = FargoartPeer::CODART;
		}

	} 
	
	public function setRefdoc($v)
	{

		if ($this->refdoc !== $v) {
			$this->refdoc = $v;
			$this->modifiedColumns[] = FargoartPeer::REFDOC;
		}

	} 
	
	public function setMonrgo($v)
	{

		if ($this->monrgo !== $v) {
			$this->monrgo = $v;
			$this->modifiedColumns[] = FargoartPeer::MONRGO;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = FargoartPeer::TIPDOC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FargoartPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codrgo = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->refdoc = $rs->getString($startcol + 2);

			$this->monrgo = $rs->getFloat($startcol + 3);

			$this->tipdoc = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fargoart object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FargoartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FargoartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FargoartPeer::DATABASE_NAME);
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
					$pk = FargoartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FargoartPeer::doUpdate($this, $con);
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


			if (($retval = FargoartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FargoartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrgo();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getRefdoc();
				break;
			case 3:
				return $this->getMonrgo();
				break;
			case 4:
				return $this->getTipdoc();
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
		$keys = FargoartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrgo(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getRefdoc(),
			$keys[3] => $this->getMonrgo(),
			$keys[4] => $this->getTipdoc(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FargoartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrgo($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setRefdoc($value);
				break;
			case 3:
				$this->setMonrgo($value);
				break;
			case 4:
				$this->setTipdoc($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FargoartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrgo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefdoc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonrgo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipdoc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FargoartPeer::DATABASE_NAME);

		if ($this->isColumnModified(FargoartPeer::CODRGO)) $criteria->add(FargoartPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(FargoartPeer::CODART)) $criteria->add(FargoartPeer::CODART, $this->codart);
		if ($this->isColumnModified(FargoartPeer::REFDOC)) $criteria->add(FargoartPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(FargoartPeer::MONRGO)) $criteria->add(FargoartPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FargoartPeer::TIPDOC)) $criteria->add(FargoartPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(FargoartPeer::ID)) $criteria->add(FargoartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FargoartPeer::DATABASE_NAME);

		$criteria->add(FargoartPeer::ID, $this->id);

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

		$copyObj->setCodrgo($this->codrgo);

		$copyObj->setCodart($this->codart);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setTipdoc($this->tipdoc);


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
			self::$peer = new FargoartPeer();
		}
		return self::$peer;
	}

} 