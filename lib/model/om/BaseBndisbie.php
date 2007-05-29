<?php


abstract class BaseBndisbie extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddis;


	
	protected $desdis;


	
	protected $afecon;


	
	protected $stadis;


	
	protected $desinc;


	
	protected $adimej;


	
	protected $viduti;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoddis()
	{

		return $this->coddis; 		
	}
	
	public function getDesdis()
	{

		return $this->desdis; 		
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
	
	public function getViduti()
	{

		return $this->viduti; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCoddis($v)
	{

		if ($this->coddis !== $v) {
			$this->coddis = $v;
			$this->modifiedColumns[] = BndisbiePeer::CODDIS;
		}

	} 
	
	public function setDesdis($v)
	{

		if ($this->desdis !== $v) {
			$this->desdis = $v;
			$this->modifiedColumns[] = BndisbiePeer::DESDIS;
		}

	} 
	
	public function setAfecon($v)
	{

		if ($this->afecon !== $v) {
			$this->afecon = $v;
			$this->modifiedColumns[] = BndisbiePeer::AFECON;
		}

	} 
	
	public function setStadis($v)
	{

		if ($this->stadis !== $v) {
			$this->stadis = $v;
			$this->modifiedColumns[] = BndisbiePeer::STADIS;
		}

	} 
	
	public function setDesinc($v)
	{

		if ($this->desinc !== $v) {
			$this->desinc = $v;
			$this->modifiedColumns[] = BndisbiePeer::DESINC;
		}

	} 
	
	public function setAdimej($v)
	{

		if ($this->adimej !== $v) {
			$this->adimej = $v;
			$this->modifiedColumns[] = BndisbiePeer::ADIMEJ;
		}

	} 
	
	public function setViduti($v)
	{

		if ($this->viduti !== $v) {
			$this->viduti = $v;
			$this->modifiedColumns[] = BndisbiePeer::VIDUTI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BndisbiePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coddis = $rs->getString($startcol + 0);

			$this->desdis = $rs->getString($startcol + 1);

			$this->afecon = $rs->getString($startcol + 2);

			$this->stadis = $rs->getString($startcol + 3);

			$this->desinc = $rs->getString($startcol + 4);

			$this->adimej = $rs->getString($startcol + 5);

			$this->viduti = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bndisbie object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BndisbiePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndisbiePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndisbiePeer::DATABASE_NAME);
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
					$pk = BndisbiePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BndisbiePeer::doUpdate($this, $con);
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


			if (($retval = BndisbiePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndisbiePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddis();
				break;
			case 1:
				return $this->getDesdis();
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
				return $this->getViduti();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndisbiePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddis(),
			$keys[1] => $this->getDesdis(),
			$keys[2] => $this->getAfecon(),
			$keys[3] => $this->getStadis(),
			$keys[4] => $this->getDesinc(),
			$keys[5] => $this->getAdimej(),
			$keys[6] => $this->getViduti(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndisbiePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddis($value);
				break;
			case 1:
				$this->setDesdis($value);
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
				$this->setViduti($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndisbiePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddis($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdis($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAfecon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStadis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesinc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdimej($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setViduti($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndisbiePeer::DATABASE_NAME);

		if ($this->isColumnModified(BndisbiePeer::CODDIS)) $criteria->add(BndisbiePeer::CODDIS, $this->coddis);
		if ($this->isColumnModified(BndisbiePeer::DESDIS)) $criteria->add(BndisbiePeer::DESDIS, $this->desdis);
		if ($this->isColumnModified(BndisbiePeer::AFECON)) $criteria->add(BndisbiePeer::AFECON, $this->afecon);
		if ($this->isColumnModified(BndisbiePeer::STADIS)) $criteria->add(BndisbiePeer::STADIS, $this->stadis);
		if ($this->isColumnModified(BndisbiePeer::DESINC)) $criteria->add(BndisbiePeer::DESINC, $this->desinc);
		if ($this->isColumnModified(BndisbiePeer::ADIMEJ)) $criteria->add(BndisbiePeer::ADIMEJ, $this->adimej);
		if ($this->isColumnModified(BndisbiePeer::VIDUTI)) $criteria->add(BndisbiePeer::VIDUTI, $this->viduti);
		if ($this->isColumnModified(BndisbiePeer::ID)) $criteria->add(BndisbiePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndisbiePeer::DATABASE_NAME);

		$criteria->add(BndisbiePeer::ID, $this->id);

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

		$copyObj->setCoddis($this->coddis);

		$copyObj->setDesdis($this->desdis);

		$copyObj->setAfecon($this->afecon);

		$copyObj->setStadis($this->stadis);

		$copyObj->setDesinc($this->desinc);

		$copyObj->setAdimej($this->adimej);

		$copyObj->setViduti($this->viduti);


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
			self::$peer = new BndisbiePeer();
		}
		return self::$peer;
	}

} 