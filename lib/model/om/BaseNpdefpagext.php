<?php


abstract class BaseNpdefpagext extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgrunom;


	
	protected $codcon;


	
	protected $fecha1;


	
	protected $fecha2;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodgrunom()
	{

		return $this->codgrunom; 		
	}
	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getFecha1($format = 'Y-m-d')
	{

		if ($this->fecha1 === null || $this->fecha1 === '') {
			return null;
		} elseif (!is_int($this->fecha1)) {
						$ts = strtotime($this->fecha1);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha1] as date/time value: " . var_export($this->fecha1, true));
			}
		} else {
			$ts = $this->fecha1;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecha2($format = 'Y-m-d')
	{

		if ($this->fecha2 === null || $this->fecha2 === '') {
			return null;
		} elseif (!is_int($this->fecha2)) {
						$ts = strtotime($this->fecha2);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha2] as date/time value: " . var_export($this->fecha2, true));
			}
		} else {
			$ts = $this->fecha2;
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
	
	public function setCodgrunom($v)
	{

		if ($this->codgrunom !== $v) {
			$this->codgrunom = $v;
			$this->modifiedColumns[] = NpdefpagextPeer::CODGRUNOM;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpdefpagextPeer::CODCON;
		}

	} 
	
	public function setFecha1($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha1] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha1 !== $ts) {
			$this->fecha1 = $ts;
			$this->modifiedColumns[] = NpdefpagextPeer::FECHA1;
		}

	} 
	
	public function setFecha2($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha2] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha2 !== $ts) {
			$this->fecha2 = $ts;
			$this->modifiedColumns[] = NpdefpagextPeer::FECHA2;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpdefpagextPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codgrunom = $rs->getString($startcol + 0);

			$this->codcon = $rs->getString($startcol + 1);

			$this->fecha1 = $rs->getDate($startcol + 2, null);

			$this->fecha2 = $rs->getDate($startcol + 3, null);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npdefpagext object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpdefpagextPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefpagextPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefpagextPeer::DATABASE_NAME);
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
					$pk = NpdefpagextPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpdefpagextPeer::doUpdate($this, $con);
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


			if (($retval = NpdefpagextPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefpagextPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodgrunom();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getFecha1();
				break;
			case 3:
				return $this->getFecha2();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefpagextPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgrunom(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getFecha1(),
			$keys[3] => $this->getFecha2(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefpagextPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodgrunom($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setFecha1($value);
				break;
			case 3:
				$this->setFecha2($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefpagextPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgrunom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecha1($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecha2($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefpagextPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefpagextPeer::CODGRUNOM)) $criteria->add(NpdefpagextPeer::CODGRUNOM, $this->codgrunom);
		if ($this->isColumnModified(NpdefpagextPeer::CODCON)) $criteria->add(NpdefpagextPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpdefpagextPeer::FECHA1)) $criteria->add(NpdefpagextPeer::FECHA1, $this->fecha1);
		if ($this->isColumnModified(NpdefpagextPeer::FECHA2)) $criteria->add(NpdefpagextPeer::FECHA2, $this->fecha2);
		if ($this->isColumnModified(NpdefpagextPeer::ID)) $criteria->add(NpdefpagextPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefpagextPeer::DATABASE_NAME);

		$criteria->add(NpdefpagextPeer::ID, $this->id);

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

		$copyObj->setCodgrunom($this->codgrunom);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setFecha1($this->fecha1);

		$copyObj->setFecha2($this->fecha2);


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
			self::$peer = new NpdefpagextPeer();
		}
		return self::$peer;
	}

} 