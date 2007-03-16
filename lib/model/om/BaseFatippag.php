<?php


abstract class BaseFatippag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtippag;


	
	protected $destippag;


	
	protected $tipcan;


	
	protected $genmov;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtippag()
	{

		return $this->codtippag;
	}

	
	public function getDestippag()
	{

		return $this->destippag;
	}

	
	public function getTipcan()
	{

		return $this->tipcan;
	}

	
	public function getGenmov()
	{

		return $this->genmov;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodtippag($v)
	{

		if ($this->codtippag !== $v) {
			$this->codtippag = $v;
			$this->modifiedColumns[] = FatippagPeer::CODTIPPAG;
		}

	} 
	
	public function setDestippag($v)
	{

		if ($this->destippag !== $v) {
			$this->destippag = $v;
			$this->modifiedColumns[] = FatippagPeer::DESTIPPAG;
		}

	} 
	
	public function setTipcan($v)
	{

		if ($this->tipcan !== $v) {
			$this->tipcan = $v;
			$this->modifiedColumns[] = FatippagPeer::TIPCAN;
		}

	} 
	
	public function setGenmov($v)
	{

		if ($this->genmov !== $v) {
			$this->genmov = $v;
			$this->modifiedColumns[] = FatippagPeer::GENMOV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FatippagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtippag = $rs->getString($startcol + 0);

			$this->destippag = $rs->getString($startcol + 1);

			$this->tipcan = $rs->getString($startcol + 2);

			$this->genmov = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fatippag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FatippagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FatippagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FatippagPeer::DATABASE_NAME);
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
					$pk = FatippagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FatippagPeer::doUpdate($this, $con);
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


			if (($retval = FatippagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatippagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtippag();
				break;
			case 1:
				return $this->getDestippag();
				break;
			case 2:
				return $this->getTipcan();
				break;
			case 3:
				return $this->getGenmov();
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
		$keys = FatippagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtippag(),
			$keys[1] => $this->getDestippag(),
			$keys[2] => $this->getTipcan(),
			$keys[3] => $this->getGenmov(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatippagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtippag($value);
				break;
			case 1:
				$this->setDestippag($value);
				break;
			case 2:
				$this->setTipcan($value);
				break;
			case 3:
				$this->setGenmov($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatippagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtippag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestippag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcan($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGenmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FatippagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FatippagPeer::CODTIPPAG)) $criteria->add(FatippagPeer::CODTIPPAG, $this->codtippag);
		if ($this->isColumnModified(FatippagPeer::DESTIPPAG)) $criteria->add(FatippagPeer::DESTIPPAG, $this->destippag);
		if ($this->isColumnModified(FatippagPeer::TIPCAN)) $criteria->add(FatippagPeer::TIPCAN, $this->tipcan);
		if ($this->isColumnModified(FatippagPeer::GENMOV)) $criteria->add(FatippagPeer::GENMOV, $this->genmov);
		if ($this->isColumnModified(FatippagPeer::ID)) $criteria->add(FatippagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FatippagPeer::DATABASE_NAME);

		$criteria->add(FatippagPeer::ID, $this->id);

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

		$copyObj->setCodtippag($this->codtippag);

		$copyObj->setDestippag($this->destippag);

		$copyObj->setTipcan($this->tipcan);

		$copyObj->setGenmov($this->genmov);


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
			self::$peer = new FatippagPeer();
		}
		return self::$peer;
	}

} 