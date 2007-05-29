<?php


abstract class BaseFctraveh extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $plaveh;


	
	protected $fectra;


	
	protected $rifcon;


	
	protected $rifrep;


	
	protected $rifconant;


	
	protected $rifrepant;


	
	protected $funrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumtra()
	{

		return $this->numtra; 		
	}
	
	public function getPlaveh()
	{

		return $this->plaveh; 		
	}
	
	public function getFectra($format = 'Y-m-d')
	{

		if ($this->fectra === null || $this->fectra === '') {
			return null;
		} elseif (!is_int($this->fectra)) {
						$ts = strtotime($this->fectra);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
			}
		} else {
			$ts = $this->fectra;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRifcon()
	{

		return $this->rifcon; 		
	}
	
	public function getRifrep()
	{

		return $this->rifrep; 		
	}
	
	public function getRifconant()
	{

		return $this->rifconant; 		
	}
	
	public function getRifrepant()
	{

		return $this->rifrepant; 		
	}
	
	public function getFunrec()
	{

		return $this->funrec; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumtra($v)
	{

		if ($this->numtra !== $v) {
			$this->numtra = $v;
			$this->modifiedColumns[] = FctravehPeer::NUMTRA;
		}

	} 
	
	public function setPlaveh($v)
	{

		if ($this->plaveh !== $v) {
			$this->plaveh = $v;
			$this->modifiedColumns[] = FctravehPeer::PLAVEH;
		}

	} 
	
	public function setFectra($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fectra !== $ts) {
			$this->fectra = $ts;
			$this->modifiedColumns[] = FctravehPeer::FECTRA;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FctravehPeer::RIFCON;
		}

	} 
	
	public function setRifrep($v)
	{

		if ($this->rifrep !== $v) {
			$this->rifrep = $v;
			$this->modifiedColumns[] = FctravehPeer::RIFREP;
		}

	} 
	
	public function setRifconant($v)
	{

		if ($this->rifconant !== $v) {
			$this->rifconant = $v;
			$this->modifiedColumns[] = FctravehPeer::RIFCONANT;
		}

	} 
	
	public function setRifrepant($v)
	{

		if ($this->rifrepant !== $v) {
			$this->rifrepant = $v;
			$this->modifiedColumns[] = FctravehPeer::RIFREPANT;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FctravehPeer::FUNREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FctravehPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numtra = $rs->getString($startcol + 0);

			$this->plaveh = $rs->getString($startcol + 1);

			$this->fectra = $rs->getDate($startcol + 2, null);

			$this->rifcon = $rs->getString($startcol + 3);

			$this->rifrep = $rs->getString($startcol + 4);

			$this->rifconant = $rs->getString($startcol + 5);

			$this->rifrepant = $rs->getString($startcol + 6);

			$this->funrec = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fctraveh object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FctravehPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FctravehPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FctravehPeer::DATABASE_NAME);
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
					$pk = FctravehPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FctravehPeer::doUpdate($this, $con);
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


			if (($retval = FctravehPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctravehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getPlaveh();
				break;
			case 2:
				return $this->getFectra();
				break;
			case 3:
				return $this->getRifcon();
				break;
			case 4:
				return $this->getRifrep();
				break;
			case 5:
				return $this->getRifconant();
				break;
			case 6:
				return $this->getRifrepant();
				break;
			case 7:
				return $this->getFunrec();
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
		$keys = FctravehPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getPlaveh(),
			$keys[2] => $this->getFectra(),
			$keys[3] => $this->getRifcon(),
			$keys[4] => $this->getRifrep(),
			$keys[5] => $this->getRifconant(),
			$keys[6] => $this->getRifrepant(),
			$keys[7] => $this->getFunrec(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctravehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setPlaveh($value);
				break;
			case 2:
				$this->setFectra($value);
				break;
			case 3:
				$this->setRifcon($value);
				break;
			case 4:
				$this->setRifrep($value);
				break;
			case 5:
				$this->setRifconant($value);
				break;
			case 6:
				$this->setRifrepant($value);
				break;
			case 7:
				$this->setFunrec($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctravehPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPlaveh($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFectra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRifrep($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRifconant($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRifrepant($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFunrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FctravehPeer::DATABASE_NAME);

		if ($this->isColumnModified(FctravehPeer::NUMTRA)) $criteria->add(FctravehPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(FctravehPeer::PLAVEH)) $criteria->add(FctravehPeer::PLAVEH, $this->plaveh);
		if ($this->isColumnModified(FctravehPeer::FECTRA)) $criteria->add(FctravehPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(FctravehPeer::RIFCON)) $criteria->add(FctravehPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FctravehPeer::RIFREP)) $criteria->add(FctravehPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FctravehPeer::RIFCONANT)) $criteria->add(FctravehPeer::RIFCONANT, $this->rifconant);
		if ($this->isColumnModified(FctravehPeer::RIFREPANT)) $criteria->add(FctravehPeer::RIFREPANT, $this->rifrepant);
		if ($this->isColumnModified(FctravehPeer::FUNREC)) $criteria->add(FctravehPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FctravehPeer::ID)) $criteria->add(FctravehPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FctravehPeer::DATABASE_NAME);

		$criteria->add(FctravehPeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setPlaveh($this->plaveh);

		$copyObj->setFectra($this->fectra);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setRifconant($this->rifconant);

		$copyObj->setRifrepant($this->rifrepant);

		$copyObj->setFunrec($this->funrec);


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
			self::$peer = new FctravehPeer();
		}
		return self::$peer;
	}

} 