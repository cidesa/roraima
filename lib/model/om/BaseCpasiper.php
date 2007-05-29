<?php


abstract class BaseCpasiper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpre;


	
	protected $asiper;


	
	protected $montot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpre()
	{

		return $this->codpre; 		
	}
	
	public function getAsiper()
	{

		return number_format($this->asiper,2,',','.');
		
	}
	
	public function getMontot()
	{

		return number_format($this->montot,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CpasiperPeer::CODPRE;
		}

	} 
	
	public function setAsiper($v)
	{

		if ($this->asiper !== $v) {
			$this->asiper = $v;
			$this->modifiedColumns[] = CpasiperPeer::ASIPER;
		}

	} 
	
	public function setMontot($v)
	{

		if ($this->montot !== $v) {
			$this->montot = $v;
			$this->modifiedColumns[] = CpasiperPeer::MONTOT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpasiperPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpre = $rs->getString($startcol + 0);

			$this->asiper = $rs->getFloat($startcol + 1);

			$this->montot = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpasiper object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpasiperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpasiperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpasiperPeer::DATABASE_NAME);
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
					$pk = CpasiperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpasiperPeer::doUpdate($this, $con);
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


			if (($retval = CpasiperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpasiperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpre();
				break;
			case 1:
				return $this->getAsiper();
				break;
			case 2:
				return $this->getMontot();
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
		$keys = CpasiperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpre(),
			$keys[1] => $this->getAsiper(),
			$keys[2] => $this->getMontot(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpasiperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpre($value);
				break;
			case 1:
				$this->setAsiper($value);
				break;
			case 2:
				$this->setMontot($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpasiperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAsiper($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMontot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpasiperPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpasiperPeer::CODPRE)) $criteria->add(CpasiperPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpasiperPeer::ASIPER)) $criteria->add(CpasiperPeer::ASIPER, $this->asiper);
		if ($this->isColumnModified(CpasiperPeer::MONTOT)) $criteria->add(CpasiperPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CpasiperPeer::ID)) $criteria->add(CpasiperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpasiperPeer::DATABASE_NAME);

		$criteria->add(CpasiperPeer::ID, $this->id);

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

		$copyObj->setCodpre($this->codpre);

		$copyObj->setAsiper($this->asiper);

		$copyObj->setMontot($this->montot);


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
			self::$peer = new CpasiperPeer();
		}
		return self::$peer;
	}

} 