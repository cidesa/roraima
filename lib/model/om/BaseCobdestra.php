<?php


abstract class BaseCobdestra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $refdoc;


	
	protected $codcli;


	
	protected $coddes;


	
	protected $fecdes;


	
	protected $mondes;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumtra()
	{

		return $this->numtra; 		
	}
	
	public function getRefdoc()
	{

		return $this->refdoc; 		
	}
	
	public function getCodcli()
	{

		return $this->codcli; 		
	}
	
	public function getCoddes()
	{

		return $this->coddes; 		
	}
	
	public function getFecdes($format = 'Y-m-d')
	{

		if ($this->fecdes === null || $this->fecdes === '') {
			return null;
		} elseif (!is_int($this->fecdes)) {
						$ts = strtotime($this->fecdes);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
			}
		} else {
			$ts = $this->fecdes;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMondes()
	{

		return number_format($this->mondes,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumtra($v)
	{

		if ($this->numtra !== $v) {
			$this->numtra = $v;
			$this->modifiedColumns[] = CobdestraPeer::NUMTRA;
		}

	} 
	
	public function setRefdoc($v)
	{

		if ($this->refdoc !== $v) {
			$this->refdoc = $v;
			$this->modifiedColumns[] = CobdestraPeer::REFDOC;
		}

	} 
	
	public function setCodcli($v)
	{

		if ($this->codcli !== $v) {
			$this->codcli = $v;
			$this->modifiedColumns[] = CobdestraPeer::CODCLI;
		}

	} 
	
	public function setCoddes($v)
	{

		if ($this->coddes !== $v) {
			$this->coddes = $v;
			$this->modifiedColumns[] = CobdestraPeer::CODDES;
		}

	} 
	
	public function setFecdes($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdes !== $ts) {
			$this->fecdes = $ts;
			$this->modifiedColumns[] = CobdestraPeer::FECDES;
		}

	} 
	
	public function setMondes($v)
	{

		if ($this->mondes !== $v) {
			$this->mondes = $v;
			$this->modifiedColumns[] = CobdestraPeer::MONDES;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CobdestraPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numtra = $rs->getString($startcol + 0);

			$this->refdoc = $rs->getString($startcol + 1);

			$this->codcli = $rs->getString($startcol + 2);

			$this->coddes = $rs->getString($startcol + 3);

			$this->fecdes = $rs->getDate($startcol + 4, null);

			$this->mondes = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cobdestra object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CobdestraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobdestraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobdestraPeer::DATABASE_NAME);
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
					$pk = CobdestraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CobdestraPeer::doUpdate($this, $con);
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


			if (($retval = CobdestraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdestraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getRefdoc();
				break;
			case 2:
				return $this->getCodcli();
				break;
			case 3:
				return $this->getCoddes();
				break;
			case 4:
				return $this->getFecdes();
				break;
			case 5:
				return $this->getMondes();
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
		$keys = CobdestraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getRefdoc(),
			$keys[2] => $this->getCodcli(),
			$keys[3] => $this->getCoddes(),
			$keys[4] => $this->getFecdes(),
			$keys[5] => $this->getMondes(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdestraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setRefdoc($value);
				break;
			case 2:
				$this->setCodcli($value);
				break;
			case 3:
				$this->setCoddes($value);
				break;
			case 4:
				$this->setFecdes($value);
				break;
			case 5:
				$this->setMondes($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobdestraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoddes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobdestraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobdestraPeer::NUMTRA)) $criteria->add(CobdestraPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(CobdestraPeer::REFDOC)) $criteria->add(CobdestraPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(CobdestraPeer::CODCLI)) $criteria->add(CobdestraPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobdestraPeer::CODDES)) $criteria->add(CobdestraPeer::CODDES, $this->coddes);
		if ($this->isColumnModified(CobdestraPeer::FECDES)) $criteria->add(CobdestraPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(CobdestraPeer::MONDES)) $criteria->add(CobdestraPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CobdestraPeer::ID)) $criteria->add(CobdestraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobdestraPeer::DATABASE_NAME);

		$criteria->add(CobdestraPeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setCoddes($this->coddes);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setMondes($this->mondes);


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
			self::$peer = new CobdestraPeer();
		}
		return self::$peer;
	}

} 