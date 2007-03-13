<?php


abstract class BaseCaforent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codforent;


	
	protected $desforent;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodforent()
	{

		return $this->codforent;
	}

	
	public function getDesforent()
	{

		return $this->desforent;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodforent($v)
	{

		if ($this->codforent !== $v) {
			$this->codforent = $v;
			$this->modifiedColumns[] = CaforentPeer::CODFORENT;
		}

	} 
	
	public function setDesforent($v)
	{

		if ($this->desforent !== $v) {
			$this->desforent = $v;
			$this->modifiedColumns[] = CaforentPeer::DESFORENT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaforentPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codforent = $rs->getString($startcol + 0);

			$this->desforent = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caforent object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaforentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaforentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaforentPeer::DATABASE_NAME);
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
					$pk = CaforentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaforentPeer::doUpdate($this, $con);
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


			if (($retval = CaforentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaforentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodforent();
				break;
			case 1:
				return $this->getDesforent();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaforentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodforent(),
			$keys[1] => $this->getDesforent(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaforentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodforent($value);
				break;
			case 1:
				$this->setDesforent($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaforentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodforent($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesforent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaforentPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaforentPeer::CODFORENT)) $criteria->add(CaforentPeer::CODFORENT, $this->codforent);
		if ($this->isColumnModified(CaforentPeer::DESFORENT)) $criteria->add(CaforentPeer::DESFORENT, $this->desforent);
		if ($this->isColumnModified(CaforentPeer::ID)) $criteria->add(CaforentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaforentPeer::DATABASE_NAME);

		$criteria->add(CaforentPeer::CODFORENT, $this->codforent);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCodforent();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCodforent($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDesforent($this->desforent);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setCodforent(NULL); 
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
			self::$peer = new CaforentPeer();
		}
		return self::$peer;
	}

} 