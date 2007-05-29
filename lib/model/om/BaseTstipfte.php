<?php


abstract class BaseTstipfte extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipfte;


	
	protected $nomtipfte;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtipfte()
	{

		return $this->codtipfte; 		
	}
	
	public function getNomtipfte()
	{

		return $this->nomtipfte; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodtipfte($v)
	{

		if ($this->codtipfte !== $v) {
			$this->codtipfte = $v;
			$this->modifiedColumns[] = TstipftePeer::CODTIPFTE;
		}

	} 
	
	public function setNomtipfte($v)
	{

		if ($this->nomtipfte !== $v) {
			$this->nomtipfte = $v;
			$this->modifiedColumns[] = TstipftePeer::NOMTIPFTE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TstipftePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtipfte = $rs->getString($startcol + 0);

			$this->nomtipfte = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tstipfte object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TstipftePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TstipftePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TstipftePeer::DATABASE_NAME);
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
					$pk = TstipftePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TstipftePeer::doUpdate($this, $con);
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


			if (($retval = TstipftePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TstipftePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipfte();
				break;
			case 1:
				return $this->getNomtipfte();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TstipftePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipfte(),
			$keys[1] => $this->getNomtipfte(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TstipftePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipfte($value);
				break;
			case 1:
				$this->setNomtipfte($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TstipftePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipfte($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtipfte($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TstipftePeer::DATABASE_NAME);

		if ($this->isColumnModified(TstipftePeer::CODTIPFTE)) $criteria->add(TstipftePeer::CODTIPFTE, $this->codtipfte);
		if ($this->isColumnModified(TstipftePeer::NOMTIPFTE)) $criteria->add(TstipftePeer::NOMTIPFTE, $this->nomtipfte);
		if ($this->isColumnModified(TstipftePeer::ID)) $criteria->add(TstipftePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TstipftePeer::DATABASE_NAME);

		$criteria->add(TstipftePeer::ID, $this->id);

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

		$copyObj->setCodtipfte($this->codtipfte);

		$copyObj->setNomtipfte($this->nomtipfte);


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
			self::$peer = new TstipftePeer();
		}
		return self::$peer;
	}

} 