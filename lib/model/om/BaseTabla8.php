<?php


abstract class BaseTabla8 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refprc;


	
	protected $tipprc;


	
	protected $fecprc;


	
	protected $anoprc;


	
	protected $desprc;


	
	protected $desanu;


	
	protected $monprc;


	
	protected $salcom;


	
	protected $salcau;


	
	protected $salpag;


	
	protected $salaju;


	
	protected $staprc;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $refsol;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefprc()
	{

		return $this->refprc;
	}

	
	public function getTipprc()
	{

		return $this->tipprc;
	}

	
	public function getFecprc($format = 'Y-m-d')
	{

		if ($this->fecprc === null || $this->fecprc === '') {
			return null;
		} elseif (!is_int($this->fecprc)) {
						$ts = strtotime($this->fecprc);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecprc] as date/time value: " . var_export($this->fecprc, true));
			}
		} else {
			$ts = $this->fecprc;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAnoprc()
	{

		return $this->anoprc;
	}

	
	public function getDesprc()
	{

		return $this->desprc;
	}

	
	public function getDesanu()
	{

		return $this->desanu;
	}

	
	public function getMonprc()
	{

		return $this->monprc;
	}

	
	public function getSalcom()
	{

		return $this->salcom;
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

	
	public function getStaprc()
	{

		return $this->staprc;
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

	
	public function getRefsol()
	{

		return $this->refsol;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = Tabla8Peer::REFPRC;
		}

	} 
	
	public function setTipprc($v)
	{

		if ($this->tipprc !== $v) {
			$this->tipprc = $v;
			$this->modifiedColumns[] = Tabla8Peer::TIPPRC;
		}

	} 
	
	public function setFecprc($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecprc] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecprc !== $ts) {
			$this->fecprc = $ts;
			$this->modifiedColumns[] = Tabla8Peer::FECPRC;
		}

	} 
	
	public function setAnoprc($v)
	{

		if ($this->anoprc !== $v) {
			$this->anoprc = $v;
			$this->modifiedColumns[] = Tabla8Peer::ANOPRC;
		}

	} 
	
	public function setDesprc($v)
	{

		if ($this->desprc !== $v) {
			$this->desprc = $v;
			$this->modifiedColumns[] = Tabla8Peer::DESPRC;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = Tabla8Peer::DESANU;
		}

	} 
	
	public function setMonprc($v)
	{

		if ($this->monprc !== $v) {
			$this->monprc = $v;
			$this->modifiedColumns[] = Tabla8Peer::MONPRC;
		}

	} 
	
	public function setSalcom($v)
	{

		if ($this->salcom !== $v) {
			$this->salcom = $v;
			$this->modifiedColumns[] = Tabla8Peer::SALCOM;
		}

	} 
	
	public function setSalcau($v)
	{

		if ($this->salcau !== $v) {
			$this->salcau = $v;
			$this->modifiedColumns[] = Tabla8Peer::SALCAU;
		}

	} 
	
	public function setSalpag($v)
	{

		if ($this->salpag !== $v) {
			$this->salpag = $v;
			$this->modifiedColumns[] = Tabla8Peer::SALPAG;
		}

	} 
	
	public function setSalaju($v)
	{

		if ($this->salaju !== $v) {
			$this->salaju = $v;
			$this->modifiedColumns[] = Tabla8Peer::SALAJU;
		}

	} 
	
	public function setStaprc($v)
	{

		if ($this->staprc !== $v) {
			$this->staprc = $v;
			$this->modifiedColumns[] = Tabla8Peer::STAPRC;
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
			$this->modifiedColumns[] = Tabla8Peer::FECANU;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = Tabla8Peer::CEDRIF;
		}

	} 
	
	public function setRefsol($v)
	{

		if ($this->refsol !== $v) {
			$this->refsol = $v;
			$this->modifiedColumns[] = Tabla8Peer::REFSOL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Tabla8Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refprc = $rs->getString($startcol + 0);

			$this->tipprc = $rs->getString($startcol + 1);

			$this->fecprc = $rs->getDate($startcol + 2, null);

			$this->anoprc = $rs->getString($startcol + 3);

			$this->desprc = $rs->getString($startcol + 4);

			$this->desanu = $rs->getString($startcol + 5);

			$this->monprc = $rs->getFloat($startcol + 6);

			$this->salcom = $rs->getFloat($startcol + 7);

			$this->salcau = $rs->getFloat($startcol + 8);

			$this->salpag = $rs->getFloat($startcol + 9);

			$this->salaju = $rs->getFloat($startcol + 10);

			$this->staprc = $rs->getString($startcol + 11);

			$this->fecanu = $rs->getDate($startcol + 12, null);

			$this->cedrif = $rs->getString($startcol + 13);

			$this->refsol = $rs->getString($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tabla8 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Tabla8Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla8Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla8Peer::DATABASE_NAME);
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
					$pk = Tabla8Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Tabla8Peer::doUpdate($this, $con);
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


			if (($retval = Tabla8Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla8Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefprc();
				break;
			case 1:
				return $this->getTipprc();
				break;
			case 2:
				return $this->getFecprc();
				break;
			case 3:
				return $this->getAnoprc();
				break;
			case 4:
				return $this->getDesprc();
				break;
			case 5:
				return $this->getDesanu();
				break;
			case 6:
				return $this->getMonprc();
				break;
			case 7:
				return $this->getSalcom();
				break;
			case 8:
				return $this->getSalcau();
				break;
			case 9:
				return $this->getSalpag();
				break;
			case 10:
				return $this->getSalaju();
				break;
			case 11:
				return $this->getStaprc();
				break;
			case 12:
				return $this->getFecanu();
				break;
			case 13:
				return $this->getCedrif();
				break;
			case 14:
				return $this->getRefsol();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla8Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefprc(),
			$keys[1] => $this->getTipprc(),
			$keys[2] => $this->getFecprc(),
			$keys[3] => $this->getAnoprc(),
			$keys[4] => $this->getDesprc(),
			$keys[5] => $this->getDesanu(),
			$keys[6] => $this->getMonprc(),
			$keys[7] => $this->getSalcom(),
			$keys[8] => $this->getSalcau(),
			$keys[9] => $this->getSalpag(),
			$keys[10] => $this->getSalaju(),
			$keys[11] => $this->getStaprc(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getCedrif(),
			$keys[14] => $this->getRefsol(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla8Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefprc($value);
				break;
			case 1:
				$this->setTipprc($value);
				break;
			case 2:
				$this->setFecprc($value);
				break;
			case 3:
				$this->setAnoprc($value);
				break;
			case 4:
				$this->setDesprc($value);
				break;
			case 5:
				$this->setDesanu($value);
				break;
			case 6:
				$this->setMonprc($value);
				break;
			case 7:
				$this->setSalcom($value);
				break;
			case 8:
				$this->setSalcau($value);
				break;
			case 9:
				$this->setSalpag($value);
				break;
			case 10:
				$this->setSalaju($value);
				break;
			case 11:
				$this->setStaprc($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setCedrif($value);
				break;
			case 14:
				$this->setRefsol($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla8Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefprc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipprc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecprc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnoprc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonprc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSalcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSalcau($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalpag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSalaju($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStaprc($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCedrif($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRefsol($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla8Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla8Peer::REFPRC)) $criteria->add(Tabla8Peer::REFPRC, $this->refprc);
		if ($this->isColumnModified(Tabla8Peer::TIPPRC)) $criteria->add(Tabla8Peer::TIPPRC, $this->tipprc);
		if ($this->isColumnModified(Tabla8Peer::FECPRC)) $criteria->add(Tabla8Peer::FECPRC, $this->fecprc);
		if ($this->isColumnModified(Tabla8Peer::ANOPRC)) $criteria->add(Tabla8Peer::ANOPRC, $this->anoprc);
		if ($this->isColumnModified(Tabla8Peer::DESPRC)) $criteria->add(Tabla8Peer::DESPRC, $this->desprc);
		if ($this->isColumnModified(Tabla8Peer::DESANU)) $criteria->add(Tabla8Peer::DESANU, $this->desanu);
		if ($this->isColumnModified(Tabla8Peer::MONPRC)) $criteria->add(Tabla8Peer::MONPRC, $this->monprc);
		if ($this->isColumnModified(Tabla8Peer::SALCOM)) $criteria->add(Tabla8Peer::SALCOM, $this->salcom);
		if ($this->isColumnModified(Tabla8Peer::SALCAU)) $criteria->add(Tabla8Peer::SALCAU, $this->salcau);
		if ($this->isColumnModified(Tabla8Peer::SALPAG)) $criteria->add(Tabla8Peer::SALPAG, $this->salpag);
		if ($this->isColumnModified(Tabla8Peer::SALAJU)) $criteria->add(Tabla8Peer::SALAJU, $this->salaju);
		if ($this->isColumnModified(Tabla8Peer::STAPRC)) $criteria->add(Tabla8Peer::STAPRC, $this->staprc);
		if ($this->isColumnModified(Tabla8Peer::FECANU)) $criteria->add(Tabla8Peer::FECANU, $this->fecanu);
		if ($this->isColumnModified(Tabla8Peer::CEDRIF)) $criteria->add(Tabla8Peer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(Tabla8Peer::REFSOL)) $criteria->add(Tabla8Peer::REFSOL, $this->refsol);
		if ($this->isColumnModified(Tabla8Peer::ID)) $criteria->add(Tabla8Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla8Peer::DATABASE_NAME);

		$criteria->add(Tabla8Peer::ID, $this->id);

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

		$copyObj->setRefprc($this->refprc);

		$copyObj->setTipprc($this->tipprc);

		$copyObj->setFecprc($this->fecprc);

		$copyObj->setAnoprc($this->anoprc);

		$copyObj->setDesprc($this->desprc);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMonprc($this->monprc);

		$copyObj->setSalcom($this->salcom);

		$copyObj->setSalcau($this->salcau);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStaprc($this->staprc);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setRefsol($this->refsol);


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
			self::$peer = new Tabla8Peer();
		}
		return self::$peer;
	}

} 