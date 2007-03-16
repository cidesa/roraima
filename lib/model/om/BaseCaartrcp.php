<?php


abstract class BaseCaartrcp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rcpart;


	
	protected $codart;


	
	protected $ordcom;


	
	protected $codcat;


	
	protected $canrec;


	
	protected $candev;


	
	protected $cantot;


	
	protected $montot;


	
	protected $monrgo;


	
	protected $mondes;


	
	protected $canasilot;


	
	protected $codfal;


	
	protected $fecest;


	
	protected $serial;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRcpart()
	{

		return $this->rcpart;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getOrdcom()
	{

		return $this->ordcom;
	}

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getCanrec()
	{

		return $this->canrec;
	}

	
	public function getCandev()
	{

		return $this->candev;
	}

	
	public function getCantot()
	{

		return $this->cantot;
	}

	
	public function getMontot()
	{

		return $this->montot;
	}

	
	public function getMonrgo()
	{

		return $this->monrgo;
	}

	
	public function getMondes()
	{

		return $this->mondes;
	}

	
	public function getCanasilot()
	{

		return $this->canasilot;
	}

	
	public function getCodfal()
	{

		return $this->codfal;
	}

	
	public function getFecest($format = 'Y-m-d')
	{

		if ($this->fecest === null || $this->fecest === '') {
			return null;
		} elseif (!is_int($this->fecest)) {
						$ts = strtotime($this->fecest);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecest] as date/time value: " . var_export($this->fecest, true));
			}
		} else {
			$ts = $this->fecest;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getSerial()
	{

		return $this->serial;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRcpart($v)
	{

		if ($this->rcpart !== $v) {
			$this->rcpart = $v;
			$this->modifiedColumns[] = CaartrcpPeer::RCPART;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CaartrcpPeer::CODART;
		}

	} 
	
	public function setOrdcom($v)
	{

		if ($this->ordcom !== $v) {
			$this->ordcom = $v;
			$this->modifiedColumns[] = CaartrcpPeer::ORDCOM;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = CaartrcpPeer::CODCAT;
		}

	} 
	
	public function setCanrec($v)
	{

		if ($this->canrec !== $v) {
			$this->canrec = $v;
			$this->modifiedColumns[] = CaartrcpPeer::CANREC;
		}

	} 
	
	public function setCandev($v)
	{

		if ($this->candev !== $v) {
			$this->candev = $v;
			$this->modifiedColumns[] = CaartrcpPeer::CANDEV;
		}

	} 
	
	public function setCantot($v)
	{

		if ($this->cantot !== $v) {
			$this->cantot = $v;
			$this->modifiedColumns[] = CaartrcpPeer::CANTOT;
		}

	} 
	
	public function setMontot($v)
	{

		if ($this->montot !== $v) {
			$this->montot = $v;
			$this->modifiedColumns[] = CaartrcpPeer::MONTOT;
		}

	} 
	
	public function setMonrgo($v)
	{

		if ($this->monrgo !== $v) {
			$this->monrgo = $v;
			$this->modifiedColumns[] = CaartrcpPeer::MONRGO;
		}

	} 
	
	public function setMondes($v)
	{

		if ($this->mondes !== $v) {
			$this->mondes = $v;
			$this->modifiedColumns[] = CaartrcpPeer::MONDES;
		}

	} 
	
	public function setCanasilot($v)
	{

		if ($this->canasilot !== $v) {
			$this->canasilot = $v;
			$this->modifiedColumns[] = CaartrcpPeer::CANASILOT;
		}

	} 
	
	public function setCodfal($v)
	{

		if ($this->codfal !== $v) {
			$this->codfal = $v;
			$this->modifiedColumns[] = CaartrcpPeer::CODFAL;
		}

	} 
	
	public function setFecest($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecest] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecest !== $ts) {
			$this->fecest = $ts;
			$this->modifiedColumns[] = CaartrcpPeer::FECEST;
		}

	} 
	
	public function setSerial($v)
	{

		if ($this->serial !== $v) {
			$this->serial = $v;
			$this->modifiedColumns[] = CaartrcpPeer::SERIAL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaartrcpPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->rcpart = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->ordcom = $rs->getString($startcol + 2);

			$this->codcat = $rs->getString($startcol + 3);

			$this->canrec = $rs->getFloat($startcol + 4);

			$this->candev = $rs->getFloat($startcol + 5);

			$this->cantot = $rs->getFloat($startcol + 6);

			$this->montot = $rs->getFloat($startcol + 7);

			$this->monrgo = $rs->getFloat($startcol + 8);

			$this->mondes = $rs->getFloat($startcol + 9);

			$this->canasilot = $rs->getFloat($startcol + 10);

			$this->codfal = $rs->getString($startcol + 11);

			$this->fecest = $rs->getDate($startcol + 12, null);

			$this->serial = $rs->getString($startcol + 13);

			$this->id = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caartrcp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaartrcpPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartrcpPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartrcpPeer::DATABASE_NAME);
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
					$pk = CaartrcpPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaartrcpPeer::doUpdate($this, $con);
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


			if (($retval = CaartrcpPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartrcpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRcpart();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getOrdcom();
				break;
			case 3:
				return $this->getCodcat();
				break;
			case 4:
				return $this->getCanrec();
				break;
			case 5:
				return $this->getCandev();
				break;
			case 6:
				return $this->getCantot();
				break;
			case 7:
				return $this->getMontot();
				break;
			case 8:
				return $this->getMonrgo();
				break;
			case 9:
				return $this->getMondes();
				break;
			case 10:
				return $this->getCanasilot();
				break;
			case 11:
				return $this->getCodfal();
				break;
			case 12:
				return $this->getFecest();
				break;
			case 13:
				return $this->getSerial();
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
		$keys = CaartrcpPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRcpart(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getOrdcom(),
			$keys[3] => $this->getCodcat(),
			$keys[4] => $this->getCanrec(),
			$keys[5] => $this->getCandev(),
			$keys[6] => $this->getCantot(),
			$keys[7] => $this->getMontot(),
			$keys[8] => $this->getMonrgo(),
			$keys[9] => $this->getMondes(),
			$keys[10] => $this->getCanasilot(),
			$keys[11] => $this->getCodfal(),
			$keys[12] => $this->getFecest(),
			$keys[13] => $this->getSerial(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartrcpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRcpart($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setOrdcom($value);
				break;
			case 3:
				$this->setCodcat($value);
				break;
			case 4:
				$this->setCanrec($value);
				break;
			case 5:
				$this->setCandev($value);
				break;
			case 6:
				$this->setCantot($value);
				break;
			case 7:
				$this->setMontot($value);
				break;
			case 8:
				$this->setMonrgo($value);
				break;
			case 9:
				$this->setMondes($value);
				break;
			case 10:
				$this->setCanasilot($value);
				break;
			case 11:
				$this->setCodfal($value);
				break;
			case 12:
				$this->setFecest($value);
				break;
			case 13:
				$this->setSerial($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartrcpPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRcpart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOrdcom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCandev($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMontot($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonrgo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMondes($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCanasilot($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodfal($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecest($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSerial($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartrcpPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartrcpPeer::RCPART)) $criteria->add(CaartrcpPeer::RCPART, $this->rcpart);
		if ($this->isColumnModified(CaartrcpPeer::CODART)) $criteria->add(CaartrcpPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartrcpPeer::ORDCOM)) $criteria->add(CaartrcpPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(CaartrcpPeer::CODCAT)) $criteria->add(CaartrcpPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaartrcpPeer::CANREC)) $criteria->add(CaartrcpPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CaartrcpPeer::CANDEV)) $criteria->add(CaartrcpPeer::CANDEV, $this->candev);
		if ($this->isColumnModified(CaartrcpPeer::CANTOT)) $criteria->add(CaartrcpPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(CaartrcpPeer::MONTOT)) $criteria->add(CaartrcpPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CaartrcpPeer::MONRGO)) $criteria->add(CaartrcpPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(CaartrcpPeer::MONDES)) $criteria->add(CaartrcpPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CaartrcpPeer::CANASILOT)) $criteria->add(CaartrcpPeer::CANASILOT, $this->canasilot);
		if ($this->isColumnModified(CaartrcpPeer::CODFAL)) $criteria->add(CaartrcpPeer::CODFAL, $this->codfal);
		if ($this->isColumnModified(CaartrcpPeer::FECEST)) $criteria->add(CaartrcpPeer::FECEST, $this->fecest);
		if ($this->isColumnModified(CaartrcpPeer::SERIAL)) $criteria->add(CaartrcpPeer::SERIAL, $this->serial);
		if ($this->isColumnModified(CaartrcpPeer::ID)) $criteria->add(CaartrcpPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartrcpPeer::DATABASE_NAME);

		$criteria->add(CaartrcpPeer::ID, $this->id);

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

		$copyObj->setRcpart($this->rcpart);

		$copyObj->setCodart($this->codart);

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setCandev($this->candev);

		$copyObj->setCantot($this->cantot);

		$copyObj->setMontot($this->montot);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setMondes($this->mondes);

		$copyObj->setCanasilot($this->canasilot);

		$copyObj->setCodfal($this->codfal);

		$copyObj->setFecest($this->fecest);

		$copyObj->setSerial($this->serial);


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
			self::$peer = new CaartrcpPeer();
		}
		return self::$peer;
	}

} 