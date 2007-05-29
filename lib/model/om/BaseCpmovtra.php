<?php


abstract class BaseCpmovtra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftra;


	
	protected $codori;


	
	protected $coddes;


	
	protected $monmov;


	
	protected $stamov;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getReftra()
	{

		return $this->reftra; 		
	}
	
	public function getCodori()
	{

		return $this->codori; 		
	}
	
	public function getCoddes()
	{

		return $this->coddes; 		
	}
	
	public function getMonmov()
	{

		return number_format($this->monmov,2,',','.');
		
	}
	
	public function getStamov()
	{

		return $this->stamov; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setReftra($v)
	{

		if ($this->reftra !== $v) {
			$this->reftra = $v;
			$this->modifiedColumns[] = CpmovtraPeer::REFTRA;
		}

	} 
	
	public function setCodori($v)
	{

		if ($this->codori !== $v) {
			$this->codori = $v;
			$this->modifiedColumns[] = CpmovtraPeer::CODORI;
		}

	} 
	
	public function setCoddes($v)
	{

		if ($this->coddes !== $v) {
			$this->coddes = $v;
			$this->modifiedColumns[] = CpmovtraPeer::CODDES;
		}

	} 
	
	public function setMonmov($v)
	{

		if ($this->monmov !== $v) {
			$this->monmov = $v;
			$this->modifiedColumns[] = CpmovtraPeer::MONMOV;
		}

	} 
	
	public function setStamov($v)
	{

		if ($this->stamov !== $v) {
			$this->stamov = $v;
			$this->modifiedColumns[] = CpmovtraPeer::STAMOV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpmovtraPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->reftra = $rs->getString($startcol + 0);

			$this->codori = $rs->getString($startcol + 1);

			$this->coddes = $rs->getString($startcol + 2);

			$this->monmov = $rs->getFloat($startcol + 3);

			$this->stamov = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpmovtra object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpmovtraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpmovtraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpmovtraPeer::DATABASE_NAME);
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
					$pk = CpmovtraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpmovtraPeer::doUpdate($this, $con);
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


			if (($retval = CpmovtraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftra();
				break;
			case 1:
				return $this->getCodori();
				break;
			case 2:
				return $this->getCoddes();
				break;
			case 3:
				return $this->getMonmov();
				break;
			case 4:
				return $this->getStamov();
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
		$keys = CpmovtraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftra(),
			$keys[1] => $this->getCodori(),
			$keys[2] => $this->getCoddes(),
			$keys[3] => $this->getMonmov(),
			$keys[4] => $this->getStamov(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftra($value);
				break;
			case 1:
				$this->setCodori($value);
				break;
			case 2:
				$this->setCoddes($value);
				break;
			case 3:
				$this->setMonmov($value);
				break;
			case 4:
				$this->setStamov($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpmovtraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodori($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoddes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStamov($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpmovtraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpmovtraPeer::REFTRA)) $criteria->add(CpmovtraPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(CpmovtraPeer::CODORI)) $criteria->add(CpmovtraPeer::CODORI, $this->codori);
		if ($this->isColumnModified(CpmovtraPeer::CODDES)) $criteria->add(CpmovtraPeer::CODDES, $this->coddes);
		if ($this->isColumnModified(CpmovtraPeer::MONMOV)) $criteria->add(CpmovtraPeer::MONMOV, $this->monmov);
		if ($this->isColumnModified(CpmovtraPeer::STAMOV)) $criteria->add(CpmovtraPeer::STAMOV, $this->stamov);
		if ($this->isColumnModified(CpmovtraPeer::ID)) $criteria->add(CpmovtraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpmovtraPeer::DATABASE_NAME);

		$criteria->add(CpmovtraPeer::ID, $this->id);

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

		$copyObj->setReftra($this->reftra);

		$copyObj->setCodori($this->codori);

		$copyObj->setCoddes($this->coddes);

		$copyObj->setMonmov($this->monmov);

		$copyObj->setStamov($this->stamov);


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
			self::$peer = new CpmovtraPeer();
		}
		return self::$peer;
	}

} 