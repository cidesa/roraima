<?php


abstract class BaseFcdetrep extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numrep;


	
	protected $descrip;


	
	protected $tipo;


	
	protected $monto;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumrep()
	{

		return $this->numrep;
	}

	
	public function getDescrip()
	{

		return $this->descrip;
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumrep($v)
	{

		if ($this->numrep !== $v) {
			$this->numrep = $v;
			$this->modifiedColumns[] = FcdetrepPeer::NUMREP;
		}

	} 
	
	public function setDescrip($v)
	{

		if ($this->descrip !== $v) {
			$this->descrip = $v;
			$this->modifiedColumns[] = FcdetrepPeer::DESCRIP;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = FcdetrepPeer::TIPO;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = FcdetrepPeer::MONTO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdetrepPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numrep = $rs->getString($startcol + 0);

			$this->descrip = $rs->getString($startcol + 1);

			$this->tipo = $rs->getString($startcol + 2);

			$this->monto = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdetrep object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdetrepPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdetrepPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdetrepPeer::DATABASE_NAME);
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
					$pk = FcdetrepPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdetrepPeer::doUpdate($this, $con);
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


			if (($retval = FcdetrepPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetrepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumrep();
				break;
			case 1:
				return $this->getDescrip();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getMonto();
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
		$keys = FcdetrepPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumrep(),
			$keys[1] => $this->getDescrip(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getMonto(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetrepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumrep($value);
				break;
			case 1:
				$this->setDescrip($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setMonto($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetrepPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumrep($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescrip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdetrepPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdetrepPeer::NUMREP)) $criteria->add(FcdetrepPeer::NUMREP, $this->numrep);
		if ($this->isColumnModified(FcdetrepPeer::DESCRIP)) $criteria->add(FcdetrepPeer::DESCRIP, $this->descrip);
		if ($this->isColumnModified(FcdetrepPeer::TIPO)) $criteria->add(FcdetrepPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FcdetrepPeer::MONTO)) $criteria->add(FcdetrepPeer::MONTO, $this->monto);
		if ($this->isColumnModified(FcdetrepPeer::ID)) $criteria->add(FcdetrepPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdetrepPeer::DATABASE_NAME);

		$criteria->add(FcdetrepPeer::ID, $this->id);

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

		$copyObj->setNumrep($this->numrep);

		$copyObj->setDescrip($this->descrip);

		$copyObj->setTipo($this->tipo);

		$copyObj->setMonto($this->monto);


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
			self::$peer = new FcdetrepPeer();
		}
		return self::$peer;
	}

} 