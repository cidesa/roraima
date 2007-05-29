<?php


abstract class BaseTabla20 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpag;


	
	protected $codpre;


	
	protected $monimp;


	
	protected $monaju;


	
	protected $staimp;


	
	protected $refere;


	
	protected $refprc;


	
	protected $refcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefpag()
	{

		return $this->refpag; 		
	}
	
	public function getCodpre()
	{

		return $this->codpre; 		
	}
	
	public function getMonimp()
	{

		return number_format($this->monimp,2,',','.');
		
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
	
	public function getRefcom()
	{

		return $this->refcom; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefpag($v)
	{

		if ($this->refpag !== $v) {
			$this->refpag = $v;
			$this->modifiedColumns[] = Tabla20Peer::REFPAG;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = Tabla20Peer::CODPRE;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = Tabla20Peer::MONIMP;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = Tabla20Peer::MONAJU;
		}

	} 
	
	public function setStaimp($v)
	{

		if ($this->staimp !== $v) {
			$this->staimp = $v;
			$this->modifiedColumns[] = Tabla20Peer::STAIMP;
		}

	} 
	
	public function setRefere($v)
	{

		if ($this->refere !== $v) {
			$this->refere = $v;
			$this->modifiedColumns[] = Tabla20Peer::REFERE;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = Tabla20Peer::REFPRC;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = Tabla20Peer::REFCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Tabla20Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refpag = $rs->getString($startcol + 0);

			$this->codpre = $rs->getString($startcol + 1);

			$this->monimp = $rs->getFloat($startcol + 2);

			$this->monaju = $rs->getFloat($startcol + 3);

			$this->staimp = $rs->getString($startcol + 4);

			$this->refere = $rs->getString($startcol + 5);

			$this->refprc = $rs->getString($startcol + 6);

			$this->refcom = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tabla20 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Tabla20Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla20Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla20Peer::DATABASE_NAME);
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
					$pk = Tabla20Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Tabla20Peer::doUpdate($this, $con);
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


			if (($retval = Tabla20Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla20Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpag();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMonimp();
				break;
			case 3:
				return $this->getMonaju();
				break;
			case 4:
				return $this->getStaimp();
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
		$keys = Tabla20Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpag(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMonimp(),
			$keys[3] => $this->getMonaju(),
			$keys[4] => $this->getStaimp(),
			$keys[5] => $this->getRefere(),
			$keys[6] => $this->getRefprc(),
			$keys[7] => $this->getRefcom(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla20Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpag($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMonimp($value);
				break;
			case 3:
				$this->setMonaju($value);
				break;
			case 4:
				$this->setStaimp($value);
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
		$keys = Tabla20Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonimp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStaimp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefere($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefprc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRefcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla20Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla20Peer::REFPAG)) $criteria->add(Tabla20Peer::REFPAG, $this->refpag);
		if ($this->isColumnModified(Tabla20Peer::CODPRE)) $criteria->add(Tabla20Peer::CODPRE, $this->codpre);
		if ($this->isColumnModified(Tabla20Peer::MONIMP)) $criteria->add(Tabla20Peer::MONIMP, $this->monimp);
		if ($this->isColumnModified(Tabla20Peer::MONAJU)) $criteria->add(Tabla20Peer::MONAJU, $this->monaju);
		if ($this->isColumnModified(Tabla20Peer::STAIMP)) $criteria->add(Tabla20Peer::STAIMP, $this->staimp);
		if ($this->isColumnModified(Tabla20Peer::REFERE)) $criteria->add(Tabla20Peer::REFERE, $this->refere);
		if ($this->isColumnModified(Tabla20Peer::REFPRC)) $criteria->add(Tabla20Peer::REFPRC, $this->refprc);
		if ($this->isColumnModified(Tabla20Peer::REFCOM)) $criteria->add(Tabla20Peer::REFCOM, $this->refcom);
		if ($this->isColumnModified(Tabla20Peer::ID)) $criteria->add(Tabla20Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla20Peer::DATABASE_NAME);

		$criteria->add(Tabla20Peer::ID, $this->id);

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

		$copyObj->setRefpag($this->refpag);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStaimp($this->staimp);

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
			self::$peer = new Tabla20Peer();
		}
		return self::$peer;
	}

} 