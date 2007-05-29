<?php


abstract class BaseOcdeforg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codorg;


	
	protected $desorg;


	
	protected $codtiporg;


	
	protected $entorg;


	
	protected $dirorg;


	
	protected $codpai;


	
	protected $codedo;


	
	protected $codciu;


	
	protected $telorg;


	
	protected $faxorg;


	
	protected $emaorg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodorg()
	{

		return $this->codorg; 		
	}
	
	public function getDesorg()
	{

		return $this->desorg; 		
	}
	
	public function getCodtiporg()
	{

		return $this->codtiporg; 		
	}
	
	public function getEntorg()
	{

		return $this->entorg; 		
	}
	
	public function getDirorg()
	{

		return $this->dirorg; 		
	}
	
	public function getCodpai()
	{

		return $this->codpai; 		
	}
	
	public function getCodedo()
	{

		return $this->codedo; 		
	}
	
	public function getCodciu()
	{

		return $this->codciu; 		
	}
	
	public function getTelorg()
	{

		return $this->telorg; 		
	}
	
	public function getFaxorg()
	{

		return $this->faxorg; 		
	}
	
	public function getEmaorg()
	{

		return $this->emaorg; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = OcdeforgPeer::CODORG;
		}

	} 
	
	public function setDesorg($v)
	{

		if ($this->desorg !== $v) {
			$this->desorg = $v;
			$this->modifiedColumns[] = OcdeforgPeer::DESORG;
		}

	} 
	
	public function setCodtiporg($v)
	{

		if ($this->codtiporg !== $v) {
			$this->codtiporg = $v;
			$this->modifiedColumns[] = OcdeforgPeer::CODTIPORG;
		}

	} 
	
	public function setEntorg($v)
	{

		if ($this->entorg !== $v) {
			$this->entorg = $v;
			$this->modifiedColumns[] = OcdeforgPeer::ENTORG;
		}

	} 
	
	public function setDirorg($v)
	{

		if ($this->dirorg !== $v) {
			$this->dirorg = $v;
			$this->modifiedColumns[] = OcdeforgPeer::DIRORG;
		}

	} 
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = OcdeforgPeer::CODPAI;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = OcdeforgPeer::CODEDO;
		}

	} 
	
	public function setCodciu($v)
	{

		if ($this->codciu !== $v) {
			$this->codciu = $v;
			$this->modifiedColumns[] = OcdeforgPeer::CODCIU;
		}

	} 
	
	public function setTelorg($v)
	{

		if ($this->telorg !== $v) {
			$this->telorg = $v;
			$this->modifiedColumns[] = OcdeforgPeer::TELORG;
		}

	} 
	
	public function setFaxorg($v)
	{

		if ($this->faxorg !== $v) {
			$this->faxorg = $v;
			$this->modifiedColumns[] = OcdeforgPeer::FAXORG;
		}

	} 
	
	public function setEmaorg($v)
	{

		if ($this->emaorg !== $v) {
			$this->emaorg = $v;
			$this->modifiedColumns[] = OcdeforgPeer::EMAORG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcdeforgPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codorg = $rs->getString($startcol + 0);

			$this->desorg = $rs->getString($startcol + 1);

			$this->codtiporg = $rs->getString($startcol + 2);

			$this->entorg = $rs->getString($startcol + 3);

			$this->dirorg = $rs->getString($startcol + 4);

			$this->codpai = $rs->getString($startcol + 5);

			$this->codedo = $rs->getString($startcol + 6);

			$this->codciu = $rs->getString($startcol + 7);

			$this->telorg = $rs->getString($startcol + 8);

			$this->faxorg = $rs->getString($startcol + 9);

			$this->emaorg = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocdeforg object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcdeforgPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcdeforgPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcdeforgPeer::DATABASE_NAME);
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
					$pk = OcdeforgPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcdeforgPeer::doUpdate($this, $con);
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


			if (($retval = OcdeforgPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdeforgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodorg();
				break;
			case 1:
				return $this->getDesorg();
				break;
			case 2:
				return $this->getCodtiporg();
				break;
			case 3:
				return $this->getEntorg();
				break;
			case 4:
				return $this->getDirorg();
				break;
			case 5:
				return $this->getCodpai();
				break;
			case 6:
				return $this->getCodedo();
				break;
			case 7:
				return $this->getCodciu();
				break;
			case 8:
				return $this->getTelorg();
				break;
			case 9:
				return $this->getFaxorg();
				break;
			case 10:
				return $this->getEmaorg();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdeforgPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodorg(),
			$keys[1] => $this->getDesorg(),
			$keys[2] => $this->getCodtiporg(),
			$keys[3] => $this->getEntorg(),
			$keys[4] => $this->getDirorg(),
			$keys[5] => $this->getCodpai(),
			$keys[6] => $this->getCodedo(),
			$keys[7] => $this->getCodciu(),
			$keys[8] => $this->getTelorg(),
			$keys[9] => $this->getFaxorg(),
			$keys[10] => $this->getEmaorg(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdeforgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodorg($value);
				break;
			case 1:
				$this->setDesorg($value);
				break;
			case 2:
				$this->setCodtiporg($value);
				break;
			case 3:
				$this->setEntorg($value);
				break;
			case 4:
				$this->setDirorg($value);
				break;
			case 5:
				$this->setCodpai($value);
				break;
			case 6:
				$this->setCodedo($value);
				break;
			case 7:
				$this->setCodciu($value);
				break;
			case 8:
				$this->setTelorg($value);
				break;
			case 9:
				$this->setFaxorg($value);
				break;
			case 10:
				$this->setEmaorg($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdeforgPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodorg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesorg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtiporg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEntorg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDirorg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodpai($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodedo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodciu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTelorg($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFaxorg($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEmaorg($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcdeforgPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcdeforgPeer::CODORG)) $criteria->add(OcdeforgPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(OcdeforgPeer::DESORG)) $criteria->add(OcdeforgPeer::DESORG, $this->desorg);
		if ($this->isColumnModified(OcdeforgPeer::CODTIPORG)) $criteria->add(OcdeforgPeer::CODTIPORG, $this->codtiporg);
		if ($this->isColumnModified(OcdeforgPeer::ENTORG)) $criteria->add(OcdeforgPeer::ENTORG, $this->entorg);
		if ($this->isColumnModified(OcdeforgPeer::DIRORG)) $criteria->add(OcdeforgPeer::DIRORG, $this->dirorg);
		if ($this->isColumnModified(OcdeforgPeer::CODPAI)) $criteria->add(OcdeforgPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcdeforgPeer::CODEDO)) $criteria->add(OcdeforgPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcdeforgPeer::CODCIU)) $criteria->add(OcdeforgPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(OcdeforgPeer::TELORG)) $criteria->add(OcdeforgPeer::TELORG, $this->telorg);
		if ($this->isColumnModified(OcdeforgPeer::FAXORG)) $criteria->add(OcdeforgPeer::FAXORG, $this->faxorg);
		if ($this->isColumnModified(OcdeforgPeer::EMAORG)) $criteria->add(OcdeforgPeer::EMAORG, $this->emaorg);
		if ($this->isColumnModified(OcdeforgPeer::ID)) $criteria->add(OcdeforgPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcdeforgPeer::DATABASE_NAME);

		$criteria->add(OcdeforgPeer::ID, $this->id);

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

		$copyObj->setCodorg($this->codorg);

		$copyObj->setDesorg($this->desorg);

		$copyObj->setCodtiporg($this->codtiporg);

		$copyObj->setEntorg($this->entorg);

		$copyObj->setDirorg($this->dirorg);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setTelorg($this->telorg);

		$copyObj->setFaxorg($this->faxorg);

		$copyObj->setEmaorg($this->emaorg);


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
			self::$peer = new OcdeforgPeer();
		}
		return self::$peer;
	}

} 