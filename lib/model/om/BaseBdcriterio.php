<?php


abstract class BaseBdcriterio extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $criterio;


	
	protected $sql;


	
	protected $temporal;


	
	protected $observacion;


	
	protected $numero;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCriterio()
	{

		return $this->criterio;
	}

	
	public function getSql()
	{

		return $this->sql;
	}

	
	public function getTemporal()
	{

		return $this->temporal;
	}

	
	public function getObservacion()
	{

		return $this->observacion;
	}

	
	public function getNumero()
	{

		return $this->numero;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCriterio($v)
	{

		if ($this->criterio !== $v) {
			$this->criterio = $v;
			$this->modifiedColumns[] = BdcriterioPeer::CRITERIO;
		}

	} 
	
	public function setSql($v)
	{

		if ($this->sql !== $v) {
			$this->sql = $v;
			$this->modifiedColumns[] = BdcriterioPeer::SQL;
		}

	} 
	
	public function setTemporal($v)
	{

		if ($this->temporal !== $v) {
			$this->temporal = $v;
			$this->modifiedColumns[] = BdcriterioPeer::TEMPORAL;
		}

	} 
	
	public function setObservacion($v)
	{

		if ($this->observacion !== $v) {
			$this->observacion = $v;
			$this->modifiedColumns[] = BdcriterioPeer::OBSERVACION;
		}

	} 
	
	public function setNumero($v)
	{

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = BdcriterioPeer::NUMERO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BdcriterioPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->criterio = $rs->getString($startcol + 0);

			$this->sql = $rs->getString($startcol + 1);

			$this->temporal = $rs->getString($startcol + 2);

			$this->observacion = $rs->getString($startcol + 3);

			$this->numero = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bdcriterio object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BdcriterioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BdcriterioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BdcriterioPeer::DATABASE_NAME);
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
					$pk = BdcriterioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BdcriterioPeer::doUpdate($this, $con);
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


			if (($retval = BdcriterioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BdcriterioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCriterio();
				break;
			case 1:
				return $this->getSql();
				break;
			case 2:
				return $this->getTemporal();
				break;
			case 3:
				return $this->getObservacion();
				break;
			case 4:
				return $this->getNumero();
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
		$keys = BdcriterioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCriterio(),
			$keys[1] => $this->getSql(),
			$keys[2] => $this->getTemporal(),
			$keys[3] => $this->getObservacion(),
			$keys[4] => $this->getNumero(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BdcriterioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCriterio($value);
				break;
			case 1:
				$this->setSql($value);
				break;
			case 2:
				$this->setTemporal($value);
				break;
			case 3:
				$this->setObservacion($value);
				break;
			case 4:
				$this->setNumero($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BdcriterioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCriterio($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSql($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTemporal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObservacion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumero($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BdcriterioPeer::DATABASE_NAME);

		if ($this->isColumnModified(BdcriterioPeer::CRITERIO)) $criteria->add(BdcriterioPeer::CRITERIO, $this->criterio);
		if ($this->isColumnModified(BdcriterioPeer::SQL)) $criteria->add(BdcriterioPeer::SQL, $this->sql);
		if ($this->isColumnModified(BdcriterioPeer::TEMPORAL)) $criteria->add(BdcriterioPeer::TEMPORAL, $this->temporal);
		if ($this->isColumnModified(BdcriterioPeer::OBSERVACION)) $criteria->add(BdcriterioPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(BdcriterioPeer::NUMERO)) $criteria->add(BdcriterioPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(BdcriterioPeer::ID)) $criteria->add(BdcriterioPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BdcriterioPeer::DATABASE_NAME);

		$criteria->add(BdcriterioPeer::ID, $this->id);

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

		$copyObj->setCriterio($this->criterio);

		$copyObj->setSql($this->sql);

		$copyObj->setTemporal($this->temporal);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setNumero($this->numero);


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
			self::$peer = new BdcriterioPeer();
		}
		return self::$peer;
	}

} 