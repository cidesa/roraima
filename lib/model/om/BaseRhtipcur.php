<?php


abstract class BaseRhtipcur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipcur;


	
	protected $destipcur;


	
	protected $codarecur;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtipcur()
	{

		return $this->codtipcur;
	}

	
	public function getDestipcur()
	{

		return $this->destipcur;
	}

	
	public function getCodarecur()
	{

		return $this->codarecur;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodtipcur($v)
	{

		if ($this->codtipcur !== $v) {
			$this->codtipcur = $v;
			$this->modifiedColumns[] = RhtipcurPeer::CODTIPCUR;
		}

	} 
	
	public function setDestipcur($v)
	{

		if ($this->destipcur !== $v) {
			$this->destipcur = $v;
			$this->modifiedColumns[] = RhtipcurPeer::DESTIPCUR;
		}

	} 
	
	public function setCodarecur($v)
	{

		if ($this->codarecur !== $v) {
			$this->codarecur = $v;
			$this->modifiedColumns[] = RhtipcurPeer::CODARECUR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RhtipcurPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtipcur = $rs->getString($startcol + 0);

			$this->destipcur = $rs->getString($startcol + 1);

			$this->codarecur = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rhtipcur object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RhtipcurPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhtipcurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhtipcurPeer::DATABASE_NAME);
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
					$pk = RhtipcurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RhtipcurPeer::doUpdate($this, $con);
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


			if (($retval = RhtipcurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhtipcurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipcur();
				break;
			case 1:
				return $this->getDestipcur();
				break;
			case 2:
				return $this->getCodarecur();
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
		$keys = RhtipcurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipcur(),
			$keys[1] => $this->getDestipcur(),
			$keys[2] => $this->getCodarecur(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhtipcurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipcur($value);
				break;
			case 1:
				$this->setDestipcur($value);
				break;
			case 2:
				$this->setCodarecur($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhtipcurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipcur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipcur($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodarecur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhtipcurPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhtipcurPeer::CODTIPCUR)) $criteria->add(RhtipcurPeer::CODTIPCUR, $this->codtipcur);
		if ($this->isColumnModified(RhtipcurPeer::DESTIPCUR)) $criteria->add(RhtipcurPeer::DESTIPCUR, $this->destipcur);
		if ($this->isColumnModified(RhtipcurPeer::CODARECUR)) $criteria->add(RhtipcurPeer::CODARECUR, $this->codarecur);
		if ($this->isColumnModified(RhtipcurPeer::ID)) $criteria->add(RhtipcurPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhtipcurPeer::DATABASE_NAME);

		$criteria->add(RhtipcurPeer::ID, $this->id);

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

		$copyObj->setCodtipcur($this->codtipcur);

		$copyObj->setDestipcur($this->destipcur);

		$copyObj->setCodarecur($this->codarecur);


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
			self::$peer = new RhtipcurPeer();
		}
		return self::$peer;
	}

} 