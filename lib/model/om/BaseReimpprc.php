<?php


abstract class BaseReimpprc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refprc;


	
	protected $codpre;


	
	protected $monimp;


	
	protected $moncom;


	
	protected $moncau;


	
	protected $monpag;


	
	protected $monaju;


	
	protected $staimp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefprc()
	{

		return $this->refprc; 		
	}
	
	public function getCodpre()
	{

		return $this->codpre; 		
	}
	
	public function getMonimp()
	{

		return number_format($this->monimp,2,',','.');
		
	}
	
	public function getMoncom()
	{

		return number_format($this->moncom,2,',','.');
		
	}
	
	public function getMoncau()
	{

		return number_format($this->moncau,2,',','.');
		
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
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = ReimpprcPeer::REFPRC;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = ReimpprcPeer::CODPRE;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = ReimpprcPeer::MONIMP;
		}

	} 
	
	public function setMoncom($v)
	{

		if ($this->moncom !== $v) {
			$this->moncom = $v;
			$this->modifiedColumns[] = ReimpprcPeer::MONCOM;
		}

	} 
	
	public function setMoncau($v)
	{

		if ($this->moncau !== $v) {
			$this->moncau = $v;
			$this->modifiedColumns[] = ReimpprcPeer::MONCAU;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = ReimpprcPeer::MONPAG;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = ReimpprcPeer::MONAJU;
		}

	} 
	
	public function setStaimp($v)
	{

		if ($this->staimp !== $v) {
			$this->staimp = $v;
			$this->modifiedColumns[] = ReimpprcPeer::STAIMP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ReimpprcPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refprc = $rs->getString($startcol + 0);

			$this->codpre = $rs->getString($startcol + 1);

			$this->monimp = $rs->getFloat($startcol + 2);

			$this->moncom = $rs->getFloat($startcol + 3);

			$this->moncau = $rs->getFloat($startcol + 4);

			$this->monpag = $rs->getFloat($startcol + 5);

			$this->monaju = $rs->getFloat($startcol + 6);

			$this->staimp = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Reimpprc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ReimpprcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ReimpprcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ReimpprcPeer::DATABASE_NAME);
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
					$pk = ReimpprcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ReimpprcPeer::doUpdate($this, $con);
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


			if (($retval = ReimpprcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ReimpprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefprc();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMonimp();
				break;
			case 3:
				return $this->getMoncom();
				break;
			case 4:
				return $this->getMoncau();
				break;
			case 5:
				return $this->getMonpag();
				break;
			case 6:
				return $this->getMonaju();
				break;
			case 7:
				return $this->getStaimp();
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
		$keys = ReimpprcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefprc(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMonimp(),
			$keys[3] => $this->getMoncom(),
			$keys[4] => $this->getMoncau(),
			$keys[5] => $this->getMonpag(),
			$keys[6] => $this->getMonaju(),
			$keys[7] => $this->getStaimp(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ReimpprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefprc($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMonimp($value);
				break;
			case 3:
				$this->setMoncom($value);
				break;
			case 4:
				$this->setMoncau($value);
				break;
			case 5:
				$this->setMonpag($value);
				break;
			case 6:
				$this->setMonaju($value);
				break;
			case 7:
				$this->setStaimp($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ReimpprcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefprc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonimp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMoncau($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonpag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonaju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaimp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ReimpprcPeer::DATABASE_NAME);

		if ($this->isColumnModified(ReimpprcPeer::REFPRC)) $criteria->add(ReimpprcPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(ReimpprcPeer::CODPRE)) $criteria->add(ReimpprcPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(ReimpprcPeer::MONIMP)) $criteria->add(ReimpprcPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(ReimpprcPeer::MONCOM)) $criteria->add(ReimpprcPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(ReimpprcPeer::MONCAU)) $criteria->add(ReimpprcPeer::MONCAU, $this->moncau);
		if ($this->isColumnModified(ReimpprcPeer::MONPAG)) $criteria->add(ReimpprcPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(ReimpprcPeer::MONAJU)) $criteria->add(ReimpprcPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(ReimpprcPeer::STAIMP)) $criteria->add(ReimpprcPeer::STAIMP, $this->staimp);
		if ($this->isColumnModified(ReimpprcPeer::ID)) $criteria->add(ReimpprcPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ReimpprcPeer::DATABASE_NAME);

		$criteria->add(ReimpprcPeer::ID, $this->id);

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

		$copyObj->setRefprc($this->refprc);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStaimp($this->staimp);


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
			self::$peer = new ReimpprcPeer();
		}
		return self::$peer;
	}

} 