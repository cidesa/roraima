<?php


abstract class BaseOcressol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $numcor;


	
	protected $cedemi;


	
	protected $cedfir;


	
	protected $ubiarc;


	
	protected $fecres;


	
	protected $fecfir;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumsol()
	{

		return $this->numsol;
	}

	
	public function getNumcor()
	{

		return $this->numcor;
	}

	
	public function getCedemi()
	{

		return $this->cedemi;
	}

	
	public function getCedfir()
	{

		return $this->cedfir;
	}

	
	public function getUbiarc()
	{

		return $this->ubiarc;
	}

	
	public function getFecres($format = 'Y-m-d')
	{

		if ($this->fecres === null || $this->fecres === '') {
			return null;
		} elseif (!is_int($this->fecres)) {
						$ts = strtotime($this->fecres);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecres] as date/time value: " . var_export($this->fecres, true));
			}
		} else {
			$ts = $this->fecres;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecfir($format = 'Y-m-d')
	{

		if ($this->fecfir === null || $this->fecfir === '') {
			return null;
		} elseif (!is_int($this->fecfir)) {
						$ts = strtotime($this->fecfir);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfir] as date/time value: " . var_export($this->fecfir, true));
			}
		} else {
			$ts = $this->fecfir;
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

	
	public function setNumsol($v)
	{

		if ($this->numsol !== $v) {
			$this->numsol = $v;
			$this->modifiedColumns[] = OcressolPeer::NUMSOL;
		}

	} 
	
	public function setNumcor($v)
	{

		if ($this->numcor !== $v) {
			$this->numcor = $v;
			$this->modifiedColumns[] = OcressolPeer::NUMCOR;
		}

	} 
	
	public function setCedemi($v)
	{

		if ($this->cedemi !== $v) {
			$this->cedemi = $v;
			$this->modifiedColumns[] = OcressolPeer::CEDEMI;
		}

	} 
	
	public function setCedfir($v)
	{

		if ($this->cedfir !== $v) {
			$this->cedfir = $v;
			$this->modifiedColumns[] = OcressolPeer::CEDFIR;
		}

	} 
	
	public function setUbiarc($v)
	{

		if ($this->ubiarc !== $v) {
			$this->ubiarc = $v;
			$this->modifiedColumns[] = OcressolPeer::UBIARC;
		}

	} 
	
	public function setFecres($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecres] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecres !== $ts) {
			$this->fecres = $ts;
			$this->modifiedColumns[] = OcressolPeer::FECRES;
		}

	} 
	
	public function setFecfir($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfir] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfir !== $ts) {
			$this->fecfir = $ts;
			$this->modifiedColumns[] = OcressolPeer::FECFIR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcressolPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numsol = $rs->getString($startcol + 0);

			$this->numcor = $rs->getString($startcol + 1);

			$this->cedemi = $rs->getString($startcol + 2);

			$this->cedfir = $rs->getString($startcol + 3);

			$this->ubiarc = $rs->getString($startcol + 4);

			$this->fecres = $rs->getDate($startcol + 5, null);

			$this->fecfir = $rs->getDate($startcol + 6, null);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocressol object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcressolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcressolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcressolPeer::DATABASE_NAME);
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
					$pk = OcressolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcressolPeer::doUpdate($this, $con);
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


			if (($retval = OcressolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcressolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getNumcor();
				break;
			case 2:
				return $this->getCedemi();
				break;
			case 3:
				return $this->getCedfir();
				break;
			case 4:
				return $this->getUbiarc();
				break;
			case 5:
				return $this->getFecres();
				break;
			case 6:
				return $this->getFecfir();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcressolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getNumcor(),
			$keys[2] => $this->getCedemi(),
			$keys[3] => $this->getCedfir(),
			$keys[4] => $this->getUbiarc(),
			$keys[5] => $this->getFecres(),
			$keys[6] => $this->getFecfir(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcressolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setNumcor($value);
				break;
			case 2:
				$this->setCedemi($value);
				break;
			case 3:
				$this->setCedfir($value);
				break;
			case 4:
				$this->setUbiarc($value);
				break;
			case 5:
				$this->setFecres($value);
				break;
			case 6:
				$this->setFecfir($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcressolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedemi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedfir($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUbiarc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecres($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecfir($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcressolPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcressolPeer::NUMSOL)) $criteria->add(OcressolPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(OcressolPeer::NUMCOR)) $criteria->add(OcressolPeer::NUMCOR, $this->numcor);
		if ($this->isColumnModified(OcressolPeer::CEDEMI)) $criteria->add(OcressolPeer::CEDEMI, $this->cedemi);
		if ($this->isColumnModified(OcressolPeer::CEDFIR)) $criteria->add(OcressolPeer::CEDFIR, $this->cedfir);
		if ($this->isColumnModified(OcressolPeer::UBIARC)) $criteria->add(OcressolPeer::UBIARC, $this->ubiarc);
		if ($this->isColumnModified(OcressolPeer::FECRES)) $criteria->add(OcressolPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(OcressolPeer::FECFIR)) $criteria->add(OcressolPeer::FECFIR, $this->fecfir);
		if ($this->isColumnModified(OcressolPeer::ID)) $criteria->add(OcressolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcressolPeer::DATABASE_NAME);

		$criteria->add(OcressolPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setNumcor($this->numcor);

		$copyObj->setCedemi($this->cedemi);

		$copyObj->setCedfir($this->cedfir);

		$copyObj->setUbiarc($this->ubiarc);

		$copyObj->setFecres($this->fecres);

		$copyObj->setFecfir($this->fecfir);


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
			self::$peer = new OcressolPeer();
		}
		return self::$peer;
	}

} 