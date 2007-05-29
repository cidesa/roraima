<?php


abstract class BaseTabla37 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcau;


	
	protected $tipcau;


	
	protected $feccau;


	
	protected $anocau;


	
	protected $refcom;


	
	protected $tipcom;


	
	protected $descau;


	
	protected $desanu;


	
	protected $moncau;


	
	protected $salpag;


	
	protected $salaju;


	
	protected $stacau;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefcau()
	{

		return $this->refcau; 		
	}
	
	public function getTipcau()
	{

		return $this->tipcau; 		
	}
	
	public function getFeccau($format = 'Y-m-d')
	{

		if ($this->feccau === null || $this->feccau === '') {
			return null;
		} elseif (!is_int($this->feccau)) {
						$ts = strtotime($this->feccau);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccau] as date/time value: " . var_export($this->feccau, true));
			}
		} else {
			$ts = $this->feccau;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAnocau()
	{

		return $this->anocau; 		
	}
	
	public function getRefcom()
	{

		return $this->refcom; 		
	}
	
	public function getTipcom()
	{

		return $this->tipcom; 		
	}
	
	public function getDescau()
	{

		return $this->descau; 		
	}
	
	public function getDesanu()
	{

		return $this->desanu; 		
	}
	
	public function getMoncau()
	{

		return number_format($this->moncau,2,',','.');
		
	}
	
	public function getSalpag()
	{

		return number_format($this->salpag,2,',','.');
		
	}
	
	public function getSalaju()
	{

		return number_format($this->salaju,2,',','.');
		
	}
	
	public function getStacau()
	{

		return $this->stacau; 		
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
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefcau($v)
	{

		if ($this->refcau !== $v) {
			$this->refcau = $v;
			$this->modifiedColumns[] = Tabla37Peer::REFCAU;
		}

	} 
	
	public function setTipcau($v)
	{

		if ($this->tipcau !== $v) {
			$this->tipcau = $v;
			$this->modifiedColumns[] = Tabla37Peer::TIPCAU;
		}

	} 
	
	public function setFeccau($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccau] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccau !== $ts) {
			$this->feccau = $ts;
			$this->modifiedColumns[] = Tabla37Peer::FECCAU;
		}

	} 
	
	public function setAnocau($v)
	{

		if ($this->anocau !== $v) {
			$this->anocau = $v;
			$this->modifiedColumns[] = Tabla37Peer::ANOCAU;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = Tabla37Peer::REFCOM;
		}

	} 
	
	public function setTipcom($v)
	{

		if ($this->tipcom !== $v) {
			$this->tipcom = $v;
			$this->modifiedColumns[] = Tabla37Peer::TIPCOM;
		}

	} 
	
	public function setDescau($v)
	{

		if ($this->descau !== $v) {
			$this->descau = $v;
			$this->modifiedColumns[] = Tabla37Peer::DESCAU;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = Tabla37Peer::DESANU;
		}

	} 
	
	public function setMoncau($v)
	{

		if ($this->moncau !== $v) {
			$this->moncau = $v;
			$this->modifiedColumns[] = Tabla37Peer::MONCAU;
		}

	} 
	
	public function setSalpag($v)
	{

		if ($this->salpag !== $v) {
			$this->salpag = $v;
			$this->modifiedColumns[] = Tabla37Peer::SALPAG;
		}

	} 
	
	public function setSalaju($v)
	{

		if ($this->salaju !== $v) {
			$this->salaju = $v;
			$this->modifiedColumns[] = Tabla37Peer::SALAJU;
		}

	} 
	
	public function setStacau($v)
	{

		if ($this->stacau !== $v) {
			$this->stacau = $v;
			$this->modifiedColumns[] = Tabla37Peer::STACAU;
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
			$this->modifiedColumns[] = Tabla37Peer::FECANU;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = Tabla37Peer::CEDRIF;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Tabla37Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refcau = $rs->getString($startcol + 0);

			$this->tipcau = $rs->getString($startcol + 1);

			$this->feccau = $rs->getDate($startcol + 2, null);

			$this->anocau = $rs->getString($startcol + 3);

			$this->refcom = $rs->getString($startcol + 4);

			$this->tipcom = $rs->getString($startcol + 5);

			$this->descau = $rs->getString($startcol + 6);

			$this->desanu = $rs->getString($startcol + 7);

			$this->moncau = $rs->getFloat($startcol + 8);

			$this->salpag = $rs->getFloat($startcol + 9);

			$this->salaju = $rs->getFloat($startcol + 10);

			$this->stacau = $rs->getString($startcol + 11);

			$this->fecanu = $rs->getDate($startcol + 12, null);

			$this->cedrif = $rs->getString($startcol + 13);

			$this->id = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tabla37 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Tabla37Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla37Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla37Peer::DATABASE_NAME);
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
					$pk = Tabla37Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Tabla37Peer::doUpdate($this, $con);
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


			if (($retval = Tabla37Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla37Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcau();
				break;
			case 1:
				return $this->getTipcau();
				break;
			case 2:
				return $this->getFeccau();
				break;
			case 3:
				return $this->getAnocau();
				break;
			case 4:
				return $this->getRefcom();
				break;
			case 5:
				return $this->getTipcom();
				break;
			case 6:
				return $this->getDescau();
				break;
			case 7:
				return $this->getDesanu();
				break;
			case 8:
				return $this->getMoncau();
				break;
			case 9:
				return $this->getSalpag();
				break;
			case 10:
				return $this->getSalaju();
				break;
			case 11:
				return $this->getStacau();
				break;
			case 12:
				return $this->getFecanu();
				break;
			case 13:
				return $this->getCedrif();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla37Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcau(),
			$keys[1] => $this->getTipcau(),
			$keys[2] => $this->getFeccau(),
			$keys[3] => $this->getAnocau(),
			$keys[4] => $this->getRefcom(),
			$keys[5] => $this->getTipcom(),
			$keys[6] => $this->getDescau(),
			$keys[7] => $this->getDesanu(),
			$keys[8] => $this->getMoncau(),
			$keys[9] => $this->getSalpag(),
			$keys[10] => $this->getSalaju(),
			$keys[11] => $this->getStacau(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getCedrif(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla37Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcau($value);
				break;
			case 1:
				$this->setTipcau($value);
				break;
			case 2:
				$this->setFeccau($value);
				break;
			case 3:
				$this->setAnocau($value);
				break;
			case 4:
				$this->setRefcom($value);
				break;
			case 5:
				$this->setTipcom($value);
				break;
			case 6:
				$this->setDescau($value);
				break;
			case 7:
				$this->setDesanu($value);
				break;
			case 8:
				$this->setMoncau($value);
				break;
			case 9:
				$this->setSalpag($value);
				break;
			case 10:
				$this->setSalaju($value);
				break;
			case 11:
				$this->setStacau($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setCedrif($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla37Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcau($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcau($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccau($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnocau($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefcom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescau($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesanu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMoncau($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalpag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSalaju($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStacau($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCedrif($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla37Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla37Peer::REFCAU)) $criteria->add(Tabla37Peer::REFCAU, $this->refcau);
		if ($this->isColumnModified(Tabla37Peer::TIPCAU)) $criteria->add(Tabla37Peer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(Tabla37Peer::FECCAU)) $criteria->add(Tabla37Peer::FECCAU, $this->feccau);
		if ($this->isColumnModified(Tabla37Peer::ANOCAU)) $criteria->add(Tabla37Peer::ANOCAU, $this->anocau);
		if ($this->isColumnModified(Tabla37Peer::REFCOM)) $criteria->add(Tabla37Peer::REFCOM, $this->refcom);
		if ($this->isColumnModified(Tabla37Peer::TIPCOM)) $criteria->add(Tabla37Peer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(Tabla37Peer::DESCAU)) $criteria->add(Tabla37Peer::DESCAU, $this->descau);
		if ($this->isColumnModified(Tabla37Peer::DESANU)) $criteria->add(Tabla37Peer::DESANU, $this->desanu);
		if ($this->isColumnModified(Tabla37Peer::MONCAU)) $criteria->add(Tabla37Peer::MONCAU, $this->moncau);
		if ($this->isColumnModified(Tabla37Peer::SALPAG)) $criteria->add(Tabla37Peer::SALPAG, $this->salpag);
		if ($this->isColumnModified(Tabla37Peer::SALAJU)) $criteria->add(Tabla37Peer::SALAJU, $this->salaju);
		if ($this->isColumnModified(Tabla37Peer::STACAU)) $criteria->add(Tabla37Peer::STACAU, $this->stacau);
		if ($this->isColumnModified(Tabla37Peer::FECANU)) $criteria->add(Tabla37Peer::FECANU, $this->fecanu);
		if ($this->isColumnModified(Tabla37Peer::CEDRIF)) $criteria->add(Tabla37Peer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(Tabla37Peer::ID)) $criteria->add(Tabla37Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla37Peer::DATABASE_NAME);

		$criteria->add(Tabla37Peer::ID, $this->id);

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

		$copyObj->setRefcau($this->refcau);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setFeccau($this->feccau);

		$copyObj->setAnocau($this->anocau);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setDescau($this->descau);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStacau($this->stacau);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);


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
			self::$peer = new Tabla37Peer();
		}
		return self::$peer;
	}

} 