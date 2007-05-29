<?php


abstract class BasePlanunico extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcta;


	
	protected $nompre;


	
	protected $codnew;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcta()
	{

		return $this->codcta; 		
	}
	
	public function getNompre()
	{

		return $this->nompre; 		
	}
	
	public function getCodnew()
	{

		return $this->codnew; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = PlanunicoPeer::CODCTA;
		}

	} 
	
	public function setNompre($v)
	{

		if ($this->nompre !== $v) {
			$this->nompre = $v;
			$this->modifiedColumns[] = PlanunicoPeer::NOMPRE;
		}

	} 
	
	public function setCodnew($v)
	{

		if ($this->codnew !== $v) {
			$this->codnew = $v;
			$this->modifiedColumns[] = PlanunicoPeer::CODNEW;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PlanunicoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcta = $rs->getString($startcol + 0);

			$this->nompre = $rs->getString($startcol + 1);

			$this->codnew = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Planunico object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PlanunicoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PlanunicoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PlanunicoPeer::DATABASE_NAME);
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
					$pk = PlanunicoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += PlanunicoPeer::doUpdate($this, $con);
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


			if (($retval = PlanunicoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PlanunicoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcta();
				break;
			case 1:
				return $this->getNompre();
				break;
			case 2:
				return $this->getCodnew();
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
		$keys = PlanunicoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcta(),
			$keys[1] => $this->getNompre(),
			$keys[2] => $this->getCodnew(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PlanunicoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcta($value);
				break;
			case 1:
				$this->setNompre($value);
				break;
			case 2:
				$this->setCodnew($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PlanunicoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodnew($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PlanunicoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PlanunicoPeer::CODCTA)) $criteria->add(PlanunicoPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(PlanunicoPeer::NOMPRE)) $criteria->add(PlanunicoPeer::NOMPRE, $this->nompre);
		if ($this->isColumnModified(PlanunicoPeer::CODNEW)) $criteria->add(PlanunicoPeer::CODNEW, $this->codnew);
		if ($this->isColumnModified(PlanunicoPeer::ID)) $criteria->add(PlanunicoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PlanunicoPeer::DATABASE_NAME);

		$criteria->add(PlanunicoPeer::ID, $this->id);

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

		$copyObj->setCodcta($this->codcta);

		$copyObj->setNompre($this->nompre);

		$copyObj->setCodnew($this->codnew);


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
			self::$peer = new PlanunicoPeer();
		}
		return self::$peer;
	}

} 