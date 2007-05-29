<?php


abstract class BaseCarancot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $candes;


	
	protected $canhas;


	
	protected $cancot;


	
	protected $nroran;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCandes()
	{

		return number_format($this->candes,2,',','.');
		
	}
	
	public function getCanhas()
	{

		return number_format($this->canhas,2,',','.');
		
	}
	
	public function getCancot()
	{

		return number_format($this->cancot,2,',','.');
		
	}
	
	public function getNroran()
	{

		return $this->nroran; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCandes($v)
	{

		if ($this->candes !== $v) {
			$this->candes = $v;
			$this->modifiedColumns[] = CarancotPeer::CANDES;
		}

	} 
	
	public function setCanhas($v)
	{

		if ($this->canhas !== $v) {
			$this->canhas = $v;
			$this->modifiedColumns[] = CarancotPeer::CANHAS;
		}

	} 
	
	public function setCancot($v)
	{

		if ($this->cancot !== $v) {
			$this->cancot = $v;
			$this->modifiedColumns[] = CarancotPeer::CANCOT;
		}

	} 
	
	public function setNroran($v)
	{

		if ($this->nroran !== $v) {
			$this->nroran = $v;
			$this->modifiedColumns[] = CarancotPeer::NRORAN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CarancotPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->candes = $rs->getFloat($startcol + 0);

			$this->canhas = $rs->getFloat($startcol + 1);

			$this->cancot = $rs->getFloat($startcol + 2);

			$this->nroran = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Carancot object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CarancotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CarancotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CarancotPeer::DATABASE_NAME);
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
					$pk = CarancotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CarancotPeer::doUpdate($this, $con);
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


			if (($retval = CarancotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarancotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCandes();
				break;
			case 1:
				return $this->getCanhas();
				break;
			case 2:
				return $this->getCancot();
				break;
			case 3:
				return $this->getNroran();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarancotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCandes(),
			$keys[1] => $this->getCanhas(),
			$keys[2] => $this->getCancot(),
			$keys[3] => $this->getNroran(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarancotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCandes($value);
				break;
			case 1:
				$this->setCanhas($value);
				break;
			case 2:
				$this->setCancot($value);
				break;
			case 3:
				$this->setNroran($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarancotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCandes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCanhas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCancot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNroran($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CarancotPeer::DATABASE_NAME);

		if ($this->isColumnModified(CarancotPeer::CANDES)) $criteria->add(CarancotPeer::CANDES, $this->candes);
		if ($this->isColumnModified(CarancotPeer::CANHAS)) $criteria->add(CarancotPeer::CANHAS, $this->canhas);
		if ($this->isColumnModified(CarancotPeer::CANCOT)) $criteria->add(CarancotPeer::CANCOT, $this->cancot);
		if ($this->isColumnModified(CarancotPeer::NRORAN)) $criteria->add(CarancotPeer::NRORAN, $this->nroran);
		if ($this->isColumnModified(CarancotPeer::ID)) $criteria->add(CarancotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CarancotPeer::DATABASE_NAME);

		$criteria->add(CarancotPeer::ID, $this->id);

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

		$copyObj->setCandes($this->candes);

		$copyObj->setCanhas($this->canhas);

		$copyObj->setCancot($this->cancot);

		$copyObj->setNroran($this->nroran);


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
			self::$peer = new CarancotPeer();
		}
		return self::$peer;
	}

} 