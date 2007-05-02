<?php


abstract class BaseFcsolneg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numneg;


	
	protected $numsol;


	
	protected $motneg;


	
	protected $fecneg;


	
	protected $resolu;


	
	protected $tomon;


	
	protected $folion;


	
	protected $numeron;


	
	protected $funneg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumneg()
	{

		return $this->numneg;
	}

	
	public function getNumsol()
	{

		return $this->numsol;
	}

	
	public function getMotneg()
	{

		return $this->motneg;
	}

	
	public function getFecneg($format = 'Y-m-d')
	{

		if ($this->fecneg === null || $this->fecneg === '') {
			return null;
		} elseif (!is_int($this->fecneg)) {
						$ts = strtotime($this->fecneg);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecneg] as date/time value: " . var_export($this->fecneg, true));
			}
		} else {
			$ts = $this->fecneg;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getResolu()
	{

		return $this->resolu;
	}

	
	public function getTomon()
	{

		return $this->tomon;
	}

	
	public function getFolion()
	{

		return $this->folion;
	}

	
	public function getNumeron()
	{

		return $this->numeron;
	}

	
	public function getFunneg()
	{

		return $this->funneg;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumneg($v)
	{

		if ($this->numneg !== $v) {
			$this->numneg = $v;
			$this->modifiedColumns[] = FcsolnegPeer::NUMNEG;
		}

	} 
	
	public function setNumsol($v)
	{

		if ($this->numsol !== $v) {
			$this->numsol = $v;
			$this->modifiedColumns[] = FcsolnegPeer::NUMSOL;
		}

	} 
	
	public function setMotneg($v)
	{

		if ($this->motneg !== $v) {
			$this->motneg = $v;
			$this->modifiedColumns[] = FcsolnegPeer::MOTNEG;
		}

	} 
	
	public function setFecneg($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecneg] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecneg !== $ts) {
			$this->fecneg = $ts;
			$this->modifiedColumns[] = FcsolnegPeer::FECNEG;
		}

	} 
	
	public function setResolu($v)
	{

		if ($this->resolu !== $v) {
			$this->resolu = $v;
			$this->modifiedColumns[] = FcsolnegPeer::RESOLU;
		}

	} 
	
	public function setTomon($v)
	{

		if ($this->tomon !== $v) {
			$this->tomon = $v;
			$this->modifiedColumns[] = FcsolnegPeer::TOMON;
		}

	} 
	
	public function setFolion($v)
	{

		if ($this->folion !== $v) {
			$this->folion = $v;
			$this->modifiedColumns[] = FcsolnegPeer::FOLION;
		}

	} 
	
	public function setNumeron($v)
	{

		if ($this->numeron !== $v) {
			$this->numeron = $v;
			$this->modifiedColumns[] = FcsolnegPeer::NUMERON;
		}

	} 
	
	public function setFunneg($v)
	{

		if ($this->funneg !== $v) {
			$this->funneg = $v;
			$this->modifiedColumns[] = FcsolnegPeer::FUNNEG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcsolnegPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numneg = $rs->getString($startcol + 0);

			$this->numsol = $rs->getString($startcol + 1);

			$this->motneg = $rs->getString($startcol + 2);

			$this->fecneg = $rs->getDate($startcol + 3, null);

			$this->resolu = $rs->getString($startcol + 4);

			$this->tomon = $rs->getString($startcol + 5);

			$this->folion = $rs->getString($startcol + 6);

			$this->numeron = $rs->getString($startcol + 7);

			$this->funneg = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcsolneg object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcsolnegPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcsolnegPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcsolnegPeer::DATABASE_NAME);
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
					$pk = FcsolnegPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcsolnegPeer::doUpdate($this, $con);
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


			if (($retval = FcsolnegPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsolnegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumneg();
				break;
			case 1:
				return $this->getNumsol();
				break;
			case 2:
				return $this->getMotneg();
				break;
			case 3:
				return $this->getFecneg();
				break;
			case 4:
				return $this->getResolu();
				break;
			case 5:
				return $this->getTomon();
				break;
			case 6:
				return $this->getFolion();
				break;
			case 7:
				return $this->getNumeron();
				break;
			case 8:
				return $this->getFunneg();
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
		$keys = FcsolnegPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumneg(),
			$keys[1] => $this->getNumsol(),
			$keys[2] => $this->getMotneg(),
			$keys[3] => $this->getFecneg(),
			$keys[4] => $this->getResolu(),
			$keys[5] => $this->getTomon(),
			$keys[6] => $this->getFolion(),
			$keys[7] => $this->getNumeron(),
			$keys[8] => $this->getFunneg(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsolnegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumneg($value);
				break;
			case 1:
				$this->setNumsol($value);
				break;
			case 2:
				$this->setMotneg($value);
				break;
			case 3:
				$this->setFecneg($value);
				break;
			case 4:
				$this->setResolu($value);
				break;
			case 5:
				$this->setTomon($value);
				break;
			case 6:
				$this->setFolion($value);
				break;
			case 7:
				$this->setNumeron($value);
				break;
			case 8:
				$this->setFunneg($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcsolnegPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumneg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMotneg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecneg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setResolu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTomon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFolion($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumeron($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFunneg($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcsolnegPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcsolnegPeer::NUMNEG)) $criteria->add(FcsolnegPeer::NUMNEG, $this->numneg);
		if ($this->isColumnModified(FcsolnegPeer::NUMSOL)) $criteria->add(FcsolnegPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(FcsolnegPeer::MOTNEG)) $criteria->add(FcsolnegPeer::MOTNEG, $this->motneg);
		if ($this->isColumnModified(FcsolnegPeer::FECNEG)) $criteria->add(FcsolnegPeer::FECNEG, $this->fecneg);
		if ($this->isColumnModified(FcsolnegPeer::RESOLU)) $criteria->add(FcsolnegPeer::RESOLU, $this->resolu);
		if ($this->isColumnModified(FcsolnegPeer::TOMON)) $criteria->add(FcsolnegPeer::TOMON, $this->tomon);
		if ($this->isColumnModified(FcsolnegPeer::FOLION)) $criteria->add(FcsolnegPeer::FOLION, $this->folion);
		if ($this->isColumnModified(FcsolnegPeer::NUMERON)) $criteria->add(FcsolnegPeer::NUMERON, $this->numeron);
		if ($this->isColumnModified(FcsolnegPeer::FUNNEG)) $criteria->add(FcsolnegPeer::FUNNEG, $this->funneg);
		if ($this->isColumnModified(FcsolnegPeer::ID)) $criteria->add(FcsolnegPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcsolnegPeer::DATABASE_NAME);

		$criteria->add(FcsolnegPeer::NUMNEG, $this->numneg);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getNumneg();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setNumneg($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNumsol($this->numsol);

		$copyObj->setMotneg($this->motneg);

		$copyObj->setFecneg($this->fecneg);

		$copyObj->setResolu($this->resolu);

		$copyObj->setTomon($this->tomon);

		$copyObj->setFolion($this->folion);

		$copyObj->setNumeron($this->numeron);

		$copyObj->setFunneg($this->funneg);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setNumneg(NULL); 
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
			self::$peer = new FcsolnegPeer();
		}
		return self::$peer;
	}

} 