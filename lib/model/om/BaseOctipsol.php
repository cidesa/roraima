<?php


abstract class BaseOctipsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsol;


	
	protected $dessol;


	
	protected $tipsol;


	
	protected $maxdia;


	
	protected $stasol;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodsol()
	{

		return $this->codsol;
	}

	
	public function getDessol()
	{

		return $this->dessol;
	}

	
	public function getTipsol()
	{

		return $this->tipsol;
	}

	
	public function getMaxdia()
	{

		return $this->maxdia;
	}

	
	public function getStasol()
	{

		return $this->stasol;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodsol($v)
	{

		if ($this->codsol !== $v) {
			$this->codsol = $v;
			$this->modifiedColumns[] = OctipsolPeer::CODSOL;
		}

	} 
	
	public function setDessol($v)
	{

		if ($this->dessol !== $v) {
			$this->dessol = $v;
			$this->modifiedColumns[] = OctipsolPeer::DESSOL;
		}

	} 
	
	public function setTipsol($v)
	{

		if ($this->tipsol !== $v) {
			$this->tipsol = $v;
			$this->modifiedColumns[] = OctipsolPeer::TIPSOL;
		}

	} 
	
	public function setMaxdia($v)
	{

		if ($this->maxdia !== $v) {
			$this->maxdia = $v;
			$this->modifiedColumns[] = OctipsolPeer::MAXDIA;
		}

	} 
	
	public function setStasol($v)
	{

		if ($this->stasol !== $v) {
			$this->stasol = $v;
			$this->modifiedColumns[] = OctipsolPeer::STASOL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OctipsolPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codsol = $rs->getString($startcol + 0);

			$this->dessol = $rs->getString($startcol + 1);

			$this->tipsol = $rs->getString($startcol + 2);

			$this->maxdia = $rs->getString($startcol + 3);

			$this->stasol = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Octipsol object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OctipsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OctipsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OctipsolPeer::DATABASE_NAME);
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
					$pk = OctipsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OctipsolPeer::doUpdate($this, $con);
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


			if (($retval = OctipsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsol();
				break;
			case 1:
				return $this->getDessol();
				break;
			case 2:
				return $this->getTipsol();
				break;
			case 3:
				return $this->getMaxdia();
				break;
			case 4:
				return $this->getStasol();
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
		$keys = OctipsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsol(),
			$keys[1] => $this->getDessol(),
			$keys[2] => $this->getTipsol(),
			$keys[3] => $this->getMaxdia(),
			$keys[4] => $this->getStasol(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsol($value);
				break;
			case 1:
				$this->setDessol($value);
				break;
			case 2:
				$this->setTipsol($value);
				break;
			case 3:
				$this->setMaxdia($value);
				break;
			case 4:
				$this->setStasol($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OctipsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMaxdia($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStasol($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OctipsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(OctipsolPeer::CODSOL)) $criteria->add(OctipsolPeer::CODSOL, $this->codsol);
		if ($this->isColumnModified(OctipsolPeer::DESSOL)) $criteria->add(OctipsolPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(OctipsolPeer::TIPSOL)) $criteria->add(OctipsolPeer::TIPSOL, $this->tipsol);
		if ($this->isColumnModified(OctipsolPeer::MAXDIA)) $criteria->add(OctipsolPeer::MAXDIA, $this->maxdia);
		if ($this->isColumnModified(OctipsolPeer::STASOL)) $criteria->add(OctipsolPeer::STASOL, $this->stasol);
		if ($this->isColumnModified(OctipsolPeer::ID)) $criteria->add(OctipsolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OctipsolPeer::DATABASE_NAME);

		$criteria->add(OctipsolPeer::ID, $this->id);

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

		$copyObj->setCodsol($this->codsol);

		$copyObj->setDessol($this->dessol);

		$copyObj->setTipsol($this->tipsol);

		$copyObj->setMaxdia($this->maxdia);

		$copyObj->setStasol($this->stasol);


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
			self::$peer = new OctipsolPeer();
		}
		return self::$peer;
	}

} 