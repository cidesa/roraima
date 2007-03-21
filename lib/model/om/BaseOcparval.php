<?php


abstract class BaseOcparval extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $numval;


	
	protected $codtipval;


	
	protected $codpar;


	
	protected $cantidad;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getNumval()
	{

		return $this->numval;
	}

	
	public function getCodtipval()
	{

		return $this->codtipval;
	}

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getCantidad()
	{

		return $this->cantidad;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcparvalPeer::CODCON;
		}

	} 
	
	public function setNumval($v)
	{

		if ($this->numval !== $v) {
			$this->numval = $v;
			$this->modifiedColumns[] = OcparvalPeer::NUMVAL;
		}

	} 
	
	public function setCodtipval($v)
	{

		if ($this->codtipval !== $v) {
			$this->codtipval = $v;
			$this->modifiedColumns[] = OcparvalPeer::CODTIPVAL;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = OcparvalPeer::CODPAR;
		}

	} 
	
	public function setCantidad($v)
	{

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = OcparvalPeer::CANTIDAD;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcparvalPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->numval = $rs->getString($startcol + 1);

			$this->codtipval = $rs->getString($startcol + 2);

			$this->codpar = $rs->getString($startcol + 3);

			$this->cantidad = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocparval object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcparvalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcparvalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcparvalPeer::DATABASE_NAME);
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
					$pk = OcparvalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcparvalPeer::doUpdate($this, $con);
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


			if (($retval = OcparvalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcparvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNumval();
				break;
			case 2:
				return $this->getCodtipval();
				break;
			case 3:
				return $this->getCodpar();
				break;
			case 4:
				return $this->getCantidad();
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
		$keys = OcparvalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNumval(),
			$keys[2] => $this->getCodtipval(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getCantidad(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcparvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNumval($value);
				break;
			case 2:
				$this->setCodtipval($value);
				break;
			case 3:
				$this->setCodpar($value);
				break;
			case 4:
				$this->setCantidad($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcparvalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumval($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtipval($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCantidad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcparvalPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcparvalPeer::CODCON)) $criteria->add(OcparvalPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcparvalPeer::NUMVAL)) $criteria->add(OcparvalPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(OcparvalPeer::CODTIPVAL)) $criteria->add(OcparvalPeer::CODTIPVAL, $this->codtipval);
		if ($this->isColumnModified(OcparvalPeer::CODPAR)) $criteria->add(OcparvalPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcparvalPeer::CANTIDAD)) $criteria->add(OcparvalPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(OcparvalPeer::ID)) $criteria->add(OcparvalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcparvalPeer::DATABASE_NAME);

		$criteria->add(OcparvalPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNumval($this->numval);

		$copyObj->setCodtipval($this->codtipval);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCantidad($this->cantidad);


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
			self::$peer = new OcparvalPeer();
		}
		return self::$peer;
	}

} 