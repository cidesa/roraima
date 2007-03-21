<?php


abstract class BaseOpdetord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $refcom;


	
	protected $codpre;


	
	protected $moncau;


	
	protected $mondes;


	
	protected $monret;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumord()
	{

		return $this->numord;
	}

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getMoncau()
	{

		return $this->moncau;
	}

	
	public function getMondes()
	{

		return $this->mondes;
	}

	
	public function getMonret()
	{

		return $this->monret;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumord($v)
	{

		if ($this->numord !== $v) {
			$this->numord = $v;
			$this->modifiedColumns[] = OpdetordPeer::NUMORD;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = OpdetordPeer::REFCOM;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = OpdetordPeer::CODPRE;
		}

	} 
	
	public function setMoncau($v)
	{

		if ($this->moncau !== $v) {
			$this->moncau = $v;
			$this->modifiedColumns[] = OpdetordPeer::MONCAU;
		}

	} 
	
	public function setMondes($v)
	{

		if ($this->mondes !== $v) {
			$this->mondes = $v;
			$this->modifiedColumns[] = OpdetordPeer::MONDES;
		}

	} 
	
	public function setMonret($v)
	{

		if ($this->monret !== $v) {
			$this->monret = $v;
			$this->modifiedColumns[] = OpdetordPeer::MONRET;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OpdetordPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numord = $rs->getString($startcol + 0);

			$this->refcom = $rs->getString($startcol + 1);

			$this->codpre = $rs->getString($startcol + 2);

			$this->moncau = $rs->getFloat($startcol + 3);

			$this->mondes = $rs->getFloat($startcol + 4);

			$this->monret = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Opdetord object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OpdetordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpdetordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpdetordPeer::DATABASE_NAME);
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
					$pk = OpdetordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OpdetordPeer::doUpdate($this, $con);
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


			if (($retval = OpdetordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getRefcom();
				break;
			case 2:
				return $this->getCodpre();
				break;
			case 3:
				return $this->getMoncau();
				break;
			case 4:
				return $this->getMondes();
				break;
			case 5:
				return $this->getMonret();
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
		$keys = OpdetordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getRefcom(),
			$keys[2] => $this->getCodpre(),
			$keys[3] => $this->getMoncau(),
			$keys[4] => $this->getMondes(),
			$keys[5] => $this->getMonret(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setRefcom($value);
				break;
			case 2:
				$this->setCodpre($value);
				break;
			case 3:
				$this->setMoncau($value);
				break;
			case 4:
				$this->setMondes($value);
				break;
			case 5:
				$this->setMonret($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdetordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncau($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonret($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpdetordPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpdetordPeer::NUMORD)) $criteria->add(OpdetordPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpdetordPeer::REFCOM)) $criteria->add(OpdetordPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(OpdetordPeer::CODPRE)) $criteria->add(OpdetordPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OpdetordPeer::MONCAU)) $criteria->add(OpdetordPeer::MONCAU, $this->moncau);
		if ($this->isColumnModified(OpdetordPeer::MONDES)) $criteria->add(OpdetordPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(OpdetordPeer::MONRET)) $criteria->add(OpdetordPeer::MONRET, $this->monret);
		if ($this->isColumnModified(OpdetordPeer::ID)) $criteria->add(OpdetordPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpdetordPeer::DATABASE_NAME);

		$criteria->add(OpdetordPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonret($this->monret);


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
			self::$peer = new OpdetordPeer();
		}
		return self::$peer;
	}

} 