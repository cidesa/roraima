<?php


abstract class BaseUnidades2 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codubi;


	
	protected $desubi;


	
	protected $stacod;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodubi()
	{

		return $this->codubi; 		
	}
	
	public function getDesubi()
	{

		return $this->desubi; 		
	}
	
	public function getStacod()
	{

		return $this->stacod; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodubi($v)
	{

		if ($this->codubi !== $v) {
			$this->codubi = $v;
			$this->modifiedColumns[] = Unidades2Peer::CODUBI;
		}

	} 
	
	public function setDesubi($v)
	{

		if ($this->desubi !== $v) {
			$this->desubi = $v;
			$this->modifiedColumns[] = Unidades2Peer::DESUBI;
		}

	} 
	
	public function setStacod($v)
	{

		if ($this->stacod !== $v) {
			$this->stacod = $v;
			$this->modifiedColumns[] = Unidades2Peer::STACOD;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Unidades2Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codubi = $rs->getString($startcol + 0);

			$this->desubi = $rs->getString($startcol + 1);

			$this->stacod = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Unidades2 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Unidades2Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Unidades2Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Unidades2Peer::DATABASE_NAME);
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
					$pk = Unidades2Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Unidades2Peer::doUpdate($this, $con);
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


			if (($retval = Unidades2Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Unidades2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodubi();
				break;
			case 1:
				return $this->getDesubi();
				break;
			case 2:
				return $this->getStacod();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Unidades2Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodubi(),
			$keys[1] => $this->getDesubi(),
			$keys[2] => $this->getStacod(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Unidades2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodubi($value);
				break;
			case 1:
				$this->setDesubi($value);
				break;
			case 2:
				$this->setStacod($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Unidades2Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodubi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesubi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStacod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Unidades2Peer::DATABASE_NAME);

		if ($this->isColumnModified(Unidades2Peer::CODUBI)) $criteria->add(Unidades2Peer::CODUBI, $this->codubi);
		if ($this->isColumnModified(Unidades2Peer::DESUBI)) $criteria->add(Unidades2Peer::DESUBI, $this->desubi);
		if ($this->isColumnModified(Unidades2Peer::STACOD)) $criteria->add(Unidades2Peer::STACOD, $this->stacod);
		if ($this->isColumnModified(Unidades2Peer::ID)) $criteria->add(Unidades2Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Unidades2Peer::DATABASE_NAME);

		$criteria->add(Unidades2Peer::ID, $this->id);

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

		$copyObj->setCodubi($this->codubi);

		$copyObj->setDesubi($this->desubi);

		$copyObj->setStacod($this->stacod);


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
			self::$peer = new Unidades2Peer();
		}
		return self::$peer;
	}

} 