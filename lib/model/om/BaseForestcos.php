<?php


abstract class BaseForestcos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmet;


	
	protected $codpro;


	
	protected $codact;


	
	protected $codart;


	
	protected $codpar;


	
	protected $canuni;


	
	protected $canart;


	
	protected $monart;


	
	protected $totpre;


	
	protected $codfin;


	
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
	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getCodpar()
	{

		return $this->codpar; 		
	}
	
	public function getCanuni()
	{

		return number_format($this->canuni,2,',','.');
		
	}
	
	public function getCanart()
	{

		return number_format($this->canart,2,',','.');
		
	}
	
	public function getMonart()
	{

		return number_format($this->monart,2,',','.');
		
	}
	
	public function getTotpre()
	{

		return number_format($this->totpre,2,',','.');
		
	}
	
	public function getCodfin()
	{

		return $this->codfin; 		
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
			$this->modifiedColumns[] = ForestcosPeer::CODMET;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = ForestcosPeer::CODPRO;
		}

	} 
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = ForestcosPeer::CODACT;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = ForestcosPeer::CODART;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = ForestcosPeer::CODPAR;
		}

	} 
	
	public function setCanuni($v)
	{

		if ($this->canuni !== $v) {
			$this->canuni = $v;
			$this->modifiedColumns[] = ForestcosPeer::CANUNI;
		}

	} 
	
	public function setCanart($v)
	{

		if ($this->canart !== $v) {
			$this->canart = $v;
			$this->modifiedColumns[] = ForestcosPeer::CANART;
		}

	} 
	
	public function setMonart($v)
	{

		if ($this->monart !== $v) {
			$this->monart = $v;
			$this->modifiedColumns[] = ForestcosPeer::MONART;
		}

	} 
	
	public function setTotpre($v)
	{

		if ($this->totpre !== $v) {
			$this->totpre = $v;
			$this->modifiedColumns[] = ForestcosPeer::TOTPRE;
		}

	} 
	
	public function setCodfin($v)
	{

		if ($this->codfin !== $v) {
			$this->codfin = $v;
			$this->modifiedColumns[] = ForestcosPeer::CODFIN;
		}

	} 
	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = ForestcosPeer::CODTIP;
		}

	} 
	
	public function setObserv($v)
	{

		if ($this->observ !== $v) {
			$this->observ = $v;
			$this->modifiedColumns[] = ForestcosPeer::OBSERV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForestcosPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmet = $rs->getString($startcol + 0);

			$this->codpro = $rs->getString($startcol + 1);

			$this->codact = $rs->getString($startcol + 2);

			$this->codart = $rs->getString($startcol + 3);

			$this->codpar = $rs->getString($startcol + 4);

			$this->canuni = $rs->getFloat($startcol + 5);

			$this->canart = $rs->getFloat($startcol + 6);

			$this->monart = $rs->getFloat($startcol + 7);

			$this->totpre = $rs->getFloat($startcol + 8);

			$this->codfin = $rs->getString($startcol + 9);

			$this->codtip = $rs->getString($startcol + 10);

			$this->observ = $rs->getString($startcol + 11);

			$this->id = $rs->getInt($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forestcos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForestcosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForestcosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForestcosPeer::DATABASE_NAME);
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
					$pk = ForestcosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForestcosPeer::doUpdate($this, $con);
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


			if (($retval = ForestcosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForestcosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodart();
				break;
			case 4:
				return $this->getCodpar();
				break;
			case 5:
				return $this->getCanuni();
				break;
			case 6:
				return $this->getCanart();
				break;
			case 7:
				return $this->getMonart();
				break;
			case 8:
				return $this->getTotpre();
				break;
			case 9:
				return $this->getCodfin();
				break;
			case 10:
				return $this->getCodtip();
				break;
			case 11:
				return $this->getObserv();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForestcosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmet(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getCodact(),
			$keys[3] => $this->getCodart(),
			$keys[4] => $this->getCodpar(),
			$keys[5] => $this->getCanuni(),
			$keys[6] => $this->getCanart(),
			$keys[7] => $this->getMonart(),
			$keys[8] => $this->getTotpre(),
			$keys[9] => $this->getCodfin(),
			$keys[10] => $this->getCodtip(),
			$keys[11] => $this->getObserv(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForestcosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodart($value);
				break;
			case 4:
				$this->setCodpar($value);
				break;
			case 5:
				$this->setCanuni($value);
				break;
			case 6:
				$this->setCanart($value);
				break;
			case 7:
				$this->setMonart($value);
				break;
			case 8:
				$this->setTotpre($value);
				break;
			case 9:
				$this->setCodfin($value);
				break;
			case 10:
				$this->setCodtip($value);
				break;
			case 11:
				$this->setObserv($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForestcosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodpar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanuni($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCanart($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonart($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTotpre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodfin($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodtip($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setObserv($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForestcosPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForestcosPeer::CODMET)) $criteria->add(ForestcosPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(ForestcosPeer::CODPRO)) $criteria->add(ForestcosPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ForestcosPeer::CODACT)) $criteria->add(ForestcosPeer::CODACT, $this->codact);
		if ($this->isColumnModified(ForestcosPeer::CODART)) $criteria->add(ForestcosPeer::CODART, $this->codart);
		if ($this->isColumnModified(ForestcosPeer::CODPAR)) $criteria->add(ForestcosPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ForestcosPeer::CANUNI)) $criteria->add(ForestcosPeer::CANUNI, $this->canuni);
		if ($this->isColumnModified(ForestcosPeer::CANART)) $criteria->add(ForestcosPeer::CANART, $this->canart);
		if ($this->isColumnModified(ForestcosPeer::MONART)) $criteria->add(ForestcosPeer::MONART, $this->monart);
		if ($this->isColumnModified(ForestcosPeer::TOTPRE)) $criteria->add(ForestcosPeer::TOTPRE, $this->totpre);
		if ($this->isColumnModified(ForestcosPeer::CODFIN)) $criteria->add(ForestcosPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(ForestcosPeer::CODTIP)) $criteria->add(ForestcosPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(ForestcosPeer::OBSERV)) $criteria->add(ForestcosPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(ForestcosPeer::ID)) $criteria->add(ForestcosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForestcosPeer::DATABASE_NAME);

		$criteria->add(ForestcosPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCanuni($this->canuni);

		$copyObj->setCanart($this->canart);

		$copyObj->setMonart($this->monart);

		$copyObj->setTotpre($this->totpre);

		$copyObj->setCodfin($this->codfin);

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
			self::$peer = new ForestcosPeer();
		}
		return self::$peer;
	}

} 