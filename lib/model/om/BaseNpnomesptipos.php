<?php


abstract class BaseNpnomesptipos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnomesp;


	
	protected $desnomesp;


	
	protected $fecnomdes;


	
	protected $fecnomhas;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnomesp()
	{

		return $this->codnomesp;
	}

	
	public function getDesnomesp()
	{

		return $this->desnomesp;
	}

	
	public function getFecnomdes($format = 'Y-m-d')
	{

		if ($this->fecnomdes === null || $this->fecnomdes === '') {
			return null;
		} elseif (!is_int($this->fecnomdes)) {
						$ts = strtotime($this->fecnomdes);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnomdes] as date/time value: " . var_export($this->fecnomdes, true));
			}
		} else {
			$ts = $this->fecnomdes;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecnomhas($format = 'Y-m-d')
	{

		if ($this->fecnomhas === null || $this->fecnomhas === '') {
			return null;
		} elseif (!is_int($this->fecnomhas)) {
						$ts = strtotime($this->fecnomhas);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnomhas] as date/time value: " . var_export($this->fecnomhas, true));
			}
		} else {
			$ts = $this->fecnomhas;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodnomesp($v)
	{

		if ($this->codnomesp !== $v) {
			$this->codnomesp = $v;
			$this->modifiedColumns[] = NpnomesptiposPeer::CODNOMESP;
		}

	} 
	
	public function setDesnomesp($v)
	{

		if ($this->desnomesp !== $v) {
			$this->desnomesp = $v;
			$this->modifiedColumns[] = NpnomesptiposPeer::DESNOMESP;
		}

	} 
	
	public function setFecnomdes($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnomdes] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnomdes !== $ts) {
			$this->fecnomdes = $ts;
			$this->modifiedColumns[] = NpnomesptiposPeer::FECNOMDES;
		}

	} 
	
	public function setFecnomhas($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnomhas] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnomhas !== $ts) {
			$this->fecnomhas = $ts;
			$this->modifiedColumns[] = NpnomesptiposPeer::FECNOMHAS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpnomesptiposPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnomesp = $rs->getString($startcol + 0);

			$this->desnomesp = $rs->getString($startcol + 1);

			$this->fecnomdes = $rs->getDate($startcol + 2, null);

			$this->fecnomhas = $rs->getDate($startcol + 3, null);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npnomesptipos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpnomesptiposPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpnomesptiposPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpnomesptiposPeer::DATABASE_NAME);
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
					$pk = NpnomesptiposPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpnomesptiposPeer::doUpdate($this, $con);
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


			if (($retval = NpnomesptiposPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnomesptiposPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnomesp();
				break;
			case 1:
				return $this->getDesnomesp();
				break;
			case 2:
				return $this->getFecnomdes();
				break;
			case 3:
				return $this->getFecnomhas();
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
		$keys = NpnomesptiposPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnomesp(),
			$keys[1] => $this->getDesnomesp(),
			$keys[2] => $this->getFecnomdes(),
			$keys[3] => $this->getFecnomhas(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnomesptiposPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnomesp($value);
				break;
			case 1:
				$this->setDesnomesp($value);
				break;
			case 2:
				$this->setFecnomdes($value);
				break;
			case 3:
				$this->setFecnomhas($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpnomesptiposPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnomesp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesnomesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecnomdes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecnomhas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpnomesptiposPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpnomesptiposPeer::CODNOMESP)) $criteria->add(NpnomesptiposPeer::CODNOMESP, $this->codnomesp);
		if ($this->isColumnModified(NpnomesptiposPeer::DESNOMESP)) $criteria->add(NpnomesptiposPeer::DESNOMESP, $this->desnomesp);
		if ($this->isColumnModified(NpnomesptiposPeer::FECNOMDES)) $criteria->add(NpnomesptiposPeer::FECNOMDES, $this->fecnomdes);
		if ($this->isColumnModified(NpnomesptiposPeer::FECNOMHAS)) $criteria->add(NpnomesptiposPeer::FECNOMHAS, $this->fecnomhas);
		if ($this->isColumnModified(NpnomesptiposPeer::ID)) $criteria->add(NpnomesptiposPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpnomesptiposPeer::DATABASE_NAME);

		$criteria->add(NpnomesptiposPeer::ID, $this->id);

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

		$copyObj->setCodnomesp($this->codnomesp);

		$copyObj->setDesnomesp($this->desnomesp);

		$copyObj->setFecnomdes($this->fecnomdes);

		$copyObj->setFecnomhas($this->fecnomhas);


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
			self::$peer = new NpnomesptiposPeer();
		}
		return self::$peer;
	}

} 