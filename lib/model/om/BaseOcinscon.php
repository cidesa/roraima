<?php


abstract class BaseOcinscon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $numins;


	
	protected $feccom;


	
	protected $fecter;


	
	protected $porobreje;


	
	protected $portietra;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getNumins()
	{

		return $this->numins;
	}

	
	public function getFeccom($format = 'Y-m-d')
	{

		if ($this->feccom === null || $this->feccom === '') {
			return null;
		} elseif (!is_int($this->feccom)) {
						$ts = strtotime($this->feccom);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
			}
		} else {
			$ts = $this->feccom;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecter($format = 'Y-m-d')
	{

		if ($this->fecter === null || $this->fecter === '') {
			return null;
		} elseif (!is_int($this->fecter)) {
						$ts = strtotime($this->fecter);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecter] as date/time value: " . var_export($this->fecter, true));
			}
		} else {
			$ts = $this->fecter;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPorobreje()
	{

		return $this->porobreje;
	}

	
	public function getPortietra()
	{

		return $this->portietra;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcinsconPeer::CODCON;
		}

	} 
	
	public function setNumins($v)
	{

		if ($this->numins !== $v) {
			$this->numins = $v;
			$this->modifiedColumns[] = OcinsconPeer::NUMINS;
		}

	} 
	
	public function setFeccom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccom !== $ts) {
			$this->feccom = $ts;
			$this->modifiedColumns[] = OcinsconPeer::FECCOM;
		}

	} 
	
	public function setFecter($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecter] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecter !== $ts) {
			$this->fecter = $ts;
			$this->modifiedColumns[] = OcinsconPeer::FECTER;
		}

	} 
	
	public function setPorobreje($v)
	{

		if ($this->porobreje !== $v) {
			$this->porobreje = $v;
			$this->modifiedColumns[] = OcinsconPeer::POROBREJE;
		}

	} 
	
	public function setPortietra($v)
	{

		if ($this->portietra !== $v) {
			$this->portietra = $v;
			$this->modifiedColumns[] = OcinsconPeer::PORTIETRA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcinsconPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->numins = $rs->getString($startcol + 1);

			$this->feccom = $rs->getDate($startcol + 2, null);

			$this->fecter = $rs->getDate($startcol + 3, null);

			$this->porobreje = $rs->getFloat($startcol + 4);

			$this->portietra = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocinscon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcinsconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcinsconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcinsconPeer::DATABASE_NAME);
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
					$pk = OcinsconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcinsconPeer::doUpdate($this, $con);
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


			if (($retval = OcinsconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcinsconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNumins();
				break;
			case 2:
				return $this->getFeccom();
				break;
			case 3:
				return $this->getFecter();
				break;
			case 4:
				return $this->getPorobreje();
				break;
			case 5:
				return $this->getPortietra();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcinsconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNumins(),
			$keys[2] => $this->getFeccom(),
			$keys[3] => $this->getFecter(),
			$keys[4] => $this->getPorobreje(),
			$keys[5] => $this->getPortietra(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcinsconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNumins($value);
				break;
			case 2:
				$this->setFeccom($value);
				break;
			case 3:
				$this->setFecter($value);
				break;
			case 4:
				$this->setPorobreje($value);
				break;
			case 5:
				$this->setPortietra($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcinsconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumins($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecter($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorobreje($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPortietra($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcinsconPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcinsconPeer::CODCON)) $criteria->add(OcinsconPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcinsconPeer::NUMINS)) $criteria->add(OcinsconPeer::NUMINS, $this->numins);
		if ($this->isColumnModified(OcinsconPeer::FECCOM)) $criteria->add(OcinsconPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(OcinsconPeer::FECTER)) $criteria->add(OcinsconPeer::FECTER, $this->fecter);
		if ($this->isColumnModified(OcinsconPeer::POROBREJE)) $criteria->add(OcinsconPeer::POROBREJE, $this->porobreje);
		if ($this->isColumnModified(OcinsconPeer::PORTIETRA)) $criteria->add(OcinsconPeer::PORTIETRA, $this->portietra);
		if ($this->isColumnModified(OcinsconPeer::ID)) $criteria->add(OcinsconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcinsconPeer::DATABASE_NAME);

		$criteria->add(OcinsconPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNumins($this->numins);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setFecter($this->fecter);

		$copyObj->setPorobreje($this->porobreje);

		$copyObj->setPortietra($this->portietra);


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
			self::$peer = new OcinsconPeer();
		}
		return self::$peer;
	}

} 