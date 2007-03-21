<?php


abstract class BaseNptipaportes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipapo;


	
	protected $destipapo;


	
	protected $porret;


	
	protected $porapo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtipapo()
	{

		return $this->codtipapo;
	}

	
	public function getDestipapo()
	{

		return $this->destipapo;
	}

	
	public function getPorret()
	{

		return $this->porret;
	}

	
	public function getPorapo()
	{

		return $this->porapo;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodtipapo($v)
	{

		if ($this->codtipapo !== $v) {
			$this->codtipapo = $v;
			$this->modifiedColumns[] = NptipaportesPeer::CODTIPAPO;
		}

	} 
	
	public function setDestipapo($v)
	{

		if ($this->destipapo !== $v) {
			$this->destipapo = $v;
			$this->modifiedColumns[] = NptipaportesPeer::DESTIPAPO;
		}

	} 
	
	public function setPorret($v)
	{

		if ($this->porret !== $v) {
			$this->porret = $v;
			$this->modifiedColumns[] = NptipaportesPeer::PORRET;
		}

	} 
	
	public function setPorapo($v)
	{

		if ($this->porapo !== $v) {
			$this->porapo = $v;
			$this->modifiedColumns[] = NptipaportesPeer::PORAPO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NptipaportesPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtipapo = $rs->getString($startcol + 0);

			$this->destipapo = $rs->getString($startcol + 1);

			$this->porret = $rs->getFloat($startcol + 2);

			$this->porapo = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Nptipaportes object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NptipaportesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NptipaportesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NptipaportesPeer::DATABASE_NAME);
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
					$pk = NptipaportesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NptipaportesPeer::doUpdate($this, $con);
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


			if (($retval = NptipaportesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipaportesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipapo();
				break;
			case 1:
				return $this->getDestipapo();
				break;
			case 2:
				return $this->getPorret();
				break;
			case 3:
				return $this->getPorapo();
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
		$keys = NptipaportesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipapo(),
			$keys[1] => $this->getDestipapo(),
			$keys[2] => $this->getPorret(),
			$keys[3] => $this->getPorapo(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipaportesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipapo($value);
				break;
			case 1:
				$this->setDestipapo($value);
				break;
			case 2:
				$this->setPorret($value);
				break;
			case 3:
				$this->setPorapo($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NptipaportesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipapo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipapo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorret($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPorapo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NptipaportesPeer::DATABASE_NAME);

		if ($this->isColumnModified(NptipaportesPeer::CODTIPAPO)) $criteria->add(NptipaportesPeer::CODTIPAPO, $this->codtipapo);
		if ($this->isColumnModified(NptipaportesPeer::DESTIPAPO)) $criteria->add(NptipaportesPeer::DESTIPAPO, $this->destipapo);
		if ($this->isColumnModified(NptipaportesPeer::PORRET)) $criteria->add(NptipaportesPeer::PORRET, $this->porret);
		if ($this->isColumnModified(NptipaportesPeer::PORAPO)) $criteria->add(NptipaportesPeer::PORAPO, $this->porapo);
		if ($this->isColumnModified(NptipaportesPeer::ID)) $criteria->add(NptipaportesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NptipaportesPeer::DATABASE_NAME);

		$criteria->add(NptipaportesPeer::ID, $this->id);

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

		$copyObj->setCodtipapo($this->codtipapo);

		$copyObj->setDestipapo($this->destipapo);

		$copyObj->setPorret($this->porret);

		$copyObj->setPorapo($this->porapo);


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
			self::$peer = new NptipaportesPeer();
		}
		return self::$peer;
	}

} 