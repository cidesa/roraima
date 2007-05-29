<?php


abstract class BaseForcorsubobj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codequ;


	
	protected $corsubobj;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodequ()
	{

		return $this->codequ; 		
	}
	
	public function getCorsubobj()
	{

		return number_format($this->corsubobj,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodequ($v)
	{

		if ($this->codequ !== $v) {
			$this->codequ = $v;
			$this->modifiedColumns[] = ForcorsubobjPeer::CODEQU;
		}

	} 
	
	public function setCorsubobj($v)
	{

		if ($this->corsubobj !== $v) {
			$this->corsubobj = $v;
			$this->modifiedColumns[] = ForcorsubobjPeer::CORSUBOBJ;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForcorsubobjPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codequ = $rs->getString($startcol + 0);

			$this->corsubobj = $rs->getFloat($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forcorsubobj object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForcorsubobjPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForcorsubobjPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForcorsubobjPeer::DATABASE_NAME);
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
					$pk = ForcorsubobjPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForcorsubobjPeer::doUpdate($this, $con);
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


			if (($retval = ForcorsubobjPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcorsubobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodequ();
				break;
			case 1:
				return $this->getCorsubobj();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForcorsubobjPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodequ(),
			$keys[1] => $this->getCorsubobj(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcorsubobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodequ($value);
				break;
			case 1:
				$this->setCorsubobj($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForcorsubobjPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodequ($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCorsubobj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForcorsubobjPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForcorsubobjPeer::CODEQU)) $criteria->add(ForcorsubobjPeer::CODEQU, $this->codequ);
		if ($this->isColumnModified(ForcorsubobjPeer::CORSUBOBJ)) $criteria->add(ForcorsubobjPeer::CORSUBOBJ, $this->corsubobj);
		if ($this->isColumnModified(ForcorsubobjPeer::ID)) $criteria->add(ForcorsubobjPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForcorsubobjPeer::DATABASE_NAME);

		$criteria->add(ForcorsubobjPeer::ID, $this->id);

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

		$copyObj->setCodequ($this->codequ);

		$copyObj->setCorsubobj($this->corsubobj);


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
			self::$peer = new ForcorsubobjPeer();
		}
		return self::$peer;
	}

} 