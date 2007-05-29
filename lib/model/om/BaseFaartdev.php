<?php


abstract class BaseFaartdev extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrodev;


	
	protected $codart;


	
	protected $numlot;


	
	protected $candes;


	
	protected $candev;


	
	protected $preart;


	
	protected $totart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNrodev()
	{

		return $this->nrodev; 		
	}
	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getNumlot()
	{

		return $this->numlot; 		
	}
	
	public function getCandes()
	{

		return number_format($this->candes,2,',','.');
		
	}
	
	public function getCandev()
	{

		return number_format($this->candev,2,',','.');
		
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
	
	public function setNrodev($v)
	{

		if ($this->nrodev !== $v) {
			$this->nrodev = $v;
			$this->modifiedColumns[] = FaartdevPeer::NRODEV;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = FaartdevPeer::CODART;
		}

	} 
	
	public function setNumlot($v)
	{

		if ($this->numlot !== $v) {
			$this->numlot = $v;
			$this->modifiedColumns[] = FaartdevPeer::NUMLOT;
		}

	} 
	
	public function setCandes($v)
	{

		if ($this->candes !== $v) {
			$this->candes = $v;
			$this->modifiedColumns[] = FaartdevPeer::CANDES;
		}

	} 
	
	public function setCandev($v)
	{

		if ($this->candev !== $v) {
			$this->candev = $v;
			$this->modifiedColumns[] = FaartdevPeer::CANDEV;
		}

	} 
	
	public function setPreart($v)
	{

		if ($this->preart !== $v) {
			$this->preart = $v;
			$this->modifiedColumns[] = FaartdevPeer::PREART;
		}

	} 
	
	public function setTotart($v)
	{

		if ($this->totart !== $v) {
			$this->totart = $v;
			$this->modifiedColumns[] = FaartdevPeer::TOTART;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FaartdevPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nrodev = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->numlot = $rs->getString($startcol + 2);

			$this->candes = $rs->getFloat($startcol + 3);

			$this->candev = $rs->getFloat($startcol + 4);

			$this->preart = $rs->getFloat($startcol + 5);

			$this->totart = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Faartdev object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FaartdevPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartdevPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartdevPeer::DATABASE_NAME);
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
					$pk = FaartdevPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FaartdevPeer::doUpdate($this, $con);
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


			if (($retval = FaartdevPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartdevPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrodev();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getNumlot();
				break;
			case 3:
				return $this->getCandes();
				break;
			case 4:
				return $this->getCandev();
				break;
			case 5:
				return $this->getPreart();
				break;
			case 6:
				return $this->getTotart();
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
		$keys = FaartdevPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrodev(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getNumlot(),
			$keys[3] => $this->getCandes(),
			$keys[4] => $this->getCandev(),
			$keys[5] => $this->getPreart(),
			$keys[6] => $this->getTotart(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartdevPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrodev($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setNumlot($value);
				break;
			case 3:
				$this->setCandes($value);
				break;
			case 4:
				$this->setCandev($value);
				break;
			case 5:
				$this->setPreart($value);
				break;
			case 6:
				$this->setTotart($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartdevPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrodev($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumlot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCandes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCandev($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPreart($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotart($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartdevPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartdevPeer::NRODEV)) $criteria->add(FaartdevPeer::NRODEV, $this->nrodev);
		if ($this->isColumnModified(FaartdevPeer::CODART)) $criteria->add(FaartdevPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartdevPeer::NUMLOT)) $criteria->add(FaartdevPeer::NUMLOT, $this->numlot);
		if ($this->isColumnModified(FaartdevPeer::CANDES)) $criteria->add(FaartdevPeer::CANDES, $this->candes);
		if ($this->isColumnModified(FaartdevPeer::CANDEV)) $criteria->add(FaartdevPeer::CANDEV, $this->candev);
		if ($this->isColumnModified(FaartdevPeer::PREART)) $criteria->add(FaartdevPeer::PREART, $this->preart);
		if ($this->isColumnModified(FaartdevPeer::TOTART)) $criteria->add(FaartdevPeer::TOTART, $this->totart);
		if ($this->isColumnModified(FaartdevPeer::ID)) $criteria->add(FaartdevPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartdevPeer::DATABASE_NAME);

		$criteria->add(FaartdevPeer::ID, $this->id);

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

		$copyObj->setNrodev($this->nrodev);

		$copyObj->setCodart($this->codart);

		$copyObj->setNumlot($this->numlot);

		$copyObj->setCandes($this->candes);

		$copyObj->setCandev($this->candev);

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
			self::$peer = new FaartdevPeer();
		}
		return self::$peer;
	}

} 