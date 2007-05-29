<?php


abstract class BaseForfinotrcre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codparegr;


	
	protected $codparing;


	
	protected $monfin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcat()
	{

		return $this->codcat; 		
	}
	
	public function getCodparegr()
	{

		return $this->codparegr; 		
	}
	
	public function getCodparing()
	{

		return $this->codparing; 		
	}
	
	public function getMonfin()
	{

		return number_format($this->monfin,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = ForfinotrcrePeer::CODCAT;
		}

	} 
	
	public function setCodparegr($v)
	{

		if ($this->codparegr !== $v) {
			$this->codparegr = $v;
			$this->modifiedColumns[] = ForfinotrcrePeer::CODPAREGR;
		}

	} 
	
	public function setCodparing($v)
	{

		if ($this->codparing !== $v) {
			$this->codparing = $v;
			$this->modifiedColumns[] = ForfinotrcrePeer::CODPARING;
		}

	} 
	
	public function setMonfin($v)
	{

		if ($this->monfin !== $v) {
			$this->monfin = $v;
			$this->modifiedColumns[] = ForfinotrcrePeer::MONFIN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForfinotrcrePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcat = $rs->getString($startcol + 0);

			$this->codparegr = $rs->getString($startcol + 1);

			$this->codparing = $rs->getString($startcol + 2);

			$this->monfin = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forfinotrcre object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForfinotrcrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForfinotrcrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForfinotrcrePeer::DATABASE_NAME);
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
					$pk = ForfinotrcrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForfinotrcrePeer::doUpdate($this, $con);
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


			if (($retval = ForfinotrcrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForfinotrcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodparegr();
				break;
			case 2:
				return $this->getCodparing();
				break;
			case 3:
				return $this->getMonfin();
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
		$keys = ForfinotrcrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodparegr(),
			$keys[2] => $this->getCodparing(),
			$keys[3] => $this->getMonfin(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForfinotrcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodparegr($value);
				break;
			case 2:
				$this->setCodparing($value);
				break;
			case 3:
				$this->setMonfin($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForfinotrcrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodparegr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodparing($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonfin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForfinotrcrePeer::DATABASE_NAME);

		if ($this->isColumnModified(ForfinotrcrePeer::CODCAT)) $criteria->add(ForfinotrcrePeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForfinotrcrePeer::CODPAREGR)) $criteria->add(ForfinotrcrePeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(ForfinotrcrePeer::CODPARING)) $criteria->add(ForfinotrcrePeer::CODPARING, $this->codparing);
		if ($this->isColumnModified(ForfinotrcrePeer::MONFIN)) $criteria->add(ForfinotrcrePeer::MONFIN, $this->monfin);
		if ($this->isColumnModified(ForfinotrcrePeer::ID)) $criteria->add(ForfinotrcrePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForfinotrcrePeer::DATABASE_NAME);

		$criteria->add(ForfinotrcrePeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodparegr($this->codparegr);

		$copyObj->setCodparing($this->codparing);

		$copyObj->setMonfin($this->monfin);


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
			self::$peer = new ForfinotrcrePeer();
		}
		return self::$peer;
	}

} 