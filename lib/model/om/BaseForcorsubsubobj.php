<?php


abstract class BaseForcorsubsubobj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codequ;


	
	protected $codsubobj;


	
	protected $corsubsubobj;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodequ()
	{

		return $this->codequ; 		
	}
	
	public function getCodsubobj()
	{

		return $this->codsubobj; 		
	}
	
	public function getCorsubsubobj()
	{

		return number_format($this->corsubsubobj,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodequ($v)
	{

		if ($this->codequ !== $v) {
			$this->codequ = $v;
			$this->modifiedColumns[] = ForcorsubsubobjPeer::CODEQU;
		}

	} 
	
	public function setCodsubobj($v)
	{

		if ($this->codsubobj !== $v) {
			$this->codsubobj = $v;
			$this->modifiedColumns[] = ForcorsubsubobjPeer::CODSUBOBJ;
		}

	} 
	
	public function setCorsubsubobj($v)
	{

		if ($this->corsubsubobj !== $v) {
			$this->corsubsubobj = $v;
			$this->modifiedColumns[] = ForcorsubsubobjPeer::CORSUBSUBOBJ;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForcorsubsubobjPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codequ = $rs->getString($startcol + 0);

			$this->codsubobj = $rs->getString($startcol + 1);

			$this->corsubsubobj = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forcorsubsubobj object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForcorsubsubobjPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForcorsubsubobjPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForcorsubsubobjPeer::DATABASE_NAME);
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
					$pk = ForcorsubsubobjPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForcorsubsubobjPeer::doUpdate($this, $con);
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


			if (($retval = ForcorsubsubobjPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcorsubsubobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodequ();
				break;
			case 1:
				return $this->getCodsubobj();
				break;
			case 2:
				return $this->getCorsubsubobj();
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
		$keys = ForcorsubsubobjPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodequ(),
			$keys[1] => $this->getCodsubobj(),
			$keys[2] => $this->getCorsubsubobj(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcorsubsubobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodequ($value);
				break;
			case 1:
				$this->setCodsubobj($value);
				break;
			case 2:
				$this->setCorsubsubobj($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForcorsubsubobjPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodequ($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodsubobj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorsubsubobj($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForcorsubsubobjPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForcorsubsubobjPeer::CODEQU)) $criteria->add(ForcorsubsubobjPeer::CODEQU, $this->codequ);
		if ($this->isColumnModified(ForcorsubsubobjPeer::CODSUBOBJ)) $criteria->add(ForcorsubsubobjPeer::CODSUBOBJ, $this->codsubobj);
		if ($this->isColumnModified(ForcorsubsubobjPeer::CORSUBSUBOBJ)) $criteria->add(ForcorsubsubobjPeer::CORSUBSUBOBJ, $this->corsubsubobj);
		if ($this->isColumnModified(ForcorsubsubobjPeer::ID)) $criteria->add(ForcorsubsubobjPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForcorsubsubobjPeer::DATABASE_NAME);

		$criteria->add(ForcorsubsubobjPeer::ID, $this->id);

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

		$copyObj->setCodsubobj($this->codsubobj);

		$copyObj->setCorsubsubobj($this->corsubsubobj);


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
			self::$peer = new ForcorsubsubobjPeer();
		}
		return self::$peer;
	}

} 