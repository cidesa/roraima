<?php


abstract class BaseNpcertificados extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codadi;


	
	protected $codcer;


	
	protected $descer;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodadi()
	{

		return $this->codadi; 		
	}
	
	public function getCodcer()
	{

		return $this->codcer; 		
	}
	
	public function getDescer()
	{

		return $this->descer; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodadi($v)
	{

		if ($this->codadi !== $v) {
			$this->codadi = $v;
			$this->modifiedColumns[] = NpcertificadosPeer::CODADI;
		}

	} 
	
	public function setCodcer($v)
	{

		if ($this->codcer !== $v) {
			$this->codcer = $v;
			$this->modifiedColumns[] = NpcertificadosPeer::CODCER;
		}

	} 
	
	public function setDescer($v)
	{

		if ($this->descer !== $v) {
			$this->descer = $v;
			$this->modifiedColumns[] = NpcertificadosPeer::DESCER;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcertificadosPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codadi = $rs->getString($startcol + 0);

			$this->codcer = $rs->getString($startcol + 1);

			$this->descer = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcertificados object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcertificadosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcertificadosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcertificadosPeer::DATABASE_NAME);
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
					$pk = NpcertificadosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcertificadosPeer::doUpdate($this, $con);
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


			if (($retval = NpcertificadosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcertificadosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodadi();
				break;
			case 1:
				return $this->getCodcer();
				break;
			case 2:
				return $this->getDescer();
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
		$keys = NpcertificadosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodadi(),
			$keys[1] => $this->getCodcer(),
			$keys[2] => $this->getDescer(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcertificadosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodadi($value);
				break;
			case 1:
				$this->setCodcer($value);
				break;
			case 2:
				$this->setDescer($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcertificadosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodadi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcer($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescer($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcertificadosPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcertificadosPeer::CODADI)) $criteria->add(NpcertificadosPeer::CODADI, $this->codadi);
		if ($this->isColumnModified(NpcertificadosPeer::CODCER)) $criteria->add(NpcertificadosPeer::CODCER, $this->codcer);
		if ($this->isColumnModified(NpcertificadosPeer::DESCER)) $criteria->add(NpcertificadosPeer::DESCER, $this->descer);
		if ($this->isColumnModified(NpcertificadosPeer::ID)) $criteria->add(NpcertificadosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcertificadosPeer::DATABASE_NAME);

		$criteria->add(NpcertificadosPeer::ID, $this->id);

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

		$copyObj->setCodadi($this->codadi);

		$copyObj->setCodcer($this->codcer);

		$copyObj->setDescer($this->descer);


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
			self::$peer = new NpcertificadosPeer();
		}
		return self::$peer;
	}

} 