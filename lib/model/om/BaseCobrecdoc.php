<?php


abstract class BaseCobrecdoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refdoc;


	
	protected $codcli;


	
	protected $codrec;


	
	protected $fecrec;


	
	protected $monrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefdoc()
	{

		return $this->refdoc; 		
	}
	
	public function getCodcli()
	{

		return $this->codcli; 		
	}
	
	public function getCodrec()
	{

		return $this->codrec; 		
	}
	
	public function getFecrec($format = 'Y-m-d')
	{

		if ($this->fecrec === null || $this->fecrec === '') {
			return null;
		} elseif (!is_int($this->fecrec)) {
						$ts = strtotime($this->fecrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
			}
		} else {
			$ts = $this->fecrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMonrec()
	{

		return number_format($this->monrec,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefdoc($v)
	{

		if ($this->refdoc !== $v) {
			$this->refdoc = $v;
			$this->modifiedColumns[] = CobrecdocPeer::REFDOC;
		}

	} 
	
	public function setCodcli($v)
	{

		if ($this->codcli !== $v) {
			$this->codcli = $v;
			$this->modifiedColumns[] = CobrecdocPeer::CODCLI;
		}

	} 
	
	public function setCodrec($v)
	{

		if ($this->codrec !== $v) {
			$this->codrec = $v;
			$this->modifiedColumns[] = CobrecdocPeer::CODREC;
		}

	} 
	
	public function setFecrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrec !== $ts) {
			$this->fecrec = $ts;
			$this->modifiedColumns[] = CobrecdocPeer::FECREC;
		}

	} 
	
	public function setMonrec($v)
	{

		if ($this->monrec !== $v) {
			$this->monrec = $v;
			$this->modifiedColumns[] = CobrecdocPeer::MONREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CobrecdocPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refdoc = $rs->getString($startcol + 0);

			$this->codcli = $rs->getString($startcol + 1);

			$this->codrec = $rs->getString($startcol + 2);

			$this->fecrec = $rs->getDate($startcol + 3, null);

			$this->monrec = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cobrecdoc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CobrecdocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobrecdocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobrecdocPeer::DATABASE_NAME);
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
					$pk = CobrecdocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CobrecdocPeer::doUpdate($this, $con);
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


			if (($retval = CobrecdocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobrecdocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefdoc();
				break;
			case 1:
				return $this->getCodcli();
				break;
			case 2:
				return $this->getCodrec();
				break;
			case 3:
				return $this->getFecrec();
				break;
			case 4:
				return $this->getMonrec();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobrecdocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefdoc(),
			$keys[1] => $this->getCodcli(),
			$keys[2] => $this->getCodrec(),
			$keys[3] => $this->getFecrec(),
			$keys[4] => $this->getMonrec(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobrecdocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefdoc($value);
				break;
			case 1:
				$this->setCodcli($value);
				break;
			case 2:
				$this->setCodrec($value);
				break;
			case 3:
				$this->setFecrec($value);
				break;
			case 4:
				$this->setMonrec($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobrecdocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcli($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobrecdocPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobrecdocPeer::REFDOC)) $criteria->add(CobrecdocPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(CobrecdocPeer::CODCLI)) $criteria->add(CobrecdocPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobrecdocPeer::CODREC)) $criteria->add(CobrecdocPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(CobrecdocPeer::FECREC)) $criteria->add(CobrecdocPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(CobrecdocPeer::MONREC)) $criteria->add(CobrecdocPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(CobrecdocPeer::ID)) $criteria->add(CobrecdocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobrecdocPeer::DATABASE_NAME);

		$criteria->add(CobrecdocPeer::ID, $this->id);

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

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setCodrec($this->codrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setMonrec($this->monrec);


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
			self::$peer = new CobrecdocPeer();
		}
		return self::$peer;
	}

} 