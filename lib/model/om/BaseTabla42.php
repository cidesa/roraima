<?php


abstract class BaseTabla42 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcom;


	
	protected $feccom;


	
	protected $descom;


	
	protected $moncom;


	
	protected $stacom;


	
	protected $tipcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumcom()
	{

		return $this->numcom; 		
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

	
	public function getDescom()
	{

		return $this->descom; 		
	}
	
	public function getMoncom()
	{

		return number_format($this->moncom,2,',','.');
		
	}
	
	public function getStacom()
	{

		return $this->stacom; 		
	}
	
	public function getTipcom()
	{

		return $this->tipcom; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = Tabla42Peer::NUMCOM;
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
			$this->modifiedColumns[] = Tabla42Peer::FECCOM;
		}

	} 
	
	public function setDescom($v)
	{

		if ($this->descom !== $v) {
			$this->descom = $v;
			$this->modifiedColumns[] = Tabla42Peer::DESCOM;
		}

	} 
	
	public function setMoncom($v)
	{

		if ($this->moncom !== $v) {
			$this->moncom = $v;
			$this->modifiedColumns[] = Tabla42Peer::MONCOM;
		}

	} 
	
	public function setStacom($v)
	{

		if ($this->stacom !== $v) {
			$this->stacom = $v;
			$this->modifiedColumns[] = Tabla42Peer::STACOM;
		}

	} 
	
	public function setTipcom($v)
	{

		if ($this->tipcom !== $v) {
			$this->tipcom = $v;
			$this->modifiedColumns[] = Tabla42Peer::TIPCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Tabla42Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numcom = $rs->getString($startcol + 0);

			$this->feccom = $rs->getDate($startcol + 1, null);

			$this->descom = $rs->getString($startcol + 2);

			$this->moncom = $rs->getFloat($startcol + 3);

			$this->stacom = $rs->getString($startcol + 4);

			$this->tipcom = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tabla42 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Tabla42Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla42Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla42Peer::DATABASE_NAME);
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
					$pk = Tabla42Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Tabla42Peer::doUpdate($this, $con);
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


			if (($retval = Tabla42Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla42Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcom();
				break;
			case 1:
				return $this->getFeccom();
				break;
			case 2:
				return $this->getDescom();
				break;
			case 3:
				return $this->getMoncom();
				break;
			case 4:
				return $this->getStacom();
				break;
			case 5:
				return $this->getTipcom();
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
		$keys = Tabla42Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcom(),
			$keys[1] => $this->getFeccom(),
			$keys[2] => $this->getDescom(),
			$keys[3] => $this->getMoncom(),
			$keys[4] => $this->getStacom(),
			$keys[5] => $this->getTipcom(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla42Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcom($value);
				break;
			case 1:
				$this->setFeccom($value);
				break;
			case 2:
				$this->setDescom($value);
				break;
			case 3:
				$this->setMoncom($value);
				break;
			case 4:
				$this->setStacom($value);
				break;
			case 5:
				$this->setTipcom($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla42Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStacom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla42Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla42Peer::NUMCOM)) $criteria->add(Tabla42Peer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(Tabla42Peer::FECCOM)) $criteria->add(Tabla42Peer::FECCOM, $this->feccom);
		if ($this->isColumnModified(Tabla42Peer::DESCOM)) $criteria->add(Tabla42Peer::DESCOM, $this->descom);
		if ($this->isColumnModified(Tabla42Peer::MONCOM)) $criteria->add(Tabla42Peer::MONCOM, $this->moncom);
		if ($this->isColumnModified(Tabla42Peer::STACOM)) $criteria->add(Tabla42Peer::STACOM, $this->stacom);
		if ($this->isColumnModified(Tabla42Peer::TIPCOM)) $criteria->add(Tabla42Peer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(Tabla42Peer::ID)) $criteria->add(Tabla42Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla42Peer::DATABASE_NAME);

		$criteria->add(Tabla42Peer::ID, $this->id);

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

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setDescom($this->descom);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setStacom($this->stacom);

		$copyObj->setTipcom($this->tipcom);


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
			self::$peer = new Tabla42Peer();
		}
		return self::$peer;
	}

} 