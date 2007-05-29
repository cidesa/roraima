<?php


abstract class BaseForcarocp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcar;


	
	protected $descar;


	
	protected $gracar;


	
	protected $suecar;


	
	protected $tipcar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcar()
	{

		return $this->codcar; 		
	}
	
	public function getDescar()
	{

		return $this->descar; 		
	}
	
	public function getGracar()
	{

		return $this->gracar; 		
	}
	
	public function getSuecar()
	{

		return number_format($this->suecar,2,',','.');
		
	}
	
	public function getTipcar()
	{

		return $this->tipcar; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = ForcarocpPeer::CODCAR;
		}

	} 
	
	public function setDescar($v)
	{

		if ($this->descar !== $v) {
			$this->descar = $v;
			$this->modifiedColumns[] = ForcarocpPeer::DESCAR;
		}

	} 
	
	public function setGracar($v)
	{

		if ($this->gracar !== $v) {
			$this->gracar = $v;
			$this->modifiedColumns[] = ForcarocpPeer::GRACAR;
		}

	} 
	
	public function setSuecar($v)
	{

		if ($this->suecar !== $v) {
			$this->suecar = $v;
			$this->modifiedColumns[] = ForcarocpPeer::SUECAR;
		}

	} 
	
	public function setTipcar($v)
	{

		if ($this->tipcar !== $v) {
			$this->tipcar = $v;
			$this->modifiedColumns[] = ForcarocpPeer::TIPCAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForcarocpPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcar = $rs->getString($startcol + 0);

			$this->descar = $rs->getString($startcol + 1);

			$this->gracar = $rs->getString($startcol + 2);

			$this->suecar = $rs->getFloat($startcol + 3);

			$this->tipcar = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forcarocp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForcarocpPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForcarocpPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForcarocpPeer::DATABASE_NAME);
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
					$pk = ForcarocpPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForcarocpPeer::doUpdate($this, $con);
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


			if (($retval = ForcarocpPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcarocpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcar();
				break;
			case 1:
				return $this->getDescar();
				break;
			case 2:
				return $this->getGracar();
				break;
			case 3:
				return $this->getSuecar();
				break;
			case 4:
				return $this->getTipcar();
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
		$keys = ForcarocpPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcar(),
			$keys[1] => $this->getDescar(),
			$keys[2] => $this->getGracar(),
			$keys[3] => $this->getSuecar(),
			$keys[4] => $this->getTipcar(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcarocpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcar($value);
				break;
			case 1:
				$this->setDescar($value);
				break;
			case 2:
				$this->setGracar($value);
				break;
			case 3:
				$this->setSuecar($value);
				break;
			case 4:
				$this->setTipcar($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForcarocpPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGracar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSuecar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipcar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForcarocpPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForcarocpPeer::CODCAR)) $criteria->add(ForcarocpPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(ForcarocpPeer::DESCAR)) $criteria->add(ForcarocpPeer::DESCAR, $this->descar);
		if ($this->isColumnModified(ForcarocpPeer::GRACAR)) $criteria->add(ForcarocpPeer::GRACAR, $this->gracar);
		if ($this->isColumnModified(ForcarocpPeer::SUECAR)) $criteria->add(ForcarocpPeer::SUECAR, $this->suecar);
		if ($this->isColumnModified(ForcarocpPeer::TIPCAR)) $criteria->add(ForcarocpPeer::TIPCAR, $this->tipcar);
		if ($this->isColumnModified(ForcarocpPeer::ID)) $criteria->add(ForcarocpPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForcarocpPeer::DATABASE_NAME);

		$criteria->add(ForcarocpPeer::ID, $this->id);

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

		$copyObj->setDescar($this->descar);

		$copyObj->setGracar($this->gracar);

		$copyObj->setSuecar($this->suecar);

		$copyObj->setTipcar($this->tipcar);


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
			self::$peer = new ForcarocpPeer();
		}
		return self::$peer;
	}

} 