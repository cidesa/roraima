<?php


abstract class BaseRhdefemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $faxemp;


	
	protected $porcom;


	
	protected $porobj;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getFaxemp()
	{

		return $this->faxemp; 		
	}
	
	public function getPorcom()
	{

		return number_format($this->porcom,2,',','.');
		
	}
	
	public function getPorobj()
	{

		return number_format($this->porobj,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = RhdefempPeer::CODEMP;
		}

	} 
	
	public function setFaxemp($v)
	{

		if ($this->faxemp !== $v) {
			$this->faxemp = $v;
			$this->modifiedColumns[] = RhdefempPeer::FAXEMP;
		}

	} 
	
	public function setPorcom($v)
	{

		if ($this->porcom !== $v) {
			$this->porcom = $v;
			$this->modifiedColumns[] = RhdefempPeer::PORCOM;
		}

	} 
	
	public function setPorobj($v)
	{

		if ($this->porobj !== $v) {
			$this->porobj = $v;
			$this->modifiedColumns[] = RhdefempPeer::POROBJ;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RhdefempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->faxemp = $rs->getString($startcol + 1);

			$this->porcom = $rs->getFloat($startcol + 2);

			$this->porobj = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rhdefemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RhdefempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhdefempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhdefempPeer::DATABASE_NAME);
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
					$pk = RhdefempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RhdefempPeer::doUpdate($this, $con);
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


			if (($retval = RhdefempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFaxemp();
				break;
			case 2:
				return $this->getPorcom();
				break;
			case 3:
				return $this->getPorobj();
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
		$keys = RhdefempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFaxemp(),
			$keys[2] => $this->getPorcom(),
			$keys[3] => $this->getPorobj(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFaxemp($value);
				break;
			case 2:
				$this->setPorcom($value);
				break;
			case 3:
				$this->setPorobj($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhdefempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFaxemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorcom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPorobj($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhdefempPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhdefempPeer::CODEMP)) $criteria->add(RhdefempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(RhdefempPeer::FAXEMP)) $criteria->add(RhdefempPeer::FAXEMP, $this->faxemp);
		if ($this->isColumnModified(RhdefempPeer::PORCOM)) $criteria->add(RhdefempPeer::PORCOM, $this->porcom);
		if ($this->isColumnModified(RhdefempPeer::POROBJ)) $criteria->add(RhdefempPeer::POROBJ, $this->porobj);
		if ($this->isColumnModified(RhdefempPeer::ID)) $criteria->add(RhdefempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhdefempPeer::DATABASE_NAME);

		$criteria->add(RhdefempPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFaxemp($this->faxemp);

		$copyObj->setPorcom($this->porcom);

		$copyObj->setPorobj($this->porobj);


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
			self::$peer = new RhdefempPeer();
		}
		return self::$peer;
	}

} 