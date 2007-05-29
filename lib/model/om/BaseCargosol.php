<?php


abstract class BaseCargosol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reqart;


	
	protected $codrgo;


	
	protected $monrgo;


	
	protected $tipdoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getReqart()
	{

		return $this->reqart; 		
	}
	
	public function getCodrgo()
	{

		return $this->codrgo; 		
	}
	
	public function getMonrgo()
	{

		return number_format($this->monrgo,2,',','.');
		
	}
	
	public function getTipdoc()
	{

		return $this->tipdoc; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setReqart($v)
	{

		if ($this->reqart !== $v) {
			$this->reqart = $v;
			$this->modifiedColumns[] = CargosolPeer::REQART;
		}

	} 
	
	public function setCodrgo($v)
	{

		if ($this->codrgo !== $v) {
			$this->codrgo = $v;
			$this->modifiedColumns[] = CargosolPeer::CODRGO;
		}

	} 
	
	public function setMonrgo($v)
	{

		if ($this->monrgo !== $v) {
			$this->monrgo = $v;
			$this->modifiedColumns[] = CargosolPeer::MONRGO;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = CargosolPeer::TIPDOC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CargosolPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->reqart = $rs->getString($startcol + 0);

			$this->codrgo = $rs->getString($startcol + 1);

			$this->monrgo = $rs->getFloat($startcol + 2);

			$this->tipdoc = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cargosol object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CargosolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CargosolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CargosolPeer::DATABASE_NAME);
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
					$pk = CargosolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CargosolPeer::doUpdate($this, $con);
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


			if (($retval = CargosolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CargosolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReqart();
				break;
			case 1:
				return $this->getCodrgo();
				break;
			case 2:
				return $this->getMonrgo();
				break;
			case 3:
				return $this->getTipdoc();
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
		$keys = CargosolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReqart(),
			$keys[1] => $this->getCodrgo(),
			$keys[2] => $this->getMonrgo(),
			$keys[3] => $this->getTipdoc(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CargosolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReqart($value);
				break;
			case 1:
				$this->setCodrgo($value);
				break;
			case 2:
				$this->setMonrgo($value);
				break;
			case 3:
				$this->setTipdoc($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CargosolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReqart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodrgo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonrgo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipdoc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CargosolPeer::DATABASE_NAME);

		if ($this->isColumnModified(CargosolPeer::REQART)) $criteria->add(CargosolPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CargosolPeer::CODRGO)) $criteria->add(CargosolPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(CargosolPeer::MONRGO)) $criteria->add(CargosolPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(CargosolPeer::TIPDOC)) $criteria->add(CargosolPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(CargosolPeer::ID)) $criteria->add(CargosolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CargosolPeer::DATABASE_NAME);

		$criteria->add(CargosolPeer::ID, $this->id);

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

		$copyObj->setReqart($this->reqart);

		$copyObj->setCodrgo($this->codrgo);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setTipdoc($this->tipdoc);


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
			self::$peer = new CargosolPeer();
		}
		return self::$peer;
	}

} 