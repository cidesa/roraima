<?php


abstract class BaseFcdefrecint extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrec;


	
	protected $nomrec;


	
	protected $tipo;


	
	protected $modo;


	
	protected $periodo = '';


	
	protected $promedio = '';


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodrec()
	{

		return $this->codrec;
	}

	
	public function getNomrec()
	{

		return $this->nomrec;
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getModo()
	{

		return $this->modo;
	}

	
	public function getPeriodo()
	{

		return $this->periodo;
	}

	
	public function getPromedio()
	{

		return $this->promedio;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodrec($v)
	{

		if ($this->codrec !== $v) {
			$this->codrec = $v;
			$this->modifiedColumns[] = FcdefrecintPeer::CODREC;
		}

	} 
	
	public function setNomrec($v)
	{

		if ($this->nomrec !== $v) {
			$this->nomrec = $v;
			$this->modifiedColumns[] = FcdefrecintPeer::NOMREC;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = FcdefrecintPeer::TIPO;
		}

	} 
	
	public function setModo($v)
	{

		if ($this->modo !== $v) {
			$this->modo = $v;
			$this->modifiedColumns[] = FcdefrecintPeer::MODO;
		}

	} 
	
	public function setPeriodo($v)
	{

		if ($this->periodo !== $v || $v === '') {
			$this->periodo = $v;
			$this->modifiedColumns[] = FcdefrecintPeer::PERIODO;
		}

	} 
	
	public function setPromedio($v)
	{

		if ($this->promedio !== $v || $v === '') {
			$this->promedio = $v;
			$this->modifiedColumns[] = FcdefrecintPeer::PROMEDIO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdefrecintPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codrec = $rs->getString($startcol + 0);

			$this->nomrec = $rs->getString($startcol + 1);

			$this->tipo = $rs->getString($startcol + 2);

			$this->modo = $rs->getString($startcol + 3);

			$this->periodo = $rs->getString($startcol + 4);

			$this->promedio = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdefrecint object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdefrecintPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdefrecintPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdefrecintPeer::DATABASE_NAME);
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
					$pk = FcdefrecintPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdefrecintPeer::doUpdate($this, $con);
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


			if (($retval = FcdefrecintPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefrecintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrec();
				break;
			case 1:
				return $this->getNomrec();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getModo();
				break;
			case 4:
				return $this->getPeriodo();
				break;
			case 5:
				return $this->getPromedio();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefrecintPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrec(),
			$keys[1] => $this->getNomrec(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getModo(),
			$keys[4] => $this->getPeriodo(),
			$keys[5] => $this->getPromedio(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefrecintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrec($value);
				break;
			case 1:
				$this->setNomrec($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setModo($value);
				break;
			case 4:
				$this->setPeriodo($value);
				break;
			case 5:
				$this->setPromedio($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefrecintPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setModo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPeriodo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPromedio($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdefrecintPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdefrecintPeer::CODREC)) $criteria->add(FcdefrecintPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FcdefrecintPeer::NOMREC)) $criteria->add(FcdefrecintPeer::NOMREC, $this->nomrec);
		if ($this->isColumnModified(FcdefrecintPeer::TIPO)) $criteria->add(FcdefrecintPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FcdefrecintPeer::MODO)) $criteria->add(FcdefrecintPeer::MODO, $this->modo);
		if ($this->isColumnModified(FcdefrecintPeer::PERIODO)) $criteria->add(FcdefrecintPeer::PERIODO, $this->periodo);
		if ($this->isColumnModified(FcdefrecintPeer::PROMEDIO)) $criteria->add(FcdefrecintPeer::PROMEDIO, $this->promedio);
		if ($this->isColumnModified(FcdefrecintPeer::ID)) $criteria->add(FcdefrecintPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdefrecintPeer::DATABASE_NAME);

		$criteria->add(FcdefrecintPeer::ID, $this->id);

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

		$copyObj->setCodrec($this->codrec);

		$copyObj->setNomrec($this->nomrec);

		$copyObj->setTipo($this->tipo);

		$copyObj->setModo($this->modo);

		$copyObj->setPeriodo($this->periodo);

		$copyObj->setPromedio($this->promedio);


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
			self::$peer = new FcdefrecintPeer();
		}
		return self::$peer;
	}

} 