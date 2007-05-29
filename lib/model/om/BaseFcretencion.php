<?php


abstract class BaseFcretencion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numret;


	
	protected $fueing;


	
	protected $fecret;


	
	protected $fecreg;


	
	protected $monret;


	
	protected $numrel;


	
	protected $desret;


	
	protected $monsal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumret()
	{

		return $this->numret; 		
	}
	
	public function getFueing()
	{

		return $this->fueing; 		
	}
	
	public function getFecret($format = 'Y-m-d')
	{

		if ($this->fecret === null || $this->fecret === '') {
			return null;
		} elseif (!is_int($this->fecret)) {
						$ts = strtotime($this->fecret);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecret] as date/time value: " . var_export($this->fecret, true));
			}
		} else {
			$ts = $this->fecret;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecreg($format = 'Y-m-d')
	{

		if ($this->fecreg === null || $this->fecreg === '') {
			return null;
		} elseif (!is_int($this->fecreg)) {
						$ts = strtotime($this->fecreg);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
			}
		} else {
			$ts = $this->fecreg;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMonret()
	{

		return number_format($this->monret,2,',','.');
		
	}
	
	public function getNumrel()
	{

		return $this->numrel; 		
	}
	
	public function getDesret()
	{

		return $this->desret; 		
	}
	
	public function getMonsal()
	{

		return number_format($this->monsal,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumret($v)
	{

		if ($this->numret !== $v) {
			$this->numret = $v;
			$this->modifiedColumns[] = FcretencionPeer::NUMRET;
		}

	} 
	
	public function setFueing($v)
	{

		if ($this->fueing !== $v) {
			$this->fueing = $v;
			$this->modifiedColumns[] = FcretencionPeer::FUEING;
		}

	} 
	
	public function setFecret($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecret] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecret !== $ts) {
			$this->fecret = $ts;
			$this->modifiedColumns[] = FcretencionPeer::FECRET;
		}

	} 
	
	public function setFecreg($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecreg !== $ts) {
			$this->fecreg = $ts;
			$this->modifiedColumns[] = FcretencionPeer::FECREG;
		}

	} 
	
	public function setMonret($v)
	{

		if ($this->monret !== $v) {
			$this->monret = $v;
			$this->modifiedColumns[] = FcretencionPeer::MONRET;
		}

	} 
	
	public function setNumrel($v)
	{

		if ($this->numrel !== $v) {
			$this->numrel = $v;
			$this->modifiedColumns[] = FcretencionPeer::NUMREL;
		}

	} 
	
	public function setDesret($v)
	{

		if ($this->desret !== $v) {
			$this->desret = $v;
			$this->modifiedColumns[] = FcretencionPeer::DESRET;
		}

	} 
	
	public function setMonsal($v)
	{

		if ($this->monsal !== $v) {
			$this->monsal = $v;
			$this->modifiedColumns[] = FcretencionPeer::MONSAL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcretencionPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numret = $rs->getString($startcol + 0);

			$this->fueing = $rs->getString($startcol + 1);

			$this->fecret = $rs->getDate($startcol + 2, null);

			$this->fecreg = $rs->getDate($startcol + 3, null);

			$this->monret = $rs->getFloat($startcol + 4);

			$this->numrel = $rs->getString($startcol + 5);

			$this->desret = $rs->getString($startcol + 6);

			$this->monsal = $rs->getFloat($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcretencion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcretencionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcretencionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcretencionPeer::DATABASE_NAME);
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
					$pk = FcretencionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcretencionPeer::doUpdate($this, $con);
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


			if (($retval = FcretencionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcretencionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumret();
				break;
			case 1:
				return $this->getFueing();
				break;
			case 2:
				return $this->getFecret();
				break;
			case 3:
				return $this->getFecreg();
				break;
			case 4:
				return $this->getMonret();
				break;
			case 5:
				return $this->getNumrel();
				break;
			case 6:
				return $this->getDesret();
				break;
			case 7:
				return $this->getMonsal();
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
		$keys = FcretencionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumret(),
			$keys[1] => $this->getFueing(),
			$keys[2] => $this->getFecret(),
			$keys[3] => $this->getFecreg(),
			$keys[4] => $this->getMonret(),
			$keys[5] => $this->getNumrel(),
			$keys[6] => $this->getDesret(),
			$keys[7] => $this->getMonsal(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcretencionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumret($value);
				break;
			case 1:
				$this->setFueing($value);
				break;
			case 2:
				$this->setFecret($value);
				break;
			case 3:
				$this->setFecreg($value);
				break;
			case 4:
				$this->setMonret($value);
				break;
			case 5:
				$this->setNumrel($value);
				break;
			case 6:
				$this->setDesret($value);
				break;
			case 7:
				$this->setMonsal($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcretencionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumret($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFueing($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecret($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecreg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonret($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumrel($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesret($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonsal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcretencionPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcretencionPeer::NUMRET)) $criteria->add(FcretencionPeer::NUMRET, $this->numret);
		if ($this->isColumnModified(FcretencionPeer::FUEING)) $criteria->add(FcretencionPeer::FUEING, $this->fueing);
		if ($this->isColumnModified(FcretencionPeer::FECRET)) $criteria->add(FcretencionPeer::FECRET, $this->fecret);
		if ($this->isColumnModified(FcretencionPeer::FECREG)) $criteria->add(FcretencionPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcretencionPeer::MONRET)) $criteria->add(FcretencionPeer::MONRET, $this->monret);
		if ($this->isColumnModified(FcretencionPeer::NUMREL)) $criteria->add(FcretencionPeer::NUMREL, $this->numrel);
		if ($this->isColumnModified(FcretencionPeer::DESRET)) $criteria->add(FcretencionPeer::DESRET, $this->desret);
		if ($this->isColumnModified(FcretencionPeer::MONSAL)) $criteria->add(FcretencionPeer::MONSAL, $this->monsal);
		if ($this->isColumnModified(FcretencionPeer::ID)) $criteria->add(FcretencionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcretencionPeer::DATABASE_NAME);

		$criteria->add(FcretencionPeer::ID, $this->id);

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

		$copyObj->setNumret($this->numret);

		$copyObj->setFueing($this->fueing);

		$copyObj->setFecret($this->fecret);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setMonret($this->monret);

		$copyObj->setNumrel($this->numrel);

		$copyObj->setDesret($this->desret);

		$copyObj->setMonsal($this->monsal);


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
			self::$peer = new FcretencionPeer();
		}
		return self::$peer;
	}

} 