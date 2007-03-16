<?php


abstract class BaseNpbonocont extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipcon;


	
	protected $anovig;


	
	protected $desde;


	
	protected $hasta;


	
	protected $diauti;


	
	protected $diavac;


	
	protected $anovighas;


	
	protected $calinc = '';


	
	protected $antap;


	
	protected $antapvac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtipcon()
	{

		return $this->codtipcon;
	}

	
	public function getAnovig($format = 'Y-m-d')
	{

		if ($this->anovig === null || $this->anovig === '') {
			return null;
		} elseif (!is_int($this->anovig)) {
						$ts = strtotime($this->anovig);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [anovig] as date/time value: " . var_export($this->anovig, true));
			}
		} else {
			$ts = $this->anovig;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDesde()
	{

		return $this->desde;
	}

	
	public function getHasta()
	{

		return $this->hasta;
	}

	
	public function getDiauti()
	{

		return $this->diauti;
	}

	
	public function getDiavac()
	{

		return $this->diavac;
	}

	
	public function getAnovighas($format = 'Y-m-d')
	{

		if ($this->anovighas === null || $this->anovighas === '') {
			return null;
		} elseif (!is_int($this->anovighas)) {
						$ts = strtotime($this->anovighas);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [anovighas] as date/time value: " . var_export($this->anovighas, true));
			}
		} else {
			$ts = $this->anovighas;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCalinc()
	{

		return $this->calinc;
	}

	
	public function getAntap()
	{

		return $this->antap;
	}

	
	public function getAntapvac()
	{

		return $this->antapvac;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodtipcon($v)
	{

		if ($this->codtipcon !== $v) {
			$this->codtipcon = $v;
			$this->modifiedColumns[] = NpbonocontPeer::CODTIPCON;
		}

	} 
	
	public function setAnovig($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [anovig] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->anovig !== $ts) {
			$this->anovig = $ts;
			$this->modifiedColumns[] = NpbonocontPeer::ANOVIG;
		}

	} 
	
	public function setDesde($v)
	{

		if ($this->desde !== $v) {
			$this->desde = $v;
			$this->modifiedColumns[] = NpbonocontPeer::DESDE;
		}

	} 
	
	public function setHasta($v)
	{

		if ($this->hasta !== $v) {
			$this->hasta = $v;
			$this->modifiedColumns[] = NpbonocontPeer::HASTA;
		}

	} 
	
	public function setDiauti($v)
	{

		if ($this->diauti !== $v) {
			$this->diauti = $v;
			$this->modifiedColumns[] = NpbonocontPeer::DIAUTI;
		}

	} 
	
	public function setDiavac($v)
	{

		if ($this->diavac !== $v) {
			$this->diavac = $v;
			$this->modifiedColumns[] = NpbonocontPeer::DIAVAC;
		}

	} 
	
	public function setAnovighas($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [anovighas] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->anovighas !== $ts) {
			$this->anovighas = $ts;
			$this->modifiedColumns[] = NpbonocontPeer::ANOVIGHAS;
		}

	} 
	
	public function setCalinc($v)
	{

		if ($this->calinc !== $v || $v === '') {
			$this->calinc = $v;
			$this->modifiedColumns[] = NpbonocontPeer::CALINC;
		}

	} 
	
	public function setAntap($v)
	{

		if ($this->antap !== $v) {
			$this->antap = $v;
			$this->modifiedColumns[] = NpbonocontPeer::ANTAP;
		}

	} 
	
	public function setAntapvac($v)
	{

		if ($this->antapvac !== $v) {
			$this->antapvac = $v;
			$this->modifiedColumns[] = NpbonocontPeer::ANTAPVAC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpbonocontPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtipcon = $rs->getString($startcol + 0);

			$this->anovig = $rs->getDate($startcol + 1, null);

			$this->desde = $rs->getFloat($startcol + 2);

			$this->hasta = $rs->getFloat($startcol + 3);

			$this->diauti = $rs->getFloat($startcol + 4);

			$this->diavac = $rs->getFloat($startcol + 5);

			$this->anovighas = $rs->getDate($startcol + 6, null);

			$this->calinc = $rs->getString($startcol + 7);

			$this->antap = $rs->getString($startcol + 8);

			$this->antapvac = $rs->getString($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npbonocont object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpbonocontPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpbonocontPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpbonocontPeer::DATABASE_NAME);
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
					$pk = NpbonocontPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpbonocontPeer::doUpdate($this, $con);
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


			if (($retval = NpbonocontPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpbonocontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipcon();
				break;
			case 1:
				return $this->getAnovig();
				break;
			case 2:
				return $this->getDesde();
				break;
			case 3:
				return $this->getHasta();
				break;
			case 4:
				return $this->getDiauti();
				break;
			case 5:
				return $this->getDiavac();
				break;
			case 6:
				return $this->getAnovighas();
				break;
			case 7:
				return $this->getCalinc();
				break;
			case 8:
				return $this->getAntap();
				break;
			case 9:
				return $this->getAntapvac();
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
		$keys = NpbonocontPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipcon(),
			$keys[1] => $this->getAnovig(),
			$keys[2] => $this->getDesde(),
			$keys[3] => $this->getHasta(),
			$keys[4] => $this->getDiauti(),
			$keys[5] => $this->getDiavac(),
			$keys[6] => $this->getAnovighas(),
			$keys[7] => $this->getCalinc(),
			$keys[8] => $this->getAntap(),
			$keys[9] => $this->getAntapvac(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpbonocontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipcon($value);
				break;
			case 1:
				$this->setAnovig($value);
				break;
			case 2:
				$this->setDesde($value);
				break;
			case 3:
				$this->setHasta($value);
				break;
			case 4:
				$this->setDiauti($value);
				break;
			case 5:
				$this->setDiavac($value);
				break;
			case 6:
				$this->setAnovighas($value);
				break;
			case 7:
				$this->setCalinc($value);
				break;
			case 8:
				$this->setAntap($value);
				break;
			case 9:
				$this->setAntapvac($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpbonocontPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAnovig($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesde($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHasta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiauti($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiavac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAnovighas($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCalinc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAntap($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAntapvac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpbonocontPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpbonocontPeer::CODTIPCON)) $criteria->add(NpbonocontPeer::CODTIPCON, $this->codtipcon);
		if ($this->isColumnModified(NpbonocontPeer::ANOVIG)) $criteria->add(NpbonocontPeer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(NpbonocontPeer::DESDE)) $criteria->add(NpbonocontPeer::DESDE, $this->desde);
		if ($this->isColumnModified(NpbonocontPeer::HASTA)) $criteria->add(NpbonocontPeer::HASTA, $this->hasta);
		if ($this->isColumnModified(NpbonocontPeer::DIAUTI)) $criteria->add(NpbonocontPeer::DIAUTI, $this->diauti);
		if ($this->isColumnModified(NpbonocontPeer::DIAVAC)) $criteria->add(NpbonocontPeer::DIAVAC, $this->diavac);
		if ($this->isColumnModified(NpbonocontPeer::ANOVIGHAS)) $criteria->add(NpbonocontPeer::ANOVIGHAS, $this->anovighas);
		if ($this->isColumnModified(NpbonocontPeer::CALINC)) $criteria->add(NpbonocontPeer::CALINC, $this->calinc);
		if ($this->isColumnModified(NpbonocontPeer::ANTAP)) $criteria->add(NpbonocontPeer::ANTAP, $this->antap);
		if ($this->isColumnModified(NpbonocontPeer::ANTAPVAC)) $criteria->add(NpbonocontPeer::ANTAPVAC, $this->antapvac);
		if ($this->isColumnModified(NpbonocontPeer::ID)) $criteria->add(NpbonocontPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpbonocontPeer::DATABASE_NAME);

		$criteria->add(NpbonocontPeer::ID, $this->id);

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

		$copyObj->setCodtipcon($this->codtipcon);

		$copyObj->setAnovig($this->anovig);

		$copyObj->setDesde($this->desde);

		$copyObj->setHasta($this->hasta);

		$copyObj->setDiauti($this->diauti);

		$copyObj->setDiavac($this->diavac);

		$copyObj->setAnovighas($this->anovighas);

		$copyObj->setCalinc($this->calinc);

		$copyObj->setAntap($this->antap);

		$copyObj->setAntapvac($this->antapvac);


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
			self::$peer = new NpbonocontPeer();
		}
		return self::$peer;
	}

} 