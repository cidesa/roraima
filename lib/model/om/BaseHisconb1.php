<?php


abstract class BaseHisconb1 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcta;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $pereje;


	
	protected $totdeb;


	
	protected $totcre;


	
	protected $salact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcta()
	{

		return $this->codcta;
	}

	
	public function getFecini($format = 'Y-m-d')
	{

		if ($this->fecini === null || $this->fecini === '') {
			return null;
		} elseif (!is_int($this->fecini)) {
						$ts = strtotime($this->fecini);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
			}
		} else {
			$ts = $this->fecini;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFeccie($format = 'Y-m-d')
	{

		if ($this->feccie === null || $this->feccie === '') {
			return null;
		} elseif (!is_int($this->feccie)) {
						$ts = strtotime($this->feccie);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
			}
		} else {
			$ts = $this->feccie;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPereje()
	{

		return $this->pereje;
	}

	
	public function getTotdeb()
	{

		return $this->totdeb;
	}

	
	public function getTotcre()
	{

		return $this->totcre;
	}

	
	public function getSalact()
	{

		return $this->salact;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = Hisconb1Peer::CODCTA;
		}

	} 
	
	public function setFecini($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecini !== $ts) {
			$this->fecini = $ts;
			$this->modifiedColumns[] = Hisconb1Peer::FECINI;
		}

	} 
	
	public function setFeccie($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccie !== $ts) {
			$this->feccie = $ts;
			$this->modifiedColumns[] = Hisconb1Peer::FECCIE;
		}

	} 
	
	public function setPereje($v)
	{

		if ($this->pereje !== $v) {
			$this->pereje = $v;
			$this->modifiedColumns[] = Hisconb1Peer::PEREJE;
		}

	} 
	
	public function setTotdeb($v)
	{

		if ($this->totdeb !== $v) {
			$this->totdeb = $v;
			$this->modifiedColumns[] = Hisconb1Peer::TOTDEB;
		}

	} 
	
	public function setTotcre($v)
	{

		if ($this->totcre !== $v) {
			$this->totcre = $v;
			$this->modifiedColumns[] = Hisconb1Peer::TOTCRE;
		}

	} 
	
	public function setSalact($v)
	{

		if ($this->salact !== $v) {
			$this->salact = $v;
			$this->modifiedColumns[] = Hisconb1Peer::SALACT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Hisconb1Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcta = $rs->getString($startcol + 0);

			$this->fecini = $rs->getDate($startcol + 1, null);

			$this->feccie = $rs->getDate($startcol + 2, null);

			$this->pereje = $rs->getString($startcol + 3);

			$this->totdeb = $rs->getFloat($startcol + 4);

			$this->totcre = $rs->getFloat($startcol + 5);

			$this->salact = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Hisconb1 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Hisconb1Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Hisconb1Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Hisconb1Peer::DATABASE_NAME);
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
					$pk = Hisconb1Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Hisconb1Peer::doUpdate($this, $con);
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


			if (($retval = Hisconb1Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Hisconb1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcta();
				break;
			case 1:
				return $this->getFecini();
				break;
			case 2:
				return $this->getFeccie();
				break;
			case 3:
				return $this->getPereje();
				break;
			case 4:
				return $this->getTotdeb();
				break;
			case 5:
				return $this->getTotcre();
				break;
			case 6:
				return $this->getSalact();
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
		$keys = Hisconb1Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcta(),
			$keys[1] => $this->getFecini(),
			$keys[2] => $this->getFeccie(),
			$keys[3] => $this->getPereje(),
			$keys[4] => $this->getTotdeb(),
			$keys[5] => $this->getTotcre(),
			$keys[6] => $this->getSalact(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Hisconb1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcta($value);
				break;
			case 1:
				$this->setFecini($value);
				break;
			case 2:
				$this->setFeccie($value);
				break;
			case 3:
				$this->setPereje($value);
				break;
			case 4:
				$this->setTotdeb($value);
				break;
			case 5:
				$this->setTotcre($value);
				break;
			case 6:
				$this->setSalact($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Hisconb1Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccie($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPereje($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTotdeb($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotcre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSalact($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Hisconb1Peer::DATABASE_NAME);

		if ($this->isColumnModified(Hisconb1Peer::CODCTA)) $criteria->add(Hisconb1Peer::CODCTA, $this->codcta);
		if ($this->isColumnModified(Hisconb1Peer::FECINI)) $criteria->add(Hisconb1Peer::FECINI, $this->fecini);
		if ($this->isColumnModified(Hisconb1Peer::FECCIE)) $criteria->add(Hisconb1Peer::FECCIE, $this->feccie);
		if ($this->isColumnModified(Hisconb1Peer::PEREJE)) $criteria->add(Hisconb1Peer::PEREJE, $this->pereje);
		if ($this->isColumnModified(Hisconb1Peer::TOTDEB)) $criteria->add(Hisconb1Peer::TOTDEB, $this->totdeb);
		if ($this->isColumnModified(Hisconb1Peer::TOTCRE)) $criteria->add(Hisconb1Peer::TOTCRE, $this->totcre);
		if ($this->isColumnModified(Hisconb1Peer::SALACT)) $criteria->add(Hisconb1Peer::SALACT, $this->salact);
		if ($this->isColumnModified(Hisconb1Peer::ID)) $criteria->add(Hisconb1Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Hisconb1Peer::DATABASE_NAME);

		$criteria->add(Hisconb1Peer::ID, $this->id);

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

		$copyObj->setCodcta($this->codcta);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setPereje($this->pereje);

		$copyObj->setTotdeb($this->totdeb);

		$copyObj->setTotcre($this->totcre);

		$copyObj->setSalact($this->salact);


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
			self::$peer = new Hisconb1Peer();
		}
		return self::$peer;
	}

} 