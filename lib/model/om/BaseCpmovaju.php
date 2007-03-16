<?php


abstract class BaseCpmovaju extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refaju;


	
	protected $codpre;


	
	protected $monaju;


	
	protected $stamov;


	
	protected $refprc;


	
	protected $refcom;


	
	protected $refcau;


	
	protected $refpag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefaju()
	{

		return $this->refaju;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getMonaju()
	{

		return $this->monaju;
	}

	
	public function getStamov()
	{

		return $this->stamov;
	}

	
	public function getRefprc()
	{

		return $this->refprc;
	}

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getRefcau()
	{

		return $this->refcau;
	}

	
	public function getRefpag()
	{

		return $this->refpag;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefaju($v)
	{

		if ($this->refaju !== $v) {
			$this->refaju = $v;
			$this->modifiedColumns[] = CpmovajuPeer::REFAJU;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CpmovajuPeer::CODPRE;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = CpmovajuPeer::MONAJU;
		}

	} 
	
	public function setStamov($v)
	{

		if ($this->stamov !== $v) {
			$this->stamov = $v;
			$this->modifiedColumns[] = CpmovajuPeer::STAMOV;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = CpmovajuPeer::REFPRC;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = CpmovajuPeer::REFCOM;
		}

	} 
	
	public function setRefcau($v)
	{

		if ($this->refcau !== $v) {
			$this->refcau = $v;
			$this->modifiedColumns[] = CpmovajuPeer::REFCAU;
		}

	} 
	
	public function setRefpag($v)
	{

		if ($this->refpag !== $v) {
			$this->refpag = $v;
			$this->modifiedColumns[] = CpmovajuPeer::REFPAG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpmovajuPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refaju = $rs->getString($startcol + 0);

			$this->codpre = $rs->getString($startcol + 1);

			$this->monaju = $rs->getFloat($startcol + 2);

			$this->stamov = $rs->getString($startcol + 3);

			$this->refprc = $rs->getString($startcol + 4);

			$this->refcom = $rs->getString($startcol + 5);

			$this->refcau = $rs->getString($startcol + 6);

			$this->refpag = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpmovaju object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpmovajuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpmovajuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpmovajuPeer::DATABASE_NAME);
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
					$pk = CpmovajuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpmovajuPeer::doUpdate($this, $con);
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


			if (($retval = CpmovajuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovajuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefaju();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMonaju();
				break;
			case 3:
				return $this->getStamov();
				break;
			case 4:
				return $this->getRefprc();
				break;
			case 5:
				return $this->getRefcom();
				break;
			case 6:
				return $this->getRefcau();
				break;
			case 7:
				return $this->getRefpag();
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
		$keys = CpmovajuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefaju(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMonaju(),
			$keys[3] => $this->getStamov(),
			$keys[4] => $this->getRefprc(),
			$keys[5] => $this->getRefcom(),
			$keys[6] => $this->getRefcau(),
			$keys[7] => $this->getRefpag(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovajuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefaju($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMonaju($value);
				break;
			case 3:
				$this->setStamov($value);
				break;
			case 4:
				$this->setRefprc($value);
				break;
			case 5:
				$this->setRefcom($value);
				break;
			case 6:
				$this->setRefcau($value);
				break;
			case 7:
				$this->setRefpag($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpmovajuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefaju($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonaju($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStamov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefcau($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRefpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpmovajuPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpmovajuPeer::REFAJU)) $criteria->add(CpmovajuPeer::REFAJU, $this->refaju);
		if ($this->isColumnModified(CpmovajuPeer::CODPRE)) $criteria->add(CpmovajuPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpmovajuPeer::MONAJU)) $criteria->add(CpmovajuPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CpmovajuPeer::STAMOV)) $criteria->add(CpmovajuPeer::STAMOV, $this->stamov);
		if ($this->isColumnModified(CpmovajuPeer::REFPRC)) $criteria->add(CpmovajuPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(CpmovajuPeer::REFCOM)) $criteria->add(CpmovajuPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(CpmovajuPeer::REFCAU)) $criteria->add(CpmovajuPeer::REFCAU, $this->refcau);
		if ($this->isColumnModified(CpmovajuPeer::REFPAG)) $criteria->add(CpmovajuPeer::REFPAG, $this->refpag);
		if ($this->isColumnModified(CpmovajuPeer::ID)) $criteria->add(CpmovajuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpmovajuPeer::DATABASE_NAME);

		$criteria->add(CpmovajuPeer::ID, $this->id);

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

		$copyObj->setRefaju($this->refaju);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStamov($this->stamov);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setRefcau($this->refcau);

		$copyObj->setRefpag($this->refpag);


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
			self::$peer = new CpmovajuPeer();
		}
		return self::$peer;
	}

} 