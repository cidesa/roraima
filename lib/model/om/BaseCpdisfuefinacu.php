<?php


abstract class BaseCpdisfuefinacu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $correl;


	
	protected $origen;


	
	protected $fuefin;


	
	protected $fecdis;


	
	protected $codpre;


	
	protected $monasi;


	
	protected $refdis;


	
	protected $status;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCorrel()
	{

		return $this->correl; 		
	}
	
	public function getOrigen()
	{

		return $this->origen; 		
	}
	
	public function getFuefin()
	{

		return $this->fuefin; 		
	}
	
	public function getFecdis($format = 'Y-m-d')
	{

		if ($this->fecdis === null || $this->fecdis === '') {
			return null;
		} elseif (!is_int($this->fecdis)) {
						$ts = strtotime($this->fecdis);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdis] as date/time value: " . var_export($this->fecdis, true));
			}
		} else {
			$ts = $this->fecdis;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodpre()
	{

		return $this->codpre; 		
	}
	
	public function getMonasi()
	{

		return number_format($this->monasi,2,',','.');
		
	}
	
	public function getRefdis()
	{

		return $this->refdis; 		
	}
	
	public function getStatus()
	{

		return $this->status; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCorrel($v)
	{

		if ($this->correl !== $v) {
			$this->correl = $v;
			$this->modifiedColumns[] = CpdisfuefinacuPeer::CORREL;
		}

	} 
	
	public function setOrigen($v)
	{

		if ($this->origen !== $v) {
			$this->origen = $v;
			$this->modifiedColumns[] = CpdisfuefinacuPeer::ORIGEN;
		}

	} 
	
	public function setFuefin($v)
	{

		if ($this->fuefin !== $v) {
			$this->fuefin = $v;
			$this->modifiedColumns[] = CpdisfuefinacuPeer::FUEFIN;
		}

	} 
	
	public function setFecdis($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdis] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdis !== $ts) {
			$this->fecdis = $ts;
			$this->modifiedColumns[] = CpdisfuefinacuPeer::FECDIS;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CpdisfuefinacuPeer::CODPRE;
		}

	} 
	
	public function setMonasi($v)
	{

		if ($this->monasi !== $v) {
			$this->monasi = $v;
			$this->modifiedColumns[] = CpdisfuefinacuPeer::MONASI;
		}

	} 
	
	public function setRefdis($v)
	{

		if ($this->refdis !== $v) {
			$this->refdis = $v;
			$this->modifiedColumns[] = CpdisfuefinacuPeer::REFDIS;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = CpdisfuefinacuPeer::STATUS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpdisfuefinacuPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->correl = $rs->getString($startcol + 0);

			$this->origen = $rs->getString($startcol + 1);

			$this->fuefin = $rs->getString($startcol + 2);

			$this->fecdis = $rs->getDate($startcol + 3, null);

			$this->codpre = $rs->getString($startcol + 4);

			$this->monasi = $rs->getFloat($startcol + 5);

			$this->refdis = $rs->getString($startcol + 6);

			$this->status = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpdisfuefinacu object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpdisfuefinacuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdisfuefinacuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdisfuefinacuPeer::DATABASE_NAME);
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
					$pk = CpdisfuefinacuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpdisfuefinacuPeer::doUpdate($this, $con);
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


			if (($retval = CpdisfuefinacuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdisfuefinacuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCorrel();
				break;
			case 1:
				return $this->getOrigen();
				break;
			case 2:
				return $this->getFuefin();
				break;
			case 3:
				return $this->getFecdis();
				break;
			case 4:
				return $this->getCodpre();
				break;
			case 5:
				return $this->getMonasi();
				break;
			case 6:
				return $this->getRefdis();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdisfuefinacuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCorrel(),
			$keys[1] => $this->getOrigen(),
			$keys[2] => $this->getFuefin(),
			$keys[3] => $this->getFecdis(),
			$keys[4] => $this->getCodpre(),
			$keys[5] => $this->getMonasi(),
			$keys[6] => $this->getRefdis(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdisfuefinacuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCorrel($value);
				break;
			case 1:
				$this->setOrigen($value);
				break;
			case 2:
				$this->setFuefin($value);
				break;
			case 3:
				$this->setFecdis($value);
				break;
			case 4:
				$this->setCodpre($value);
				break;
			case 5:
				$this->setMonasi($value);
				break;
			case 6:
				$this->setRefdis($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdisfuefinacuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCorrel($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOrigen($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFuefin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecdis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonasi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefdis($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdisfuefinacuPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdisfuefinacuPeer::CORREL)) $criteria->add(CpdisfuefinacuPeer::CORREL, $this->correl);
		if ($this->isColumnModified(CpdisfuefinacuPeer::ORIGEN)) $criteria->add(CpdisfuefinacuPeer::ORIGEN, $this->origen);
		if ($this->isColumnModified(CpdisfuefinacuPeer::FUEFIN)) $criteria->add(CpdisfuefinacuPeer::FUEFIN, $this->fuefin);
		if ($this->isColumnModified(CpdisfuefinacuPeer::FECDIS)) $criteria->add(CpdisfuefinacuPeer::FECDIS, $this->fecdis);
		if ($this->isColumnModified(CpdisfuefinacuPeer::CODPRE)) $criteria->add(CpdisfuefinacuPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpdisfuefinacuPeer::MONASI)) $criteria->add(CpdisfuefinacuPeer::MONASI, $this->monasi);
		if ($this->isColumnModified(CpdisfuefinacuPeer::REFDIS)) $criteria->add(CpdisfuefinacuPeer::REFDIS, $this->refdis);
		if ($this->isColumnModified(CpdisfuefinacuPeer::STATUS)) $criteria->add(CpdisfuefinacuPeer::STATUS, $this->status);
		if ($this->isColumnModified(CpdisfuefinacuPeer::ID)) $criteria->add(CpdisfuefinacuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdisfuefinacuPeer::DATABASE_NAME);

		$criteria->add(CpdisfuefinacuPeer::ID, $this->id);

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

		$copyObj->setCorrel($this->correl);

		$copyObj->setOrigen($this->origen);

		$copyObj->setFuefin($this->fuefin);

		$copyObj->setFecdis($this->fecdis);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonasi($this->monasi);

		$copyObj->setRefdis($this->refdis);

		$copyObj->setStatus($this->status);


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
			self::$peer = new CpdisfuefinacuPeer();
		}
		return self::$peer;
	}

} 