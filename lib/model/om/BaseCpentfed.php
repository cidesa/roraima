<?php


abstract class BaseCpentfed extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codent;


	
	protected $desent;


	
	protected $asient;


	
	protected $disent;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodent()
	{

		return $this->codent;
	}

	
	public function getDesent()
	{

		return $this->desent;
	}

	
	public function getAsient()
	{

		return $this->asient;
	}

	
	public function getDisent()
	{

		return $this->disent;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodent($v)
	{

		if ($this->codent !== $v) {
			$this->codent = $v;
			$this->modifiedColumns[] = CpentfedPeer::CODENT;
		}

	} 
	
	public function setDesent($v)
	{

		if ($this->desent !== $v) {
			$this->desent = $v;
			$this->modifiedColumns[] = CpentfedPeer::DESENT;
		}

	} 
	
	public function setAsient($v)
	{

		if ($this->asient !== $v) {
			$this->asient = $v;
			$this->modifiedColumns[] = CpentfedPeer::ASIENT;
		}

	} 
	
	public function setDisent($v)
	{

		if ($this->disent !== $v) {
			$this->disent = $v;
			$this->modifiedColumns[] = CpentfedPeer::DISENT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpentfedPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codent = $rs->getString($startcol + 0);

			$this->desent = $rs->getString($startcol + 1);

			$this->asient = $rs->getFloat($startcol + 2);

			$this->disent = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpentfed object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpentfedPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpentfedPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpentfedPeer::DATABASE_NAME);
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
					$pk = CpentfedPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpentfedPeer::doUpdate($this, $con);
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


			if (($retval = CpentfedPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpentfedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodent();
				break;
			case 1:
				return $this->getDesent();
				break;
			case 2:
				return $this->getAsient();
				break;
			case 3:
				return $this->getDisent();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpentfedPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodent(),
			$keys[1] => $this->getDesent(),
			$keys[2] => $this->getAsient(),
			$keys[3] => $this->getDisent(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpentfedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodent($value);
				break;
			case 1:
				$this->setDesent($value);
				break;
			case 2:
				$this->setAsient($value);
				break;
			case 3:
				$this->setDisent($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpentfedPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodent($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAsient($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDisent($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpentfedPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpentfedPeer::CODENT)) $criteria->add(CpentfedPeer::CODENT, $this->codent);
		if ($this->isColumnModified(CpentfedPeer::DESENT)) $criteria->add(CpentfedPeer::DESENT, $this->desent);
		if ($this->isColumnModified(CpentfedPeer::ASIENT)) $criteria->add(CpentfedPeer::ASIENT, $this->asient);
		if ($this->isColumnModified(CpentfedPeer::DISENT)) $criteria->add(CpentfedPeer::DISENT, $this->disent);
		if ($this->isColumnModified(CpentfedPeer::ID)) $criteria->add(CpentfedPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpentfedPeer::DATABASE_NAME);

		$criteria->add(CpentfedPeer::ID, $this->id);

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

		$copyObj->setCodent($this->codent);

		$copyObj->setDesent($this->desent);

		$copyObj->setAsient($this->asient);

		$copyObj->setDisent($this->disent);


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
			self::$peer = new CpentfedPeer();
		}
		return self::$peer;
	}

} 