<?php


abstract class BaseFordeforggob extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codorg;


	
	protected $nomorg;


	
	protected $numgac;


	
	protected $actorg;


	
	protected $monest;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodorg()
	{

		return $this->codorg;
	}

	
	public function getNomorg()
	{

		return $this->nomorg;
	}

	
	public function getNumgac()
	{

		return $this->numgac;
	}

	
	public function getActorg()
	{

		return $this->actorg;
	}

	
	public function getMonest()
	{

		return $this->monest;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = FordeforggobPeer::CODORG;
		}

	} 
	
	public function setNomorg($v)
	{

		if ($this->nomorg !== $v) {
			$this->nomorg = $v;
			$this->modifiedColumns[] = FordeforggobPeer::NOMORG;
		}

	} 
	
	public function setNumgac($v)
	{

		if ($this->numgac !== $v) {
			$this->numgac = $v;
			$this->modifiedColumns[] = FordeforggobPeer::NUMGAC;
		}

	} 
	
	public function setActorg($v)
	{

		if ($this->actorg !== $v) {
			$this->actorg = $v;
			$this->modifiedColumns[] = FordeforggobPeer::ACTORG;
		}

	} 
	
	public function setMonest($v)
	{

		if ($this->monest !== $v) {
			$this->monest = $v;
			$this->modifiedColumns[] = FordeforggobPeer::MONEST;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordeforggobPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codorg = $rs->getString($startcol + 0);

			$this->nomorg = $rs->getString($startcol + 1);

			$this->numgac = $rs->getString($startcol + 2);

			$this->actorg = $rs->getString($startcol + 3);

			$this->monest = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordeforggob object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordeforggobPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordeforggobPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordeforggobPeer::DATABASE_NAME);
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
					$pk = FordeforggobPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordeforggobPeer::doUpdate($this, $con);
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


			if (($retval = FordeforggobPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordeforggobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodorg();
				break;
			case 1:
				return $this->getNomorg();
				break;
			case 2:
				return $this->getNumgac();
				break;
			case 3:
				return $this->getActorg();
				break;
			case 4:
				return $this->getMonest();
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
		$keys = FordeforggobPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodorg(),
			$keys[1] => $this->getNomorg(),
			$keys[2] => $this->getNumgac(),
			$keys[3] => $this->getActorg(),
			$keys[4] => $this->getMonest(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordeforggobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodorg($value);
				break;
			case 1:
				$this->setNomorg($value);
				break;
			case 2:
				$this->setNumgac($value);
				break;
			case 3:
				$this->setActorg($value);
				break;
			case 4:
				$this->setMonest($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordeforggobPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodorg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomorg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumgac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setActorg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonest($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordeforggobPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordeforggobPeer::CODORG)) $criteria->add(FordeforggobPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(FordeforggobPeer::NOMORG)) $criteria->add(FordeforggobPeer::NOMORG, $this->nomorg);
		if ($this->isColumnModified(FordeforggobPeer::NUMGAC)) $criteria->add(FordeforggobPeer::NUMGAC, $this->numgac);
		if ($this->isColumnModified(FordeforggobPeer::ACTORG)) $criteria->add(FordeforggobPeer::ACTORG, $this->actorg);
		if ($this->isColumnModified(FordeforggobPeer::MONEST)) $criteria->add(FordeforggobPeer::MONEST, $this->monest);
		if ($this->isColumnModified(FordeforggobPeer::ID)) $criteria->add(FordeforggobPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordeforggobPeer::DATABASE_NAME);

		$criteria->add(FordeforggobPeer::ID, $this->id);

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

		$copyObj->setCodorg($this->codorg);

		$copyObj->setNomorg($this->nomorg);

		$copyObj->setNumgac($this->numgac);

		$copyObj->setActorg($this->actorg);

		$copyObj->setMonest($this->monest);


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
			self::$peer = new FordeforggobPeer();
		}
		return self::$peer;
	}

} 