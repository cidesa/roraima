<?php


abstract class BaseFadevolu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrodev;


	
	protected $fecdev;


	
	protected $refdes;


	
	protected $codtidev;


	
	protected $codalm;


	
	protected $desdev;


	
	protected $stadph;


	
	protected $mondev;


	
	protected $obsdev;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNrodev()
	{

		return $this->nrodev;
	}

	
	public function getFecdev($format = 'Y-m-d')
	{

		if ($this->fecdev === null || $this->fecdev === '') {
			return null;
		} elseif (!is_int($this->fecdev)) {
						$ts = strtotime($this->fecdev);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdev] as date/time value: " . var_export($this->fecdev, true));
			}
		} else {
			$ts = $this->fecdev;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRefdes()
	{

		return $this->refdes;
	}

	
	public function getCodtidev()
	{

		return $this->codtidev;
	}

	
	public function getCodalm()
	{

		return $this->codalm;
	}

	
	public function getDesdev()
	{

		return $this->desdev;
	}

	
	public function getStadph()
	{

		return $this->stadph;
	}

	
	public function getMondev()
	{

		return $this->mondev;
	}

	
	public function getObsdev()
	{

		return $this->obsdev;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNrodev($v)
	{

		if ($this->nrodev !== $v) {
			$this->nrodev = $v;
			$this->modifiedColumns[] = FadevoluPeer::NRODEV;
		}

	} 
	
	public function setFecdev($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdev] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdev !== $ts) {
			$this->fecdev = $ts;
			$this->modifiedColumns[] = FadevoluPeer::FECDEV;
		}

	} 
	
	public function setRefdes($v)
	{

		if ($this->refdes !== $v) {
			$this->refdes = $v;
			$this->modifiedColumns[] = FadevoluPeer::REFDES;
		}

	} 
	
	public function setCodtidev($v)
	{

		if ($this->codtidev !== $v) {
			$this->codtidev = $v;
			$this->modifiedColumns[] = FadevoluPeer::CODTIDEV;
		}

	} 
	
	public function setCodalm($v)
	{

		if ($this->codalm !== $v) {
			$this->codalm = $v;
			$this->modifiedColumns[] = FadevoluPeer::CODALM;
		}

	} 
	
	public function setDesdev($v)
	{

		if ($this->desdev !== $v) {
			$this->desdev = $v;
			$this->modifiedColumns[] = FadevoluPeer::DESDEV;
		}

	} 
	
	public function setStadph($v)
	{

		if ($this->stadph !== $v) {
			$this->stadph = $v;
			$this->modifiedColumns[] = FadevoluPeer::STADPH;
		}

	} 
	
	public function setMondev($v)
	{

		if ($this->mondev !== $v) {
			$this->mondev = $v;
			$this->modifiedColumns[] = FadevoluPeer::MONDEV;
		}

	} 
	
	public function setObsdev($v)
	{

		if ($this->obsdev !== $v) {
			$this->obsdev = $v;
			$this->modifiedColumns[] = FadevoluPeer::OBSDEV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FadevoluPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nrodev = $rs->getString($startcol + 0);

			$this->fecdev = $rs->getDate($startcol + 1, null);

			$this->refdes = $rs->getString($startcol + 2);

			$this->codtidev = $rs->getString($startcol + 3);

			$this->codalm = $rs->getString($startcol + 4);

			$this->desdev = $rs->getString($startcol + 5);

			$this->stadph = $rs->getString($startcol + 6);

			$this->mondev = $rs->getFloat($startcol + 7);

			$this->obsdev = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fadevolu object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FadevoluPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadevoluPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadevoluPeer::DATABASE_NAME);
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
					$pk = FadevoluPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FadevoluPeer::doUpdate($this, $con);
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


			if (($retval = FadevoluPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadevoluPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrodev();
				break;
			case 1:
				return $this->getFecdev();
				break;
			case 2:
				return $this->getRefdes();
				break;
			case 3:
				return $this->getCodtidev();
				break;
			case 4:
				return $this->getCodalm();
				break;
			case 5:
				return $this->getDesdev();
				break;
			case 6:
				return $this->getStadph();
				break;
			case 7:
				return $this->getMondev();
				break;
			case 8:
				return $this->getObsdev();
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
		$keys = FadevoluPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrodev(),
			$keys[1] => $this->getFecdev(),
			$keys[2] => $this->getRefdes(),
			$keys[3] => $this->getCodtidev(),
			$keys[4] => $this->getCodalm(),
			$keys[5] => $this->getDesdev(),
			$keys[6] => $this->getStadph(),
			$keys[7] => $this->getMondev(),
			$keys[8] => $this->getObsdev(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadevoluPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrodev($value);
				break;
			case 1:
				$this->setFecdev($value);
				break;
			case 2:
				$this->setRefdes($value);
				break;
			case 3:
				$this->setCodtidev($value);
				break;
			case 4:
				$this->setCodalm($value);
				break;
			case 5:
				$this->setDesdev($value);
				break;
			case 6:
				$this->setStadph($value);
				break;
			case 7:
				$this->setMondev($value);
				break;
			case 8:
				$this->setObsdev($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadevoluPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrodev($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdev($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefdes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtidev($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodalm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesdev($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStadph($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondev($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObsdev($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadevoluPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadevoluPeer::NRODEV)) $criteria->add(FadevoluPeer::NRODEV, $this->nrodev);
		if ($this->isColumnModified(FadevoluPeer::FECDEV)) $criteria->add(FadevoluPeer::FECDEV, $this->fecdev);
		if ($this->isColumnModified(FadevoluPeer::REFDES)) $criteria->add(FadevoluPeer::REFDES, $this->refdes);
		if ($this->isColumnModified(FadevoluPeer::CODTIDEV)) $criteria->add(FadevoluPeer::CODTIDEV, $this->codtidev);
		if ($this->isColumnModified(FadevoluPeer::CODALM)) $criteria->add(FadevoluPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FadevoluPeer::DESDEV)) $criteria->add(FadevoluPeer::DESDEV, $this->desdev);
		if ($this->isColumnModified(FadevoluPeer::STADPH)) $criteria->add(FadevoluPeer::STADPH, $this->stadph);
		if ($this->isColumnModified(FadevoluPeer::MONDEV)) $criteria->add(FadevoluPeer::MONDEV, $this->mondev);
		if ($this->isColumnModified(FadevoluPeer::OBSDEV)) $criteria->add(FadevoluPeer::OBSDEV, $this->obsdev);
		if ($this->isColumnModified(FadevoluPeer::ID)) $criteria->add(FadevoluPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadevoluPeer::DATABASE_NAME);

		$criteria->add(FadevoluPeer::ID, $this->id);

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

		$copyObj->setNrodev($this->nrodev);

		$copyObj->setFecdev($this->fecdev);

		$copyObj->setRefdes($this->refdes);

		$copyObj->setCodtidev($this->codtidev);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setDesdev($this->desdev);

		$copyObj->setStadph($this->stadph);

		$copyObj->setMondev($this->mondev);

		$copyObj->setObsdev($this->obsdev);


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
			self::$peer = new FadevoluPeer();
		}
		return self::$peer;
	}

} 