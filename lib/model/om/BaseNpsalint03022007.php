<?php


abstract class BaseNpsalint03022007 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codemp;


	
	protected $codasi;


	
	protected $monasi;


	
	protected $fecinicon;


	
	protected $fecfincon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getCodasi()
	{

		return $this->codasi; 		
	}
	
	public function getMonasi()
	{

		return number_format($this->monasi,2,',','.');
		
	}
	
	public function getFecinicon($format = 'Y-m-d')
	{

		if ($this->fecinicon === null || $this->fecinicon === '') {
			return null;
		} elseif (!is_int($this->fecinicon)) {
						$ts = strtotime($this->fecinicon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecinicon] as date/time value: " . var_export($this->fecinicon, true));
			}
		} else {
			$ts = $this->fecinicon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecfincon($format = 'Y-m-d')
	{

		if ($this->fecfincon === null || $this->fecfincon === '') {
			return null;
		} elseif (!is_int($this->fecfincon)) {
						$ts = strtotime($this->fecfincon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfincon] as date/time value: " . var_export($this->fecfincon, true));
			}
		} else {
			$ts = $this->fecfincon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = Npsalint03022007Peer::CODCON;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = Npsalint03022007Peer::CODEMP;
		}

	} 
	
	public function setCodasi($v)
	{

		if ($this->codasi !== $v) {
			$this->codasi = $v;
			$this->modifiedColumns[] = Npsalint03022007Peer::CODASI;
		}

	} 
	
	public function setMonasi($v)
	{

		if ($this->monasi !== $v) {
			$this->monasi = $v;
			$this->modifiedColumns[] = Npsalint03022007Peer::MONASI;
		}

	} 
	
	public function setFecinicon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecinicon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecinicon !== $ts) {
			$this->fecinicon = $ts;
			$this->modifiedColumns[] = Npsalint03022007Peer::FECINICON;
		}

	} 
	
	public function setFecfincon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfincon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfincon !== $ts) {
			$this->fecfincon = $ts;
			$this->modifiedColumns[] = Npsalint03022007Peer::FECFINCON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Npsalint03022007Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->codemp = $rs->getString($startcol + 1);

			$this->codasi = $rs->getString($startcol + 2);

			$this->monasi = $rs->getFloat($startcol + 3);

			$this->fecinicon = $rs->getDate($startcol + 4, null);

			$this->fecfincon = $rs->getDate($startcol + 5, null);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npsalint03022007 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Npsalint03022007Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Npsalint03022007Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Npsalint03022007Peer::DATABASE_NAME);
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
					$pk = Npsalint03022007Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Npsalint03022007Peer::doUpdate($this, $con);
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


			if (($retval = Npsalint03022007Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Npsalint03022007Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodasi();
				break;
			case 3:
				return $this->getMonasi();
				break;
			case 4:
				return $this->getFecinicon();
				break;
			case 5:
				return $this->getFecfincon();
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
		$keys = Npsalint03022007Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodasi(),
			$keys[3] => $this->getMonasi(),
			$keys[4] => $this->getFecinicon(),
			$keys[5] => $this->getFecfincon(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Npsalint03022007Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodasi($value);
				break;
			case 3:
				$this->setMonasi($value);
				break;
			case 4:
				$this->setFecinicon($value);
				break;
			case 5:
				$this->setFecfincon($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Npsalint03022007Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodasi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonasi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecinicon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecfincon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Npsalint03022007Peer::DATABASE_NAME);

		if ($this->isColumnModified(Npsalint03022007Peer::CODCON)) $criteria->add(Npsalint03022007Peer::CODCON, $this->codcon);
		if ($this->isColumnModified(Npsalint03022007Peer::CODEMP)) $criteria->add(Npsalint03022007Peer::CODEMP, $this->codemp);
		if ($this->isColumnModified(Npsalint03022007Peer::CODASI)) $criteria->add(Npsalint03022007Peer::CODASI, $this->codasi);
		if ($this->isColumnModified(Npsalint03022007Peer::MONASI)) $criteria->add(Npsalint03022007Peer::MONASI, $this->monasi);
		if ($this->isColumnModified(Npsalint03022007Peer::FECINICON)) $criteria->add(Npsalint03022007Peer::FECINICON, $this->fecinicon);
		if ($this->isColumnModified(Npsalint03022007Peer::FECFINCON)) $criteria->add(Npsalint03022007Peer::FECFINCON, $this->fecfincon);
		if ($this->isColumnModified(Npsalint03022007Peer::ID)) $criteria->add(Npsalint03022007Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Npsalint03022007Peer::DATABASE_NAME);

		$criteria->add(Npsalint03022007Peer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodasi($this->codasi);

		$copyObj->setMonasi($this->monasi);

		$copyObj->setFecinicon($this->fecinicon);

		$copyObj->setFecfincon($this->fecfincon);


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
			self::$peer = new Npsalint03022007Peer();
		}
		return self::$peer;
	}

} 