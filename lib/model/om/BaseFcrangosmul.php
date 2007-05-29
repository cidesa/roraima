<?php


abstract class BaseFcrangosmul extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmul;


	
	protected $diasdesde = 0;


	
	protected $diashasta = 0;


	
	protected $valor = 0;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmul()
	{

		return $this->codmul; 		
	}
	
	public function getDiasdesde()
	{

		return number_format($this->diasdesde,2,',','.');
		
	}
	
	public function getDiashasta()
	{

		return number_format($this->diashasta,2,',','.');
		
	}
	
	public function getValor()
	{

		return number_format($this->valor,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmul($v)
	{

		if ($this->codmul !== $v) {
			$this->codmul = $v;
			$this->modifiedColumns[] = FcrangosmulPeer::CODMUL;
		}

	} 
	
	public function setDiasdesde($v)
	{

		if ($this->diasdesde !== $v || $v === 0) {
			$this->diasdesde = $v;
			$this->modifiedColumns[] = FcrangosmulPeer::DIASDESDE;
		}

	} 
	
	public function setDiashasta($v)
	{

		if ($this->diashasta !== $v || $v === 0) {
			$this->diashasta = $v;
			$this->modifiedColumns[] = FcrangosmulPeer::DIASHASTA;
		}

	} 
	
	public function setValor($v)
	{

		if ($this->valor !== $v || $v === 0) {
			$this->valor = $v;
			$this->modifiedColumns[] = FcrangosmulPeer::VALOR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcrangosmulPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmul = $rs->getString($startcol + 0);

			$this->diasdesde = $rs->getFloat($startcol + 1);

			$this->diashasta = $rs->getFloat($startcol + 2);

			$this->valor = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcrangosmul object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcrangosmulPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrangosmulPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrangosmulPeer::DATABASE_NAME);
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
					$pk = FcrangosmulPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcrangosmulPeer::doUpdate($this, $con);
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


			if (($retval = FcrangosmulPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrangosmulPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmul();
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
		$keys = FcrangosmulPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmul(),
			$keys[1] => $this->getDiasdesde(),
			$keys[2] => $this->getDiashasta(),
			$keys[3] => $this->getValor(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrangosmulPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmul($value);
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
		$keys = FcrangosmulPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmul($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDiasdesde($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiashasta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrangosmulPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrangosmulPeer::CODMUL)) $criteria->add(FcrangosmulPeer::CODMUL, $this->codmul);
		if ($this->isColumnModified(FcrangosmulPeer::DIASDESDE)) $criteria->add(FcrangosmulPeer::DIASDESDE, $this->diasdesde);
		if ($this->isColumnModified(FcrangosmulPeer::DIASHASTA)) $criteria->add(FcrangosmulPeer::DIASHASTA, $this->diashasta);
		if ($this->isColumnModified(FcrangosmulPeer::VALOR)) $criteria->add(FcrangosmulPeer::VALOR, $this->valor);
		if ($this->isColumnModified(FcrangosmulPeer::ID)) $criteria->add(FcrangosmulPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrangosmulPeer::DATABASE_NAME);

		$criteria->add(FcrangosmulPeer::ID, $this->id);

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

		$copyObj->setCodmul($this->codmul);

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
			self::$peer = new FcrangosmulPeer();
		}
		return self::$peer;
	}

} 