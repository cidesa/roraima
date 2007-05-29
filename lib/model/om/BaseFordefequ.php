<?php


abstract class BaseFordefequ extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codequ;


	
	protected $desequ;


	
	protected $desobj;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodequ()
	{

		return $this->codequ; 		
	}
	
	public function getDesequ()
	{

		return $this->desequ; 		
	}
	
	public function getDesobj()
	{

		return $this->desobj; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodequ($v)
	{

		if ($this->codequ !== $v) {
			$this->codequ = $v;
			$this->modifiedColumns[] = FordefequPeer::CODEQU;
		}

	} 
	
	public function setDesequ($v)
	{

		if ($this->desequ !== $v) {
			$this->desequ = $v;
			$this->modifiedColumns[] = FordefequPeer::DESEQU;
		}

	} 
	
	public function setDesobj($v)
	{

		if ($this->desobj !== $v) {
			$this->desobj = $v;
			$this->modifiedColumns[] = FordefequPeer::DESOBJ;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordefequPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codequ = $rs->getString($startcol + 0);

			$this->desequ = $rs->getString($startcol + 1);

			$this->desobj = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordefequ object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefequPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefequPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefequPeer::DATABASE_NAME);
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
					$pk = FordefequPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefequPeer::doUpdate($this, $con);
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


			if (($retval = FordefequPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefequPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodequ();
				break;
			case 1:
				return $this->getDesequ();
				break;
			case 2:
				return $this->getDesobj();
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
		$keys = FordefequPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodequ(),
			$keys[1] => $this->getDesequ(),
			$keys[2] => $this->getDesobj(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefequPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodequ($value);
				break;
			case 1:
				$this->setDesequ($value);
				break;
			case 2:
				$this->setDesobj($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefequPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodequ($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesequ($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesobj($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefequPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefequPeer::CODEQU)) $criteria->add(FordefequPeer::CODEQU, $this->codequ);
		if ($this->isColumnModified(FordefequPeer::DESEQU)) $criteria->add(FordefequPeer::DESEQU, $this->desequ);
		if ($this->isColumnModified(FordefequPeer::DESOBJ)) $criteria->add(FordefequPeer::DESOBJ, $this->desobj);
		if ($this->isColumnModified(FordefequPeer::ID)) $criteria->add(FordefequPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefequPeer::DATABASE_NAME);

		$criteria->add(FordefequPeer::ID, $this->id);

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

		$copyObj->setDesequ($this->desequ);

		$copyObj->setDesobj($this->desobj);


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
			self::$peer = new FordefequPeer();
		}
		return self::$peer;
	}

} 