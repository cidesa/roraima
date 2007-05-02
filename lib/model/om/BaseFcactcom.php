<?php


abstract class BaseFcactcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $desact;


	
	protected $mintri;


	
	protected $exoner;


	
	protected $minofac;


	
	protected $tipali;


	
	protected $porreb;


	
	protected $exepto;


	
	protected $rebaja;


	
	protected $exento;


	
	protected $tem;


	
	protected $afoact;


	
	protected $anoact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodact()
	{

		return $this->codact;
	}

	
	public function getDesact()
	{

		return $this->desact;
	}

	
	public function getMintri()
	{

		return $this->mintri;
	}

	
	public function getExoner()
	{

		return $this->exoner;
	}

	
	public function getMinofac()
	{

		return $this->minofac;
	}

	
	public function getTipali()
	{

		return $this->tipali;
	}

	
	public function getPorreb()
	{

		return $this->porreb;
	}

	
	public function getExepto()
	{

		return $this->exepto;
	}

	
	public function getRebaja()
	{

		return $this->rebaja;
	}

	
	public function getExento()
	{

		return $this->exento;
	}

	
	public function getTem()
	{

		return $this->tem;
	}

	
	public function getAfoact()
	{

		return $this->afoact;
	}

	
	public function getAnoact()
	{

		return $this->anoact;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = FcactcomPeer::CODACT;
		}

	} 
	
	public function setDesact($v)
	{

		if ($this->desact !== $v) {
			$this->desact = $v;
			$this->modifiedColumns[] = FcactcomPeer::DESACT;
		}

	} 
	
	public function setMintri($v)
	{

		if ($this->mintri !== $v) {
			$this->mintri = $v;
			$this->modifiedColumns[] = FcactcomPeer::MINTRI;
		}

	} 
	
	public function setExoner($v)
	{

		if ($this->exoner !== $v) {
			$this->exoner = $v;
			$this->modifiedColumns[] = FcactcomPeer::EXONER;
		}

	} 
	
	public function setMinofac($v)
	{

		if ($this->minofac !== $v) {
			$this->minofac = $v;
			$this->modifiedColumns[] = FcactcomPeer::MINOFAC;
		}

	} 
	
	public function setTipali($v)
	{

		if ($this->tipali !== $v) {
			$this->tipali = $v;
			$this->modifiedColumns[] = FcactcomPeer::TIPALI;
		}

	} 
	
	public function setPorreb($v)
	{

		if ($this->porreb !== $v) {
			$this->porreb = $v;
			$this->modifiedColumns[] = FcactcomPeer::PORREB;
		}

	} 
	
	public function setExepto($v)
	{

		if ($this->exepto !== $v) {
			$this->exepto = $v;
			$this->modifiedColumns[] = FcactcomPeer::EXEPTO;
		}

	} 
	
	public function setRebaja($v)
	{

		if ($this->rebaja !== $v) {
			$this->rebaja = $v;
			$this->modifiedColumns[] = FcactcomPeer::REBAJA;
		}

	} 
	
	public function setExento($v)
	{

		if ($this->exento !== $v) {
			$this->exento = $v;
			$this->modifiedColumns[] = FcactcomPeer::EXENTO;
		}

	} 
	
	public function setTem($v)
	{

		if ($this->tem !== $v) {
			$this->tem = $v;
			$this->modifiedColumns[] = FcactcomPeer::TEM;
		}

	} 
	
	public function setAfoact($v)
	{

		if ($this->afoact !== $v) {
			$this->afoact = $v;
			$this->modifiedColumns[] = FcactcomPeer::AFOACT;
		}

	} 
	
	public function setAnoact($v)
	{

		if ($this->anoact !== $v) {
			$this->anoact = $v;
			$this->modifiedColumns[] = FcactcomPeer::ANOACT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcactcomPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codact = $rs->getString($startcol + 0);

			$this->desact = $rs->getString($startcol + 1);

			$this->mintri = $rs->getFloat($startcol + 2);

			$this->exoner = $rs->getString($startcol + 3);

			$this->minofac = $rs->getString($startcol + 4);

			$this->tipali = $rs->getString($startcol + 5);

			$this->porreb = $rs->getFloat($startcol + 6);

			$this->exepto = $rs->getString($startcol + 7);

			$this->rebaja = $rs->getString($startcol + 8);

			$this->exento = $rs->getString($startcol + 9);

			$this->tem = $rs->getFloat($startcol + 10);

			$this->afoact = $rs->getFloat($startcol + 11);

			$this->anoact = $rs->getString($startcol + 12);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcactcom object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcactcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcactcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcactcomPeer::DATABASE_NAME);
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
					$pk = FcactcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcactcomPeer::doUpdate($this, $con);
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


			if (($retval = FcactcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcactcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getDesact();
				break;
			case 2:
				return $this->getMintri();
				break;
			case 3:
				return $this->getExoner();
				break;
			case 4:
				return $this->getMinofac();
				break;
			case 5:
				return $this->getTipali();
				break;
			case 6:
				return $this->getPorreb();
				break;
			case 7:
				return $this->getExepto();
				break;
			case 8:
				return $this->getRebaja();
				break;
			case 9:
				return $this->getExento();
				break;
			case 10:
				return $this->getTem();
				break;
			case 11:
				return $this->getAfoact();
				break;
			case 12:
				return $this->getAnoact();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcactcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getDesact(),
			$keys[2] => $this->getMintri(),
			$keys[3] => $this->getExoner(),
			$keys[4] => $this->getMinofac(),
			$keys[5] => $this->getTipali(),
			$keys[6] => $this->getPorreb(),
			$keys[7] => $this->getExepto(),
			$keys[8] => $this->getRebaja(),
			$keys[9] => $this->getExento(),
			$keys[10] => $this->getTem(),
			$keys[11] => $this->getAfoact(),
			$keys[12] => $this->getAnoact(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcactcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setDesact($value);
				break;
			case 2:
				$this->setMintri($value);
				break;
			case 3:
				$this->setExoner($value);
				break;
			case 4:
				$this->setMinofac($value);
				break;
			case 5:
				$this->setTipali($value);
				break;
			case 6:
				$this->setPorreb($value);
				break;
			case 7:
				$this->setExepto($value);
				break;
			case 8:
				$this->setRebaja($value);
				break;
			case 9:
				$this->setExento($value);
				break;
			case 10:
				$this->setTem($value);
				break;
			case 11:
				$this->setAfoact($value);
				break;
			case 12:
				$this->setAnoact($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcactcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMintri($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setExoner($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMinofac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipali($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPorreb($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setExepto($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRebaja($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setExento($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTem($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAfoact($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAnoact($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcactcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcactcomPeer::CODACT)) $criteria->add(FcactcomPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FcactcomPeer::DESACT)) $criteria->add(FcactcomPeer::DESACT, $this->desact);
		if ($this->isColumnModified(FcactcomPeer::MINTRI)) $criteria->add(FcactcomPeer::MINTRI, $this->mintri);
		if ($this->isColumnModified(FcactcomPeer::EXONER)) $criteria->add(FcactcomPeer::EXONER, $this->exoner);
		if ($this->isColumnModified(FcactcomPeer::MINOFAC)) $criteria->add(FcactcomPeer::MINOFAC, $this->minofac);
		if ($this->isColumnModified(FcactcomPeer::TIPALI)) $criteria->add(FcactcomPeer::TIPALI, $this->tipali);
		if ($this->isColumnModified(FcactcomPeer::PORREB)) $criteria->add(FcactcomPeer::PORREB, $this->porreb);
		if ($this->isColumnModified(FcactcomPeer::EXEPTO)) $criteria->add(FcactcomPeer::EXEPTO, $this->exepto);
		if ($this->isColumnModified(FcactcomPeer::REBAJA)) $criteria->add(FcactcomPeer::REBAJA, $this->rebaja);
		if ($this->isColumnModified(FcactcomPeer::EXENTO)) $criteria->add(FcactcomPeer::EXENTO, $this->exento);
		if ($this->isColumnModified(FcactcomPeer::TEM)) $criteria->add(FcactcomPeer::TEM, $this->tem);
		if ($this->isColumnModified(FcactcomPeer::AFOACT)) $criteria->add(FcactcomPeer::AFOACT, $this->afoact);
		if ($this->isColumnModified(FcactcomPeer::ANOACT)) $criteria->add(FcactcomPeer::ANOACT, $this->anoact);
		if ($this->isColumnModified(FcactcomPeer::ID)) $criteria->add(FcactcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcactcomPeer::DATABASE_NAME);

		$criteria->add(FcactcomPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setDesact($this->desact);

		$copyObj->setMintri($this->mintri);

		$copyObj->setExoner($this->exoner);

		$copyObj->setMinofac($this->minofac);

		$copyObj->setTipali($this->tipali);

		$copyObj->setPorreb($this->porreb);

		$copyObj->setExepto($this->exepto);

		$copyObj->setRebaja($this->rebaja);

		$copyObj->setExento($this->exento);

		$copyObj->setTem($this->tem);

		$copyObj->setAfoact($this->afoact);

		$copyObj->setAnoact($this->anoact);


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
			self::$peer = new FcactcomPeer();
		}
		return self::$peer;
	}

} 