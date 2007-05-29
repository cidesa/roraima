<?php


abstract class BaseOcregsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $dessol;


	
	protected $cedste;


	
	protected $codsol;


	
	protected $codorg;


	
	protected $fecsol;


	
	protected $fecres;


	
	protected $obssol;


	
	protected $codemp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumsol()
	{

		return $this->numsol; 		
	}
	
	public function getDessol()
	{

		return $this->dessol; 		
	}
	
	public function getCedste()
	{

		return $this->cedste; 		
	}
	
	public function getCodsol()
	{

		return $this->codsol; 		
	}
	
	public function getCodorg()
	{

		return $this->codorg; 		
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

	
	public function getObssol()
	{

		return $this->obssol; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumsol($v)
	{

		if ($this->numsol !== $v) {
			$this->numsol = $v;
			$this->modifiedColumns[] = OcregsolPeer::NUMSOL;
		}

	} 
	
	public function setDessol($v)
	{

		if ($this->dessol !== $v) {
			$this->dessol = $v;
			$this->modifiedColumns[] = OcregsolPeer::DESSOL;
		}

	} 
	
	public function setCedste($v)
	{

		if ($this->cedste !== $v) {
			$this->cedste = $v;
			$this->modifiedColumns[] = OcregsolPeer::CEDSTE;
		}

	} 
	
	public function setCodsol($v)
	{

		if ($this->codsol !== $v) {
			$this->codsol = $v;
			$this->modifiedColumns[] = OcregsolPeer::CODSOL;
		}

	} 
	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = OcregsolPeer::CODORG;
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
			$this->modifiedColumns[] = OcregsolPeer::FECSOL;
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
			$this->modifiedColumns[] = OcregsolPeer::FECRES;
		}

	} 
	
	public function setObssol($v)
	{

		if ($this->obssol !== $v) {
			$this->obssol = $v;
			$this->modifiedColumns[] = OcregsolPeer::OBSSOL;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = OcregsolPeer::CODEMP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcregsolPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numsol = $rs->getString($startcol + 0);

			$this->dessol = $rs->getString($startcol + 1);

			$this->cedste = $rs->getString($startcol + 2);

			$this->codsol = $rs->getString($startcol + 3);

			$this->codorg = $rs->getString($startcol + 4);

			$this->fecsol = $rs->getDate($startcol + 5, null);

			$this->fecres = $rs->getDate($startcol + 6, null);

			$this->obssol = $rs->getString($startcol + 7);

			$this->codemp = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocregsol object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcregsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcregsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcregsolPeer::DATABASE_NAME);
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
					$pk = OcregsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcregsolPeer::doUpdate($this, $con);
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


			if (($retval = OcregsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getDessol();
				break;
			case 2:
				return $this->getCedste();
				break;
			case 3:
				return $this->getCodsol();
				break;
			case 4:
				return $this->getCodorg();
				break;
			case 5:
				return $this->getFecsol();
				break;
			case 6:
				return $this->getFecres();
				break;
			case 7:
				return $this->getObssol();
				break;
			case 8:
				return $this->getCodemp();
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
		$keys = OcregsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getDessol(),
			$keys[2] => $this->getCedste(),
			$keys[3] => $this->getCodsol(),
			$keys[4] => $this->getCodorg(),
			$keys[5] => $this->getFecsol(),
			$keys[6] => $this->getFecres(),
			$keys[7] => $this->getObssol(),
			$keys[8] => $this->getCodemp(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setDessol($value);
				break;
			case 2:
				$this->setCedste($value);
				break;
			case 3:
				$this->setCodsol($value);
				break;
			case 4:
				$this->setCodorg($value);
				break;
			case 5:
				$this->setFecsol($value);
				break;
			case 6:
				$this->setFecres($value);
				break;
			case 7:
				$this->setObssol($value);
				break;
			case 8:
				$this->setCodemp($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcregsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedste($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodsol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodorg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecsol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecres($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObssol($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodemp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcregsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcregsolPeer::NUMSOL)) $criteria->add(OcregsolPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(OcregsolPeer::DESSOL)) $criteria->add(OcregsolPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(OcregsolPeer::CEDSTE)) $criteria->add(OcregsolPeer::CEDSTE, $this->cedste);
		if ($this->isColumnModified(OcregsolPeer::CODSOL)) $criteria->add(OcregsolPeer::CODSOL, $this->codsol);
		if ($this->isColumnModified(OcregsolPeer::CODORG)) $criteria->add(OcregsolPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(OcregsolPeer::FECSOL)) $criteria->add(OcregsolPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(OcregsolPeer::FECRES)) $criteria->add(OcregsolPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(OcregsolPeer::OBSSOL)) $criteria->add(OcregsolPeer::OBSSOL, $this->obssol);
		if ($this->isColumnModified(OcregsolPeer::CODEMP)) $criteria->add(OcregsolPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(OcregsolPeer::ID)) $criteria->add(OcregsolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcregsolPeer::DATABASE_NAME);

		$criteria->add(OcregsolPeer::ID, $this->id);

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

		$copyObj->setDessol($this->dessol);

		$copyObj->setCedste($this->cedste);

		$copyObj->setCodsol($this->codsol);

		$copyObj->setCodorg($this->codorg);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setFecres($this->fecres);

		$copyObj->setObssol($this->obssol);

		$copyObj->setCodemp($this->codemp);


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
			self::$peer = new OcregsolPeer();
		}
		return self::$peer;
	}

} 