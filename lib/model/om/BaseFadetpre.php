<?php


abstract class BaseFadetpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpre;


	
	protected $codart;


	
	protected $cansol;


	
	protected $precio;


	
	protected $monrgo;


	
	protected $totart;


	
	protected $fecent;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefpre()
	{

		return $this->refpre;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getCansol()
	{

		return $this->cansol;
	}

	
	public function getPrecio()
	{

		return $this->precio;
	}

	
	public function getMonrgo()
	{

		return $this->monrgo;
	}

	
	public function getTotart()
	{

		return $this->totart;
	}

	
	public function getFecent($format = 'Y-m-d')
	{

		if ($this->fecent === null || $this->fecent === '') {
			return null;
		} elseif (!is_int($this->fecent)) {
						$ts = strtotime($this->fecent);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
			}
		} else {
			$ts = $this->fecent;
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

	
	public function setRefpre($v)
	{

		if ($this->refpre !== $v) {
			$this->refpre = $v;
			$this->modifiedColumns[] = FadetprePeer::REFPRE;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = FadetprePeer::CODART;
		}

	} 
	
	public function setCansol($v)
	{

		if ($this->cansol !== $v) {
			$this->cansol = $v;
			$this->modifiedColumns[] = FadetprePeer::CANSOL;
		}

	} 
	
	public function setPrecio($v)
	{

		if ($this->precio !== $v) {
			$this->precio = $v;
			$this->modifiedColumns[] = FadetprePeer::PRECIO;
		}

	} 
	
	public function setMonrgo($v)
	{

		if ($this->monrgo !== $v) {
			$this->monrgo = $v;
			$this->modifiedColumns[] = FadetprePeer::MONRGO;
		}

	} 
	
	public function setTotart($v)
	{

		if ($this->totart !== $v) {
			$this->totart = $v;
			$this->modifiedColumns[] = FadetprePeer::TOTART;
		}

	} 
	
	public function setFecent($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecent !== $ts) {
			$this->fecent = $ts;
			$this->modifiedColumns[] = FadetprePeer::FECENT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FadetprePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refpre = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->cansol = $rs->getFloat($startcol + 2);

			$this->precio = $rs->getFloat($startcol + 3);

			$this->monrgo = $rs->getFloat($startcol + 4);

			$this->totart = $rs->getFloat($startcol + 5);

			$this->fecent = $rs->getDate($startcol + 6, null);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fadetpre object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FadetprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadetprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadetprePeer::DATABASE_NAME);
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
					$pk = FadetprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FadetprePeer::doUpdate($this, $con);
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


			if (($retval = FadetprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpre();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCansol();
				break;
			case 3:
				return $this->getPrecio();
				break;
			case 4:
				return $this->getMonrgo();
				break;
			case 5:
				return $this->getTotart();
				break;
			case 6:
				return $this->getFecent();
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
		$keys = FadetprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpre(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCansol(),
			$keys[3] => $this->getPrecio(),
			$keys[4] => $this->getMonrgo(),
			$keys[5] => $this->getTotart(),
			$keys[6] => $this->getFecent(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpre($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCansol($value);
				break;
			case 3:
				$this->setPrecio($value);
				break;
			case 4:
				$this->setMonrgo($value);
				break;
			case 5:
				$this->setTotart($value);
				break;
			case 6:
				$this->setFecent($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadetprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCansol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPrecio($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrgo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotart($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecent($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadetprePeer::DATABASE_NAME);

		if ($this->isColumnModified(FadetprePeer::REFPRE)) $criteria->add(FadetprePeer::REFPRE, $this->refpre);
		if ($this->isColumnModified(FadetprePeer::CODART)) $criteria->add(FadetprePeer::CODART, $this->codart);
		if ($this->isColumnModified(FadetprePeer::CANSOL)) $criteria->add(FadetprePeer::CANSOL, $this->cansol);
		if ($this->isColumnModified(FadetprePeer::PRECIO)) $criteria->add(FadetprePeer::PRECIO, $this->precio);
		if ($this->isColumnModified(FadetprePeer::MONRGO)) $criteria->add(FadetprePeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FadetprePeer::TOTART)) $criteria->add(FadetprePeer::TOTART, $this->totart);
		if ($this->isColumnModified(FadetprePeer::FECENT)) $criteria->add(FadetprePeer::FECENT, $this->fecent);
		if ($this->isColumnModified(FadetprePeer::ID)) $criteria->add(FadetprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadetprePeer::DATABASE_NAME);

		$criteria->add(FadetprePeer::ID, $this->id);

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

		$copyObj->setRefpre($this->refpre);

		$copyObj->setCodart($this->codart);

		$copyObj->setCansol($this->cansol);

		$copyObj->setPrecio($this->precio);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setTotart($this->totart);

		$copyObj->setFecent($this->fecent);


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
			self::$peer = new FadetprePeer();
		}
		return self::$peer;
	}

} 