<?php


abstract class BaseTsantici extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refant;


	
	protected $desant;


	
	protected $cedrif;


	
	protected $refcom;


	
	protected $fecant;


	
	protected $monto;


	
	protected $saldo;


	
	protected $numcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefant()
	{

		return $this->refant;
	}

	
	public function getDesant()
	{

		return $this->desant;
	}

	
	public function getCedrif()
	{

		return $this->cedrif;
	}

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getFecant($format = 'Y-m-d')
	{

		if ($this->fecant === null || $this->fecant === '') {
			return null;
		} elseif (!is_int($this->fecant)) {
						$ts = strtotime($this->fecant);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecant] as date/time value: " . var_export($this->fecant, true));
			}
		} else {
			$ts = $this->fecant;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getSaldo()
	{

		return $this->saldo;
	}

	
	public function getNumcom()
	{

		return $this->numcom;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefant($v)
	{

		if ($this->refant !== $v) {
			$this->refant = $v;
			$this->modifiedColumns[] = TsanticiPeer::REFANT;
		}

	} 
	
	public function setDesant($v)
	{

		if ($this->desant !== $v) {
			$this->desant = $v;
			$this->modifiedColumns[] = TsanticiPeer::DESANT;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = TsanticiPeer::CEDRIF;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = TsanticiPeer::REFCOM;
		}

	} 
	
	public function setFecant($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecant] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecant !== $ts) {
			$this->fecant = $ts;
			$this->modifiedColumns[] = TsanticiPeer::FECANT;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = TsanticiPeer::MONTO;
		}

	} 
	
	public function setSaldo($v)
	{

		if ($this->saldo !== $v) {
			$this->saldo = $v;
			$this->modifiedColumns[] = TsanticiPeer::SALDO;
		}

	} 
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = TsanticiPeer::NUMCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TsanticiPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refant = $rs->getString($startcol + 0);

			$this->desant = $rs->getString($startcol + 1);

			$this->cedrif = $rs->getString($startcol + 2);

			$this->refcom = $rs->getString($startcol + 3);

			$this->fecant = $rs->getDate($startcol + 4, null);

			$this->monto = $rs->getFloat($startcol + 5);

			$this->saldo = $rs->getFloat($startcol + 6);

			$this->numcom = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tsantici object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsanticiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsanticiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsanticiPeer::DATABASE_NAME);
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
					$pk = TsanticiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TsanticiPeer::doUpdate($this, $con);
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


			if (($retval = TsanticiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsanticiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefant();
				break;
			case 1:
				return $this->getDesant();
				break;
			case 2:
				return $this->getCedrif();
				break;
			case 3:
				return $this->getRefcom();
				break;
			case 4:
				return $this->getFecant();
				break;
			case 5:
				return $this->getMonto();
				break;
			case 6:
				return $this->getSaldo();
				break;
			case 7:
				return $this->getNumcom();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsanticiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefant(),
			$keys[1] => $this->getDesant(),
			$keys[2] => $this->getCedrif(),
			$keys[3] => $this->getRefcom(),
			$keys[4] => $this->getFecant(),
			$keys[5] => $this->getMonto(),
			$keys[6] => $this->getSaldo(),
			$keys[7] => $this->getNumcom(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsanticiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefant($value);
				break;
			case 1:
				$this->setDesant($value);
				break;
			case 2:
				$this->setCedrif($value);
				break;
			case 3:
				$this->setRefcom($value);
				break;
			case 4:
				$this->setFecant($value);
				break;
			case 5:
				$this->setMonto($value);
				break;
			case 6:
				$this->setSaldo($value);
				break;
			case 7:
				$this->setNumcom($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsanticiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefant($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesant($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedrif($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecant($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonto($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSaldo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsanticiPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsanticiPeer::REFANT)) $criteria->add(TsanticiPeer::REFANT, $this->refant);
		if ($this->isColumnModified(TsanticiPeer::DESANT)) $criteria->add(TsanticiPeer::DESANT, $this->desant);
		if ($this->isColumnModified(TsanticiPeer::CEDRIF)) $criteria->add(TsanticiPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TsanticiPeer::REFCOM)) $criteria->add(TsanticiPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(TsanticiPeer::FECANT)) $criteria->add(TsanticiPeer::FECANT, $this->fecant);
		if ($this->isColumnModified(TsanticiPeer::MONTO)) $criteria->add(TsanticiPeer::MONTO, $this->monto);
		if ($this->isColumnModified(TsanticiPeer::SALDO)) $criteria->add(TsanticiPeer::SALDO, $this->saldo);
		if ($this->isColumnModified(TsanticiPeer::NUMCOM)) $criteria->add(TsanticiPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(TsanticiPeer::ID)) $criteria->add(TsanticiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsanticiPeer::DATABASE_NAME);

		$criteria->add(TsanticiPeer::ID, $this->id);

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

		$copyObj->setRefant($this->refant);

		$copyObj->setDesant($this->desant);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setFecant($this->fecant);

		$copyObj->setMonto($this->monto);

		$copyObj->setSaldo($this->saldo);

		$copyObj->setNumcom($this->numcom);


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
			self::$peer = new TsanticiPeer();
		}
		return self::$peer;
	}

} 