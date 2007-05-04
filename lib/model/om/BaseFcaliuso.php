<?php


abstract class BaseFcaliuso extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduso;


	
	protected $anovig;


	
	protected $nomuso;


	
	protected $alimon;


	
	protected $pormon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoduso()
	{

		return $this->coduso;
	}

	
	public function getAnovig()
	{

		return $this->anovig;
	}

	
	public function getNomuso()
	{

		return $this->nomuso;
	}

	
	public function getAlimon()
	{

		return $this->alimon;
	}

	
	public function getPormon()
	{

		return $this->pormon;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCoduso($v)
	{

		if ($this->coduso !== $v) {
			$this->coduso = $v;
			$this->modifiedColumns[] = FcaliusoPeer::CODUSO;
		}

	} 
	
	public function setAnovig($v)
	{

		if ($this->anovig !== $v) {
			$this->anovig = $v;
			$this->modifiedColumns[] = FcaliusoPeer::ANOVIG;
		}

	} 
	
	public function setNomuso($v)
	{

		if ($this->nomuso !== $v) {
			$this->nomuso = $v;
			$this->modifiedColumns[] = FcaliusoPeer::NOMUSO;
		}

	} 
	
	public function setAlimon($v)
	{

		if ($this->alimon !== $v) {
			$this->alimon = $v;
			$this->modifiedColumns[] = FcaliusoPeer::ALIMON;
		}

	} 
	
	public function setPormon($v)
	{

		if ($this->pormon !== $v) {
			$this->pormon = $v;
			$this->modifiedColumns[] = FcaliusoPeer::PORMON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcaliusoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coduso = $rs->getString($startcol + 0);

			$this->anovig = $rs->getString($startcol + 1);

			$this->nomuso = $rs->getString($startcol + 2);

			$this->alimon = $rs->getFloat($startcol + 3);

			$this->pormon = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcaliuso object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcaliusoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcaliusoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcaliusoPeer::DATABASE_NAME);
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
					$pk = FcaliusoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcaliusoPeer::doUpdate($this, $con);
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


			if (($retval = FcaliusoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcaliusoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduso();
				break;
			case 1:
				return $this->getAnovig();
				break;
			case 2:
				return $this->getNomuso();
				break;
			case 3:
				return $this->getAlimon();
				break;
			case 4:
				return $this->getPormon();
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
		$keys = FcaliusoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduso(),
			$keys[1] => $this->getAnovig(),
			$keys[2] => $this->getNomuso(),
			$keys[3] => $this->getAlimon(),
			$keys[4] => $this->getPormon(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcaliusoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduso($value);
				break;
			case 1:
				$this->setAnovig($value);
				break;
			case 2:
				$this->setNomuso($value);
				break;
			case 3:
				$this->setAlimon($value);
				break;
			case 4:
				$this->setPormon($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcaliusoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduso($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAnovig($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomuso($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAlimon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPormon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcaliusoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcaliusoPeer::CODUSO)) $criteria->add(FcaliusoPeer::CODUSO, $this->coduso);
		if ($this->isColumnModified(FcaliusoPeer::ANOVIG)) $criteria->add(FcaliusoPeer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(FcaliusoPeer::NOMUSO)) $criteria->add(FcaliusoPeer::NOMUSO, $this->nomuso);
		if ($this->isColumnModified(FcaliusoPeer::ALIMON)) $criteria->add(FcaliusoPeer::ALIMON, $this->alimon);
		if ($this->isColumnModified(FcaliusoPeer::PORMON)) $criteria->add(FcaliusoPeer::PORMON, $this->pormon);
		if ($this->isColumnModified(FcaliusoPeer::ID)) $criteria->add(FcaliusoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcaliusoPeer::DATABASE_NAME);

		$criteria->add(FcaliusoPeer::ID, $this->id);

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

		$copyObj->setCoduso($this->coduso);

		$copyObj->setAnovig($this->anovig);

		$copyObj->setNomuso($this->nomuso);

		$copyObj->setAlimon($this->alimon);

		$copyObj->setPormon($this->pormon);


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
			self::$peer = new FcaliusoPeer();
		}
		return self::$peer;
	}

} 