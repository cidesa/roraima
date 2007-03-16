<?php


abstract class BaseTsdesmon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmon;


	
	protected $nommon;


	
	protected $valmon;


	
	protected $aumdis;


	
	protected $fecmon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmon()
	{

		return $this->codmon;
	}

	
	public function getNommon()
	{

		return $this->nommon;
	}

	
	public function getValmon()
	{

		return $this->valmon;
	}

	
	public function getAumdis()
	{

		return $this->aumdis;
	}

	
	public function getFecmon($format = 'Y-m-d')
	{

		if ($this->fecmon === null || $this->fecmon === '') {
			return null;
		} elseif (!is_int($this->fecmon)) {
						$ts = strtotime($this->fecmon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecmon] as date/time value: " . var_export($this->fecmon, true));
			}
		} else {
			$ts = $this->fecmon;
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

	
	public function setCodmon($v)
	{

		if ($this->codmon !== $v) {
			$this->codmon = $v;
			$this->modifiedColumns[] = TsdesmonPeer::CODMON;
		}

	} 
	
	public function setNommon($v)
	{

		if ($this->nommon !== $v) {
			$this->nommon = $v;
			$this->modifiedColumns[] = TsdesmonPeer::NOMMON;
		}

	} 
	
	public function setValmon($v)
	{

		if ($this->valmon !== $v) {
			$this->valmon = $v;
			$this->modifiedColumns[] = TsdesmonPeer::VALMON;
		}

	} 
	
	public function setAumdis($v)
	{

		if ($this->aumdis !== $v) {
			$this->aumdis = $v;
			$this->modifiedColumns[] = TsdesmonPeer::AUMDIS;
		}

	} 
	
	public function setFecmon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecmon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecmon !== $ts) {
			$this->fecmon = $ts;
			$this->modifiedColumns[] = TsdesmonPeer::FECMON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TsdesmonPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmon = $rs->getString($startcol + 0);

			$this->nommon = $rs->getString($startcol + 1);

			$this->valmon = $rs->getFloat($startcol + 2);

			$this->aumdis = $rs->getString($startcol + 3);

			$this->fecmon = $rs->getDate($startcol + 4, null);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tsdesmon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdesmonPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdesmonPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdesmonPeer::DATABASE_NAME);
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
					$pk = TsdesmonPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TsdesmonPeer::doUpdate($this, $con);
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


			if (($retval = TsdesmonPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdesmonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmon();
				break;
			case 1:
				return $this->getNommon();
				break;
			case 2:
				return $this->getValmon();
				break;
			case 3:
				return $this->getAumdis();
				break;
			case 4:
				return $this->getFecmon();
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
		$keys = TsdesmonPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmon(),
			$keys[1] => $this->getNommon(),
			$keys[2] => $this->getValmon(),
			$keys[3] => $this->getAumdis(),
			$keys[4] => $this->getFecmon(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdesmonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmon($value);
				break;
			case 1:
				$this->setNommon($value);
				break;
			case 2:
				$this->setValmon($value);
				break;
			case 3:
				$this->setAumdis($value);
				break;
			case 4:
				$this->setFecmon($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdesmonPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNommon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValmon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAumdis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecmon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdesmonPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdesmonPeer::CODMON)) $criteria->add(TsdesmonPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(TsdesmonPeer::NOMMON)) $criteria->add(TsdesmonPeer::NOMMON, $this->nommon);
		if ($this->isColumnModified(TsdesmonPeer::VALMON)) $criteria->add(TsdesmonPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(TsdesmonPeer::AUMDIS)) $criteria->add(TsdesmonPeer::AUMDIS, $this->aumdis);
		if ($this->isColumnModified(TsdesmonPeer::FECMON)) $criteria->add(TsdesmonPeer::FECMON, $this->fecmon);
		if ($this->isColumnModified(TsdesmonPeer::ID)) $criteria->add(TsdesmonPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdesmonPeer::DATABASE_NAME);

		$criteria->add(TsdesmonPeer::ID, $this->id);

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

		$copyObj->setCodmon($this->codmon);

		$copyObj->setNommon($this->nommon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setAumdis($this->aumdis);

		$copyObj->setFecmon($this->fecmon);


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
			self::$peer = new TsdesmonPeer();
		}
		return self::$peer;
	}

} 