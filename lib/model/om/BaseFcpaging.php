<?php


abstract class BaseFcpaging extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refere;


	
	protected $tippag;


	
	protected $moning;


	
	protected $numref;


	
	protected $nomref;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefere()
	{

		return $this->refere;
	}

	
	public function getTippag()
	{

		return $this->tippag;
	}

	
	public function getMoning()
	{

		return $this->moning;
	}

	
	public function getNumref()
	{

		return $this->numref;
	}

	
	public function getNomref()
	{

		return $this->nomref;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefere($v)
	{

		if ($this->refere !== $v) {
			$this->refere = $v;
			$this->modifiedColumns[] = FcpagingPeer::REFERE;
		}

	} 
	
	public function setTippag($v)
	{

		if ($this->tippag !== $v) {
			$this->tippag = $v;
			$this->modifiedColumns[] = FcpagingPeer::TIPPAG;
		}

	} 
	
	public function setMoning($v)
	{

		if ($this->moning !== $v) {
			$this->moning = $v;
			$this->modifiedColumns[] = FcpagingPeer::MONING;
		}

	} 
	
	public function setNumref($v)
	{

		if ($this->numref !== $v) {
			$this->numref = $v;
			$this->modifiedColumns[] = FcpagingPeer::NUMREF;
		}

	} 
	
	public function setNomref($v)
	{

		if ($this->nomref !== $v) {
			$this->nomref = $v;
			$this->modifiedColumns[] = FcpagingPeer::NOMREF;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcpagingPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refere = $rs->getString($startcol + 0);

			$this->tippag = $rs->getString($startcol + 1);

			$this->moning = $rs->getFloat($startcol + 2);

			$this->numref = $rs->getString($startcol + 3);

			$this->nomref = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcpaging object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcpagingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcpagingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcpagingPeer::DATABASE_NAME);
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
					$pk = FcpagingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcpagingPeer::doUpdate($this, $con);
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


			if (($retval = FcpagingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcpagingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefere();
				break;
			case 1:
				return $this->getTippag();
				break;
			case 2:
				return $this->getMoning();
				break;
			case 3:
				return $this->getNumref();
				break;
			case 4:
				return $this->getNomref();
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
		$keys = FcpagingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefere(),
			$keys[1] => $this->getTippag(),
			$keys[2] => $this->getMoning(),
			$keys[3] => $this->getNumref(),
			$keys[4] => $this->getNomref(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcpagingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefere($value);
				break;
			case 1:
				$this->setTippag($value);
				break;
			case 2:
				$this->setMoning($value);
				break;
			case 3:
				$this->setNumref($value);
				break;
			case 4:
				$this->setNomref($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcpagingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefere($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTippag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMoning($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumref($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomref($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcpagingPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcpagingPeer::REFERE)) $criteria->add(FcpagingPeer::REFERE, $this->refere);
		if ($this->isColumnModified(FcpagingPeer::TIPPAG)) $criteria->add(FcpagingPeer::TIPPAG, $this->tippag);
		if ($this->isColumnModified(FcpagingPeer::MONING)) $criteria->add(FcpagingPeer::MONING, $this->moning);
		if ($this->isColumnModified(FcpagingPeer::NUMREF)) $criteria->add(FcpagingPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(FcpagingPeer::NOMREF)) $criteria->add(FcpagingPeer::NOMREF, $this->nomref);
		if ($this->isColumnModified(FcpagingPeer::ID)) $criteria->add(FcpagingPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcpagingPeer::DATABASE_NAME);

		$criteria->add(FcpagingPeer::REFERE, $this->refere);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getRefere();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setRefere($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTippag($this->tippag);

		$copyObj->setMoning($this->moning);

		$copyObj->setNumref($this->numref);

		$copyObj->setNomref($this->nomref);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setRefere(NULL); 
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
			self::$peer = new FcpagingPeer();
		}
		return self::$peer;
	}

} 