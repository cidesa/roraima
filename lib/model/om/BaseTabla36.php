<?php


abstract class BaseTabla36 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcom;


	
	protected $tipcom;


	
	protected $feccom;


	
	protected $anocom;


	
	protected $refprc;


	
	protected $tipprc;


	
	protected $descom;


	
	protected $desanu;


	
	protected $moncom;


	
	protected $salcau;


	
	protected $salpag;


	
	protected $salaju;


	
	protected $stacom;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $tipo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getTipcom()
	{

		return $this->tipcom;
	}

	
	public function getFeccom($format = 'Y-m-d')
	{

		if ($this->feccom === null || $this->feccom === '') {
			return null;
		} elseif (!is_int($this->feccom)) {
						$ts = strtotime($this->feccom);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
			}
		} else {
			$ts = $this->feccom;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAnocom()
	{

		return $this->anocom;
	}

	
	public function getRefprc()
	{

		return $this->refprc;
	}

	
	public function getTipprc()
	{

		return $this->tipprc;
	}

	
	public function getDescom()
	{

		return $this->descom;
	}

	
	public function getDesanu()
	{

		return $this->desanu;
	}

	
	public function getMoncom()
	{

		return $this->moncom;
	}

	
	public function getSalcau()
	{

		return $this->salcau;
	}

	
	public function getSalpag()
	{

		return $this->salpag;
	}

	
	public function getSalaju()
	{

		return $this->salaju;
	}

	
	public function getStacom()
	{

		return $this->stacom;
	}

	
	public function getFecanu($format = 'Y-m-d')
	{

		if ($this->fecanu === null || $this->fecanu === '') {
			return null;
		} elseif (!is_int($this->fecanu)) {
						$ts = strtotime($this->fecanu);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
			}
		} else {
			$ts = $this->fecanu;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCedrif()
	{

		return $this->cedrif;
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = Tabla36Peer::REFCOM;
		}

	} 
	
	public function setTipcom($v)
	{

		if ($this->tipcom !== $v) {
			$this->tipcom = $v;
			$this->modifiedColumns[] = Tabla36Peer::TIPCOM;
		}

	} 
	
	public function setFeccom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccom !== $ts) {
			$this->feccom = $ts;
			$this->modifiedColumns[] = Tabla36Peer::FECCOM;
		}

	} 
	
	public function setAnocom($v)
	{

		if ($this->anocom !== $v) {
			$this->anocom = $v;
			$this->modifiedColumns[] = Tabla36Peer::ANOCOM;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = Tabla36Peer::REFPRC;
		}

	} 
	
	public function setTipprc($v)
	{

		if ($this->tipprc !== $v) {
			$this->tipprc = $v;
			$this->modifiedColumns[] = Tabla36Peer::TIPPRC;
		}

	} 
	
	public function setDescom($v)
	{

		if ($this->descom !== $v) {
			$this->descom = $v;
			$this->modifiedColumns[] = Tabla36Peer::DESCOM;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = Tabla36Peer::DESANU;
		}

	} 
	
	public function setMoncom($v)
	{

		if ($this->moncom !== $v) {
			$this->moncom = $v;
			$this->modifiedColumns[] = Tabla36Peer::MONCOM;
		}

	} 
	
	public function setSalcau($v)
	{

		if ($this->salcau !== $v) {
			$this->salcau = $v;
			$this->modifiedColumns[] = Tabla36Peer::SALCAU;
		}

	} 
	
	public function setSalpag($v)
	{

		if ($this->salpag !== $v) {
			$this->salpag = $v;
			$this->modifiedColumns[] = Tabla36Peer::SALPAG;
		}

	} 
	
	public function setSalaju($v)
	{

		if ($this->salaju !== $v) {
			$this->salaju = $v;
			$this->modifiedColumns[] = Tabla36Peer::SALAJU;
		}

	} 
	
	public function setStacom($v)
	{

		if ($this->stacom !== $v) {
			$this->stacom = $v;
			$this->modifiedColumns[] = Tabla36Peer::STACOM;
		}

	} 
	
	public function setFecanu($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecanu !== $ts) {
			$this->fecanu = $ts;
			$this->modifiedColumns[] = Tabla36Peer::FECANU;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = Tabla36Peer::CEDRIF;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = Tabla36Peer::TIPO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Tabla36Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refcom = $rs->getString($startcol + 0);

			$this->tipcom = $rs->getString($startcol + 1);

			$this->feccom = $rs->getDate($startcol + 2, null);

			$this->anocom = $rs->getString($startcol + 3);

			$this->refprc = $rs->getString($startcol + 4);

			$this->tipprc = $rs->getString($startcol + 5);

			$this->descom = $rs->getString($startcol + 6);

			$this->desanu = $rs->getString($startcol + 7);

			$this->moncom = $rs->getFloat($startcol + 8);

			$this->salcau = $rs->getFloat($startcol + 9);

			$this->salpag = $rs->getFloat($startcol + 10);

			$this->salaju = $rs->getFloat($startcol + 11);

			$this->stacom = $rs->getString($startcol + 12);

			$this->fecanu = $rs->getDate($startcol + 13, null);

			$this->cedrif = $rs->getString($startcol + 14);

			$this->tipo = $rs->getString($startcol + 15);

			$this->id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tabla36 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Tabla36Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla36Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla36Peer::DATABASE_NAME);
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
					$pk = Tabla36Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Tabla36Peer::doUpdate($this, $con);
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


			if (($retval = Tabla36Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla36Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcom();
				break;
			case 1:
				return $this->getTipcom();
				break;
			case 2:
				return $this->getFeccom();
				break;
			case 3:
				return $this->getAnocom();
				break;
			case 4:
				return $this->getRefprc();
				break;
			case 5:
				return $this->getTipprc();
				break;
			case 6:
				return $this->getDescom();
				break;
			case 7:
				return $this->getDesanu();
				break;
			case 8:
				return $this->getMoncom();
				break;
			case 9:
				return $this->getSalcau();
				break;
			case 10:
				return $this->getSalpag();
				break;
			case 11:
				return $this->getSalaju();
				break;
			case 12:
				return $this->getStacom();
				break;
			case 13:
				return $this->getFecanu();
				break;
			case 14:
				return $this->getCedrif();
				break;
			case 15:
				return $this->getTipo();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla36Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcom(),
			$keys[1] => $this->getTipcom(),
			$keys[2] => $this->getFeccom(),
			$keys[3] => $this->getAnocom(),
			$keys[4] => $this->getRefprc(),
			$keys[5] => $this->getTipprc(),
			$keys[6] => $this->getDescom(),
			$keys[7] => $this->getDesanu(),
			$keys[8] => $this->getMoncom(),
			$keys[9] => $this->getSalcau(),
			$keys[10] => $this->getSalpag(),
			$keys[11] => $this->getSalaju(),
			$keys[12] => $this->getStacom(),
			$keys[13] => $this->getFecanu(),
			$keys[14] => $this->getCedrif(),
			$keys[15] => $this->getTipo(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla36Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcom($value);
				break;
			case 1:
				$this->setTipcom($value);
				break;
			case 2:
				$this->setFeccom($value);
				break;
			case 3:
				$this->setAnocom($value);
				break;
			case 4:
				$this->setRefprc($value);
				break;
			case 5:
				$this->setTipprc($value);
				break;
			case 6:
				$this->setDescom($value);
				break;
			case 7:
				$this->setDesanu($value);
				break;
			case 8:
				$this->setMoncom($value);
				break;
			case 9:
				$this->setSalcau($value);
				break;
			case 10:
				$this->setSalpag($value);
				break;
			case 11:
				$this->setSalaju($value);
				break;
			case 12:
				$this->setStacom($value);
				break;
			case 13:
				$this->setFecanu($value);
				break;
			case 14:
				$this->setCedrif($value);
				break;
			case 15:
				$this->setTipo($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla36Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnocom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipprc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesanu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMoncom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalcau($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSalpag($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSalaju($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStacom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecanu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCedrif($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTipo($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla36Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla36Peer::REFCOM)) $criteria->add(Tabla36Peer::REFCOM, $this->refcom);
		if ($this->isColumnModified(Tabla36Peer::TIPCOM)) $criteria->add(Tabla36Peer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(Tabla36Peer::FECCOM)) $criteria->add(Tabla36Peer::FECCOM, $this->feccom);
		if ($this->isColumnModified(Tabla36Peer::ANOCOM)) $criteria->add(Tabla36Peer::ANOCOM, $this->anocom);
		if ($this->isColumnModified(Tabla36Peer::REFPRC)) $criteria->add(Tabla36Peer::REFPRC, $this->refprc);
		if ($this->isColumnModified(Tabla36Peer::TIPPRC)) $criteria->add(Tabla36Peer::TIPPRC, $this->tipprc);
		if ($this->isColumnModified(Tabla36Peer::DESCOM)) $criteria->add(Tabla36Peer::DESCOM, $this->descom);
		if ($this->isColumnModified(Tabla36Peer::DESANU)) $criteria->add(Tabla36Peer::DESANU, $this->desanu);
		if ($this->isColumnModified(Tabla36Peer::MONCOM)) $criteria->add(Tabla36Peer::MONCOM, $this->moncom);
		if ($this->isColumnModified(Tabla36Peer::SALCAU)) $criteria->add(Tabla36Peer::SALCAU, $this->salcau);
		if ($this->isColumnModified(Tabla36Peer::SALPAG)) $criteria->add(Tabla36Peer::SALPAG, $this->salpag);
		if ($this->isColumnModified(Tabla36Peer::SALAJU)) $criteria->add(Tabla36Peer::SALAJU, $this->salaju);
		if ($this->isColumnModified(Tabla36Peer::STACOM)) $criteria->add(Tabla36Peer::STACOM, $this->stacom);
		if ($this->isColumnModified(Tabla36Peer::FECANU)) $criteria->add(Tabla36Peer::FECANU, $this->fecanu);
		if ($this->isColumnModified(Tabla36Peer::CEDRIF)) $criteria->add(Tabla36Peer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(Tabla36Peer::TIPO)) $criteria->add(Tabla36Peer::TIPO, $this->tipo);
		if ($this->isColumnModified(Tabla36Peer::ID)) $criteria->add(Tabla36Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla36Peer::DATABASE_NAME);

		$criteria->add(Tabla36Peer::ID, $this->id);

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

		$copyObj->setRefcom($this->refcom);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setAnocom($this->anocom);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setTipprc($this->tipprc);

		$copyObj->setDescom($this->descom);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setSalcau($this->salcau);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStacom($this->stacom);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setTipo($this->tipo);


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
			self::$peer = new Tabla36Peer();
		}
		return self::$peer;
	}

} 