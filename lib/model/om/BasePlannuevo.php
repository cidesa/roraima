<?php


abstract class BasePlannuevo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codold;


	
	protected $nomold;


	
	protected $codnew;


	
	protected $nomnew;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodold()
	{

		return $this->codold; 		
	}
	
	public function getNomold()
	{

		return $this->nomold; 		
	}
	
	public function getCodnew()
	{

		return $this->codnew; 		
	}
	
	public function getNomnew()
	{

		return $this->nomnew; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodold($v)
	{

		if ($this->codold !== $v) {
			$this->codold = $v;
			$this->modifiedColumns[] = PlannuevoPeer::CODOLD;
		}

	} 
	
	public function setNomold($v)
	{

		if ($this->nomold !== $v) {
			$this->nomold = $v;
			$this->modifiedColumns[] = PlannuevoPeer::NOMOLD;
		}

	} 
	
	public function setCodnew($v)
	{

		if ($this->codnew !== $v) {
			$this->codnew = $v;
			$this->modifiedColumns[] = PlannuevoPeer::CODNEW;
		}

	} 
	
	public function setNomnew($v)
	{

		if ($this->nomnew !== $v) {
			$this->nomnew = $v;
			$this->modifiedColumns[] = PlannuevoPeer::NOMNEW;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PlannuevoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codold = $rs->getString($startcol + 0);

			$this->nomold = $rs->getString($startcol + 1);

			$this->codnew = $rs->getString($startcol + 2);

			$this->nomnew = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Plannuevo object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PlannuevoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PlannuevoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PlannuevoPeer::DATABASE_NAME);
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
					$pk = PlannuevoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += PlannuevoPeer::doUpdate($this, $con);
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


			if (($retval = PlannuevoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PlannuevoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodold();
				break;
			case 1:
				return $this->getNomold();
				break;
			case 2:
				return $this->getCodnew();
				break;
			case 3:
				return $this->getNomnew();
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
		$keys = PlannuevoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodold(),
			$keys[1] => $this->getNomold(),
			$keys[2] => $this->getCodnew(),
			$keys[3] => $this->getNomnew(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PlannuevoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodold($value);
				break;
			case 1:
				$this->setNomold($value);
				break;
			case 2:
				$this->setCodnew($value);
				break;
			case 3:
				$this->setNomnew($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PlannuevoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodold($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomold($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodnew($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomnew($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PlannuevoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PlannuevoPeer::CODOLD)) $criteria->add(PlannuevoPeer::CODOLD, $this->codold);
		if ($this->isColumnModified(PlannuevoPeer::NOMOLD)) $criteria->add(PlannuevoPeer::NOMOLD, $this->nomold);
		if ($this->isColumnModified(PlannuevoPeer::CODNEW)) $criteria->add(PlannuevoPeer::CODNEW, $this->codnew);
		if ($this->isColumnModified(PlannuevoPeer::NOMNEW)) $criteria->add(PlannuevoPeer::NOMNEW, $this->nomnew);
		if ($this->isColumnModified(PlannuevoPeer::ID)) $criteria->add(PlannuevoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PlannuevoPeer::DATABASE_NAME);

		$criteria->add(PlannuevoPeer::ID, $this->id);

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

		$copyObj->setCodold($this->codold);

		$copyObj->setNomold($this->nomold);

		$copyObj->setCodnew($this->codnew);

		$copyObj->setNomnew($this->nomnew);


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
			self::$peer = new PlannuevoPeer();
		}
		return self::$peer;
	}

} 