<?php


abstract class BaseCobregges extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcli;


	
	protected $numges;


	
	protected $fecges;


	
	protected $nomcon;


	
	protected $obsges;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcli()
	{

		return $this->codcli;
	}

	
	public function getNumges()
	{

		return $this->numges;
	}

	
	public function getFecges($format = 'Y-m-d')
	{

		if ($this->fecges === null || $this->fecges === '') {
			return null;
		} elseif (!is_int($this->fecges)) {
						$ts = strtotime($this->fecges);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecges] as date/time value: " . var_export($this->fecges, true));
			}
		} else {
			$ts = $this->fecges;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNomcon()
	{

		return $this->nomcon;
	}

	
	public function getObsges()
	{

		return $this->obsges;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcli($v)
	{

		if ($this->codcli !== $v) {
			$this->codcli = $v;
			$this->modifiedColumns[] = CobreggesPeer::CODCLI;
		}

	} 
	
	public function setNumges($v)
	{

		if ($this->numges !== $v) {
			$this->numges = $v;
			$this->modifiedColumns[] = CobreggesPeer::NUMGES;
		}

	} 
	
	public function setFecges($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecges] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecges !== $ts) {
			$this->fecges = $ts;
			$this->modifiedColumns[] = CobreggesPeer::FECGES;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = CobreggesPeer::NOMCON;
		}

	} 
	
	public function setObsges($v)
	{

		if ($this->obsges !== $v) {
			$this->obsges = $v;
			$this->modifiedColumns[] = CobreggesPeer::OBSGES;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CobreggesPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcli = $rs->getString($startcol + 0);

			$this->numges = $rs->getString($startcol + 1);

			$this->fecges = $rs->getDate($startcol + 2, null);

			$this->nomcon = $rs->getString($startcol + 3);

			$this->obsges = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cobregges object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CobreggesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobreggesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobreggesPeer::DATABASE_NAME);
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
					$pk = CobreggesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CobreggesPeer::doUpdate($this, $con);
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


			if (($retval = CobreggesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobreggesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcli();
				break;
			case 1:
				return $this->getNumges();
				break;
			case 2:
				return $this->getFecges();
				break;
			case 3:
				return $this->getNomcon();
				break;
			case 4:
				return $this->getObsges();
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
		$keys = CobreggesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcli(),
			$keys[1] => $this->getNumges(),
			$keys[2] => $this->getFecges(),
			$keys[3] => $this->getNomcon(),
			$keys[4] => $this->getObsges(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobreggesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcli($value);
				break;
			case 1:
				$this->setNumges($value);
				break;
			case 2:
				$this->setFecges($value);
				break;
			case 3:
				$this->setNomcon($value);
				break;
			case 4:
				$this->setObsges($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobreggesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcli($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumges($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecges($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObsges($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobreggesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobreggesPeer::CODCLI)) $criteria->add(CobreggesPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobreggesPeer::NUMGES)) $criteria->add(CobreggesPeer::NUMGES, $this->numges);
		if ($this->isColumnModified(CobreggesPeer::FECGES)) $criteria->add(CobreggesPeer::FECGES, $this->fecges);
		if ($this->isColumnModified(CobreggesPeer::NOMCON)) $criteria->add(CobreggesPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(CobreggesPeer::OBSGES)) $criteria->add(CobreggesPeer::OBSGES, $this->obsges);
		if ($this->isColumnModified(CobreggesPeer::ID)) $criteria->add(CobreggesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobreggesPeer::DATABASE_NAME);

		$criteria->add(CobreggesPeer::ID, $this->id);

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

		$copyObj->setCodcli($this->codcli);

		$copyObj->setNumges($this->numges);

		$copyObj->setFecges($this->fecges);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setObsges($this->obsges);


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
			self::$peer = new CobreggesPeer();
		}
		return self::$peer;
	}

} 