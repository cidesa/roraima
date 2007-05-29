<?php


abstract class BaseDftemporal5 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedrif;


	
	protected $nomben;


	
	protected $telben;


	
	protected $nitben;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCedrif()
	{

		return $this->cedrif; 		
	}
	
	public function getNomben()
	{

		return $this->nomben; 		
	}
	
	public function getTelben()
	{

		return $this->telben; 		
	}
	
	public function getNitben()
	{

		return $this->nitben; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = Dftemporal5Peer::CEDRIF;
		}

	} 
	
	public function setNomben($v)
	{

		if ($this->nomben !== $v) {
			$this->nomben = $v;
			$this->modifiedColumns[] = Dftemporal5Peer::NOMBEN;
		}

	} 
	
	public function setTelben($v)
	{

		if ($this->telben !== $v) {
			$this->telben = $v;
			$this->modifiedColumns[] = Dftemporal5Peer::TELBEN;
		}

	} 
	
	public function setNitben($v)
	{

		if ($this->nitben !== $v) {
			$this->nitben = $v;
			$this->modifiedColumns[] = Dftemporal5Peer::NITBEN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Dftemporal5Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->cedrif = $rs->getString($startcol + 0);

			$this->nomben = $rs->getString($startcol + 1);

			$this->telben = $rs->getString($startcol + 2);

			$this->nitben = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dftemporal5 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Dftemporal5Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Dftemporal5Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Dftemporal5Peer::DATABASE_NAME);
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
					$pk = Dftemporal5Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Dftemporal5Peer::doUpdate($this, $con);
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


			if (($retval = Dftemporal5Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Dftemporal5Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedrif();
				break;
			case 1:
				return $this->getNomben();
				break;
			case 2:
				return $this->getTelben();
				break;
			case 3:
				return $this->getNitben();
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
		$keys = Dftemporal5Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedrif(),
			$keys[1] => $this->getNomben(),
			$keys[2] => $this->getTelben(),
			$keys[3] => $this->getNitben(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Dftemporal5Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedrif($value);
				break;
			case 1:
				$this->setNomben($value);
				break;
			case 2:
				$this->setTelben($value);
				break;
			case 3:
				$this->setNitben($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Dftemporal5Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedrif($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomben($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTelben($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNitben($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Dftemporal5Peer::DATABASE_NAME);

		if ($this->isColumnModified(Dftemporal5Peer::CEDRIF)) $criteria->add(Dftemporal5Peer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(Dftemporal5Peer::NOMBEN)) $criteria->add(Dftemporal5Peer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(Dftemporal5Peer::TELBEN)) $criteria->add(Dftemporal5Peer::TELBEN, $this->telben);
		if ($this->isColumnModified(Dftemporal5Peer::NITBEN)) $criteria->add(Dftemporal5Peer::NITBEN, $this->nitben);
		if ($this->isColumnModified(Dftemporal5Peer::ID)) $criteria->add(Dftemporal5Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Dftemporal5Peer::DATABASE_NAME);

		$criteria->add(Dftemporal5Peer::ID, $this->id);

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

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomben($this->nomben);

		$copyObj->setTelben($this->telben);

		$copyObj->setNitben($this->nitben);


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
			self::$peer = new Dftemporal5Peer();
		}
		return self::$peer;
	}

} 