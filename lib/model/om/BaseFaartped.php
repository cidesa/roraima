<?php


abstract class BaseFaartped extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroped;


	
	protected $codart;


	
	protected $canord;


	
	protected $canaju;


	
	protected $candes;


	
	protected $cantot;


	
	protected $preart;


	
	protected $totart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNroped()
	{

		return $this->nroped; 		
	}
	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getCanord()
	{

		return number_format($this->canord,2,',','.');
		
	}
	
	public function getCanaju()
	{

		return number_format($this->canaju,2,',','.');
		
	}
	
	public function getCandes()
	{

		return number_format($this->candes,2,',','.');
		
	}
	
	public function getCantot()
	{

		return number_format($this->cantot,2,',','.');
		
	}
	
	public function getPreart()
	{

		return number_format($this->preart,2,',','.');
		
	}
	
	public function getTotart()
	{

		return number_format($this->totart,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNroped($v)
	{

		if ($this->nroped !== $v) {
			$this->nroped = $v;
			$this->modifiedColumns[] = FaartpedPeer::NROPED;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = FaartpedPeer::CODART;
		}

	} 
	
	public function setCanord($v)
	{

		if ($this->canord !== $v) {
			$this->canord = $v;
			$this->modifiedColumns[] = FaartpedPeer::CANORD;
		}

	} 
	
	public function setCanaju($v)
	{

		if ($this->canaju !== $v) {
			$this->canaju = $v;
			$this->modifiedColumns[] = FaartpedPeer::CANAJU;
		}

	} 
	
	public function setCandes($v)
	{

		if ($this->candes !== $v) {
			$this->candes = $v;
			$this->modifiedColumns[] = FaartpedPeer::CANDES;
		}

	} 
	
	public function setCantot($v)
	{

		if ($this->cantot !== $v) {
			$this->cantot = $v;
			$this->modifiedColumns[] = FaartpedPeer::CANTOT;
		}

	} 
	
	public function setPreart($v)
	{

		if ($this->preart !== $v) {
			$this->preart = $v;
			$this->modifiedColumns[] = FaartpedPeer::PREART;
		}

	} 
	
	public function setTotart($v)
	{

		if ($this->totart !== $v) {
			$this->totart = $v;
			$this->modifiedColumns[] = FaartpedPeer::TOTART;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FaartpedPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nroped = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->canord = $rs->getFloat($startcol + 2);

			$this->canaju = $rs->getFloat($startcol + 3);

			$this->candes = $rs->getFloat($startcol + 4);

			$this->cantot = $rs->getFloat($startcol + 5);

			$this->preart = $rs->getFloat($startcol + 6);

			$this->totart = $rs->getFloat($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Faartped object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FaartpedPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartpedPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartpedPeer::DATABASE_NAME);
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
					$pk = FaartpedPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FaartpedPeer::doUpdate($this, $con);
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


			if (($retval = FaartpedPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartpedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroped();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCanord();
				break;
			case 3:
				return $this->getCanaju();
				break;
			case 4:
				return $this->getCandes();
				break;
			case 5:
				return $this->getCantot();
				break;
			case 6:
				return $this->getPreart();
				break;
			case 7:
				return $this->getTotart();
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
		$keys = FaartpedPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroped(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCanord(),
			$keys[3] => $this->getCanaju(),
			$keys[4] => $this->getCandes(),
			$keys[5] => $this->getCantot(),
			$keys[6] => $this->getPreart(),
			$keys[7] => $this->getTotart(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartpedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroped($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCanord($value);
				break;
			case 3:
				$this->setCanaju($value);
				break;
			case 4:
				$this->setCandes($value);
				break;
			case 5:
				$this->setCantot($value);
				break;
			case 6:
				$this->setPreart($value);
				break;
			case 7:
				$this->setTotart($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartpedPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroped($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanord($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCandes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCantot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPreart($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTotart($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartpedPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartpedPeer::NROPED)) $criteria->add(FaartpedPeer::NROPED, $this->nroped);
		if ($this->isColumnModified(FaartpedPeer::CODART)) $criteria->add(FaartpedPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartpedPeer::CANORD)) $criteria->add(FaartpedPeer::CANORD, $this->canord);
		if ($this->isColumnModified(FaartpedPeer::CANAJU)) $criteria->add(FaartpedPeer::CANAJU, $this->canaju);
		if ($this->isColumnModified(FaartpedPeer::CANDES)) $criteria->add(FaartpedPeer::CANDES, $this->candes);
		if ($this->isColumnModified(FaartpedPeer::CANTOT)) $criteria->add(FaartpedPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(FaartpedPeer::PREART)) $criteria->add(FaartpedPeer::PREART, $this->preart);
		if ($this->isColumnModified(FaartpedPeer::TOTART)) $criteria->add(FaartpedPeer::TOTART, $this->totart);
		if ($this->isColumnModified(FaartpedPeer::ID)) $criteria->add(FaartpedPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartpedPeer::DATABASE_NAME);

		$criteria->add(FaartpedPeer::ID, $this->id);

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

		$copyObj->setNroped($this->nroped);

		$copyObj->setCodart($this->codart);

		$copyObj->setCanord($this->canord);

		$copyObj->setCanaju($this->canaju);

		$copyObj->setCandes($this->candes);

		$copyObj->setCantot($this->cantot);

		$copyObj->setPreart($this->preart);

		$copyObj->setTotart($this->totart);


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
			self::$peer = new FaartpedPeer();
		}
		return self::$peer;
	}

} 