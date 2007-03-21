<?php


abstract class BaseNpdefctb extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduni;


	
	protected $codcon;


	
	protected $codcta;


	
	protected $nomcta;


	
	protected $debcre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoduni()
	{

		return $this->coduni;
	}

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getCodcta()
	{

		return $this->codcta;
	}

	
	public function getNomcta()
	{

		return $this->nomcta;
	}

	
	public function getDebcre()
	{

		return $this->debcre;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCoduni($v)
	{

		if ($this->coduni !== $v) {
			$this->coduni = $v;
			$this->modifiedColumns[] = NpdefctbPeer::CODUNI;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpdefctbPeer::CODCON;
		}

	} 
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = NpdefctbPeer::CODCTA;
		}

	} 
	
	public function setNomcta($v)
	{

		if ($this->nomcta !== $v) {
			$this->nomcta = $v;
			$this->modifiedColumns[] = NpdefctbPeer::NOMCTA;
		}

	} 
	
	public function setDebcre($v)
	{

		if ($this->debcre !== $v) {
			$this->debcre = $v;
			$this->modifiedColumns[] = NpdefctbPeer::DEBCRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpdefctbPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coduni = $rs->getString($startcol + 0);

			$this->codcon = $rs->getString($startcol + 1);

			$this->codcta = $rs->getString($startcol + 2);

			$this->nomcta = $rs->getString($startcol + 3);

			$this->debcre = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npdefctb object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpdefctbPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefctbPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefctbPeer::DATABASE_NAME);
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
					$pk = NpdefctbPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpdefctbPeer::doUpdate($this, $con);
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


			if (($retval = NpdefctbPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefctbPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduni();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getCodcta();
				break;
			case 3:
				return $this->getNomcta();
				break;
			case 4:
				return $this->getDebcre();
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
		$keys = NpdefctbPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduni(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getCodcta(),
			$keys[3] => $this->getNomcta(),
			$keys[4] => $this->getDebcre(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefctbPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduni($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setCodcta($value);
				break;
			case 3:
				$this->setNomcta($value);
				break;
			case 4:
				$this->setDebcre($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefctbPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduni($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomcta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDebcre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefctbPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefctbPeer::CODUNI)) $criteria->add(NpdefctbPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(NpdefctbPeer::CODCON)) $criteria->add(NpdefctbPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpdefctbPeer::CODCTA)) $criteria->add(NpdefctbPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(NpdefctbPeer::NOMCTA)) $criteria->add(NpdefctbPeer::NOMCTA, $this->nomcta);
		if ($this->isColumnModified(NpdefctbPeer::DEBCRE)) $criteria->add(NpdefctbPeer::DEBCRE, $this->debcre);
		if ($this->isColumnModified(NpdefctbPeer::ID)) $criteria->add(NpdefctbPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefctbPeer::DATABASE_NAME);

		$criteria->add(NpdefctbPeer::ID, $this->id);

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

		$copyObj->setCoduni($this->coduni);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setNomcta($this->nomcta);

		$copyObj->setDebcre($this->debcre);


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
			self::$peer = new NpdefctbPeer();
		}
		return self::$peer;
	}

} 