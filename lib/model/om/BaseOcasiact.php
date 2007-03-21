<?php


abstract class BaseOcasiact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codtipact;


	
	protected $numofi;


	
	protected $fecact;


	
	protected $obsact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getCodtipact()
	{

		return $this->codtipact;
	}

	
	public function getNumofi()
	{

		return $this->numofi;
	}

	
	public function getFecact($format = 'Y-m-d')
	{

		if ($this->fecact === null || $this->fecact === '') {
			return null;
		} elseif (!is_int($this->fecact)) {
						$ts = strtotime($this->fecact);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecact] as date/time value: " . var_export($this->fecact, true));
			}
		} else {
			$ts = $this->fecact;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getObsact()
	{

		return $this->obsact;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcasiactPeer::CODCON;
		}

	} 
	
	public function setCodtipact($v)
	{

		if ($this->codtipact !== $v) {
			$this->codtipact = $v;
			$this->modifiedColumns[] = OcasiactPeer::CODTIPACT;
		}

	} 
	
	public function setNumofi($v)
	{

		if ($this->numofi !== $v) {
			$this->numofi = $v;
			$this->modifiedColumns[] = OcasiactPeer::NUMOFI;
		}

	} 
	
	public function setFecact($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecact] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecact !== $ts) {
			$this->fecact = $ts;
			$this->modifiedColumns[] = OcasiactPeer::FECACT;
		}

	} 
	
	public function setObsact($v)
	{

		if ($this->obsact !== $v) {
			$this->obsact = $v;
			$this->modifiedColumns[] = OcasiactPeer::OBSACT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcasiactPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->codtipact = $rs->getString($startcol + 1);

			$this->numofi = $rs->getString($startcol + 2);

			$this->fecact = $rs->getDate($startcol + 3, null);

			$this->obsact = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocasiact object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcasiactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcasiactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcasiactPeer::DATABASE_NAME);
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
					$pk = OcasiactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcasiactPeer::doUpdate($this, $con);
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


			if (($retval = OcasiactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcasiactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodtipact();
				break;
			case 2:
				return $this->getNumofi();
				break;
			case 3:
				return $this->getFecact();
				break;
			case 4:
				return $this->getObsact();
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
		$keys = OcasiactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodtipact(),
			$keys[2] => $this->getNumofi(),
			$keys[3] => $this->getFecact(),
			$keys[4] => $this->getObsact(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcasiactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodtipact($value);
				break;
			case 2:
				$this->setNumofi($value);
				break;
			case 3:
				$this->setFecact($value);
				break;
			case 4:
				$this->setObsact($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcasiactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtipact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumofi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObsact($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcasiactPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcasiactPeer::CODCON)) $criteria->add(OcasiactPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcasiactPeer::CODTIPACT)) $criteria->add(OcasiactPeer::CODTIPACT, $this->codtipact);
		if ($this->isColumnModified(OcasiactPeer::NUMOFI)) $criteria->add(OcasiactPeer::NUMOFI, $this->numofi);
		if ($this->isColumnModified(OcasiactPeer::FECACT)) $criteria->add(OcasiactPeer::FECACT, $this->fecact);
		if ($this->isColumnModified(OcasiactPeer::OBSACT)) $criteria->add(OcasiactPeer::OBSACT, $this->obsact);
		if ($this->isColumnModified(OcasiactPeer::ID)) $criteria->add(OcasiactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcasiactPeer::DATABASE_NAME);

		$criteria->add(OcasiactPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodtipact($this->codtipact);

		$copyObj->setNumofi($this->numofi);

		$copyObj->setFecact($this->fecact);

		$copyObj->setObsact($this->obsact);


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
			self::$peer = new OcasiactPeer();
		}
		return self::$peer;
	}

} 