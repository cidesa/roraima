<?php


abstract class BaseRhdefcur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcur;


	
	protected $descur;


	
	protected $codtipcur;


	
	protected $codpro;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $notapr;


	
	protected $durcur;


	
	protected $codtit;


	
	protected $turcur;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcur()
	{

		return $this->codcur; 		
	}
	
	public function getDescur()
	{

		return $this->descur; 		
	}
	
	public function getCodtipcur()
	{

		return $this->codtipcur; 		
	}
	
	public function getCodpro()
	{

		return $this->codpro; 		
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

	
	public function getFecfin($format = 'Y-m-d')
	{

		if ($this->fecfin === null || $this->fecfin === '') {
			return null;
		} elseif (!is_int($this->fecfin)) {
						$ts = strtotime($this->fecfin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
			}
		} else {
			$ts = $this->fecfin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNotapr()
	{

		return number_format($this->notapr,2,',','.');
		
	}
	
	public function getDurcur()
	{

		return number_format($this->durcur,2,',','.');
		
	}
	
	public function getCodtit()
	{

		return $this->codtit; 		
	}
	
	public function getTurcur()
	{

		return $this->turcur; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcur($v)
	{

		if ($this->codcur !== $v) {
			$this->codcur = $v;
			$this->modifiedColumns[] = RhdefcurPeer::CODCUR;
		}

	} 
	
	public function setDescur($v)
	{

		if ($this->descur !== $v) {
			$this->descur = $v;
			$this->modifiedColumns[] = RhdefcurPeer::DESCUR;
		}

	} 
	
	public function setCodtipcur($v)
	{

		if ($this->codtipcur !== $v) {
			$this->codtipcur = $v;
			$this->modifiedColumns[] = RhdefcurPeer::CODTIPCUR;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = RhdefcurPeer::CODPRO;
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
			$this->modifiedColumns[] = RhdefcurPeer::FECINI;
		}

	} 
	
	public function setFecfin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfin !== $ts) {
			$this->fecfin = $ts;
			$this->modifiedColumns[] = RhdefcurPeer::FECFIN;
		}

	} 
	
	public function setNotapr($v)
	{

		if ($this->notapr !== $v) {
			$this->notapr = $v;
			$this->modifiedColumns[] = RhdefcurPeer::NOTAPR;
		}

	} 
	
	public function setDurcur($v)
	{

		if ($this->durcur !== $v) {
			$this->durcur = $v;
			$this->modifiedColumns[] = RhdefcurPeer::DURCUR;
		}

	} 
	
	public function setCodtit($v)
	{

		if ($this->codtit !== $v) {
			$this->codtit = $v;
			$this->modifiedColumns[] = RhdefcurPeer::CODTIT;
		}

	} 
	
	public function setTurcur($v)
	{

		if ($this->turcur !== $v) {
			$this->turcur = $v;
			$this->modifiedColumns[] = RhdefcurPeer::TURCUR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RhdefcurPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcur = $rs->getString($startcol + 0);

			$this->descur = $rs->getString($startcol + 1);

			$this->codtipcur = $rs->getString($startcol + 2);

			$this->codpro = $rs->getString($startcol + 3);

			$this->fecini = $rs->getDate($startcol + 4, null);

			$this->fecfin = $rs->getDate($startcol + 5, null);

			$this->notapr = $rs->getFloat($startcol + 6);

			$this->durcur = $rs->getFloat($startcol + 7);

			$this->codtit = $rs->getString($startcol + 8);

			$this->turcur = $rs->getString($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rhdefcur object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RhdefcurPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhdefcurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhdefcurPeer::DATABASE_NAME);
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
					$pk = RhdefcurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RhdefcurPeer::doUpdate($this, $con);
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


			if (($retval = RhdefcurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefcurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcur();
				break;
			case 1:
				return $this->getDescur();
				break;
			case 2:
				return $this->getCodtipcur();
				break;
			case 3:
				return $this->getCodpro();
				break;
			case 4:
				return $this->getFecini();
				break;
			case 5:
				return $this->getFecfin();
				break;
			case 6:
				return $this->getNotapr();
				break;
			case 7:
				return $this->getDurcur();
				break;
			case 8:
				return $this->getCodtit();
				break;
			case 9:
				return $this->getTurcur();
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
		$keys = RhdefcurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcur(),
			$keys[1] => $this->getDescur(),
			$keys[2] => $this->getCodtipcur(),
			$keys[3] => $this->getCodpro(),
			$keys[4] => $this->getFecini(),
			$keys[5] => $this->getFecfin(),
			$keys[6] => $this->getNotapr(),
			$keys[7] => $this->getDurcur(),
			$keys[8] => $this->getCodtit(),
			$keys[9] => $this->getTurcur(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefcurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcur($value);
				break;
			case 1:
				$this->setDescur($value);
				break;
			case 2:
				$this->setCodtipcur($value);
				break;
			case 3:
				$this->setCodpro($value);
				break;
			case 4:
				$this->setFecini($value);
				break;
			case 5:
				$this->setFecfin($value);
				break;
			case 6:
				$this->setNotapr($value);
				break;
			case 7:
				$this->setDurcur($value);
				break;
			case 8:
				$this->setCodtit($value);
				break;
			case 9:
				$this->setTurcur($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhdefcurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescur($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtipcur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecini($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecfin($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNotapr($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDurcur($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodtit($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTurcur($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhdefcurPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhdefcurPeer::CODCUR)) $criteria->add(RhdefcurPeer::CODCUR, $this->codcur);
		if ($this->isColumnModified(RhdefcurPeer::DESCUR)) $criteria->add(RhdefcurPeer::DESCUR, $this->descur);
		if ($this->isColumnModified(RhdefcurPeer::CODTIPCUR)) $criteria->add(RhdefcurPeer::CODTIPCUR, $this->codtipcur);
		if ($this->isColumnModified(RhdefcurPeer::CODPRO)) $criteria->add(RhdefcurPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(RhdefcurPeer::FECINI)) $criteria->add(RhdefcurPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(RhdefcurPeer::FECFIN)) $criteria->add(RhdefcurPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(RhdefcurPeer::NOTAPR)) $criteria->add(RhdefcurPeer::NOTAPR, $this->notapr);
		if ($this->isColumnModified(RhdefcurPeer::DURCUR)) $criteria->add(RhdefcurPeer::DURCUR, $this->durcur);
		if ($this->isColumnModified(RhdefcurPeer::CODTIT)) $criteria->add(RhdefcurPeer::CODTIT, $this->codtit);
		if ($this->isColumnModified(RhdefcurPeer::TURCUR)) $criteria->add(RhdefcurPeer::TURCUR, $this->turcur);
		if ($this->isColumnModified(RhdefcurPeer::ID)) $criteria->add(RhdefcurPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhdefcurPeer::DATABASE_NAME);

		$criteria->add(RhdefcurPeer::ID, $this->id);

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

		$copyObj->setCodcur($this->codcur);

		$copyObj->setDescur($this->descur);

		$copyObj->setCodtipcur($this->codtipcur);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setNotapr($this->notapr);

		$copyObj->setDurcur($this->durcur);

		$copyObj->setCodtit($this->codtit);

		$copyObj->setTurcur($this->turcur);


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
			self::$peer = new RhdefcurPeer();
		}
		return self::$peer;
	}

} 