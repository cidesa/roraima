<?php


abstract class BaseFadescom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddesc;


	
	protected $moncom;


	
	protected $codart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoddesc()
	{

		return $this->coddesc; 		
	}
	
	public function getMoncom()
	{

		return number_format($this->moncom,2,',','.');
		
	}
	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCoddesc($v)
	{

		if ($this->coddesc !== $v) {
			$this->coddesc = $v;
			$this->modifiedColumns[] = FadescomPeer::CODDESC;
		}

	} 
	
	public function setMoncom($v)
	{

		if ($this->moncom !== $v) {
			$this->moncom = $v;
			$this->modifiedColumns[] = FadescomPeer::MONCOM;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = FadescomPeer::CODART;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FadescomPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coddesc = $rs->getString($startcol + 0);

			$this->moncom = $rs->getFloat($startcol + 1);

			$this->codart = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fadescom object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FadescomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadescomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadescomPeer::DATABASE_NAME);
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
					$pk = FadescomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FadescomPeer::doUpdate($this, $con);
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


			if (($retval = FadescomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadescomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddesc();
				break;
			case 1:
				return $this->getMoncom();
				break;
			case 2:
				return $this->getCodart();
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
		$keys = FadescomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddesc(),
			$keys[1] => $this->getMoncom(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadescomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddesc($value);
				break;
			case 1:
				$this->setMoncom($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadescomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddesc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMoncom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadescomPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadescomPeer::CODDESC)) $criteria->add(FadescomPeer::CODDESC, $this->coddesc);
		if ($this->isColumnModified(FadescomPeer::MONCOM)) $criteria->add(FadescomPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(FadescomPeer::CODART)) $criteria->add(FadescomPeer::CODART, $this->codart);
		if ($this->isColumnModified(FadescomPeer::ID)) $criteria->add(FadescomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadescomPeer::DATABASE_NAME);

		$criteria->add(FadescomPeer::ID, $this->id);

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

		$copyObj->setCoddesc($this->coddesc);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setCodart($this->codart);


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
			self::$peer = new FadescomPeer();
		}
		return self::$peer;
	}

} 