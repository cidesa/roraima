<?php


abstract class BaseCsconsueldo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcar;


	
	protected $codcon;


	
	protected $monto;


	
	protected $unitri;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcar()
	{

		return $this->codcar; 		
	}
	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getMonto()
	{

		return number_format($this->monto,2,',','.');
		
	}
	
	public function getUnitri()
	{

		return number_format($this->unitri,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = CsconsueldoPeer::CODCAR;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = CsconsueldoPeer::CODCON;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = CsconsueldoPeer::MONTO;
		}

	} 
	
	public function setUnitri($v)
	{

		if ($this->unitri !== $v) {
			$this->unitri = $v;
			$this->modifiedColumns[] = CsconsueldoPeer::UNITRI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CsconsueldoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcar = $rs->getString($startcol + 0);

			$this->codcon = $rs->getString($startcol + 1);

			$this->monto = $rs->getFloat($startcol + 2);

			$this->unitri = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Csconsueldo object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CsconsueldoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CsconsueldoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CsconsueldoPeer::DATABASE_NAME);
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
					$pk = CsconsueldoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CsconsueldoPeer::doUpdate($this, $con);
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


			if (($retval = CsconsueldoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsconsueldoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcar();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getMonto();
				break;
			case 3:
				return $this->getUnitri();
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
		$keys = CsconsueldoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcar(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getMonto(),
			$keys[3] => $this->getUnitri(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsconsueldoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcar($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setMonto($value);
				break;
			case 3:
				$this->setUnitri($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsconsueldoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUnitri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CsconsueldoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CsconsueldoPeer::CODCAR)) $criteria->add(CsconsueldoPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(CsconsueldoPeer::CODCON)) $criteria->add(CsconsueldoPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(CsconsueldoPeer::MONTO)) $criteria->add(CsconsueldoPeer::MONTO, $this->monto);
		if ($this->isColumnModified(CsconsueldoPeer::UNITRI)) $criteria->add(CsconsueldoPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(CsconsueldoPeer::ID)) $criteria->add(CsconsueldoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CsconsueldoPeer::DATABASE_NAME);

		$criteria->add(CsconsueldoPeer::ID, $this->id);

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

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setMonto($this->monto);

		$copyObj->setUnitri($this->unitri);


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
			self::$peer = new CsconsueldoPeer();
		}
		return self::$peer;
	}

} 