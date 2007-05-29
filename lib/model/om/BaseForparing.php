<?php


abstract class BaseForparing extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codparing;


	
	protected $montoing;


	
	protected $codtipfin;


	
	protected $observ;


	
	protected $montodis;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodparing()
	{

		return $this->codparing; 		
	}
	
	public function getMontoing()
	{

		return number_format($this->montoing,2,',','.');
		
	}
	
	public function getCodtipfin()
	{

		return $this->codtipfin; 		
	}
	
	public function getObserv()
	{

		return $this->observ; 		
	}
	
	public function getMontodis()
	{

		return number_format($this->montodis,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodparing($v)
	{

		if ($this->codparing !== $v) {
			$this->codparing = $v;
			$this->modifiedColumns[] = ForparingPeer::CODPARING;
		}

	} 
	
	public function setMontoing($v)
	{

		if ($this->montoing !== $v) {
			$this->montoing = $v;
			$this->modifiedColumns[] = ForparingPeer::MONTOING;
		}

	} 
	
	public function setCodtipfin($v)
	{

		if ($this->codtipfin !== $v) {
			$this->codtipfin = $v;
			$this->modifiedColumns[] = ForparingPeer::CODTIPFIN;
		}

	} 
	
	public function setObserv($v)
	{

		if ($this->observ !== $v) {
			$this->observ = $v;
			$this->modifiedColumns[] = ForparingPeer::OBSERV;
		}

	} 
	
	public function setMontodis($v)
	{

		if ($this->montodis !== $v) {
			$this->montodis = $v;
			$this->modifiedColumns[] = ForparingPeer::MONTODIS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForparingPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codparing = $rs->getString($startcol + 0);

			$this->montoing = $rs->getFloat($startcol + 1);

			$this->codtipfin = $rs->getString($startcol + 2);

			$this->observ = $rs->getString($startcol + 3);

			$this->montodis = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forparing object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForparingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForparingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForparingPeer::DATABASE_NAME);
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
					$pk = ForparingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForparingPeer::doUpdate($this, $con);
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


			if (($retval = ForparingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForparingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodparing();
				break;
			case 1:
				return $this->getMontoing();
				break;
			case 2:
				return $this->getCodtipfin();
				break;
			case 3:
				return $this->getObserv();
				break;
			case 4:
				return $this->getMontodis();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForparingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodparing(),
			$keys[1] => $this->getMontoing(),
			$keys[2] => $this->getCodtipfin(),
			$keys[3] => $this->getObserv(),
			$keys[4] => $this->getMontodis(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForparingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodparing($value);
				break;
			case 1:
				$this->setMontoing($value);
				break;
			case 2:
				$this->setCodtipfin($value);
				break;
			case 3:
				$this->setObserv($value);
				break;
			case 4:
				$this->setMontodis($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForparingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodparing($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMontoing($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtipfin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObserv($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMontodis($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForparingPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForparingPeer::CODPARING)) $criteria->add(ForparingPeer::CODPARING, $this->codparing);
		if ($this->isColumnModified(ForparingPeer::MONTOING)) $criteria->add(ForparingPeer::MONTOING, $this->montoing);
		if ($this->isColumnModified(ForparingPeer::CODTIPFIN)) $criteria->add(ForparingPeer::CODTIPFIN, $this->codtipfin);
		if ($this->isColumnModified(ForparingPeer::OBSERV)) $criteria->add(ForparingPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(ForparingPeer::MONTODIS)) $criteria->add(ForparingPeer::MONTODIS, $this->montodis);
		if ($this->isColumnModified(ForparingPeer::ID)) $criteria->add(ForparingPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForparingPeer::DATABASE_NAME);

		$criteria->add(ForparingPeer::ID, $this->id);

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

		$copyObj->setCodparing($this->codparing);

		$copyObj->setMontoing($this->montoing);

		$copyObj->setCodtipfin($this->codtipfin);

		$copyObj->setObserv($this->observ);

		$copyObj->setMontodis($this->montodis);


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
			self::$peer = new ForparingPeer();
		}
		return self::$peer;
	}

} 