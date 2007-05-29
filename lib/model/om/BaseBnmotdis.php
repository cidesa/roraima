<?php


abstract class BaseBnmotdis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmot;


	
	protected $desmot;


	
	protected $afecon;


	
	protected $stadis;


	
	protected $desinc;


	
	protected $adimej;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmot()
	{

		return $this->codmot; 		
	}
	
	public function getDesmot()
	{

		return $this->desmot; 		
	}
	
	public function getAfecon()
	{

		return $this->afecon; 		
	}
	
	public function getStadis()
	{

		return $this->stadis; 		
	}
	
	public function getDesinc()
	{

		return $this->desinc; 		
	}
	
	public function getAdimej()
	{

		return $this->adimej; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmot($v)
	{

		if ($this->codmot !== $v) {
			$this->codmot = $v;
			$this->modifiedColumns[] = BnmotdisPeer::CODMOT;
		}

	} 
	
	public function setDesmot($v)
	{

		if ($this->desmot !== $v) {
			$this->desmot = $v;
			$this->modifiedColumns[] = BnmotdisPeer::DESMOT;
		}

	} 
	
	public function setAfecon($v)
	{

		if ($this->afecon !== $v) {
			$this->afecon = $v;
			$this->modifiedColumns[] = BnmotdisPeer::AFECON;
		}

	} 
	
	public function setStadis($v)
	{

		if ($this->stadis !== $v) {
			$this->stadis = $v;
			$this->modifiedColumns[] = BnmotdisPeer::STADIS;
		}

	} 
	
	public function setDesinc($v)
	{

		if ($this->desinc !== $v) {
			$this->desinc = $v;
			$this->modifiedColumns[] = BnmotdisPeer::DESINC;
		}

	} 
	
	public function setAdimej($v)
	{

		if ($this->adimej !== $v) {
			$this->adimej = $v;
			$this->modifiedColumns[] = BnmotdisPeer::ADIMEJ;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BnmotdisPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmot = $rs->getString($startcol + 0);

			$this->desmot = $rs->getString($startcol + 1);

			$this->afecon = $rs->getString($startcol + 2);

			$this->stadis = $rs->getString($startcol + 3);

			$this->desinc = $rs->getString($startcol + 4);

			$this->adimej = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bnmotdis object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BnmotdisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnmotdisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnmotdisPeer::DATABASE_NAME);
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
					$pk = BnmotdisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BnmotdisPeer::doUpdate($this, $con);
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


			if (($retval = BnmotdisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnmotdisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmot();
				break;
			case 1:
				return $this->getDesmot();
				break;
			case 2:
				return $this->getAfecon();
				break;
			case 3:
				return $this->getStadis();
				break;
			case 4:
				return $this->getDesinc();
				break;
			case 5:
				return $this->getAdimej();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnmotdisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmot(),
			$keys[1] => $this->getDesmot(),
			$keys[2] => $this->getAfecon(),
			$keys[3] => $this->getStadis(),
			$keys[4] => $this->getDesinc(),
			$keys[5] => $this->getAdimej(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnmotdisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmot($value);
				break;
			case 1:
				$this->setDesmot($value);
				break;
			case 2:
				$this->setAfecon($value);
				break;
			case 3:
				$this->setStadis($value);
				break;
			case 4:
				$this->setDesinc($value);
				break;
			case 5:
				$this->setAdimej($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnmotdisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesmot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAfecon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStadis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesinc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdimej($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnmotdisPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnmotdisPeer::CODMOT)) $criteria->add(BnmotdisPeer::CODMOT, $this->codmot);
		if ($this->isColumnModified(BnmotdisPeer::DESMOT)) $criteria->add(BnmotdisPeer::DESMOT, $this->desmot);
		if ($this->isColumnModified(BnmotdisPeer::AFECON)) $criteria->add(BnmotdisPeer::AFECON, $this->afecon);
		if ($this->isColumnModified(BnmotdisPeer::STADIS)) $criteria->add(BnmotdisPeer::STADIS, $this->stadis);
		if ($this->isColumnModified(BnmotdisPeer::DESINC)) $criteria->add(BnmotdisPeer::DESINC, $this->desinc);
		if ($this->isColumnModified(BnmotdisPeer::ADIMEJ)) $criteria->add(BnmotdisPeer::ADIMEJ, $this->adimej);
		if ($this->isColumnModified(BnmotdisPeer::ID)) $criteria->add(BnmotdisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnmotdisPeer::DATABASE_NAME);

		$criteria->add(BnmotdisPeer::ID, $this->id);

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

		$copyObj->setCodmot($this->codmot);

		$copyObj->setDesmot($this->desmot);

		$copyObj->setAfecon($this->afecon);

		$copyObj->setStadis($this->stadis);

		$copyObj->setDesinc($this->desinc);

		$copyObj->setAdimej($this->adimej);


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
			self::$peer = new BnmotdisPeer();
		}
		return self::$peer;
	}

} 