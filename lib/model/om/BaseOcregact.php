<?php


abstract class BaseOcregact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $cedins;


	
	protected $cedtec;


	
	protected $cedfis;


	
	protected $cedres;


	
	protected $cedtop;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getCedins()
	{

		return $this->cedins;
	}

	
	public function getCedtec()
	{

		return $this->cedtec;
	}

	
	public function getCedfis()
	{

		return $this->cedfis;
	}

	
	public function getCedres()
	{

		return $this->cedres;
	}

	
	public function getCedtop()
	{

		return $this->cedtop;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcregactPeer::CODCON;
		}

	} 
	
	public function setCedins($v)
	{

		if ($this->cedins !== $v) {
			$this->cedins = $v;
			$this->modifiedColumns[] = OcregactPeer::CEDINS;
		}

	} 
	
	public function setCedtec($v)
	{

		if ($this->cedtec !== $v) {
			$this->cedtec = $v;
			$this->modifiedColumns[] = OcregactPeer::CEDTEC;
		}

	} 
	
	public function setCedfis($v)
	{

		if ($this->cedfis !== $v) {
			$this->cedfis = $v;
			$this->modifiedColumns[] = OcregactPeer::CEDFIS;
		}

	} 
	
	public function setCedres($v)
	{

		if ($this->cedres !== $v) {
			$this->cedres = $v;
			$this->modifiedColumns[] = OcregactPeer::CEDRES;
		}

	} 
	
	public function setCedtop($v)
	{

		if ($this->cedtop !== $v) {
			$this->cedtop = $v;
			$this->modifiedColumns[] = OcregactPeer::CEDTOP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcregactPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->cedins = $rs->getString($startcol + 1);

			$this->cedtec = $rs->getString($startcol + 2);

			$this->cedfis = $rs->getString($startcol + 3);

			$this->cedres = $rs->getString($startcol + 4);

			$this->cedtop = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocregact object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcregactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcregactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcregactPeer::DATABASE_NAME);
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
					$pk = OcregactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcregactPeer::doUpdate($this, $con);
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


			if (($retval = OcregactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCedins();
				break;
			case 2:
				return $this->getCedtec();
				break;
			case 3:
				return $this->getCedfis();
				break;
			case 4:
				return $this->getCedres();
				break;
			case 5:
				return $this->getCedtop();
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
		$keys = OcregactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCedins(),
			$keys[2] => $this->getCedtec(),
			$keys[3] => $this->getCedfis(),
			$keys[4] => $this->getCedres(),
			$keys[5] => $this->getCedtop(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCedins($value);
				break;
			case 2:
				$this->setCedtec($value);
				break;
			case 3:
				$this->setCedfis($value);
				break;
			case 4:
				$this->setCedres($value);
				break;
			case 5:
				$this->setCedtop($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcregactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedins($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedtec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedfis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCedres($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCedtop($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcregactPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcregactPeer::CODCON)) $criteria->add(OcregactPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcregactPeer::CEDINS)) $criteria->add(OcregactPeer::CEDINS, $this->cedins);
		if ($this->isColumnModified(OcregactPeer::CEDTEC)) $criteria->add(OcregactPeer::CEDTEC, $this->cedtec);
		if ($this->isColumnModified(OcregactPeer::CEDFIS)) $criteria->add(OcregactPeer::CEDFIS, $this->cedfis);
		if ($this->isColumnModified(OcregactPeer::CEDRES)) $criteria->add(OcregactPeer::CEDRES, $this->cedres);
		if ($this->isColumnModified(OcregactPeer::CEDTOP)) $criteria->add(OcregactPeer::CEDTOP, $this->cedtop);
		if ($this->isColumnModified(OcregactPeer::ID)) $criteria->add(OcregactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcregactPeer::DATABASE_NAME);

		$criteria->add(OcregactPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCedins($this->cedins);

		$copyObj->setCedtec($this->cedtec);

		$copyObj->setCedfis($this->cedfis);

		$copyObj->setCedres($this->cedres);

		$copyObj->setCedtop($this->cedtop);


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
			self::$peer = new OcregactPeer();
		}
		return self::$peer;
	}

} 