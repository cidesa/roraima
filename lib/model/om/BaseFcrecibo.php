<?php


abstract class BaseFcrecibo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrec;


	
	protected $fecrec;


	
	protected $desrec;


	
	protected $numlic;


	
	protected $rifcon;


	
	protected $monrec;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $fecha;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodrec()
	{

		return $this->codrec; 		
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

	
	public function getDesrec()
	{

		return $this->desrec; 		
	}
	
	public function getNumlic()
	{

		return $this->numlic; 		
	}
	
	public function getRifcon()
	{

		return $this->rifcon; 		
	}
	
	public function getMonrec()
	{

		return number_format($this->monrec,2,',','.');
		
	}
	
	public function getNomcon()
	{

		return $this->nomcon; 		
	}
	
	public function getDircon()
	{

		return $this->dircon; 		
	}
	
	public function getFecha($format = 'Y-m-d')
	{

		if ($this->fecha === null || $this->fecha === '') {
			return null;
		} elseif (!is_int($this->fecha)) {
						$ts = strtotime($this->fecha);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
			}
		} else {
			$ts = $this->fecha;
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
	
	public function setCodrec($v)
	{

		if ($this->codrec !== $v) {
			$this->codrec = $v;
			$this->modifiedColumns[] = FcreciboPeer::CODREC;
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
			$this->modifiedColumns[] = FcreciboPeer::FECREC;
		}

	} 
	
	public function setDesrec($v)
	{

		if ($this->desrec !== $v) {
			$this->desrec = $v;
			$this->modifiedColumns[] = FcreciboPeer::DESREC;
		}

	} 
	
	public function setNumlic($v)
	{

		if ($this->numlic !== $v) {
			$this->numlic = $v;
			$this->modifiedColumns[] = FcreciboPeer::NUMLIC;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FcreciboPeer::RIFCON;
		}

	} 
	
	public function setMonrec($v)
	{

		if ($this->monrec !== $v) {
			$this->monrec = $v;
			$this->modifiedColumns[] = FcreciboPeer::MONREC;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = FcreciboPeer::NOMCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = FcreciboPeer::DIRCON;
		}

	} 
	
	public function setFecha($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha !== $ts) {
			$this->fecha = $ts;
			$this->modifiedColumns[] = FcreciboPeer::FECHA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcreciboPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codrec = $rs->getString($startcol + 0);

			$this->fecrec = $rs->getDate($startcol + 1, null);

			$this->desrec = $rs->getString($startcol + 2);

			$this->numlic = $rs->getString($startcol + 3);

			$this->rifcon = $rs->getString($startcol + 4);

			$this->monrec = $rs->getFloat($startcol + 5);

			$this->nomcon = $rs->getString($startcol + 6);

			$this->dircon = $rs->getString($startcol + 7);

			$this->fecha = $rs->getDate($startcol + 8, null);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcrecibo object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcreciboPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcreciboPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcreciboPeer::DATABASE_NAME);
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
					$pk = FcreciboPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcreciboPeer::doUpdate($this, $con);
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


			if (($retval = FcreciboPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcreciboPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrec();
				break;
			case 1:
				return $this->getFecrec();
				break;
			case 2:
				return $this->getDesrec();
				break;
			case 3:
				return $this->getNumlic();
				break;
			case 4:
				return $this->getRifcon();
				break;
			case 5:
				return $this->getMonrec();
				break;
			case 6:
				return $this->getNomcon();
				break;
			case 7:
				return $this->getDircon();
				break;
			case 8:
				return $this->getFecha();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcreciboPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrec(),
			$keys[1] => $this->getFecrec(),
			$keys[2] => $this->getDesrec(),
			$keys[3] => $this->getNumlic(),
			$keys[4] => $this->getRifcon(),
			$keys[5] => $this->getMonrec(),
			$keys[6] => $this->getNomcon(),
			$keys[7] => $this->getDircon(),
			$keys[8] => $this->getFecha(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcreciboPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrec($value);
				break;
			case 1:
				$this->setFecrec($value);
				break;
			case 2:
				$this->setDesrec($value);
				break;
			case 3:
				$this->setNumlic($value);
				break;
			case 4:
				$this->setRifcon($value);
				break;
			case 5:
				$this->setMonrec($value);
				break;
			case 6:
				$this->setNomcon($value);
				break;
			case 7:
				$this->setDircon($value);
				break;
			case 8:
				$this->setFecha($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcreciboPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumlic($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRifcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomcon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDircon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecha($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcreciboPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcreciboPeer::CODREC)) $criteria->add(FcreciboPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FcreciboPeer::FECREC)) $criteria->add(FcreciboPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcreciboPeer::DESREC)) $criteria->add(FcreciboPeer::DESREC, $this->desrec);
		if ($this->isColumnModified(FcreciboPeer::NUMLIC)) $criteria->add(FcreciboPeer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(FcreciboPeer::RIFCON)) $criteria->add(FcreciboPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcreciboPeer::MONREC)) $criteria->add(FcreciboPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(FcreciboPeer::NOMCON)) $criteria->add(FcreciboPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcreciboPeer::DIRCON)) $criteria->add(FcreciboPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcreciboPeer::FECHA)) $criteria->add(FcreciboPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(FcreciboPeer::ID)) $criteria->add(FcreciboPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcreciboPeer::DATABASE_NAME);

		$criteria->add(FcreciboPeer::ID, $this->id);

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

		$copyObj->setCodrec($this->codrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setDesrec($this->desrec);

		$copyObj->setNumlic($this->numlic);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setFecha($this->fecha);


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
			self::$peer = new FcreciboPeer();
		}
		return self::$peer;
	}

} 