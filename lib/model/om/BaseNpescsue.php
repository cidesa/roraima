<?php


abstract class BaseNpescsue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codesc;


	
	protected $valini;


	
	protected $valfin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodesc()
	{

		return $this->codesc;
	}

	
	public function getValini()
	{

		return $this->valini;
	}

	
	public function getValfin()
	{

		return $this->valfin;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodesc($v)
	{

		if ($this->codesc !== $v) {
			$this->codesc = $v;
			$this->modifiedColumns[] = NpescsuePeer::CODESC;
		}

	} 
	
	public function setValini($v)
	{

		if ($this->valini !== $v) {
			$this->valini = $v;
			$this->modifiedColumns[] = NpescsuePeer::VALINI;
		}

	} 
	
	public function setValfin($v)
	{

		if ($this->valfin !== $v) {
			$this->valfin = $v;
			$this->modifiedColumns[] = NpescsuePeer::VALFIN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpescsuePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codesc = $rs->getString($startcol + 0);

			$this->valini = $rs->getFloat($startcol + 1);

			$this->valfin = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npescsue object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpescsuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpescsuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpescsuePeer::DATABASE_NAME);
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
					$pk = NpescsuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpescsuePeer::doUpdate($this, $con);
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


			if (($retval = NpescsuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpescsuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodesc();
				break;
			case 1:
				return $this->getValini();
				break;
			case 2:
				return $this->getValfin();
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
		$keys = NpescsuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodesc(),
			$keys[1] => $this->getValini(),
			$keys[2] => $this->getValfin(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpescsuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodesc($value);
				break;
			case 1:
				$this->setValini($value);
				break;
			case 2:
				$this->setValfin($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpescsuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodesc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setValini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValfin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpescsuePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpescsuePeer::CODESC)) $criteria->add(NpescsuePeer::CODESC, $this->codesc);
		if ($this->isColumnModified(NpescsuePeer::VALINI)) $criteria->add(NpescsuePeer::VALINI, $this->valini);
		if ($this->isColumnModified(NpescsuePeer::VALFIN)) $criteria->add(NpescsuePeer::VALFIN, $this->valfin);
		if ($this->isColumnModified(NpescsuePeer::ID)) $criteria->add(NpescsuePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpescsuePeer::DATABASE_NAME);

		$criteria->add(NpescsuePeer::ID, $this->id);

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

		$copyObj->setCodesc($this->codesc);

		$copyObj->setValini($this->valini);

		$copyObj->setValfin($this->valfin);


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
			self::$peer = new NpescsuePeer();
		}
		return self::$peer;
	}

} 