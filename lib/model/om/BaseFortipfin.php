<?php


abstract class BaseFortipfin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codfin;


	
	protected $nomext;


	
	protected $nomabr;


	
	protected $apofis;


	
	protected $tipfin;


	
	protected $montoing;


	
	protected $montodis;


	
	protected $montodisaux;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodfin()
	{

		return $this->codfin;
	}

	
	public function getNomext()
	{

		return $this->nomext;
	}

	
	public function getNomabr()
	{

		return $this->nomabr;
	}

	
	public function getApofis()
	{

		return $this->apofis;
	}

	
	public function getTipfin()
	{

		return $this->tipfin;
	}

	
	public function getMontoing()
	{

		return $this->montoing;
	}

	
	public function getMontodis()
	{

		return $this->montodis;
	}

	
	public function getMontodisaux()
	{

		return $this->montodisaux;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodfin($v)
	{

		if ($this->codfin !== $v) {
			$this->codfin = $v;
			$this->modifiedColumns[] = FortipfinPeer::CODFIN;
		}

	} 
	
	public function setNomext($v)
	{

		if ($this->nomext !== $v) {
			$this->nomext = $v;
			$this->modifiedColumns[] = FortipfinPeer::NOMEXT;
		}

	} 
	
	public function setNomabr($v)
	{

		if ($this->nomabr !== $v) {
			$this->nomabr = $v;
			$this->modifiedColumns[] = FortipfinPeer::NOMABR;
		}

	} 
	
	public function setApofis($v)
	{

		if ($this->apofis !== $v) {
			$this->apofis = $v;
			$this->modifiedColumns[] = FortipfinPeer::APOFIS;
		}

	} 
	
	public function setTipfin($v)
	{

		if ($this->tipfin !== $v) {
			$this->tipfin = $v;
			$this->modifiedColumns[] = FortipfinPeer::TIPFIN;
		}

	} 
	
	public function setMontoing($v)
	{

		if ($this->montoing !== $v) {
			$this->montoing = $v;
			$this->modifiedColumns[] = FortipfinPeer::MONTOING;
		}

	} 
	
	public function setMontodis($v)
	{

		if ($this->montodis !== $v) {
			$this->montodis = $v;
			$this->modifiedColumns[] = FortipfinPeer::MONTODIS;
		}

	} 
	
	public function setMontodisaux($v)
	{

		if ($this->montodisaux !== $v) {
			$this->montodisaux = $v;
			$this->modifiedColumns[] = FortipfinPeer::MONTODISAUX;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FortipfinPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codfin = $rs->getString($startcol + 0);

			$this->nomext = $rs->getString($startcol + 1);

			$this->nomabr = $rs->getString($startcol + 2);

			$this->apofis = $rs->getString($startcol + 3);

			$this->tipfin = $rs->getString($startcol + 4);

			$this->montoing = $rs->getFloat($startcol + 5);

			$this->montodis = $rs->getFloat($startcol + 6);

			$this->montodisaux = $rs->getFloat($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fortipfin object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FortipfinPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FortipfinPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FortipfinPeer::DATABASE_NAME);
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
					$pk = FortipfinPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FortipfinPeer::doUpdate($this, $con);
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


			if (($retval = FortipfinPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FortipfinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodfin();
				break;
			case 1:
				return $this->getNomext();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getApofis();
				break;
			case 4:
				return $this->getTipfin();
				break;
			case 5:
				return $this->getMontoing();
				break;
			case 6:
				return $this->getMontodis();
				break;
			case 7:
				return $this->getMontodisaux();
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
		$keys = FortipfinPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodfin(),
			$keys[1] => $this->getNomext(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getApofis(),
			$keys[4] => $this->getTipfin(),
			$keys[5] => $this->getMontoing(),
			$keys[6] => $this->getMontodis(),
			$keys[7] => $this->getMontodisaux(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FortipfinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodfin($value);
				break;
			case 1:
				$this->setNomext($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setApofis($value);
				break;
			case 4:
				$this->setTipfin($value);
				break;
			case 5:
				$this->setMontoing($value);
				break;
			case 6:
				$this->setMontodis($value);
				break;
			case 7:
				$this->setMontodisaux($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FortipfinPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodfin($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomext($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setApofis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontoing($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMontodis($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMontodisaux($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FortipfinPeer::DATABASE_NAME);

		if ($this->isColumnModified(FortipfinPeer::CODFIN)) $criteria->add(FortipfinPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(FortipfinPeer::NOMEXT)) $criteria->add(FortipfinPeer::NOMEXT, $this->nomext);
		if ($this->isColumnModified(FortipfinPeer::NOMABR)) $criteria->add(FortipfinPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(FortipfinPeer::APOFIS)) $criteria->add(FortipfinPeer::APOFIS, $this->apofis);
		if ($this->isColumnModified(FortipfinPeer::TIPFIN)) $criteria->add(FortipfinPeer::TIPFIN, $this->tipfin);
		if ($this->isColumnModified(FortipfinPeer::MONTOING)) $criteria->add(FortipfinPeer::MONTOING, $this->montoing);
		if ($this->isColumnModified(FortipfinPeer::MONTODIS)) $criteria->add(FortipfinPeer::MONTODIS, $this->montodis);
		if ($this->isColumnModified(FortipfinPeer::MONTODISAUX)) $criteria->add(FortipfinPeer::MONTODISAUX, $this->montodisaux);
		if ($this->isColumnModified(FortipfinPeer::ID)) $criteria->add(FortipfinPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FortipfinPeer::DATABASE_NAME);

		$criteria->add(FortipfinPeer::ID, $this->id);

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

		$copyObj->setCodfin($this->codfin);

		$copyObj->setNomext($this->nomext);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setApofis($this->apofis);

		$copyObj->setTipfin($this->tipfin);

		$copyObj->setMontoing($this->montoing);

		$copyObj->setMontodis($this->montodis);

		$copyObj->setMontodisaux($this->montodisaux);


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
			self::$peer = new FortipfinPeer();
		}
		return self::$peer;
	}

} 