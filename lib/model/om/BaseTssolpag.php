<?php


abstract class BaseTssolpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $fecsol;


	
	protected $numaep;


	
	protected $numopp;


	
	protected $monsol;


	
	protected $dessol;


	
	protected $numfac;


	
	protected $cedrif;


	
	protected $cedsol;


	
	protected $nomsol;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumsol()
	{

		return $this->numsol;
	}

	
	public function getFecsol($format = 'Y-m-d')
	{

		if ($this->fecsol === null || $this->fecsol === '') {
			return null;
		} elseif (!is_int($this->fecsol)) {
						$ts = strtotime($this->fecsol);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
			}
		} else {
			$ts = $this->fecsol;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNumaep()
	{

		return $this->numaep;
	}

	
	public function getNumopp()
	{

		return $this->numopp;
	}

	
	public function getMonsol()
	{

		return $this->monsol;
	}

	
	public function getDessol()
	{

		return $this->dessol;
	}

	
	public function getNumfac()
	{

		return $this->numfac;
	}

	
	public function getCedrif()
	{

		return $this->cedrif;
	}

	
	public function getCedsol()
	{

		return $this->cedsol;
	}

	
	public function getNomsol()
	{

		return $this->nomsol;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumsol($v)
	{

		if ($this->numsol !== $v) {
			$this->numsol = $v;
			$this->modifiedColumns[] = TssolpagPeer::NUMSOL;
		}

	} 
	
	public function setFecsol($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecsol !== $ts) {
			$this->fecsol = $ts;
			$this->modifiedColumns[] = TssolpagPeer::FECSOL;
		}

	} 
	
	public function setNumaep($v)
	{

		if ($this->numaep !== $v) {
			$this->numaep = $v;
			$this->modifiedColumns[] = TssolpagPeer::NUMAEP;
		}

	} 
	
	public function setNumopp($v)
	{

		if ($this->numopp !== $v) {
			$this->numopp = $v;
			$this->modifiedColumns[] = TssolpagPeer::NUMOPP;
		}

	} 
	
	public function setMonsol($v)
	{

		if ($this->monsol !== $v) {
			$this->monsol = $v;
			$this->modifiedColumns[] = TssolpagPeer::MONSOL;
		}

	} 
	
	public function setDessol($v)
	{

		if ($this->dessol !== $v) {
			$this->dessol = $v;
			$this->modifiedColumns[] = TssolpagPeer::DESSOL;
		}

	} 
	
	public function setNumfac($v)
	{

		if ($this->numfac !== $v) {
			$this->numfac = $v;
			$this->modifiedColumns[] = TssolpagPeer::NUMFAC;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = TssolpagPeer::CEDRIF;
		}

	} 
	
	public function setCedsol($v)
	{

		if ($this->cedsol !== $v) {
			$this->cedsol = $v;
			$this->modifiedColumns[] = TssolpagPeer::CEDSOL;
		}

	} 
	
	public function setNomsol($v)
	{

		if ($this->nomsol !== $v) {
			$this->nomsol = $v;
			$this->modifiedColumns[] = TssolpagPeer::NOMSOL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TssolpagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numsol = $rs->getString($startcol + 0);

			$this->fecsol = $rs->getDate($startcol + 1, null);

			$this->numaep = $rs->getString($startcol + 2);

			$this->numopp = $rs->getString($startcol + 3);

			$this->monsol = $rs->getFloat($startcol + 4);

			$this->dessol = $rs->getString($startcol + 5);

			$this->numfac = $rs->getString($startcol + 6);

			$this->cedrif = $rs->getString($startcol + 7);

			$this->cedsol = $rs->getString($startcol + 8);

			$this->nomsol = $rs->getString($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tssolpag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TssolpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TssolpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TssolpagPeer::DATABASE_NAME);
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
					$pk = TssolpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TssolpagPeer::doUpdate($this, $con);
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


			if (($retval = TssolpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TssolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getFecsol();
				break;
			case 2:
				return $this->getNumaep();
				break;
			case 3:
				return $this->getNumopp();
				break;
			case 4:
				return $this->getMonsol();
				break;
			case 5:
				return $this->getDessol();
				break;
			case 6:
				return $this->getNumfac();
				break;
			case 7:
				return $this->getCedrif();
				break;
			case 8:
				return $this->getCedsol();
				break;
			case 9:
				return $this->getNomsol();
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
		$keys = TssolpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getFecsol(),
			$keys[2] => $this->getNumaep(),
			$keys[3] => $this->getNumopp(),
			$keys[4] => $this->getMonsol(),
			$keys[5] => $this->getDessol(),
			$keys[6] => $this->getNumfac(),
			$keys[7] => $this->getCedrif(),
			$keys[8] => $this->getCedsol(),
			$keys[9] => $this->getNomsol(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TssolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setFecsol($value);
				break;
			case 2:
				$this->setNumaep($value);
				break;
			case 3:
				$this->setNumopp($value);
				break;
			case 4:
				$this->setMonsol($value);
				break;
			case 5:
				$this->setDessol($value);
				break;
			case 6:
				$this->setNumfac($value);
				break;
			case 7:
				$this->setCedrif($value);
				break;
			case 8:
				$this->setCedsol($value);
				break;
			case 9:
				$this->setNomsol($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TssolpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumaep($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumopp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonsol($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDessol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumfac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCedrif($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCedsol($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNomsol($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TssolpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(TssolpagPeer::NUMSOL)) $criteria->add(TssolpagPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(TssolpagPeer::FECSOL)) $criteria->add(TssolpagPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(TssolpagPeer::NUMAEP)) $criteria->add(TssolpagPeer::NUMAEP, $this->numaep);
		if ($this->isColumnModified(TssolpagPeer::NUMOPP)) $criteria->add(TssolpagPeer::NUMOPP, $this->numopp);
		if ($this->isColumnModified(TssolpagPeer::MONSOL)) $criteria->add(TssolpagPeer::MONSOL, $this->monsol);
		if ($this->isColumnModified(TssolpagPeer::DESSOL)) $criteria->add(TssolpagPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(TssolpagPeer::NUMFAC)) $criteria->add(TssolpagPeer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(TssolpagPeer::CEDRIF)) $criteria->add(TssolpagPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TssolpagPeer::CEDSOL)) $criteria->add(TssolpagPeer::CEDSOL, $this->cedsol);
		if ($this->isColumnModified(TssolpagPeer::NOMSOL)) $criteria->add(TssolpagPeer::NOMSOL, $this->nomsol);
		if ($this->isColumnModified(TssolpagPeer::ID)) $criteria->add(TssolpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TssolpagPeer::DATABASE_NAME);

		$criteria->add(TssolpagPeer::ID, $this->id);

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

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setNumaep($this->numaep);

		$copyObj->setNumopp($this->numopp);

		$copyObj->setMonsol($this->monsol);

		$copyObj->setDessol($this->dessol);

		$copyObj->setNumfac($this->numfac);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setCedsol($this->cedsol);

		$copyObj->setNomsol($this->nomsol);


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
			self::$peer = new TssolpagPeer();
		}
		return self::$peer;
	}

} 