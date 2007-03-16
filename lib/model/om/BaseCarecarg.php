<?php


abstract class BaseCarecarg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrgo;


	
	protected $nomrgo;


	
	protected $codpre;


	
	protected $tiprgo;


	
	protected $monrgo;


	
	protected $calcul;


	
	protected $codcta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodrgo()
	{

		return $this->codrgo;
	}

	
	public function getNomrgo()
	{

		return $this->nomrgo;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getTiprgo()
	{

		return $this->tiprgo;
	}

	
	public function getMonrgo()
	{

		return $this->monrgo;
	}

	
	public function getCalcul()
	{

		return $this->calcul;
	}

	
	public function getCodcta()
	{

		return $this->codcta;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodrgo($v)
	{

		if ($this->codrgo !== $v) {
			$this->codrgo = $v;
			$this->modifiedColumns[] = CarecargPeer::CODRGO;
		}

	} 
	
	public function setNomrgo($v)
	{

		if ($this->nomrgo !== $v) {
			$this->nomrgo = $v;
			$this->modifiedColumns[] = CarecargPeer::NOMRGO;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CarecargPeer::CODPRE;
		}

	} 
	
	public function setTiprgo($v)
	{

		if ($this->tiprgo !== $v) {
			$this->tiprgo = $v;
			$this->modifiedColumns[] = CarecargPeer::TIPRGO;
		}

	} 
	
	public function setMonrgo($v)
	{

		if ($this->monrgo !== $v) {
			$this->monrgo = $v;
			$this->modifiedColumns[] = CarecargPeer::MONRGO;
		}

	} 
	
	public function setCalcul($v)
	{

		if ($this->calcul !== $v) {
			$this->calcul = $v;
			$this->modifiedColumns[] = CarecargPeer::CALCUL;
		}

	} 
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = CarecargPeer::CODCTA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CarecargPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codrgo = $rs->getString($startcol + 0);

			$this->nomrgo = $rs->getString($startcol + 1);

			$this->codpre = $rs->getString($startcol + 2);

			$this->tiprgo = $rs->getString($startcol + 3);

			$this->monrgo = $rs->getFloat($startcol + 4);

			$this->calcul = $rs->getString($startcol + 5);

			$this->codcta = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Carecarg object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CarecargPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CarecargPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CarecargPeer::DATABASE_NAME);
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
					$pk = CarecargPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CarecargPeer::doUpdate($this, $con);
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


			if (($retval = CarecargPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarecargPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrgo();
				break;
			case 1:
				return $this->getNomrgo();
				break;
			case 2:
				return $this->getCodpre();
				break;
			case 3:
				return $this->getTiprgo();
				break;
			case 4:
				return $this->getMonrgo();
				break;
			case 5:
				return $this->getCalcul();
				break;
			case 6:
				return $this->getCodcta();
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
		$keys = CarecargPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrgo(),
			$keys[1] => $this->getNomrgo(),
			$keys[2] => $this->getCodpre(),
			$keys[3] => $this->getTiprgo(),
			$keys[4] => $this->getMonrgo(),
			$keys[5] => $this->getCalcul(),
			$keys[6] => $this->getCodcta(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarecargPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrgo($value);
				break;
			case 1:
				$this->setNomrgo($value);
				break;
			case 2:
				$this->setCodpre($value);
				break;
			case 3:
				$this->setTiprgo($value);
				break;
			case 4:
				$this->setMonrgo($value);
				break;
			case 5:
				$this->setCalcul($value);
				break;
			case 6:
				$this->setCodcta($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarecargPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrgo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomrgo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTiprgo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrgo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCalcul($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcta($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CarecargPeer::DATABASE_NAME);

		if ($this->isColumnModified(CarecargPeer::CODRGO)) $criteria->add(CarecargPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(CarecargPeer::NOMRGO)) $criteria->add(CarecargPeer::NOMRGO, $this->nomrgo);
		if ($this->isColumnModified(CarecargPeer::CODPRE)) $criteria->add(CarecargPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CarecargPeer::TIPRGO)) $criteria->add(CarecargPeer::TIPRGO, $this->tiprgo);
		if ($this->isColumnModified(CarecargPeer::MONRGO)) $criteria->add(CarecargPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(CarecargPeer::CALCUL)) $criteria->add(CarecargPeer::CALCUL, $this->calcul);
		if ($this->isColumnModified(CarecargPeer::CODCTA)) $criteria->add(CarecargPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CarecargPeer::ID)) $criteria->add(CarecargPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CarecargPeer::DATABASE_NAME);

		$criteria->add(CarecargPeer::ID, $this->id);

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

		$copyObj->setCodrgo($this->codrgo);

		$copyObj->setNomrgo($this->nomrgo);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setTiprgo($this->tiprgo);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setCalcul($this->calcul);

		$copyObj->setCodcta($this->codcta);


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
			self::$peer = new CarecargPeer();
		}
		return self::$peer;
	}

} 