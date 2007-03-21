<?php


abstract class BaseTspararc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $inicue;


	
	protected $fincue;


	
	protected $iniref;


	
	protected $finref;


	
	protected $inifec;


	
	protected $finfec;


	
	protected $initip;


	
	protected $fintip;


	
	protected $inides;


	
	protected $findes;


	
	protected $inimon;


	
	protected $finmon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumcue()
	{

		return $this->numcue;
	}

	
	public function getInicue()
	{

		return $this->inicue;
	}

	
	public function getFincue()
	{

		return $this->fincue;
	}

	
	public function getIniref()
	{

		return $this->iniref;
	}

	
	public function getFinref()
	{

		return $this->finref;
	}

	
	public function getInifec()
	{

		return $this->inifec;
	}

	
	public function getFinfec()
	{

		return $this->finfec;
	}

	
	public function getInitip()
	{

		return $this->initip;
	}

	
	public function getFintip()
	{

		return $this->fintip;
	}

	
	public function getInides()
	{

		return $this->inides;
	}

	
	public function getFindes()
	{

		return $this->findes;
	}

	
	public function getInimon()
	{

		return $this->inimon;
	}

	
	public function getFinmon()
	{

		return $this->finmon;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumcue($v)
	{

		if ($this->numcue !== $v) {
			$this->numcue = $v;
			$this->modifiedColumns[] = TspararcPeer::NUMCUE;
		}

	} 
	
	public function setInicue($v)
	{

		if ($this->inicue !== $v) {
			$this->inicue = $v;
			$this->modifiedColumns[] = TspararcPeer::INICUE;
		}

	} 
	
	public function setFincue($v)
	{

		if ($this->fincue !== $v) {
			$this->fincue = $v;
			$this->modifiedColumns[] = TspararcPeer::FINCUE;
		}

	} 
	
	public function setIniref($v)
	{

		if ($this->iniref !== $v) {
			$this->iniref = $v;
			$this->modifiedColumns[] = TspararcPeer::INIREF;
		}

	} 
	
	public function setFinref($v)
	{

		if ($this->finref !== $v) {
			$this->finref = $v;
			$this->modifiedColumns[] = TspararcPeer::FINREF;
		}

	} 
	
	public function setInifec($v)
	{

		if ($this->inifec !== $v) {
			$this->inifec = $v;
			$this->modifiedColumns[] = TspararcPeer::INIFEC;
		}

	} 
	
	public function setFinfec($v)
	{

		if ($this->finfec !== $v) {
			$this->finfec = $v;
			$this->modifiedColumns[] = TspararcPeer::FINFEC;
		}

	} 
	
	public function setInitip($v)
	{

		if ($this->initip !== $v) {
			$this->initip = $v;
			$this->modifiedColumns[] = TspararcPeer::INITIP;
		}

	} 
	
	public function setFintip($v)
	{

		if ($this->fintip !== $v) {
			$this->fintip = $v;
			$this->modifiedColumns[] = TspararcPeer::FINTIP;
		}

	} 
	
	public function setInides($v)
	{

		if ($this->inides !== $v) {
			$this->inides = $v;
			$this->modifiedColumns[] = TspararcPeer::INIDES;
		}

	} 
	
	public function setFindes($v)
	{

		if ($this->findes !== $v) {
			$this->findes = $v;
			$this->modifiedColumns[] = TspararcPeer::FINDES;
		}

	} 
	
	public function setInimon($v)
	{

		if ($this->inimon !== $v) {
			$this->inimon = $v;
			$this->modifiedColumns[] = TspararcPeer::INIMON;
		}

	} 
	
	public function setFinmon($v)
	{

		if ($this->finmon !== $v) {
			$this->finmon = $v;
			$this->modifiedColumns[] = TspararcPeer::FINMON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TspararcPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numcue = $rs->getString($startcol + 0);

			$this->inicue = $rs->getFloat($startcol + 1);

			$this->fincue = $rs->getFloat($startcol + 2);

			$this->iniref = $rs->getFloat($startcol + 3);

			$this->finref = $rs->getFloat($startcol + 4);

			$this->inifec = $rs->getFloat($startcol + 5);

			$this->finfec = $rs->getFloat($startcol + 6);

			$this->initip = $rs->getFloat($startcol + 7);

			$this->fintip = $rs->getFloat($startcol + 8);

			$this->inides = $rs->getFloat($startcol + 9);

			$this->findes = $rs->getFloat($startcol + 10);

			$this->inimon = $rs->getFloat($startcol + 11);

			$this->finmon = $rs->getFloat($startcol + 12);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tspararc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TspararcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TspararcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TspararcPeer::DATABASE_NAME);
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
					$pk = TspararcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TspararcPeer::doUpdate($this, $con);
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


			if (($retval = TspararcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TspararcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getInicue();
				break;
			case 2:
				return $this->getFincue();
				break;
			case 3:
				return $this->getIniref();
				break;
			case 4:
				return $this->getFinref();
				break;
			case 5:
				return $this->getInifec();
				break;
			case 6:
				return $this->getFinfec();
				break;
			case 7:
				return $this->getInitip();
				break;
			case 8:
				return $this->getFintip();
				break;
			case 9:
				return $this->getInides();
				break;
			case 10:
				return $this->getFindes();
				break;
			case 11:
				return $this->getInimon();
				break;
			case 12:
				return $this->getFinmon();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TspararcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getInicue(),
			$keys[2] => $this->getFincue(),
			$keys[3] => $this->getIniref(),
			$keys[4] => $this->getFinref(),
			$keys[5] => $this->getInifec(),
			$keys[6] => $this->getFinfec(),
			$keys[7] => $this->getInitip(),
			$keys[8] => $this->getFintip(),
			$keys[9] => $this->getInides(),
			$keys[10] => $this->getFindes(),
			$keys[11] => $this->getInimon(),
			$keys[12] => $this->getFinmon(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TspararcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setInicue($value);
				break;
			case 2:
				$this->setFincue($value);
				break;
			case 3:
				$this->setIniref($value);
				break;
			case 4:
				$this->setFinref($value);
				break;
			case 5:
				$this->setInifec($value);
				break;
			case 6:
				$this->setFinfec($value);
				break;
			case 7:
				$this->setInitip($value);
				break;
			case 8:
				$this->setFintip($value);
				break;
			case 9:
				$this->setInides($value);
				break;
			case 10:
				$this->setFindes($value);
				break;
			case 11:
				$this->setInimon($value);
				break;
			case 12:
				$this->setFinmon($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TspararcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInicue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFincue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIniref($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFinref($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setInifec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFinfec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setInitip($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFintip($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setInides($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFindes($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setInimon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFinmon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TspararcPeer::DATABASE_NAME);

		if ($this->isColumnModified(TspararcPeer::NUMCUE)) $criteria->add(TspararcPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TspararcPeer::INICUE)) $criteria->add(TspararcPeer::INICUE, $this->inicue);
		if ($this->isColumnModified(TspararcPeer::FINCUE)) $criteria->add(TspararcPeer::FINCUE, $this->fincue);
		if ($this->isColumnModified(TspararcPeer::INIREF)) $criteria->add(TspararcPeer::INIREF, $this->iniref);
		if ($this->isColumnModified(TspararcPeer::FINREF)) $criteria->add(TspararcPeer::FINREF, $this->finref);
		if ($this->isColumnModified(TspararcPeer::INIFEC)) $criteria->add(TspararcPeer::INIFEC, $this->inifec);
		if ($this->isColumnModified(TspararcPeer::FINFEC)) $criteria->add(TspararcPeer::FINFEC, $this->finfec);
		if ($this->isColumnModified(TspararcPeer::INITIP)) $criteria->add(TspararcPeer::INITIP, $this->initip);
		if ($this->isColumnModified(TspararcPeer::FINTIP)) $criteria->add(TspararcPeer::FINTIP, $this->fintip);
		if ($this->isColumnModified(TspararcPeer::INIDES)) $criteria->add(TspararcPeer::INIDES, $this->inides);
		if ($this->isColumnModified(TspararcPeer::FINDES)) $criteria->add(TspararcPeer::FINDES, $this->findes);
		if ($this->isColumnModified(TspararcPeer::INIMON)) $criteria->add(TspararcPeer::INIMON, $this->inimon);
		if ($this->isColumnModified(TspararcPeer::FINMON)) $criteria->add(TspararcPeer::FINMON, $this->finmon);
		if ($this->isColumnModified(TspararcPeer::ID)) $criteria->add(TspararcPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TspararcPeer::DATABASE_NAME);

		$criteria->add(TspararcPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setInicue($this->inicue);

		$copyObj->setFincue($this->fincue);

		$copyObj->setIniref($this->iniref);

		$copyObj->setFinref($this->finref);

		$copyObj->setInifec($this->inifec);

		$copyObj->setFinfec($this->finfec);

		$copyObj->setInitip($this->initip);

		$copyObj->setFintip($this->fintip);

		$copyObj->setInides($this->inides);

		$copyObj->setFindes($this->findes);

		$copyObj->setInimon($this->inimon);

		$copyObj->setFinmon($this->finmon);


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
			self::$peer = new TspararcPeer();
		}
		return self::$peer;
	}

} 