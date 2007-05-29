<?php


abstract class BaseFccajero extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcaj;


	
	protected $cedcaj;


	
	protected $nomcaj;


	
	protected $dircaj;


	
	protected $telcaj;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcaj()
	{

		return $this->codcaj; 		
	}
	
	public function getCedcaj()
	{

		return $this->cedcaj; 		
	}
	
	public function getNomcaj()
	{

		return $this->nomcaj; 		
	}
	
	public function getDircaj()
	{

		return $this->dircaj; 		
	}
	
	public function getTelcaj()
	{

		return $this->telcaj; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcaj($v)
	{

		if ($this->codcaj !== $v) {
			$this->codcaj = $v;
			$this->modifiedColumns[] = FccajeroPeer::CODCAJ;
		}

	} 
	
	public function setCedcaj($v)
	{

		if ($this->cedcaj !== $v) {
			$this->cedcaj = $v;
			$this->modifiedColumns[] = FccajeroPeer::CEDCAJ;
		}

	} 
	
	public function setNomcaj($v)
	{

		if ($this->nomcaj !== $v) {
			$this->nomcaj = $v;
			$this->modifiedColumns[] = FccajeroPeer::NOMCAJ;
		}

	} 
	
	public function setDircaj($v)
	{

		if ($this->dircaj !== $v) {
			$this->dircaj = $v;
			$this->modifiedColumns[] = FccajeroPeer::DIRCAJ;
		}

	} 
	
	public function setTelcaj($v)
	{

		if ($this->telcaj !== $v) {
			$this->telcaj = $v;
			$this->modifiedColumns[] = FccajeroPeer::TELCAJ;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FccajeroPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcaj = $rs->getString($startcol + 0);

			$this->cedcaj = $rs->getString($startcol + 1);

			$this->nomcaj = $rs->getString($startcol + 2);

			$this->dircaj = $rs->getString($startcol + 3);

			$this->telcaj = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fccajero object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FccajeroPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FccajeroPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FccajeroPeer::DATABASE_NAME);
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
					$pk = FccajeroPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FccajeroPeer::doUpdate($this, $con);
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


			if (($retval = FccajeroPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccajeroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcaj();
				break;
			case 1:
				return $this->getCedcaj();
				break;
			case 2:
				return $this->getNomcaj();
				break;
			case 3:
				return $this->getDircaj();
				break;
			case 4:
				return $this->getTelcaj();
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
		$keys = FccajeroPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcaj(),
			$keys[1] => $this->getCedcaj(),
			$keys[2] => $this->getNomcaj(),
			$keys[3] => $this->getDircaj(),
			$keys[4] => $this->getTelcaj(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccajeroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcaj($value);
				break;
			case 1:
				$this->setCedcaj($value);
				break;
			case 2:
				$this->setNomcaj($value);
				break;
			case 3:
				$this->setDircaj($value);
				break;
			case 4:
				$this->setTelcaj($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FccajeroPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcaj($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedcaj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcaj($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDircaj($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelcaj($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FccajeroPeer::DATABASE_NAME);

		if ($this->isColumnModified(FccajeroPeer::CODCAJ)) $criteria->add(FccajeroPeer::CODCAJ, $this->codcaj);
		if ($this->isColumnModified(FccajeroPeer::CEDCAJ)) $criteria->add(FccajeroPeer::CEDCAJ, $this->cedcaj);
		if ($this->isColumnModified(FccajeroPeer::NOMCAJ)) $criteria->add(FccajeroPeer::NOMCAJ, $this->nomcaj);
		if ($this->isColumnModified(FccajeroPeer::DIRCAJ)) $criteria->add(FccajeroPeer::DIRCAJ, $this->dircaj);
		if ($this->isColumnModified(FccajeroPeer::TELCAJ)) $criteria->add(FccajeroPeer::TELCAJ, $this->telcaj);
		if ($this->isColumnModified(FccajeroPeer::ID)) $criteria->add(FccajeroPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FccajeroPeer::DATABASE_NAME);

		$criteria->add(FccajeroPeer::ID, $this->id);

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

		$copyObj->setCodcaj($this->codcaj);

		$copyObj->setCedcaj($this->cedcaj);

		$copyObj->setNomcaj($this->nomcaj);

		$copyObj->setDircaj($this->dircaj);

		$copyObj->setTelcaj($this->telcaj);


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
			self::$peer = new FccajeroPeer();
		}
		return self::$peer;
	}

} 