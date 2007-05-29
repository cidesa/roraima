<?php


abstract class BaseFacorrelat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpre;


	
	protected $codped;


	
	protected $codfac;


	
	protected $codnot;


	
	protected $coddph;


	
	protected $coddev;


	
	protected $codaju;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpre()
	{

		return number_format($this->codpre,2,',','.');
		
	}
	
	public function getCodped()
	{

		return number_format($this->codped,2,',','.');
		
	}
	
	public function getCodfac()
	{

		return number_format($this->codfac,2,',','.');
		
	}
	
	public function getCodnot()
	{

		return number_format($this->codnot,2,',','.');
		
	}
	
	public function getCoddph()
	{

		return number_format($this->coddph,2,',','.');
		
	}
	
	public function getCoddev()
	{

		return number_format($this->coddev,2,',','.');
		
	}
	
	public function getCodaju()
	{

		return number_format($this->codaju,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = FacorrelatPeer::CODPRE;
		}

	} 
	
	public function setCodped($v)
	{

		if ($this->codped !== $v) {
			$this->codped = $v;
			$this->modifiedColumns[] = FacorrelatPeer::CODPED;
		}

	} 
	
	public function setCodfac($v)
	{

		if ($this->codfac !== $v) {
			$this->codfac = $v;
			$this->modifiedColumns[] = FacorrelatPeer::CODFAC;
		}

	} 
	
	public function setCodnot($v)
	{

		if ($this->codnot !== $v) {
			$this->codnot = $v;
			$this->modifiedColumns[] = FacorrelatPeer::CODNOT;
		}

	} 
	
	public function setCoddph($v)
	{

		if ($this->coddph !== $v) {
			$this->coddph = $v;
			$this->modifiedColumns[] = FacorrelatPeer::CODDPH;
		}

	} 
	
	public function setCoddev($v)
	{

		if ($this->coddev !== $v) {
			$this->coddev = $v;
			$this->modifiedColumns[] = FacorrelatPeer::CODDEV;
		}

	} 
	
	public function setCodaju($v)
	{

		if ($this->codaju !== $v) {
			$this->codaju = $v;
			$this->modifiedColumns[] = FacorrelatPeer::CODAJU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FacorrelatPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpre = $rs->getFloat($startcol + 0);

			$this->codped = $rs->getFloat($startcol + 1);

			$this->codfac = $rs->getFloat($startcol + 2);

			$this->codnot = $rs->getFloat($startcol + 3);

			$this->coddph = $rs->getFloat($startcol + 4);

			$this->coddev = $rs->getFloat($startcol + 5);

			$this->codaju = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Facorrelat object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FacorrelatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FacorrelatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FacorrelatPeer::DATABASE_NAME);
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
					$pk = FacorrelatPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FacorrelatPeer::doUpdate($this, $con);
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


			if (($retval = FacorrelatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacorrelatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpre();
				break;
			case 1:
				return $this->getCodped();
				break;
			case 2:
				return $this->getCodfac();
				break;
			case 3:
				return $this->getCodnot();
				break;
			case 4:
				return $this->getCoddph();
				break;
			case 5:
				return $this->getCoddev();
				break;
			case 6:
				return $this->getCodaju();
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
		$keys = FacorrelatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpre(),
			$keys[1] => $this->getCodped(),
			$keys[2] => $this->getCodfac(),
			$keys[3] => $this->getCodnot(),
			$keys[4] => $this->getCoddph(),
			$keys[5] => $this->getCoddev(),
			$keys[6] => $this->getCodaju(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacorrelatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpre($value);
				break;
			case 1:
				$this->setCodped($value);
				break;
			case 2:
				$this->setCodfac($value);
				break;
			case 3:
				$this->setCodnot($value);
				break;
			case 4:
				$this->setCoddph($value);
				break;
			case 5:
				$this->setCoddev($value);
				break;
			case 6:
				$this->setCodaju($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacorrelatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodped($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodfac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodnot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoddph($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCoddev($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodaju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FacorrelatPeer::DATABASE_NAME);

		if ($this->isColumnModified(FacorrelatPeer::CODPRE)) $criteria->add(FacorrelatPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(FacorrelatPeer::CODPED)) $criteria->add(FacorrelatPeer::CODPED, $this->codped);
		if ($this->isColumnModified(FacorrelatPeer::CODFAC)) $criteria->add(FacorrelatPeer::CODFAC, $this->codfac);
		if ($this->isColumnModified(FacorrelatPeer::CODNOT)) $criteria->add(FacorrelatPeer::CODNOT, $this->codnot);
		if ($this->isColumnModified(FacorrelatPeer::CODDPH)) $criteria->add(FacorrelatPeer::CODDPH, $this->coddph);
		if ($this->isColumnModified(FacorrelatPeer::CODDEV)) $criteria->add(FacorrelatPeer::CODDEV, $this->coddev);
		if ($this->isColumnModified(FacorrelatPeer::CODAJU)) $criteria->add(FacorrelatPeer::CODAJU, $this->codaju);
		if ($this->isColumnModified(FacorrelatPeer::ID)) $criteria->add(FacorrelatPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FacorrelatPeer::DATABASE_NAME);

		$criteria->add(FacorrelatPeer::ID, $this->id);

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

		$copyObj->setCodpre($this->codpre);

		$copyObj->setCodped($this->codped);

		$copyObj->setCodfac($this->codfac);

		$copyObj->setCodnot($this->codnot);

		$copyObj->setCoddph($this->coddph);

		$copyObj->setCoddev($this->coddev);

		$copyObj->setCodaju($this->codaju);


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
			self::$peer = new FacorrelatPeer();
		}
		return self::$peer;
	}

} 