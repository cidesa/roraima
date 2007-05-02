<?php


abstract class BaseFcfuentesrec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrec;


	
	protected $codfue;


	
	protected $codfuegen;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodrec()
	{

		return $this->codrec;
	}

	
	public function getCodfue()
	{

		return $this->codfue;
	}

	
	public function getCodfuegen()
	{

		return $this->codfuegen;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodrec($v)
	{

		if ($this->codrec !== $v) {
			$this->codrec = $v;
			$this->modifiedColumns[] = FcfuentesrecPeer::CODREC;
		}

	} 
	
	public function setCodfue($v)
	{

		if ($this->codfue !== $v) {
			$this->codfue = $v;
			$this->modifiedColumns[] = FcfuentesrecPeer::CODFUE;
		}

	} 
	
	public function setCodfuegen($v)
	{

		if ($this->codfuegen !== $v) {
			$this->codfuegen = $v;
			$this->modifiedColumns[] = FcfuentesrecPeer::CODFUEGEN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcfuentesrecPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codrec = $rs->getString($startcol + 0);

			$this->codfue = $rs->getString($startcol + 1);

			$this->codfuegen = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcfuentesrec object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcfuentesrecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcfuentesrecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcfuentesrecPeer::DATABASE_NAME);
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
					$pk = FcfuentesrecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcfuentesrecPeer::doUpdate($this, $con);
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


			if (($retval = FcfuentesrecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcfuentesrecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrec();
				break;
			case 1:
				return $this->getCodfue();
				break;
			case 2:
				return $this->getCodfuegen();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcfuentesrecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrec(),
			$keys[1] => $this->getCodfue(),
			$keys[2] => $this->getCodfuegen(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcfuentesrecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrec($value);
				break;
			case 1:
				$this->setCodfue($value);
				break;
			case 2:
				$this->setCodfuegen($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcfuentesrecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodfuegen($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcfuentesrecPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcfuentesrecPeer::CODREC)) $criteria->add(FcfuentesrecPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FcfuentesrecPeer::CODFUE)) $criteria->add(FcfuentesrecPeer::CODFUE, $this->codfue);
		if ($this->isColumnModified(FcfuentesrecPeer::CODFUEGEN)) $criteria->add(FcfuentesrecPeer::CODFUEGEN, $this->codfuegen);
		if ($this->isColumnModified(FcfuentesrecPeer::ID)) $criteria->add(FcfuentesrecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcfuentesrecPeer::DATABASE_NAME);

		$criteria->add(FcfuentesrecPeer::ID, $this->id);

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

		$copyObj->setCodrec($this->codrec);

		$copyObj->setCodfue($this->codfue);

		$copyObj->setCodfuegen($this->codfuegen);


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
			self::$peer = new FcfuentesrecPeer();
		}
		return self::$peer;
	}

} 