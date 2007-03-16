<?php


abstract class BaseCpdocpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tippag;


	
	protected $nomext;


	
	protected $nomabr;


	
	protected $refier;


	
	protected $afeprc;


	
	protected $afecom;


	
	protected $afecau;


	
	protected $afepag;


	
	protected $afedis;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getTippag()
	{

		return $this->tippag;
	}

	
	public function getNomext()
	{

		return $this->nomext;
	}

	
	public function getNomabr()
	{

		return $this->nomabr;
	}

	
	public function getRefier()
	{

		return $this->refier;
	}

	
	public function getAfeprc()
	{

		return $this->afeprc;
	}

	
	public function getAfecom()
	{

		return $this->afecom;
	}

	
	public function getAfecau()
	{

		return $this->afecau;
	}

	
	public function getAfepag()
	{

		return $this->afepag;
	}

	
	public function getAfedis()
	{

		return $this->afedis;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setTippag($v)
	{

		if ($this->tippag !== $v) {
			$this->tippag = $v;
			$this->modifiedColumns[] = CpdocpagPeer::TIPPAG;
		}

	} 
	
	public function setNomext($v)
	{

		if ($this->nomext !== $v) {
			$this->nomext = $v;
			$this->modifiedColumns[] = CpdocpagPeer::NOMEXT;
		}

	} 
	
	public function setNomabr($v)
	{

		if ($this->nomabr !== $v) {
			$this->nomabr = $v;
			$this->modifiedColumns[] = CpdocpagPeer::NOMABR;
		}

	} 
	
	public function setRefier($v)
	{

		if ($this->refier !== $v) {
			$this->refier = $v;
			$this->modifiedColumns[] = CpdocpagPeer::REFIER;
		}

	} 
	
	public function setAfeprc($v)
	{

		if ($this->afeprc !== $v) {
			$this->afeprc = $v;
			$this->modifiedColumns[] = CpdocpagPeer::AFEPRC;
		}

	} 
	
	public function setAfecom($v)
	{

		if ($this->afecom !== $v) {
			$this->afecom = $v;
			$this->modifiedColumns[] = CpdocpagPeer::AFECOM;
		}

	} 
	
	public function setAfecau($v)
	{

		if ($this->afecau !== $v) {
			$this->afecau = $v;
			$this->modifiedColumns[] = CpdocpagPeer::AFECAU;
		}

	} 
	
	public function setAfepag($v)
	{

		if ($this->afepag !== $v) {
			$this->afepag = $v;
			$this->modifiedColumns[] = CpdocpagPeer::AFEPAG;
		}

	} 
	
	public function setAfedis($v)
	{

		if ($this->afedis !== $v) {
			$this->afedis = $v;
			$this->modifiedColumns[] = CpdocpagPeer::AFEDIS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpdocpagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->tippag = $rs->getString($startcol + 0);

			$this->nomext = $rs->getString($startcol + 1);

			$this->nomabr = $rs->getString($startcol + 2);

			$this->refier = $rs->getString($startcol + 3);

			$this->afeprc = $rs->getString($startcol + 4);

			$this->afecom = $rs->getString($startcol + 5);

			$this->afecau = $rs->getString($startcol + 6);

			$this->afepag = $rs->getString($startcol + 7);

			$this->afedis = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpdocpag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpdocpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdocpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdocpagPeer::DATABASE_NAME);
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
					$pk = CpdocpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpdocpagPeer::doUpdate($this, $con);
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


			if (($retval = CpdocpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdocpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTippag();
				break;
			case 1:
				return $this->getNomext();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getRefier();
				break;
			case 4:
				return $this->getAfeprc();
				break;
			case 5:
				return $this->getAfecom();
				break;
			case 6:
				return $this->getAfecau();
				break;
			case 7:
				return $this->getAfepag();
				break;
			case 8:
				return $this->getAfedis();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdocpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTippag(),
			$keys[1] => $this->getNomext(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getRefier(),
			$keys[4] => $this->getAfeprc(),
			$keys[5] => $this->getAfecom(),
			$keys[6] => $this->getAfecau(),
			$keys[7] => $this->getAfepag(),
			$keys[8] => $this->getAfedis(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdocpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTippag($value);
				break;
			case 1:
				$this->setNomext($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setRefier($value);
				break;
			case 4:
				$this->setAfeprc($value);
				break;
			case 5:
				$this->setAfecom($value);
				break;
			case 6:
				$this->setAfecau($value);
				break;
			case 7:
				$this->setAfepag($value);
				break;
			case 8:
				$this->setAfedis($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdocpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTippag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomext($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefier($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAfeprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAfecom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAfecau($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAfepag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAfedis($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdocpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdocpagPeer::TIPPAG)) $criteria->add(CpdocpagPeer::TIPPAG, $this->tippag);
		if ($this->isColumnModified(CpdocpagPeer::NOMEXT)) $criteria->add(CpdocpagPeer::NOMEXT, $this->nomext);
		if ($this->isColumnModified(CpdocpagPeer::NOMABR)) $criteria->add(CpdocpagPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CpdocpagPeer::REFIER)) $criteria->add(CpdocpagPeer::REFIER, $this->refier);
		if ($this->isColumnModified(CpdocpagPeer::AFEPRC)) $criteria->add(CpdocpagPeer::AFEPRC, $this->afeprc);
		if ($this->isColumnModified(CpdocpagPeer::AFECOM)) $criteria->add(CpdocpagPeer::AFECOM, $this->afecom);
		if ($this->isColumnModified(CpdocpagPeer::AFECAU)) $criteria->add(CpdocpagPeer::AFECAU, $this->afecau);
		if ($this->isColumnModified(CpdocpagPeer::AFEPAG)) $criteria->add(CpdocpagPeer::AFEPAG, $this->afepag);
		if ($this->isColumnModified(CpdocpagPeer::AFEDIS)) $criteria->add(CpdocpagPeer::AFEDIS, $this->afedis);
		if ($this->isColumnModified(CpdocpagPeer::ID)) $criteria->add(CpdocpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdocpagPeer::DATABASE_NAME);

		$criteria->add(CpdocpagPeer::ID, $this->id);

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

		$copyObj->setTippag($this->tippag);

		$copyObj->setNomext($this->nomext);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setRefier($this->refier);

		$copyObj->setAfeprc($this->afeprc);

		$copyObj->setAfecom($this->afecom);

		$copyObj->setAfecau($this->afecau);

		$copyObj->setAfepag($this->afepag);

		$copyObj->setAfedis($this->afedis);


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
			self::$peer = new CpdocpagPeer();
		}
		return self::$peer;
	}

} 