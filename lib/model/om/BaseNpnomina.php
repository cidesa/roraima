<?php


abstract class BaseNpnomina extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $nomnom;


	
	protected $frecal;


	
	protected $ultfec;


	
	protected $profec;


	
	protected $numsem;


	
	protected $ordpag;


	
	protected $tipcau;


	
	protected $refcau;


	
	protected $tipprc;


	
	protected $refprc;


	
	protected $tipcom;


	
	protected $refcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnom()
	{

		return $this->codnom;
	}

	
	public function getNomnom()
	{

		return $this->nomnom;
	}

	
	public function getFrecal()
	{

		return $this->frecal;
	}

	
	public function getUltfec($format = 'Y-m-d')
	{

		if ($this->ultfec === null || $this->ultfec === '') {
			return null;
		} elseif (!is_int($this->ultfec)) {
						$ts = strtotime($this->ultfec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [ultfec] as date/time value: " . var_export($this->ultfec, true));
			}
		} else {
			$ts = $this->ultfec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getProfec($format = 'Y-m-d')
	{

		if ($this->profec === null || $this->profec === '') {
			return null;
		} elseif (!is_int($this->profec)) {
						$ts = strtotime($this->profec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [profec] as date/time value: " . var_export($this->profec, true));
			}
		} else {
			$ts = $this->profec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNumsem()
	{

		return $this->numsem;
	}

	
	public function getOrdpag()
	{

		return $this->ordpag;
	}

	
	public function getTipcau()
	{

		return $this->tipcau;
	}

	
	public function getRefcau()
	{

		return $this->refcau;
	}

	
	public function getTipprc()
	{

		return $this->tipprc;
	}

	
	public function getRefprc()
	{

		return $this->refprc;
	}

	
	public function getTipcom()
	{

		return $this->tipcom;
	}

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpnominaPeer::CODNOM;
		}

	} 
	
	public function setNomnom($v)
	{

		if ($this->nomnom !== $v) {
			$this->nomnom = $v;
			$this->modifiedColumns[] = NpnominaPeer::NOMNOM;
		}

	} 
	
	public function setFrecal($v)
	{

		if ($this->frecal !== $v) {
			$this->frecal = $v;
			$this->modifiedColumns[] = NpnominaPeer::FRECAL;
		}

	} 
	
	public function setUltfec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [ultfec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->ultfec !== $ts) {
			$this->ultfec = $ts;
			$this->modifiedColumns[] = NpnominaPeer::ULTFEC;
		}

	} 
	
	public function setProfec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [profec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->profec !== $ts) {
			$this->profec = $ts;
			$this->modifiedColumns[] = NpnominaPeer::PROFEC;
		}

	} 
	
	public function setNumsem($v)
	{

		if ($this->numsem !== $v) {
			$this->numsem = $v;
			$this->modifiedColumns[] = NpnominaPeer::NUMSEM;
		}

	} 
	
	public function setOrdpag($v)
	{

		if ($this->ordpag !== $v) {
			$this->ordpag = $v;
			$this->modifiedColumns[] = NpnominaPeer::ORDPAG;
		}

	} 
	
	public function setTipcau($v)
	{

		if ($this->tipcau !== $v) {
			$this->tipcau = $v;
			$this->modifiedColumns[] = NpnominaPeer::TIPCAU;
		}

	} 
	
	public function setRefcau($v)
	{

		if ($this->refcau !== $v) {
			$this->refcau = $v;
			$this->modifiedColumns[] = NpnominaPeer::REFCAU;
		}

	} 
	
	public function setTipprc($v)
	{

		if ($this->tipprc !== $v) {
			$this->tipprc = $v;
			$this->modifiedColumns[] = NpnominaPeer::TIPPRC;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = NpnominaPeer::REFPRC;
		}

	} 
	
	public function setTipcom($v)
	{

		if ($this->tipcom !== $v) {
			$this->tipcom = $v;
			$this->modifiedColumns[] = NpnominaPeer::TIPCOM;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = NpnominaPeer::REFCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpnominaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnom = $rs->getString($startcol + 0);

			$this->nomnom = $rs->getString($startcol + 1);

			$this->frecal = $rs->getString($startcol + 2);

			$this->ultfec = $rs->getDate($startcol + 3, null);

			$this->profec = $rs->getDate($startcol + 4, null);

			$this->numsem = $rs->getFloat($startcol + 5);

			$this->ordpag = $rs->getString($startcol + 6);

			$this->tipcau = $rs->getString($startcol + 7);

			$this->refcau = $rs->getString($startcol + 8);

			$this->tipprc = $rs->getString($startcol + 9);

			$this->refprc = $rs->getString($startcol + 10);

			$this->tipcom = $rs->getString($startcol + 11);

			$this->refcom = $rs->getString($startcol + 12);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npnomina object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpnominaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpnominaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpnominaPeer::DATABASE_NAME);
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
					$pk = NpnominaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpnominaPeer::doUpdate($this, $con);
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


			if (($retval = NpnominaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnominaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getNomnom();
				break;
			case 2:
				return $this->getFrecal();
				break;
			case 3:
				return $this->getUltfec();
				break;
			case 4:
				return $this->getProfec();
				break;
			case 5:
				return $this->getNumsem();
				break;
			case 6:
				return $this->getOrdpag();
				break;
			case 7:
				return $this->getTipcau();
				break;
			case 8:
				return $this->getRefcau();
				break;
			case 9:
				return $this->getTipprc();
				break;
			case 10:
				return $this->getRefprc();
				break;
			case 11:
				return $this->getTipcom();
				break;
			case 12:
				return $this->getRefcom();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpnominaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getNomnom(),
			$keys[2] => $this->getFrecal(),
			$keys[3] => $this->getUltfec(),
			$keys[4] => $this->getProfec(),
			$keys[5] => $this->getNumsem(),
			$keys[6] => $this->getOrdpag(),
			$keys[7] => $this->getTipcau(),
			$keys[8] => $this->getRefcau(),
			$keys[9] => $this->getTipprc(),
			$keys[10] => $this->getRefprc(),
			$keys[11] => $this->getTipcom(),
			$keys[12] => $this->getRefcom(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnominaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setNomnom($value);
				break;
			case 2:
				$this->setFrecal($value);
				break;
			case 3:
				$this->setUltfec($value);
				break;
			case 4:
				$this->setProfec($value);
				break;
			case 5:
				$this->setNumsem($value);
				break;
			case 6:
				$this->setOrdpag($value);
				break;
			case 7:
				$this->setTipcau($value);
				break;
			case 8:
				$this->setRefcau($value);
				break;
			case 9:
				$this->setTipprc($value);
				break;
			case 10:
				$this->setRefprc($value);
				break;
			case 11:
				$this->setTipcom($value);
				break;
			case 12:
				$this->setRefcom($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpnominaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFrecal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUltfec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setProfec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumsem($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setOrdpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipcau($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRefcau($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipprc($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRefprc($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipcom($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRefcom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpnominaPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpnominaPeer::CODNOM)) $criteria->add(NpnominaPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpnominaPeer::NOMNOM)) $criteria->add(NpnominaPeer::NOMNOM, $this->nomnom);
		if ($this->isColumnModified(NpnominaPeer::FRECAL)) $criteria->add(NpnominaPeer::FRECAL, $this->frecal);
		if ($this->isColumnModified(NpnominaPeer::ULTFEC)) $criteria->add(NpnominaPeer::ULTFEC, $this->ultfec);
		if ($this->isColumnModified(NpnominaPeer::PROFEC)) $criteria->add(NpnominaPeer::PROFEC, $this->profec);
		if ($this->isColumnModified(NpnominaPeer::NUMSEM)) $criteria->add(NpnominaPeer::NUMSEM, $this->numsem);
		if ($this->isColumnModified(NpnominaPeer::ORDPAG)) $criteria->add(NpnominaPeer::ORDPAG, $this->ordpag);
		if ($this->isColumnModified(NpnominaPeer::TIPCAU)) $criteria->add(NpnominaPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(NpnominaPeer::REFCAU)) $criteria->add(NpnominaPeer::REFCAU, $this->refcau);
		if ($this->isColumnModified(NpnominaPeer::TIPPRC)) $criteria->add(NpnominaPeer::TIPPRC, $this->tipprc);
		if ($this->isColumnModified(NpnominaPeer::REFPRC)) $criteria->add(NpnominaPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(NpnominaPeer::TIPCOM)) $criteria->add(NpnominaPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(NpnominaPeer::REFCOM)) $criteria->add(NpnominaPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(NpnominaPeer::ID)) $criteria->add(NpnominaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpnominaPeer::DATABASE_NAME);

		$criteria->add(NpnominaPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setNomnom($this->nomnom);

		$copyObj->setFrecal($this->frecal);

		$copyObj->setUltfec($this->ultfec);

		$copyObj->setProfec($this->profec);

		$copyObj->setNumsem($this->numsem);

		$copyObj->setOrdpag($this->ordpag);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setRefcau($this->refcau);

		$copyObj->setTipprc($this->tipprc);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setRefcom($this->refcom);


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
			self::$peer = new NpnominaPeer();
		}
		return self::$peer;
	}

} 