<?php


abstract class BaseCpimprel extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refrel;


	
	protected $codpre;


	
	protected $monrel;


	
	protected $monaju;


	
	protected $starel;


	
	protected $refere;


	
	protected $refprc;


	
	protected $refcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefrel()
	{

		return $this->refrel;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getMonrel()
	{

		return $this->monrel;
	}

	
	public function getMonaju()
	{

		return $this->monaju;
	}

	
	public function getStarel()
	{

		return $this->starel;
	}

	
	public function getRefere()
	{

		return $this->refere;
	}

	
	public function getRefprc()
	{

		return $this->refprc;
	}

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefrel($v)
	{

		if ($this->refrel !== $v) {
			$this->refrel = $v;
			$this->modifiedColumns[] = CpimprelPeer::REFREL;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CpimprelPeer::CODPRE;
		}

	} 
	
	public function setMonrel($v)
	{

		if ($this->monrel !== $v) {
			$this->monrel = $v;
			$this->modifiedColumns[] = CpimprelPeer::MONREL;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = CpimprelPeer::MONAJU;
		}

	} 
	
	public function setStarel($v)
	{

		if ($this->starel !== $v) {
			$this->starel = $v;
			$this->modifiedColumns[] = CpimprelPeer::STAREL;
		}

	} 
	
	public function setRefere($v)
	{

		if ($this->refere !== $v) {
			$this->refere = $v;
			$this->modifiedColumns[] = CpimprelPeer::REFERE;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = CpimprelPeer::REFPRC;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = CpimprelPeer::REFCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpimprelPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refrel = $rs->getString($startcol + 0);

			$this->codpre = $rs->getString($startcol + 1);

			$this->monrel = $rs->getFloat($startcol + 2);

			$this->monaju = $rs->getFloat($startcol + 3);

			$this->starel = $rs->getString($startcol + 4);

			$this->refere = $rs->getString($startcol + 5);

			$this->refprc = $rs->getString($startcol + 6);

			$this->refcom = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpimprel object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpimprelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpimprelPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpimprelPeer::DATABASE_NAME);
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
					$pk = CpimprelPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpimprelPeer::doUpdate($this, $con);
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


			if (($retval = CpimprelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpimprelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefrel();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMonrel();
				break;
			case 3:
				return $this->getMonaju();
				break;
			case 4:
				return $this->getStarel();
				break;
			case 5:
				return $this->getRefere();
				break;
			case 6:
				return $this->getRefprc();
				break;
			case 7:
				return $this->getRefcom();
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
		$keys = CpimprelPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefrel(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMonrel(),
			$keys[3] => $this->getMonaju(),
			$keys[4] => $this->getStarel(),
			$keys[5] => $this->getRefere(),
			$keys[6] => $this->getRefprc(),
			$keys[7] => $this->getRefcom(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpimprelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefrel($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMonrel($value);
				break;
			case 3:
				$this->setMonaju($value);
				break;
			case 4:
				$this->setStarel($value);
				break;
			case 5:
				$this->setRefere($value);
				break;
			case 6:
				$this->setRefprc($value);
				break;
			case 7:
				$this->setRefcom($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpimprelPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefrel($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonrel($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStarel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefere($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefprc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRefcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpimprelPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpimprelPeer::REFREL)) $criteria->add(CpimprelPeer::REFREL, $this->refrel);
		if ($this->isColumnModified(CpimprelPeer::CODPRE)) $criteria->add(CpimprelPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpimprelPeer::MONREL)) $criteria->add(CpimprelPeer::MONREL, $this->monrel);
		if ($this->isColumnModified(CpimprelPeer::MONAJU)) $criteria->add(CpimprelPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CpimprelPeer::STAREL)) $criteria->add(CpimprelPeer::STAREL, $this->starel);
		if ($this->isColumnModified(CpimprelPeer::REFERE)) $criteria->add(CpimprelPeer::REFERE, $this->refere);
		if ($this->isColumnModified(CpimprelPeer::REFPRC)) $criteria->add(CpimprelPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(CpimprelPeer::REFCOM)) $criteria->add(CpimprelPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(CpimprelPeer::ID)) $criteria->add(CpimprelPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpimprelPeer::DATABASE_NAME);

		$criteria->add(CpimprelPeer::ID, $this->id);

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

		$copyObj->setRefrel($this->refrel);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonrel($this->monrel);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStarel($this->starel);

		$copyObj->setRefere($this->refere);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setRefcom($this->refcom);


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
			self::$peer = new CpimprelPeer();
		}
		return self::$peer;
	}

} 