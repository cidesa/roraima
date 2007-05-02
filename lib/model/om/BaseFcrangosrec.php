<?php


abstract class BaseFcrangosrec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrec;


	
	protected $diasdesde = 0;


	
	protected $diashasta = 0;


	
	protected $valor = 0;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodrec()
	{

		return $this->codrec;
	}

	
	public function getDiasdesde()
	{

		return $this->diasdesde;
	}

	
	public function getDiashasta()
	{

		return $this->diashasta;
	}

	
	public function getValor()
	{

		return $this->valor;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodrec($v)
	{

		if ($this->codrec !== $v) {
			$this->codrec = $v;
			$this->modifiedColumns[] = FcrangosrecPeer::CODREC;
		}

	} 
	
	public function setDiasdesde($v)
	{

		if ($this->diasdesde !== $v || $v === 0) {
			$this->diasdesde = $v;
			$this->modifiedColumns[] = FcrangosrecPeer::DIASDESDE;
		}

	} 
	
	public function setDiashasta($v)
	{

		if ($this->diashasta !== $v || $v === 0) {
			$this->diashasta = $v;
			$this->modifiedColumns[] = FcrangosrecPeer::DIASHASTA;
		}

	} 
	
	public function setValor($v)
	{

		if ($this->valor !== $v || $v === 0) {
			$this->valor = $v;
			$this->modifiedColumns[] = FcrangosrecPeer::VALOR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcrangosrecPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codrec = $rs->getString($startcol + 0);

			$this->diasdesde = $rs->getFloat($startcol + 1);

			$this->diashasta = $rs->getFloat($startcol + 2);

			$this->valor = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcrangosrec object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcrangosrecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrangosrecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrangosrecPeer::DATABASE_NAME);
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
					$pk = FcrangosrecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcrangosrecPeer::doUpdate($this, $con);
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


			if (($retval = FcrangosrecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrangosrecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrec();
				break;
			case 1:
				return $this->getDiasdesde();
				break;
			case 2:
				return $this->getDiashasta();
				break;
			case 3:
				return $this->getValor();
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
		$keys = FcrangosrecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrec(),
			$keys[1] => $this->getDiasdesde(),
			$keys[2] => $this->getDiashasta(),
			$keys[3] => $this->getValor(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrangosrecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrec($value);
				break;
			case 1:
				$this->setDiasdesde($value);
				break;
			case 2:
				$this->setDiashasta($value);
				break;
			case 3:
				$this->setValor($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrangosrecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDiasdesde($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiashasta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrangosrecPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrangosrecPeer::CODREC)) $criteria->add(FcrangosrecPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FcrangosrecPeer::DIASDESDE)) $criteria->add(FcrangosrecPeer::DIASDESDE, $this->diasdesde);
		if ($this->isColumnModified(FcrangosrecPeer::DIASHASTA)) $criteria->add(FcrangosrecPeer::DIASHASTA, $this->diashasta);
		if ($this->isColumnModified(FcrangosrecPeer::VALOR)) $criteria->add(FcrangosrecPeer::VALOR, $this->valor);
		if ($this->isColumnModified(FcrangosrecPeer::ID)) $criteria->add(FcrangosrecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrangosrecPeer::DATABASE_NAME);

		$criteria->add(FcrangosrecPeer::ID, $this->id);

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

		$copyObj->setDiasdesde($this->diasdesde);

		$copyObj->setDiashasta($this->diashasta);

		$copyObj->setValor($this->valor);


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
			self::$peer = new FcrangosrecPeer();
		}
		return self::$peer;
	}

} 