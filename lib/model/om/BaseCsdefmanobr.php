<?php


abstract class BaseCsdefmanobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmanobr;


	
	protected $desmanobr;


	
	protected $unimed;


	
	protected $cosuni;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmanobr()
	{

		return $this->codmanobr;
	}

	
	public function getDesmanobr()
	{

		return $this->desmanobr;
	}

	
	public function getUnimed()
	{

		return $this->unimed;
	}

	
	public function getCosuni()
	{

		return $this->cosuni;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodmanobr($v)
	{

		if ($this->codmanobr !== $v) {
			$this->codmanobr = $v;
			$this->modifiedColumns[] = CsdefmanobrPeer::CODMANOBR;
		}

	} 
	
	public function setDesmanobr($v)
	{

		if ($this->desmanobr !== $v) {
			$this->desmanobr = $v;
			$this->modifiedColumns[] = CsdefmanobrPeer::DESMANOBR;
		}

	} 
	
	public function setUnimed($v)
	{

		if ($this->unimed !== $v) {
			$this->unimed = $v;
			$this->modifiedColumns[] = CsdefmanobrPeer::UNIMED;
		}

	} 
	
	public function setCosuni($v)
	{

		if ($this->cosuni !== $v) {
			$this->cosuni = $v;
			$this->modifiedColumns[] = CsdefmanobrPeer::COSUNI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CsdefmanobrPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmanobr = $rs->getString($startcol + 0);

			$this->desmanobr = $rs->getString($startcol + 1);

			$this->unimed = $rs->getString($startcol + 2);

			$this->cosuni = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Csdefmanobr object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CsdefmanobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CsdefmanobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CsdefmanobrPeer::DATABASE_NAME);
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
					$pk = CsdefmanobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CsdefmanobrPeer::doUpdate($this, $con);
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


			if (($retval = CsdefmanobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsdefmanobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmanobr();
				break;
			case 1:
				return $this->getDesmanobr();
				break;
			case 2:
				return $this->getUnimed();
				break;
			case 3:
				return $this->getCosuni();
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
		$keys = CsdefmanobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmanobr(),
			$keys[1] => $this->getDesmanobr(),
			$keys[2] => $this->getUnimed(),
			$keys[3] => $this->getCosuni(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsdefmanobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmanobr($value);
				break;
			case 1:
				$this->setDesmanobr($value);
				break;
			case 2:
				$this->setUnimed($value);
				break;
			case 3:
				$this->setCosuni($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsdefmanobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmanobr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesmanobr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCosuni($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CsdefmanobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(CsdefmanobrPeer::CODMANOBR)) $criteria->add(CsdefmanobrPeer::CODMANOBR, $this->codmanobr);
		if ($this->isColumnModified(CsdefmanobrPeer::DESMANOBR)) $criteria->add(CsdefmanobrPeer::DESMANOBR, $this->desmanobr);
		if ($this->isColumnModified(CsdefmanobrPeer::UNIMED)) $criteria->add(CsdefmanobrPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(CsdefmanobrPeer::COSUNI)) $criteria->add(CsdefmanobrPeer::COSUNI, $this->cosuni);
		if ($this->isColumnModified(CsdefmanobrPeer::ID)) $criteria->add(CsdefmanobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CsdefmanobrPeer::DATABASE_NAME);

		$criteria->add(CsdefmanobrPeer::ID, $this->id);

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

		$copyObj->setCodmanobr($this->codmanobr);

		$copyObj->setDesmanobr($this->desmanobr);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCosuni($this->cosuni);


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
			self::$peer = new CsdefmanobrPeer();
		}
		return self::$peer;
	}

} 