<?php


abstract class BaseFordetorggob extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codorg;


	
	protected $fecpre;


	
	protected $monaco;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodorg()
	{

		return $this->codorg;
	}

	
	public function getFecpre()
	{

		return $this->fecpre;
	}

	
	public function getMonaco()
	{

		return $this->monaco;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = FordetorggobPeer::CODORG;
		}

	} 
	
	public function setFecpre($v)
	{

		if ($this->fecpre !== $v) {
			$this->fecpre = $v;
			$this->modifiedColumns[] = FordetorggobPeer::FECPRE;
		}

	} 
	
	public function setMonaco($v)
	{

		if ($this->monaco !== $v) {
			$this->monaco = $v;
			$this->modifiedColumns[] = FordetorggobPeer::MONACO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordetorggobPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codorg = $rs->getString($startcol + 0);

			$this->fecpre = $rs->getString($startcol + 1);

			$this->monaco = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordetorggob object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordetorggobPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordetorggobPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordetorggobPeer::DATABASE_NAME);
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
					$pk = FordetorggobPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordetorggobPeer::doUpdate($this, $con);
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


			if (($retval = FordetorggobPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordetorggobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodorg();
				break;
			case 1:
				return $this->getFecpre();
				break;
			case 2:
				return $this->getMonaco();
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
		$keys = FordetorggobPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodorg(),
			$keys[1] => $this->getFecpre(),
			$keys[2] => $this->getMonaco(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordetorggobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodorg($value);
				break;
			case 1:
				$this->setFecpre($value);
				break;
			case 2:
				$this->setMonaco($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordetorggobPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodorg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonaco($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordetorggobPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordetorggobPeer::CODORG)) $criteria->add(FordetorggobPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(FordetorggobPeer::FECPRE)) $criteria->add(FordetorggobPeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(FordetorggobPeer::MONACO)) $criteria->add(FordetorggobPeer::MONACO, $this->monaco);
		if ($this->isColumnModified(FordetorggobPeer::ID)) $criteria->add(FordetorggobPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordetorggobPeer::DATABASE_NAME);

		$criteria->add(FordetorggobPeer::ID, $this->id);

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

		$copyObj->setFecpre($this->fecpre);

		$copyObj->setMonaco($this->monaco);


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
			self::$peer = new FordetorggobPeer();
		}
		return self::$peer;
	}

} 