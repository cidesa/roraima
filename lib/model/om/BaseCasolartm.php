<?php


abstract class BaseCasolartm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reqart;


	
	protected $fecreq;


	
	protected $desreq;


	
	protected $monreq;


	
	protected $stareq;


	
	protected $motreq;


	
	protected $benreq;


	
	protected $mondes;


	
	protected $obsreq;


	
	protected $unires;


	
	protected $tipmon;


	
	protected $valmon;


	
	protected $fecanu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getReqart()
	{

		return $this->reqart;
	}

	
	public function getFecreq($format = 'Y-m-d')
	{

		if ($this->fecreq === null || $this->fecreq === '') {
			return null;
		} elseif (!is_int($this->fecreq)) {
						$ts = strtotime($this->fecreq);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecreq] as date/time value: " . var_export($this->fecreq, true));
			}
		} else {
			$ts = $this->fecreq;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDesreq()
	{

		return $this->desreq;
	}

	
	public function getMonreq()
	{

		return $this->monreq;
	}

	
	public function getStareq()
	{

		return $this->stareq;
	}

	
	public function getMotreq()
	{

		return $this->motreq;
	}

	
	public function getBenreq()
	{

		return $this->benreq;
	}

	
	public function getMondes()
	{

		return $this->mondes;
	}

	
	public function getObsreq()
	{

		return $this->obsreq;
	}

	
	public function getUnires()
	{

		return $this->unires;
	}

	
	public function getTipmon()
	{

		return $this->tipmon;
	}

	
	public function getValmon()
	{

		return $this->valmon;
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

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setReqart($v)
	{

		if ($this->reqart !== $v) {
			$this->reqart = $v;
			$this->modifiedColumns[] = CasolartmPeer::REQART;
		}

	} 
	
	public function setFecreq($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecreq] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecreq !== $ts) {
			$this->fecreq = $ts;
			$this->modifiedColumns[] = CasolartmPeer::FECREQ;
		}

	} 
	
	public function setDesreq($v)
	{

		if ($this->desreq !== $v) {
			$this->desreq = $v;
			$this->modifiedColumns[] = CasolartmPeer::DESREQ;
		}

	} 
	
	public function setMonreq($v)
	{

		if ($this->monreq !== $v) {
			$this->monreq = $v;
			$this->modifiedColumns[] = CasolartmPeer::MONREQ;
		}

	} 
	
	public function setStareq($v)
	{

		if ($this->stareq !== $v) {
			$this->stareq = $v;
			$this->modifiedColumns[] = CasolartmPeer::STAREQ;
		}

	} 
	
	public function setMotreq($v)
	{

		if ($this->motreq !== $v) {
			$this->motreq = $v;
			$this->modifiedColumns[] = CasolartmPeer::MOTREQ;
		}

	} 
	
	public function setBenreq($v)
	{

		if ($this->benreq !== $v) {
			$this->benreq = $v;
			$this->modifiedColumns[] = CasolartmPeer::BENREQ;
		}

	} 
	
	public function setMondes($v)
	{

		if ($this->mondes !== $v) {
			$this->mondes = $v;
			$this->modifiedColumns[] = CasolartmPeer::MONDES;
		}

	} 
	
	public function setObsreq($v)
	{

		if ($this->obsreq !== $v) {
			$this->obsreq = $v;
			$this->modifiedColumns[] = CasolartmPeer::OBSREQ;
		}

	} 
	
	public function setUnires($v)
	{

		if ($this->unires !== $v) {
			$this->unires = $v;
			$this->modifiedColumns[] = CasolartmPeer::UNIRES;
		}

	} 
	
	public function setTipmon($v)
	{

		if ($this->tipmon !== $v) {
			$this->tipmon = $v;
			$this->modifiedColumns[] = CasolartmPeer::TIPMON;
		}

	} 
	
	public function setValmon($v)
	{

		if ($this->valmon !== $v) {
			$this->valmon = $v;
			$this->modifiedColumns[] = CasolartmPeer::VALMON;
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
			$this->modifiedColumns[] = CasolartmPeer::FECANU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CasolartmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->reqart = $rs->getString($startcol + 0);

			$this->fecreq = $rs->getDate($startcol + 1, null);

			$this->desreq = $rs->getString($startcol + 2);

			$this->monreq = $rs->getFloat($startcol + 3);

			$this->stareq = $rs->getString($startcol + 4);

			$this->motreq = $rs->getString($startcol + 5);

			$this->benreq = $rs->getString($startcol + 6);

			$this->mondes = $rs->getFloat($startcol + 7);

			$this->obsreq = $rs->getString($startcol + 8);

			$this->unires = $rs->getString($startcol + 9);

			$this->tipmon = $rs->getString($startcol + 10);

			$this->valmon = $rs->getFloat($startcol + 11);

			$this->fecanu = $rs->getDate($startcol + 12, null);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Casolartm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CasolartmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CasolartmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CasolartmPeer::DATABASE_NAME);
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
					$pk = CasolartmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CasolartmPeer::doUpdate($this, $con);
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


			if (($retval = CasolartmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasolartmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReqart();
				break;
			case 1:
				return $this->getFecreq();
				break;
			case 2:
				return $this->getDesreq();
				break;
			case 3:
				return $this->getMonreq();
				break;
			case 4:
				return $this->getStareq();
				break;
			case 5:
				return $this->getMotreq();
				break;
			case 6:
				return $this->getBenreq();
				break;
			case 7:
				return $this->getMondes();
				break;
			case 8:
				return $this->getObsreq();
				break;
			case 9:
				return $this->getUnires();
				break;
			case 10:
				return $this->getTipmon();
				break;
			case 11:
				return $this->getValmon();
				break;
			case 12:
				return $this->getFecanu();
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
		$keys = CasolartmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReqart(),
			$keys[1] => $this->getFecreq(),
			$keys[2] => $this->getDesreq(),
			$keys[3] => $this->getMonreq(),
			$keys[4] => $this->getStareq(),
			$keys[5] => $this->getMotreq(),
			$keys[6] => $this->getBenreq(),
			$keys[7] => $this->getMondes(),
			$keys[8] => $this->getObsreq(),
			$keys[9] => $this->getUnires(),
			$keys[10] => $this->getTipmon(),
			$keys[11] => $this->getValmon(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasolartmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReqart($value);
				break;
			case 1:
				$this->setFecreq($value);
				break;
			case 2:
				$this->setDesreq($value);
				break;
			case 3:
				$this->setMonreq($value);
				break;
			case 4:
				$this->setStareq($value);
				break;
			case 5:
				$this->setMotreq($value);
				break;
			case 6:
				$this->setBenreq($value);
				break;
			case 7:
				$this->setMondes($value);
				break;
			case 8:
				$this->setObsreq($value);
				break;
			case 9:
				$this->setUnires($value);
				break;
			case 10:
				$this->setTipmon($value);
				break;
			case 11:
				$this->setValmon($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CasolartmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReqart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesreq($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonreq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStareq($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMotreq($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBenreq($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondes($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObsreq($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUnires($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipmon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setValmon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CasolartmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CasolartmPeer::REQART)) $criteria->add(CasolartmPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CasolartmPeer::FECREQ)) $criteria->add(CasolartmPeer::FECREQ, $this->fecreq);
		if ($this->isColumnModified(CasolartmPeer::DESREQ)) $criteria->add(CasolartmPeer::DESREQ, $this->desreq);
		if ($this->isColumnModified(CasolartmPeer::MONREQ)) $criteria->add(CasolartmPeer::MONREQ, $this->monreq);
		if ($this->isColumnModified(CasolartmPeer::STAREQ)) $criteria->add(CasolartmPeer::STAREQ, $this->stareq);
		if ($this->isColumnModified(CasolartmPeer::MOTREQ)) $criteria->add(CasolartmPeer::MOTREQ, $this->motreq);
		if ($this->isColumnModified(CasolartmPeer::BENREQ)) $criteria->add(CasolartmPeer::BENREQ, $this->benreq);
		if ($this->isColumnModified(CasolartmPeer::MONDES)) $criteria->add(CasolartmPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CasolartmPeer::OBSREQ)) $criteria->add(CasolartmPeer::OBSREQ, $this->obsreq);
		if ($this->isColumnModified(CasolartmPeer::UNIRES)) $criteria->add(CasolartmPeer::UNIRES, $this->unires);
		if ($this->isColumnModified(CasolartmPeer::TIPMON)) $criteria->add(CasolartmPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(CasolartmPeer::VALMON)) $criteria->add(CasolartmPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(CasolartmPeer::FECANU)) $criteria->add(CasolartmPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CasolartmPeer::ID)) $criteria->add(CasolartmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CasolartmPeer::DATABASE_NAME);

		$criteria->add(CasolartmPeer::ID, $this->id);

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

		$copyObj->setReqart($this->reqart);

		$copyObj->setFecreq($this->fecreq);

		$copyObj->setDesreq($this->desreq);

		$copyObj->setMonreq($this->monreq);

		$copyObj->setStareq($this->stareq);

		$copyObj->setMotreq($this->motreq);

		$copyObj->setBenreq($this->benreq);

		$copyObj->setMondes($this->mondes);

		$copyObj->setObsreq($this->obsreq);

		$copyObj->setUnires($this->unires);

		$copyObj->setTipmon($this->tipmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setFecanu($this->fecanu);


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
			self::$peer = new CasolartmPeer();
		}
		return self::$peer;
	}

} 