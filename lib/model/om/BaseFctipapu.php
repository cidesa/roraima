<?php


abstract class BaseFctipapu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipapu;


	
	protected $anovig;


	
	protected $destip;


	
	protected $pormon;


	
	protected $alimon;


	
	protected $statip;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getTipapu()
	{

		return $this->tipapu;
	}

	
	public function getAnovig()
	{

		return $this->anovig;
	}

	
	public function getDestip()
	{

		return $this->destip;
	}

	
	public function getPormon()
	{

		return $this->pormon;
	}

	
	public function getAlimon()
	{

		return $this->alimon;
	}

	
	public function getStatip()
	{

		return $this->statip;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setTipapu($v)
	{

		if ($this->tipapu !== $v) {
			$this->tipapu = $v;
			$this->modifiedColumns[] = FctipapuPeer::TIPAPU;
		}

	} 
	
	public function setAnovig($v)
	{

		if ($this->anovig !== $v) {
			$this->anovig = $v;
			$this->modifiedColumns[] = FctipapuPeer::ANOVIG;
		}

	} 
	
	public function setDestip($v)
	{

		if ($this->destip !== $v) {
			$this->destip = $v;
			$this->modifiedColumns[] = FctipapuPeer::DESTIP;
		}

	} 
	
	public function setPormon($v)
	{

		if ($this->pormon !== $v) {
			$this->pormon = $v;
			$this->modifiedColumns[] = FctipapuPeer::PORMON;
		}

	} 
	
	public function setAlimon($v)
	{

		if ($this->alimon !== $v) {
			$this->alimon = $v;
			$this->modifiedColumns[] = FctipapuPeer::ALIMON;
		}

	} 
	
	public function setStatip($v)
	{

		if ($this->statip !== $v) {
			$this->statip = $v;
			$this->modifiedColumns[] = FctipapuPeer::STATIP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FctipapuPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->tipapu = $rs->getString($startcol + 0);

			$this->anovig = $rs->getString($startcol + 1);

			$this->destip = $rs->getString($startcol + 2);

			$this->pormon = $rs->getString($startcol + 3);

			$this->alimon = $rs->getFloat($startcol + 4);

			$this->statip = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fctipapu object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FctipapuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FctipapuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FctipapuPeer::DATABASE_NAME);
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
					$pk = FctipapuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FctipapuPeer::doUpdate($this, $con);
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


			if (($retval = FctipapuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctipapuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipapu();
				break;
			case 1:
				return $this->getAnovig();
				break;
			case 2:
				return $this->getDestip();
				break;
			case 3:
				return $this->getPormon();
				break;
			case 4:
				return $this->getAlimon();
				break;
			case 5:
				return $this->getStatip();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctipapuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipapu(),
			$keys[1] => $this->getAnovig(),
			$keys[2] => $this->getDestip(),
			$keys[3] => $this->getPormon(),
			$keys[4] => $this->getAlimon(),
			$keys[5] => $this->getStatip(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctipapuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipapu($value);
				break;
			case 1:
				$this->setAnovig($value);
				break;
			case 2:
				$this->setDestip($value);
				break;
			case 3:
				$this->setPormon($value);
				break;
			case 4:
				$this->setAlimon($value);
				break;
			case 5:
				$this->setStatip($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctipapuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipapu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAnovig($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestip($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPormon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAlimon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatip($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FctipapuPeer::DATABASE_NAME);

		if ($this->isColumnModified(FctipapuPeer::TIPAPU)) $criteria->add(FctipapuPeer::TIPAPU, $this->tipapu);
		if ($this->isColumnModified(FctipapuPeer::ANOVIG)) $criteria->add(FctipapuPeer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(FctipapuPeer::DESTIP)) $criteria->add(FctipapuPeer::DESTIP, $this->destip);
		if ($this->isColumnModified(FctipapuPeer::PORMON)) $criteria->add(FctipapuPeer::PORMON, $this->pormon);
		if ($this->isColumnModified(FctipapuPeer::ALIMON)) $criteria->add(FctipapuPeer::ALIMON, $this->alimon);
		if ($this->isColumnModified(FctipapuPeer::STATIP)) $criteria->add(FctipapuPeer::STATIP, $this->statip);
		if ($this->isColumnModified(FctipapuPeer::ID)) $criteria->add(FctipapuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FctipapuPeer::DATABASE_NAME);

		$criteria->add(FctipapuPeer::TIPAPU, $this->tipapu);
		$criteria->add(FctipapuPeer::ANOVIG, $this->anovig);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getTipapu();

		$pks[1] = $this->getAnovig();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setTipapu($keys[0]);

		$this->setAnovig($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDestip($this->destip);

		$copyObj->setPormon($this->pormon);

		$copyObj->setAlimon($this->alimon);

		$copyObj->setStatip($this->statip);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setTipapu(NULL); 
		$copyObj->setAnovig(NULL); 
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
			self::$peer = new FctipapuPeer();
		}
		return self::$peer;
	}

} 