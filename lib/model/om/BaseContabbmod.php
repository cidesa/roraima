<?php


abstract class BaseContabbmod extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcta;


	
	protected $descta;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $salant;


	
	protected $debcre;


	
	protected $cargab;


	
	protected $salprgper;


	
	protected $salacuper;


	
	protected $salprgperfor;


	
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

	
	public function getSalant()
	{

		return number_format($this->salant,2,',','.');
		
	}
	
	public function getDebcre()
	{

		return $this->debcre; 		
	}
	
	public function getCargab()
	{

		return $this->cargab; 		
	}
	
	public function getSalprgper()
	{

		return number_format($this->salprgper,2,',','.');
		
	}
	
	public function getSalacuper()
	{

		return number_format($this->salacuper,2,',','.');
		
	}
	
	public function getSalprgperfor()
	{

		return number_format($this->salprgperfor,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = ContabbmodPeer::CODCTA;
		}

	} 
	
	public function setDescta($v)
	{

		if ($this->descta !== $v) {
			$this->descta = $v;
			$this->modifiedColumns[] = ContabbmodPeer::DESCTA;
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
			$this->modifiedColumns[] = ContabbmodPeer::FECINI;
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
			$this->modifiedColumns[] = ContabbmodPeer::FECCIE;
		}

	} 
	
	public function setSalant($v)
	{

		if ($this->salant !== $v) {
			$this->salant = $v;
			$this->modifiedColumns[] = ContabbmodPeer::SALANT;
		}

	} 
	
	public function setDebcre($v)
	{

		if ($this->debcre !== $v) {
			$this->debcre = $v;
			$this->modifiedColumns[] = ContabbmodPeer::DEBCRE;
		}

	} 
	
	public function setCargab($v)
	{

		if ($this->cargab !== $v) {
			$this->cargab = $v;
			$this->modifiedColumns[] = ContabbmodPeer::CARGAB;
		}

	} 
	
	public function setSalprgper($v)
	{

		if ($this->salprgper !== $v) {
			$this->salprgper = $v;
			$this->modifiedColumns[] = ContabbmodPeer::SALPRGPER;
		}

	} 
	
	public function setSalacuper($v)
	{

		if ($this->salacuper !== $v) {
			$this->salacuper = $v;
			$this->modifiedColumns[] = ContabbmodPeer::SALACUPER;
		}

	} 
	
	public function setSalprgperfor($v)
	{

		if ($this->salprgperfor !== $v) {
			$this->salprgperfor = $v;
			$this->modifiedColumns[] = ContabbmodPeer::SALPRGPERFOR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContabbmodPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcta = $rs->getString($startcol + 0);

			$this->descta = $rs->getString($startcol + 1);

			$this->fecini = $rs->getDate($startcol + 2, null);

			$this->feccie = $rs->getDate($startcol + 3, null);

			$this->salant = $rs->getFloat($startcol + 4);

			$this->debcre = $rs->getString($startcol + 5);

			$this->cargab = $rs->getString($startcol + 6);

			$this->salprgper = $rs->getFloat($startcol + 7);

			$this->salacuper = $rs->getFloat($startcol + 8);

			$this->salprgperfor = $rs->getFloat($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Contabbmod object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContabbmodPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContabbmodPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContabbmodPeer::DATABASE_NAME);
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
					$pk = ContabbmodPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ContabbmodPeer::doUpdate($this, $con);
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


			if (($retval = ContabbmodPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContabbmodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFecini();
				break;
			case 3:
				return $this->getFeccie();
				break;
			case 4:
				return $this->getSalant();
				break;
			case 5:
				return $this->getDebcre();
				break;
			case 6:
				return $this->getCargab();
				break;
			case 7:
				return $this->getSalprgper();
				break;
			case 8:
				return $this->getSalacuper();
				break;
			case 9:
				return $this->getSalprgperfor();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContabbmodPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcta(),
			$keys[1] => $this->getDescta(),
			$keys[2] => $this->getFecini(),
			$keys[3] => $this->getFeccie(),
			$keys[4] => $this->getSalant(),
			$keys[5] => $this->getDebcre(),
			$keys[6] => $this->getCargab(),
			$keys[7] => $this->getSalprgper(),
			$keys[8] => $this->getSalacuper(),
			$keys[9] => $this->getSalprgperfor(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContabbmodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFecini($value);
				break;
			case 3:
				$this->setFeccie($value);
				break;
			case 4:
				$this->setSalant($value);
				break;
			case 5:
				$this->setDebcre($value);
				break;
			case 6:
				$this->setCargab($value);
				break;
			case 7:
				$this->setSalprgper($value);
				break;
			case 8:
				$this->setSalacuper($value);
				break;
			case 9:
				$this->setSalprgperfor($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContabbmodPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecini($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFeccie($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSalant($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDebcre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCargab($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSalprgper($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSalacuper($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalprgperfor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContabbmodPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContabbmodPeer::CODCTA)) $criteria->add(ContabbmodPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(ContabbmodPeer::DESCTA)) $criteria->add(ContabbmodPeer::DESCTA, $this->descta);
		if ($this->isColumnModified(ContabbmodPeer::FECINI)) $criteria->add(ContabbmodPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(ContabbmodPeer::FECCIE)) $criteria->add(ContabbmodPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(ContabbmodPeer::SALANT)) $criteria->add(ContabbmodPeer::SALANT, $this->salant);
		if ($this->isColumnModified(ContabbmodPeer::DEBCRE)) $criteria->add(ContabbmodPeer::DEBCRE, $this->debcre);
		if ($this->isColumnModified(ContabbmodPeer::CARGAB)) $criteria->add(ContabbmodPeer::CARGAB, $this->cargab);
		if ($this->isColumnModified(ContabbmodPeer::SALPRGPER)) $criteria->add(ContabbmodPeer::SALPRGPER, $this->salprgper);
		if ($this->isColumnModified(ContabbmodPeer::SALACUPER)) $criteria->add(ContabbmodPeer::SALACUPER, $this->salacuper);
		if ($this->isColumnModified(ContabbmodPeer::SALPRGPERFOR)) $criteria->add(ContabbmodPeer::SALPRGPERFOR, $this->salprgperfor);
		if ($this->isColumnModified(ContabbmodPeer::ID)) $criteria->add(ContabbmodPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContabbmodPeer::DATABASE_NAME);

		$criteria->add(ContabbmodPeer::ID, $this->id);

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

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setSalant($this->salant);

		$copyObj->setDebcre($this->debcre);

		$copyObj->setCargab($this->cargab);

		$copyObj->setSalprgper($this->salprgper);

		$copyObj->setSalacuper($this->salacuper);

		$copyObj->setSalprgperfor($this->salprgperfor);


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
			self::$peer = new ContabbmodPeer();
		}
		return self::$peer;
	}

} 