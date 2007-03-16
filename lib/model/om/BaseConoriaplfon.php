<?php


abstract class BaseConoriaplfon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcta;


	
	protected $descta;


	
	protected $oyafon;


	
	protected $ordenoya;


	
	protected $flucaj;


	
	protected $ordenflu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcta()
	{

		return $this->codcta;
	}

	
	public function getDescta()
	{

		return $this->descta;
	}

	
	public function getOyafon()
	{

		return $this->oyafon;
	}

	
	public function getOrdenoya()
	{

		return $this->ordenoya;
	}

	
	public function getFlucaj()
	{

		return $this->flucaj;
	}

	
	public function getOrdenflu()
	{

		return $this->ordenflu;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = ConoriaplfonPeer::CODCTA;
		}

	} 
	
	public function setDescta($v)
	{

		if ($this->descta !== $v) {
			$this->descta = $v;
			$this->modifiedColumns[] = ConoriaplfonPeer::DESCTA;
		}

	} 
	
	public function setOyafon($v)
	{

		if ($this->oyafon !== $v) {
			$this->oyafon = $v;
			$this->modifiedColumns[] = ConoriaplfonPeer::OYAFON;
		}

	} 
	
	public function setOrdenoya($v)
	{

		if ($this->ordenoya !== $v) {
			$this->ordenoya = $v;
			$this->modifiedColumns[] = ConoriaplfonPeer::ORDENOYA;
		}

	} 
	
	public function setFlucaj($v)
	{

		if ($this->flucaj !== $v) {
			$this->flucaj = $v;
			$this->modifiedColumns[] = ConoriaplfonPeer::FLUCAJ;
		}

	} 
	
	public function setOrdenflu($v)
	{

		if ($this->ordenflu !== $v) {
			$this->ordenflu = $v;
			$this->modifiedColumns[] = ConoriaplfonPeer::ORDENFLU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ConoriaplfonPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcta = $rs->getString($startcol + 0);

			$this->descta = $rs->getString($startcol + 1);

			$this->oyafon = $rs->getString($startcol + 2);

			$this->ordenoya = $rs->getFloat($startcol + 3);

			$this->flucaj = $rs->getString($startcol + 4);

			$this->ordenflu = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Conoriaplfon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ConoriaplfonPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ConoriaplfonPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ConoriaplfonPeer::DATABASE_NAME);
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
					$pk = ConoriaplfonPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ConoriaplfonPeer::doUpdate($this, $con);
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


			if (($retval = ConoriaplfonPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConoriaplfonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcta();
				break;
			case 1:
				return $this->getDescta();
				break;
			case 2:
				return $this->getOyafon();
				break;
			case 3:
				return $this->getOrdenoya();
				break;
			case 4:
				return $this->getFlucaj();
				break;
			case 5:
				return $this->getOrdenflu();
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
		$keys = ConoriaplfonPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcta(),
			$keys[1] => $this->getDescta(),
			$keys[2] => $this->getOyafon(),
			$keys[3] => $this->getOrdenoya(),
			$keys[4] => $this->getFlucaj(),
			$keys[5] => $this->getOrdenflu(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConoriaplfonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcta($value);
				break;
			case 1:
				$this->setDescta($value);
				break;
			case 2:
				$this->setOyafon($value);
				break;
			case 3:
				$this->setOrdenoya($value);
				break;
			case 4:
				$this->setFlucaj($value);
				break;
			case 5:
				$this->setOrdenflu($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ConoriaplfonPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOyafon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOrdenoya($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFlucaj($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrdenflu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ConoriaplfonPeer::DATABASE_NAME);

		if ($this->isColumnModified(ConoriaplfonPeer::CODCTA)) $criteria->add(ConoriaplfonPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(ConoriaplfonPeer::DESCTA)) $criteria->add(ConoriaplfonPeer::DESCTA, $this->descta);
		if ($this->isColumnModified(ConoriaplfonPeer::OYAFON)) $criteria->add(ConoriaplfonPeer::OYAFON, $this->oyafon);
		if ($this->isColumnModified(ConoriaplfonPeer::ORDENOYA)) $criteria->add(ConoriaplfonPeer::ORDENOYA, $this->ordenoya);
		if ($this->isColumnModified(ConoriaplfonPeer::FLUCAJ)) $criteria->add(ConoriaplfonPeer::FLUCAJ, $this->flucaj);
		if ($this->isColumnModified(ConoriaplfonPeer::ORDENFLU)) $criteria->add(ConoriaplfonPeer::ORDENFLU, $this->ordenflu);
		if ($this->isColumnModified(ConoriaplfonPeer::ID)) $criteria->add(ConoriaplfonPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ConoriaplfonPeer::DATABASE_NAME);

		$criteria->add(ConoriaplfonPeer::ID, $this->id);

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

		$copyObj->setCodcta($this->codcta);

		$copyObj->setDescta($this->descta);

		$copyObj->setOyafon($this->oyafon);

		$copyObj->setOrdenoya($this->ordenoya);

		$copyObj->setFlucaj($this->flucaj);

		$copyObj->setOrdenflu($this->ordenflu);


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
			self::$peer = new ConoriaplfonPeer();
		}
		return self::$peer;
	}

} 