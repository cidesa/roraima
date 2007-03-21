<?php


abstract class BaseNpsitemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsitemp;


	
	protected $dessitemp;


	
	protected $calnom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodsitemp()
	{

		return $this->codsitemp;
	}

	
	public function getDessitemp()
	{

		return $this->dessitemp;
	}

	
	public function getCalnom()
	{

		return $this->calnom;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodsitemp($v)
	{

		if ($this->codsitemp !== $v) {
			$this->codsitemp = $v;
			$this->modifiedColumns[] = NpsitempPeer::CODSITEMP;
		}

	} 
	
	public function setDessitemp($v)
	{

		if ($this->dessitemp !== $v) {
			$this->dessitemp = $v;
			$this->modifiedColumns[] = NpsitempPeer::DESSITEMP;
		}

	} 
	
	public function setCalnom($v)
	{

		if ($this->calnom !== $v) {
			$this->calnom = $v;
			$this->modifiedColumns[] = NpsitempPeer::CALNOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpsitempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codsitemp = $rs->getString($startcol + 0);

			$this->dessitemp = $rs->getString($startcol + 1);

			$this->calnom = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npsitemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpsitempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpsitempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpsitempPeer::DATABASE_NAME);
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
					$pk = NpsitempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpsitempPeer::doUpdate($this, $con);
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


			if (($retval = NpsitempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpsitempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsitemp();
				break;
			case 1:
				return $this->getDessitemp();
				break;
			case 2:
				return $this->getCalnom();
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
		$keys = NpsitempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsitemp(),
			$keys[1] => $this->getDessitemp(),
			$keys[2] => $this->getCalnom(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpsitempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsitemp($value);
				break;
			case 1:
				$this->setDessitemp($value);
				break;
			case 2:
				$this->setCalnom($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpsitempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsitemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessitemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCalnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpsitempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpsitempPeer::CODSITEMP)) $criteria->add(NpsitempPeer::CODSITEMP, $this->codsitemp);
		if ($this->isColumnModified(NpsitempPeer::DESSITEMP)) $criteria->add(NpsitempPeer::DESSITEMP, $this->dessitemp);
		if ($this->isColumnModified(NpsitempPeer::CALNOM)) $criteria->add(NpsitempPeer::CALNOM, $this->calnom);
		if ($this->isColumnModified(NpsitempPeer::ID)) $criteria->add(NpsitempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpsitempPeer::DATABASE_NAME);

		$criteria->add(NpsitempPeer::ID, $this->id);

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

		$copyObj->setCodsitemp($this->codsitemp);

		$copyObj->setDessitemp($this->dessitemp);

		$copyObj->setCalnom($this->calnom);


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
			self::$peer = new NpsitempPeer();
		}
		return self::$peer;
	}

} 