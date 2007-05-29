<?php


abstract class BaseFormetotrcre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmet;


	
	protected $codpro;


	
	protected $codact;


	
	protected $canact;


	
	protected $codparegr;


	
	protected $monpre;


	
	protected $codorg;


	
	protected $codtip;


	
	protected $observ;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmet()
	{

		return $this->codmet; 		
	}
	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getCodact()
	{

		return $this->codact; 		
	}
	
	public function getCanact()
	{

		return number_format($this->canact,2,',','.');
		
	}
	
	public function getCodparegr()
	{

		return $this->codparegr; 		
	}
	
	public function getMonpre()
	{

		return number_format($this->monpre,2,',','.');
		
	}
	
	public function getCodorg()
	{

		return $this->codorg; 		
	}
	
	public function getCodtip()
	{

		return $this->codtip; 		
	}
	
	public function getObserv()
	{

		return $this->observ; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmet($v)
	{

		if ($this->codmet !== $v) {
			$this->codmet = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::CODMET;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::CODPRO;
		}

	} 
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::CODACT;
		}

	} 
	
	public function setCanact($v)
	{

		if ($this->canact !== $v) {
			$this->canact = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::CANACT;
		}

	} 
	
	public function setCodparegr($v)
	{

		if ($this->codparegr !== $v) {
			$this->codparegr = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::CODPAREGR;
		}

	} 
	
	public function setMonpre($v)
	{

		if ($this->monpre !== $v) {
			$this->monpre = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::MONPRE;
		}

	} 
	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::CODORG;
		}

	} 
	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::CODTIP;
		}

	} 
	
	public function setObserv($v)
	{

		if ($this->observ !== $v) {
			$this->observ = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::OBSERV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FormetotrcrePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmet = $rs->getString($startcol + 0);

			$this->codpro = $rs->getString($startcol + 1);

			$this->codact = $rs->getString($startcol + 2);

			$this->canact = $rs->getFloat($startcol + 3);

			$this->codparegr = $rs->getString($startcol + 4);

			$this->monpre = $rs->getFloat($startcol + 5);

			$this->codorg = $rs->getString($startcol + 6);

			$this->codtip = $rs->getString($startcol + 7);

			$this->observ = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Formetotrcre object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FormetotrcrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FormetotrcrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FormetotrcrePeer::DATABASE_NAME);
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
					$pk = FormetotrcrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FormetotrcrePeer::doUpdate($this, $con);
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


			if (($retval = FormetotrcrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FormetotrcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmet();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getCodact();
				break;
			case 3:
				return $this->getCanact();
				break;
			case 4:
				return $this->getCodparegr();
				break;
			case 5:
				return $this->getMonpre();
				break;
			case 6:
				return $this->getCodorg();
				break;
			case 7:
				return $this->getCodtip();
				break;
			case 8:
				return $this->getObserv();
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
		$keys = FormetotrcrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmet(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getCodact(),
			$keys[3] => $this->getCanact(),
			$keys[4] => $this->getCodparegr(),
			$keys[5] => $this->getMonpre(),
			$keys[6] => $this->getCodorg(),
			$keys[7] => $this->getCodtip(),
			$keys[8] => $this->getObserv(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FormetotrcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmet($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setCodact($value);
				break;
			case 3:
				$this->setCanact($value);
				break;
			case 4:
				$this->setCodparegr($value);
				break;
			case 5:
				$this->setMonpre($value);
				break;
			case 6:
				$this->setCodorg($value);
				break;
			case 7:
				$this->setCodtip($value);
				break;
			case 8:
				$this->setObserv($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FormetotrcrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodparegr($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonpre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodorg($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodtip($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObserv($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FormetotrcrePeer::DATABASE_NAME);

		if ($this->isColumnModified(FormetotrcrePeer::CODMET)) $criteria->add(FormetotrcrePeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FormetotrcrePeer::CODPRO)) $criteria->add(FormetotrcrePeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FormetotrcrePeer::CODACT)) $criteria->add(FormetotrcrePeer::CODACT, $this->codact);
		if ($this->isColumnModified(FormetotrcrePeer::CANACT)) $criteria->add(FormetotrcrePeer::CANACT, $this->canact);
		if ($this->isColumnModified(FormetotrcrePeer::CODPAREGR)) $criteria->add(FormetotrcrePeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(FormetotrcrePeer::MONPRE)) $criteria->add(FormetotrcrePeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(FormetotrcrePeer::CODORG)) $criteria->add(FormetotrcrePeer::CODORG, $this->codorg);
		if ($this->isColumnModified(FormetotrcrePeer::CODTIP)) $criteria->add(FormetotrcrePeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(FormetotrcrePeer::OBSERV)) $criteria->add(FormetotrcrePeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FormetotrcrePeer::ID)) $criteria->add(FormetotrcrePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FormetotrcrePeer::DATABASE_NAME);

		$criteria->add(FormetotrcrePeer::ID, $this->id);

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

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodact($this->codact);

		$copyObj->setCanact($this->canact);

		$copyObj->setCodparegr($this->codparegr);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setCodorg($this->codorg);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setObserv($this->observ);


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
			self::$peer = new FormetotrcrePeer();
		}
		return self::$peer;
	}

} 