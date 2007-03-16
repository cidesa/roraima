<?php


abstract class BaseHisconb extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcta;


	
	protected $descta;


	
	protected $salant;


	
	protected $debcre;


	
	protected $cargab;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $salprgper;


	
	protected $salacuper;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcta()
	{

		return $this->codcta;
	}

	
	public function getDescta()
	{

		return $this->descta;
	}

	
	public function getSalant()
	{

		return $this->salant;
	}

	
	public function getDebcre()
	{

		return $this->debcre;
	}

	
	public function getCargab()
	{

		return $this->cargab;
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

	
	public function getSalprgper()
	{

		return $this->salprgper;
	}

	
	public function getSalacuper()
	{

		return $this->salacuper;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = HisconbPeer::CODCTA;
		}

	} 
	
	public function setDescta($v)
	{

		if ($this->descta !== $v) {
			$this->descta = $v;
			$this->modifiedColumns[] = HisconbPeer::DESCTA;
		}

	} 
	
	public function setSalant($v)
	{

		if ($this->salant !== $v) {
			$this->salant = $v;
			$this->modifiedColumns[] = HisconbPeer::SALANT;
		}

	} 
	
	public function setDebcre($v)
	{

		if ($this->debcre !== $v) {
			$this->debcre = $v;
			$this->modifiedColumns[] = HisconbPeer::DEBCRE;
		}

	} 
	
	public function setCargab($v)
	{

		if ($this->cargab !== $v) {
			$this->cargab = $v;
			$this->modifiedColumns[] = HisconbPeer::CARGAB;
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
			$this->modifiedColumns[] = HisconbPeer::FECINI;
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
			$this->modifiedColumns[] = HisconbPeer::FECCIE;
		}

	} 
	
	public function setSalprgper($v)
	{

		if ($this->salprgper !== $v) {
			$this->salprgper = $v;
			$this->modifiedColumns[] = HisconbPeer::SALPRGPER;
		}

	} 
	
	public function setSalacuper($v)
	{

		if ($this->salacuper !== $v) {
			$this->salacuper = $v;
			$this->modifiedColumns[] = HisconbPeer::SALACUPER;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HisconbPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcta = $rs->getString($startcol + 0);

			$this->descta = $rs->getString($startcol + 1);

			$this->salant = $rs->getFloat($startcol + 2);

			$this->debcre = $rs->getString($startcol + 3);

			$this->cargab = $rs->getString($startcol + 4);

			$this->fecini = $rs->getDate($startcol + 5, null);

			$this->feccie = $rs->getDate($startcol + 6, null);

			$this->salprgper = $rs->getFloat($startcol + 7);

			$this->salacuper = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Hisconb object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HisconbPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HisconbPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HisconbPeer::DATABASE_NAME);
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
					$pk = HisconbPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += HisconbPeer::doUpdate($this, $con);
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


			if (($retval = HisconbPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HisconbPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcta();
				break;
			case 1:
				return $this->getDescta();
				break;
			case 2:
				return $this->getSalant();
				break;
			case 3:
				return $this->getDebcre();
				break;
			case 4:
				return $this->getCargab();
				break;
			case 5:
				return $this->getFecini();
				break;
			case 6:
				return $this->getFeccie();
				break;
			case 7:
				return $this->getSalprgper();
				break;
			case 8:
				return $this->getSalacuper();
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
		$keys = HisconbPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcta(),
			$keys[1] => $this->getDescta(),
			$keys[2] => $this->getSalant(),
			$keys[3] => $this->getDebcre(),
			$keys[4] => $this->getCargab(),
			$keys[5] => $this->getFecini(),
			$keys[6] => $this->getFeccie(),
			$keys[7] => $this->getSalprgper(),
			$keys[8] => $this->getSalacuper(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HisconbPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcta($value);
				break;
			case 1:
				$this->setDescta($value);
				break;
			case 2:
				$this->setSalant($value);
				break;
			case 3:
				$this->setDebcre($value);
				break;
			case 4:
				$this->setCargab($value);
				break;
			case 5:
				$this->setFecini($value);
				break;
			case 6:
				$this->setFeccie($value);
				break;
			case 7:
				$this->setSalprgper($value);
				break;
			case 8:
				$this->setSalacuper($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HisconbPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSalant($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDebcre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCargab($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecini($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFeccie($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSalprgper($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSalacuper($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HisconbPeer::DATABASE_NAME);

		if ($this->isColumnModified(HisconbPeer::CODCTA)) $criteria->add(HisconbPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(HisconbPeer::DESCTA)) $criteria->add(HisconbPeer::DESCTA, $this->descta);
		if ($this->isColumnModified(HisconbPeer::SALANT)) $criteria->add(HisconbPeer::SALANT, $this->salant);
		if ($this->isColumnModified(HisconbPeer::DEBCRE)) $criteria->add(HisconbPeer::DEBCRE, $this->debcre);
		if ($this->isColumnModified(HisconbPeer::CARGAB)) $criteria->add(HisconbPeer::CARGAB, $this->cargab);
		if ($this->isColumnModified(HisconbPeer::FECINI)) $criteria->add(HisconbPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(HisconbPeer::FECCIE)) $criteria->add(HisconbPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(HisconbPeer::SALPRGPER)) $criteria->add(HisconbPeer::SALPRGPER, $this->salprgper);
		if ($this->isColumnModified(HisconbPeer::SALACUPER)) $criteria->add(HisconbPeer::SALACUPER, $this->salacuper);
		if ($this->isColumnModified(HisconbPeer::ID)) $criteria->add(HisconbPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HisconbPeer::DATABASE_NAME);

		$criteria->add(HisconbPeer::ID, $this->id);

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

		$copyObj->setDescta($this->descta);

		$copyObj->setSalant($this->salant);

		$copyObj->setDebcre($this->debcre);

		$copyObj->setCargab($this->cargab);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setSalprgper($this->salprgper);

		$copyObj->setSalacuper($this->salacuper);


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
			self::$peer = new HisconbPeer();
		}
		return self::$peer;
	}

} 