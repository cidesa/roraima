<?php


abstract class BaseCaresordcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcom;


	
	protected $desres;


	
	protected $codartpro;


	
	protected $canord;


	
	protected $canaju;


	
	protected $canrec;


	
	protected $cantot;


	
	protected $costo;


	
	protected $rgoart;


	
	protected $totart;


	
	protected $codart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getOrdcom()
	{

		return $this->ordcom;
	}

	
	public function getDesres()
	{

		return $this->desres;
	}

	
	public function getCodartpro()
	{

		return $this->codartpro;
	}

	
	public function getCanord()
	{

		return $this->canord;
	}

	
	public function getCanaju()
	{

		return $this->canaju;
	}

	
	public function getCanrec()
	{

		return $this->canrec;
	}

	
	public function getCantot()
	{

		return $this->cantot;
	}

	
	public function getCosto()
	{

		return $this->costo;
	}

	
	public function getRgoart()
	{

		return $this->rgoart;
	}

	
	public function getTotart()
	{

		return $this->totart;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setOrdcom($v)
	{

		if ($this->ordcom !== $v) {
			$this->ordcom = $v;
			$this->modifiedColumns[] = CaresordcomPeer::ORDCOM;
		}

	} 
	
	public function setDesres($v)
	{

		if ($this->desres !== $v) {
			$this->desres = $v;
			$this->modifiedColumns[] = CaresordcomPeer::DESRES;
		}

	} 
	
	public function setCodartpro($v)
	{

		if ($this->codartpro !== $v) {
			$this->codartpro = $v;
			$this->modifiedColumns[] = CaresordcomPeer::CODARTPRO;
		}

	} 
	
	public function setCanord($v)
	{

		if ($this->canord !== $v) {
			$this->canord = $v;
			$this->modifiedColumns[] = CaresordcomPeer::CANORD;
		}

	} 
	
	public function setCanaju($v)
	{

		if ($this->canaju !== $v) {
			$this->canaju = $v;
			$this->modifiedColumns[] = CaresordcomPeer::CANAJU;
		}

	} 
	
	public function setCanrec($v)
	{

		if ($this->canrec !== $v) {
			$this->canrec = $v;
			$this->modifiedColumns[] = CaresordcomPeer::CANREC;
		}

	} 
	
	public function setCantot($v)
	{

		if ($this->cantot !== $v) {
			$this->cantot = $v;
			$this->modifiedColumns[] = CaresordcomPeer::CANTOT;
		}

	} 
	
	public function setCosto($v)
	{

		if ($this->costo !== $v) {
			$this->costo = $v;
			$this->modifiedColumns[] = CaresordcomPeer::COSTO;
		}

	} 
	
	public function setRgoart($v)
	{

		if ($this->rgoart !== $v) {
			$this->rgoart = $v;
			$this->modifiedColumns[] = CaresordcomPeer::RGOART;
		}

	} 
	
	public function setTotart($v)
	{

		if ($this->totart !== $v) {
			$this->totart = $v;
			$this->modifiedColumns[] = CaresordcomPeer::TOTART;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CaresordcomPeer::CODART;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaresordcomPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ordcom = $rs->getString($startcol + 0);

			$this->desres = $rs->getString($startcol + 1);

			$this->codartpro = $rs->getString($startcol + 2);

			$this->canord = $rs->getFloat($startcol + 3);

			$this->canaju = $rs->getFloat($startcol + 4);

			$this->canrec = $rs->getFloat($startcol + 5);

			$this->cantot = $rs->getFloat($startcol + 6);

			$this->costo = $rs->getFloat($startcol + 7);

			$this->rgoart = $rs->getFloat($startcol + 8);

			$this->totart = $rs->getFloat($startcol + 9);

			$this->codart = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caresordcom object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaresordcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaresordcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaresordcomPeer::DATABASE_NAME);
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
					$pk = CaresordcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaresordcomPeer::doUpdate($this, $con);
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


			if (($retval = CaresordcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaresordcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcom();
				break;
			case 1:
				return $this->getDesres();
				break;
			case 2:
				return $this->getCodartpro();
				break;
			case 3:
				return $this->getCanord();
				break;
			case 4:
				return $this->getCanaju();
				break;
			case 5:
				return $this->getCanrec();
				break;
			case 6:
				return $this->getCantot();
				break;
			case 7:
				return $this->getCosto();
				break;
			case 8:
				return $this->getRgoart();
				break;
			case 9:
				return $this->getTotart();
				break;
			case 10:
				return $this->getCodart();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaresordcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcom(),
			$keys[1] => $this->getDesres(),
			$keys[2] => $this->getCodartpro(),
			$keys[3] => $this->getCanord(),
			$keys[4] => $this->getCanaju(),
			$keys[5] => $this->getCanrec(),
			$keys[6] => $this->getCantot(),
			$keys[7] => $this->getCosto(),
			$keys[8] => $this->getRgoart(),
			$keys[9] => $this->getTotart(),
			$keys[10] => $this->getCodart(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaresordcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcom($value);
				break;
			case 1:
				$this->setDesres($value);
				break;
			case 2:
				$this->setCodartpro($value);
				break;
			case 3:
				$this->setCanord($value);
				break;
			case 4:
				$this->setCanaju($value);
				break;
			case 5:
				$this->setCanrec($value);
				break;
			case 6:
				$this->setCantot($value);
				break;
			case 7:
				$this->setCosto($value);
				break;
			case 8:
				$this->setRgoart($value);
				break;
			case 9:
				$this->setTotart($value);
				break;
			case 10:
				$this->setCodart($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaresordcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesres($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodartpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCosto($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRgoart($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTotart($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodart($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaresordcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaresordcomPeer::ORDCOM)) $criteria->add(CaresordcomPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(CaresordcomPeer::DESRES)) $criteria->add(CaresordcomPeer::DESRES, $this->desres);
		if ($this->isColumnModified(CaresordcomPeer::CODARTPRO)) $criteria->add(CaresordcomPeer::CODARTPRO, $this->codartpro);
		if ($this->isColumnModified(CaresordcomPeer::CANORD)) $criteria->add(CaresordcomPeer::CANORD, $this->canord);
		if ($this->isColumnModified(CaresordcomPeer::CANAJU)) $criteria->add(CaresordcomPeer::CANAJU, $this->canaju);
		if ($this->isColumnModified(CaresordcomPeer::CANREC)) $criteria->add(CaresordcomPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CaresordcomPeer::CANTOT)) $criteria->add(CaresordcomPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(CaresordcomPeer::COSTO)) $criteria->add(CaresordcomPeer::COSTO, $this->costo);
		if ($this->isColumnModified(CaresordcomPeer::RGOART)) $criteria->add(CaresordcomPeer::RGOART, $this->rgoart);
		if ($this->isColumnModified(CaresordcomPeer::TOTART)) $criteria->add(CaresordcomPeer::TOTART, $this->totart);
		if ($this->isColumnModified(CaresordcomPeer::CODART)) $criteria->add(CaresordcomPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaresordcomPeer::ID)) $criteria->add(CaresordcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaresordcomPeer::DATABASE_NAME);

		$criteria->add(CaresordcomPeer::ID, $this->id);

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

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setDesres($this->desres);

		$copyObj->setCodartpro($this->codartpro);

		$copyObj->setCanord($this->canord);

		$copyObj->setCanaju($this->canaju);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setCantot($this->cantot);

		$copyObj->setCosto($this->costo);

		$copyObj->setRgoart($this->rgoart);

		$copyObj->setTotart($this->totart);

		$copyObj->setCodart($this->codart);


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
			self::$peer = new CaresordcomPeer();
		}
		return self::$peer;
	}

} 