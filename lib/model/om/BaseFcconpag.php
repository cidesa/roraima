<?php


abstract class BaseFcconpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcon;


	
	protected $feccon;


	
	protected $moncon;


	
	protected $numcuo;


	
	protected $monini;


	
	protected $estcon;


	
	protected $rifcon;


	
	protected $obscon;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefcon()
	{

		return $this->refcon;
	}

	
	public function getFeccon($format = 'Y-m-d')
	{

		if ($this->feccon === null || $this->feccon === '') {
			return null;
		} elseif (!is_int($this->feccon)) {
						$ts = strtotime($this->feccon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
			}
		} else {
			$ts = $this->feccon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMoncon()
	{

		return $this->moncon;
	}

	
	public function getNumcuo()
	{

		return $this->numcuo;
	}

	
	public function getMonini()
	{

		return $this->monini;
	}

	
	public function getEstcon()
	{

		return $this->estcon;
	}

	
	public function getRifcon()
	{

		return $this->rifcon;
	}

	
	public function getObscon()
	{

		return $this->obscon;
	}

	
	public function getFunrec()
	{

		return $this->funrec;
	}

	
	public function getFecrec($format = 'Y-m-d')
	{

		if ($this->fecrec === null || $this->fecrec === '') {
			return null;
		} elseif (!is_int($this->fecrec)) {
						$ts = strtotime($this->fecrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
			}
		} else {
			$ts = $this->fecrec;
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

	
	public function setRefcon($v)
	{

		if ($this->refcon !== $v) {
			$this->refcon = $v;
			$this->modifiedColumns[] = FcconpagPeer::REFCON;
		}

	} 
	
	public function setFeccon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccon !== $ts) {
			$this->feccon = $ts;
			$this->modifiedColumns[] = FcconpagPeer::FECCON;
		}

	} 
	
	public function setMoncon($v)
	{

		if ($this->moncon !== $v) {
			$this->moncon = $v;
			$this->modifiedColumns[] = FcconpagPeer::MONCON;
		}

	} 
	
	public function setNumcuo($v)
	{

		if ($this->numcuo !== $v) {
			$this->numcuo = $v;
			$this->modifiedColumns[] = FcconpagPeer::NUMCUO;
		}

	} 
	
	public function setMonini($v)
	{

		if ($this->monini !== $v) {
			$this->monini = $v;
			$this->modifiedColumns[] = FcconpagPeer::MONINI;
		}

	} 
	
	public function setEstcon($v)
	{

		if ($this->estcon !== $v) {
			$this->estcon = $v;
			$this->modifiedColumns[] = FcconpagPeer::ESTCON;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FcconpagPeer::RIFCON;
		}

	} 
	
	public function setObscon($v)
	{

		if ($this->obscon !== $v) {
			$this->obscon = $v;
			$this->modifiedColumns[] = FcconpagPeer::OBSCON;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FcconpagPeer::FUNREC;
		}

	} 
	
	public function setFecrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrec !== $ts) {
			$this->fecrec = $ts;
			$this->modifiedColumns[] = FcconpagPeer::FECREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcconpagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refcon = $rs->getString($startcol + 0);

			$this->feccon = $rs->getDate($startcol + 1, null);

			$this->moncon = $rs->getFloat($startcol + 2);

			$this->numcuo = $rs->getFloat($startcol + 3);

			$this->monini = $rs->getFloat($startcol + 4);

			$this->estcon = $rs->getString($startcol + 5);

			$this->rifcon = $rs->getString($startcol + 6);

			$this->obscon = $rs->getString($startcol + 7);

			$this->funrec = $rs->getString($startcol + 8);

			$this->fecrec = $rs->getDate($startcol + 9, null);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcconpag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcconpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcconpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcconpagPeer::DATABASE_NAME);
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
					$pk = FcconpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcconpagPeer::doUpdate($this, $con);
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


			if (($retval = FcconpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcon();
				break;
			case 1:
				return $this->getFeccon();
				break;
			case 2:
				return $this->getMoncon();
				break;
			case 3:
				return $this->getNumcuo();
				break;
			case 4:
				return $this->getMonini();
				break;
			case 5:
				return $this->getEstcon();
				break;
			case 6:
				return $this->getRifcon();
				break;
			case 7:
				return $this->getObscon();
				break;
			case 8:
				return $this->getFunrec();
				break;
			case 9:
				return $this->getFecrec();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcconpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcon(),
			$keys[1] => $this->getFeccon(),
			$keys[2] => $this->getMoncon(),
			$keys[3] => $this->getNumcuo(),
			$keys[4] => $this->getMonini(),
			$keys[5] => $this->getEstcon(),
			$keys[6] => $this->getRifcon(),
			$keys[7] => $this->getObscon(),
			$keys[8] => $this->getFunrec(),
			$keys[9] => $this->getFecrec(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcon($value);
				break;
			case 1:
				$this->setFeccon($value);
				break;
			case 2:
				$this->setMoncon($value);
				break;
			case 3:
				$this->setNumcuo($value);
				break;
			case 4:
				$this->setMonini($value);
				break;
			case 5:
				$this->setEstcon($value);
				break;
			case 6:
				$this->setRifcon($value);
				break;
			case 7:
				$this->setObscon($value);
				break;
			case 8:
				$this->setFunrec($value);
				break;
			case 9:
				$this->setFecrec($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcconpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMoncon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumcuo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonini($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRifcon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObscon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFunrec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecrec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcconpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcconpagPeer::REFCON)) $criteria->add(FcconpagPeer::REFCON, $this->refcon);
		if ($this->isColumnModified(FcconpagPeer::FECCON)) $criteria->add(FcconpagPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(FcconpagPeer::MONCON)) $criteria->add(FcconpagPeer::MONCON, $this->moncon);
		if ($this->isColumnModified(FcconpagPeer::NUMCUO)) $criteria->add(FcconpagPeer::NUMCUO, $this->numcuo);
		if ($this->isColumnModified(FcconpagPeer::MONINI)) $criteria->add(FcconpagPeer::MONINI, $this->monini);
		if ($this->isColumnModified(FcconpagPeer::ESTCON)) $criteria->add(FcconpagPeer::ESTCON, $this->estcon);
		if ($this->isColumnModified(FcconpagPeer::RIFCON)) $criteria->add(FcconpagPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcconpagPeer::OBSCON)) $criteria->add(FcconpagPeer::OBSCON, $this->obscon);
		if ($this->isColumnModified(FcconpagPeer::FUNREC)) $criteria->add(FcconpagPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcconpagPeer::FECREC)) $criteria->add(FcconpagPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcconpagPeer::ID)) $criteria->add(FcconpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcconpagPeer::DATABASE_NAME);

		$criteria->add(FcconpagPeer::ID, $this->id);

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

		$copyObj->setRefcon($this->refcon);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setMoncon($this->moncon);

		$copyObj->setNumcuo($this->numcuo);

		$copyObj->setMonini($this->monini);

		$copyObj->setEstcon($this->estcon);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setObscon($this->obscon);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);


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
			self::$peer = new FcconpagPeer();
		}
		return self::$peer;
	}

} 