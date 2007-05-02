<?php


abstract class BaseFconrep extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedcon;


	
	protected $rifcon;


	
	protected $nomcon;


	
	protected $repcon;


	
	protected $dircon;


	
	protected $feccon;


	
	protected $telcon;


	
	protected $emacon;


	
	protected $codsec;


	
	protected $codpar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCedcon()
	{

		return $this->cedcon;
	}

	
	public function getRifcon()
	{

		return $this->rifcon;
	}

	
	public function getNomcon()
	{

		return $this->nomcon;
	}

	
	public function getRepcon()
	{

		return $this->repcon;
	}

	
	public function getDircon()
	{

		return $this->dircon;
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

	
	public function getTelcon()
	{

		return $this->telcon;
	}

	
	public function getEmacon()
	{

		return $this->emacon;
	}

	
	public function getCodsec()
	{

		return $this->codsec;
	}

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCedcon($v)
	{

		if ($this->cedcon !== $v) {
			$this->cedcon = $v;
			$this->modifiedColumns[] = FconrepPeer::CEDCON;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FconrepPeer::RIFCON;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = FconrepPeer::NOMCON;
		}

	} 
	
	public function setRepcon($v)
	{

		if ($this->repcon !== $v) {
			$this->repcon = $v;
			$this->modifiedColumns[] = FconrepPeer::REPCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = FconrepPeer::DIRCON;
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
			$this->modifiedColumns[] = FconrepPeer::FECCON;
		}

	} 
	
	public function setTelcon($v)
	{

		if ($this->telcon !== $v) {
			$this->telcon = $v;
			$this->modifiedColumns[] = FconrepPeer::TELCON;
		}

	} 
	
	public function setEmacon($v)
	{

		if ($this->emacon !== $v) {
			$this->emacon = $v;
			$this->modifiedColumns[] = FconrepPeer::EMACON;
		}

	} 
	
	public function setCodsec($v)
	{

		if ($this->codsec !== $v) {
			$this->codsec = $v;
			$this->modifiedColumns[] = FconrepPeer::CODSEC;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = FconrepPeer::CODPAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FconrepPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->cedcon = $rs->getString($startcol + 0);

			$this->rifcon = $rs->getString($startcol + 1);

			$this->nomcon = $rs->getString($startcol + 2);

			$this->repcon = $rs->getString($startcol + 3);

			$this->dircon = $rs->getString($startcol + 4);

			$this->feccon = $rs->getDate($startcol + 5, null);

			$this->telcon = $rs->getString($startcol + 6);

			$this->emacon = $rs->getString($startcol + 7);

			$this->codsec = $rs->getString($startcol + 8);

			$this->codpar = $rs->getString($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fconrep object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FconrepPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FconrepPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FconrepPeer::DATABASE_NAME);
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
					$pk = FconrepPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FconrepPeer::doUpdate($this, $con);
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


			if (($retval = FconrepPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FconrepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedcon();
				break;
			case 1:
				return $this->getRifcon();
				break;
			case 2:
				return $this->getNomcon();
				break;
			case 3:
				return $this->getRepcon();
				break;
			case 4:
				return $this->getDircon();
				break;
			case 5:
				return $this->getFeccon();
				break;
			case 6:
				return $this->getTelcon();
				break;
			case 7:
				return $this->getEmacon();
				break;
			case 8:
				return $this->getCodsec();
				break;
			case 9:
				return $this->getCodpar();
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
		$keys = FconrepPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedcon(),
			$keys[1] => $this->getRifcon(),
			$keys[2] => $this->getNomcon(),
			$keys[3] => $this->getRepcon(),
			$keys[4] => $this->getDircon(),
			$keys[5] => $this->getFeccon(),
			$keys[6] => $this->getTelcon(),
			$keys[7] => $this->getEmacon(),
			$keys[8] => $this->getCodsec(),
			$keys[9] => $this->getCodpar(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FconrepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedcon($value);
				break;
			case 1:
				$this->setRifcon($value);
				break;
			case 2:
				$this->setNomcon($value);
				break;
			case 3:
				$this->setRepcon($value);
				break;
			case 4:
				$this->setDircon($value);
				break;
			case 5:
				$this->setFeccon($value);
				break;
			case 6:
				$this->setTelcon($value);
				break;
			case 7:
				$this->setEmacon($value);
				break;
			case 8:
				$this->setCodsec($value);
				break;
			case 9:
				$this->setCodpar($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FconrepPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRepcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDircon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFeccon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelcon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmacon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodsec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodpar($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FconrepPeer::DATABASE_NAME);

		if ($this->isColumnModified(FconrepPeer::CEDCON)) $criteria->add(FconrepPeer::CEDCON, $this->cedcon);
		if ($this->isColumnModified(FconrepPeer::RIFCON)) $criteria->add(FconrepPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FconrepPeer::NOMCON)) $criteria->add(FconrepPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FconrepPeer::REPCON)) $criteria->add(FconrepPeer::REPCON, $this->repcon);
		if ($this->isColumnModified(FconrepPeer::DIRCON)) $criteria->add(FconrepPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FconrepPeer::FECCON)) $criteria->add(FconrepPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(FconrepPeer::TELCON)) $criteria->add(FconrepPeer::TELCON, $this->telcon);
		if ($this->isColumnModified(FconrepPeer::EMACON)) $criteria->add(FconrepPeer::EMACON, $this->emacon);
		if ($this->isColumnModified(FconrepPeer::CODSEC)) $criteria->add(FconrepPeer::CODSEC, $this->codsec);
		if ($this->isColumnModified(FconrepPeer::CODPAR)) $criteria->add(FconrepPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FconrepPeer::ID)) $criteria->add(FconrepPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FconrepPeer::DATABASE_NAME);

		$criteria->add(FconrepPeer::ID, $this->id);

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

		$copyObj->setCedcon($this->cedcon);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setRepcon($this->repcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setTelcon($this->telcon);

		$copyObj->setEmacon($this->emacon);

		$copyObj->setCodsec($this->codsec);

		$copyObj->setCodpar($this->codpar);


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
			self::$peer = new FconrepPeer();
		}
		return self::$peer;
	}

} 