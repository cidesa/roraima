<?php


abstract class BaseCpimpcau extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcau;


	
	protected $codpre;


	
	protected $monimp;


	
	protected $monpag;


	
	protected $monaju;


	
	protected $staimp;


	
	protected $refere;


	
	protected $refprc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefcau()
	{

		return $this->refcau; 		
	}
	
	public function getCodpre()
	{

		return $this->codpre; 		
	}
	
	public function getMonimp()
	{

		return number_format($this->monimp,2,',','.');
		
	}
	
	public function getMonpag()
	{

		return number_format($this->monpag,2,',','.');
		
	}
	
	public function getMonaju()
	{

		return number_format($this->monaju,2,',','.');
		
	}
	
	public function getStaimp()
	{

		return $this->staimp; 		
	}
	
	public function getRefere()
	{

		return $this->refere; 		
	}
	
	public function getRefprc()
	{

		return $this->refprc; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefcau($v)
	{

		if ($this->refcau !== $v) {
			$this->refcau = $v;
			$this->modifiedColumns[] = CpimpcauPeer::REFCAU;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CpimpcauPeer::CODPRE;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = CpimpcauPeer::MONIMP;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = CpimpcauPeer::MONPAG;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = CpimpcauPeer::MONAJU;
		}

	} 
	
	public function setStaimp($v)
	{

		if ($this->staimp !== $v) {
			$this->staimp = $v;
			$this->modifiedColumns[] = CpimpcauPeer::STAIMP;
		}

	} 
	
	public function setRefere($v)
	{

		if ($this->refere !== $v) {
			$this->refere = $v;
			$this->modifiedColumns[] = CpimpcauPeer::REFERE;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = CpimpcauPeer::REFPRC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpimpcauPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refcau = $rs->getString($startcol + 0);

			$this->codpre = $rs->getString($startcol + 1);

			$this->monimp = $rs->getFloat($startcol + 2);

			$this->monpag = $rs->getFloat($startcol + 3);

			$this->monaju = $rs->getFloat($startcol + 4);

			$this->staimp = $rs->getString($startcol + 5);

			$this->refere = $rs->getString($startcol + 6);

			$this->refprc = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpimpcau object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpimpcauPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpimpcauPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpimpcauPeer::DATABASE_NAME);
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
					$pk = CpimpcauPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpimpcauPeer::doUpdate($this, $con);
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


			if (($retval = CpimpcauPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpimpcauPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcau();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMonimp();
				break;
			case 3:
				return $this->getMonpag();
				break;
			case 4:
				return $this->getMonaju();
				break;
			case 5:
				return $this->getStaimp();
				break;
			case 6:
				return $this->getRefere();
				break;
			case 7:
				return $this->getRefprc();
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
		$keys = CpimpcauPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcau(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMonimp(),
			$keys[3] => $this->getMonpag(),
			$keys[4] => $this->getMonaju(),
			$keys[5] => $this->getStaimp(),
			$keys[6] => $this->getRefere(),
			$keys[7] => $this->getRefprc(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpimpcauPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcau($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMonimp($value);
				break;
			case 3:
				$this->setMonpag($value);
				break;
			case 4:
				$this->setMonaju($value);
				break;
			case 5:
				$this->setStaimp($value);
				break;
			case 6:
				$this->setRefere($value);
				break;
			case 7:
				$this->setRefprc($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpimpcauPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcau($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonimp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStaimp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefere($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRefprc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpimpcauPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpimpcauPeer::REFCAU)) $criteria->add(CpimpcauPeer::REFCAU, $this->refcau);
		if ($this->isColumnModified(CpimpcauPeer::CODPRE)) $criteria->add(CpimpcauPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpimpcauPeer::MONIMP)) $criteria->add(CpimpcauPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(CpimpcauPeer::MONPAG)) $criteria->add(CpimpcauPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(CpimpcauPeer::MONAJU)) $criteria->add(CpimpcauPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CpimpcauPeer::STAIMP)) $criteria->add(CpimpcauPeer::STAIMP, $this->staimp);
		if ($this->isColumnModified(CpimpcauPeer::REFERE)) $criteria->add(CpimpcauPeer::REFERE, $this->refere);
		if ($this->isColumnModified(CpimpcauPeer::REFPRC)) $criteria->add(CpimpcauPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(CpimpcauPeer::ID)) $criteria->add(CpimpcauPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpimpcauPeer::DATABASE_NAME);

		$criteria->add(CpimpcauPeer::ID, $this->id);

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

		$copyObj->setRefcau($this->refcau);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStaimp($this->staimp);

		$copyObj->setRefere($this->refere);

		$copyObj->setRefprc($this->refprc);


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
			self::$peer = new CpimpcauPeer();
		}
		return self::$peer;
	}

} 