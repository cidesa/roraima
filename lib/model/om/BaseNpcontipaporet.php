<?php


abstract class BaseNpcontipaporet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipapo;


	
	protected $codnom;


	
	protected $codcon;


	
	protected $tipo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtipapo()
	{

		return $this->codtipapo;
	}

	
	public function getCodnom()
	{

		return $this->codnom;
	}

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodtipapo($v)
	{

		if ($this->codtipapo !== $v) {
			$this->codtipapo = $v;
			$this->modifiedColumns[] = NpcontipaporetPeer::CODTIPAPO;
		}

	} 
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpcontipaporetPeer::CODNOM;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpcontipaporetPeer::CODCON;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = NpcontipaporetPeer::TIPO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcontipaporetPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtipapo = $rs->getString($startcol + 0);

			$this->codnom = $rs->getString($startcol + 1);

			$this->codcon = $rs->getString($startcol + 2);

			$this->tipo = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcontipaporet object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcontipaporetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcontipaporetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcontipaporetPeer::DATABASE_NAME);
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
					$pk = NpcontipaporetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcontipaporetPeer::doUpdate($this, $con);
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


			if (($retval = NpcontipaporetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcontipaporetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipapo();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getTipo();
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
		$keys = NpcontipaporetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipapo(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getTipo(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcontipaporetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipapo($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setTipo($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcontipaporetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipapo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcontipaporetPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcontipaporetPeer::CODTIPAPO)) $criteria->add(NpcontipaporetPeer::CODTIPAPO, $this->codtipapo);
		if ($this->isColumnModified(NpcontipaporetPeer::CODNOM)) $criteria->add(NpcontipaporetPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpcontipaporetPeer::CODCON)) $criteria->add(NpcontipaporetPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpcontipaporetPeer::TIPO)) $criteria->add(NpcontipaporetPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(NpcontipaporetPeer::ID)) $criteria->add(NpcontipaporetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcontipaporetPeer::DATABASE_NAME);

		$criteria->add(NpcontipaporetPeer::ID, $this->id);

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

		$copyObj->setCodtipapo($this->codtipapo);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setTipo($this->tipo);


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
			self::$peer = new NpcontipaporetPeer();
		}
		return self::$peer;
	}

} 