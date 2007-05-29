<?php


abstract class BaseCiconrep extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rifcon;


	
	protected $repcon;


	
	protected $nitcon;


	
	protected $nomcon;


	
	protected $naccon;


	
	protected $dircon;


	
	protected $codpar;


	
	protected $ciucon;


	
	protected $cpocon;


	
	protected $apocon;


	
	protected $tipcon;


	
	protected $telcon;


	
	protected $faxcon;


	
	protected $emacon;


	
	protected $urlcon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRifcon()
	{

		return $this->rifcon; 		
	}
	
	public function getRepcon()
	{

		return $this->repcon; 		
	}
	
	public function getNitcon()
	{

		return $this->nitcon; 		
	}
	
	public function getNomcon()
	{

		return $this->nomcon; 		
	}
	
	public function getNaccon()
	{

		return $this->naccon; 		
	}
	
	public function getDircon()
	{

		return $this->dircon; 		
	}
	
	public function getCodpar()
	{

		return $this->codpar; 		
	}
	
	public function getCiucon()
	{

		return $this->ciucon; 		
	}
	
	public function getCpocon()
	{

		return $this->cpocon; 		
	}
	
	public function getApocon()
	{

		return $this->apocon; 		
	}
	
	public function getTipcon()
	{

		return $this->tipcon; 		
	}
	
	public function getTelcon()
	{

		return $this->telcon; 		
	}
	
	public function getFaxcon()
	{

		return $this->faxcon; 		
	}
	
	public function getEmacon()
	{

		return $this->emacon; 		
	}
	
	public function getUrlcon()
	{

		return $this->urlcon; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = CiconrepPeer::RIFCON;
		}

	} 
	
	public function setRepcon($v)
	{

		if ($this->repcon !== $v) {
			$this->repcon = $v;
			$this->modifiedColumns[] = CiconrepPeer::REPCON;
		}

	} 
	
	public function setNitcon($v)
	{

		if ($this->nitcon !== $v) {
			$this->nitcon = $v;
			$this->modifiedColumns[] = CiconrepPeer::NITCON;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = CiconrepPeer::NOMCON;
		}

	} 
	
	public function setNaccon($v)
	{

		if ($this->naccon !== $v) {
			$this->naccon = $v;
			$this->modifiedColumns[] = CiconrepPeer::NACCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = CiconrepPeer::DIRCON;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = CiconrepPeer::CODPAR;
		}

	} 
	
	public function setCiucon($v)
	{

		if ($this->ciucon !== $v) {
			$this->ciucon = $v;
			$this->modifiedColumns[] = CiconrepPeer::CIUCON;
		}

	} 
	
	public function setCpocon($v)
	{

		if ($this->cpocon !== $v) {
			$this->cpocon = $v;
			$this->modifiedColumns[] = CiconrepPeer::CPOCON;
		}

	} 
	
	public function setApocon($v)
	{

		if ($this->apocon !== $v) {
			$this->apocon = $v;
			$this->modifiedColumns[] = CiconrepPeer::APOCON;
		}

	} 
	
	public function setTipcon($v)
	{

		if ($this->tipcon !== $v) {
			$this->tipcon = $v;
			$this->modifiedColumns[] = CiconrepPeer::TIPCON;
		}

	} 
	
	public function setTelcon($v)
	{

		if ($this->telcon !== $v) {
			$this->telcon = $v;
			$this->modifiedColumns[] = CiconrepPeer::TELCON;
		}

	} 
	
	public function setFaxcon($v)
	{

		if ($this->faxcon !== $v) {
			$this->faxcon = $v;
			$this->modifiedColumns[] = CiconrepPeer::FAXCON;
		}

	} 
	
	public function setEmacon($v)
	{

		if ($this->emacon !== $v) {
			$this->emacon = $v;
			$this->modifiedColumns[] = CiconrepPeer::EMACON;
		}

	} 
	
	public function setUrlcon($v)
	{

		if ($this->urlcon !== $v) {
			$this->urlcon = $v;
			$this->modifiedColumns[] = CiconrepPeer::URLCON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CiconrepPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->rifcon = $rs->getString($startcol + 0);

			$this->repcon = $rs->getString($startcol + 1);

			$this->nitcon = $rs->getString($startcol + 2);

			$this->nomcon = $rs->getString($startcol + 3);

			$this->naccon = $rs->getString($startcol + 4);

			$this->dircon = $rs->getString($startcol + 5);

			$this->codpar = $rs->getString($startcol + 6);

			$this->ciucon = $rs->getString($startcol + 7);

			$this->cpocon = $rs->getString($startcol + 8);

			$this->apocon = $rs->getString($startcol + 9);

			$this->tipcon = $rs->getString($startcol + 10);

			$this->telcon = $rs->getString($startcol + 11);

			$this->faxcon = $rs->getString($startcol + 12);

			$this->emacon = $rs->getString($startcol + 13);

			$this->urlcon = $rs->getString($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ciconrep object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CiconrepPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CiconrepPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CiconrepPeer::DATABASE_NAME);
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
					$pk = CiconrepPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CiconrepPeer::doUpdate($this, $con);
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


			if (($retval = CiconrepPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiconrepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRifcon();
				break;
			case 1:
				return $this->getRepcon();
				break;
			case 2:
				return $this->getNitcon();
				break;
			case 3:
				return $this->getNomcon();
				break;
			case 4:
				return $this->getNaccon();
				break;
			case 5:
				return $this->getDircon();
				break;
			case 6:
				return $this->getCodpar();
				break;
			case 7:
				return $this->getCiucon();
				break;
			case 8:
				return $this->getCpocon();
				break;
			case 9:
				return $this->getApocon();
				break;
			case 10:
				return $this->getTipcon();
				break;
			case 11:
				return $this->getTelcon();
				break;
			case 12:
				return $this->getFaxcon();
				break;
			case 13:
				return $this->getEmacon();
				break;
			case 14:
				return $this->getUrlcon();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiconrepPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRifcon(),
			$keys[1] => $this->getRepcon(),
			$keys[2] => $this->getNitcon(),
			$keys[3] => $this->getNomcon(),
			$keys[4] => $this->getNaccon(),
			$keys[5] => $this->getDircon(),
			$keys[6] => $this->getCodpar(),
			$keys[7] => $this->getCiucon(),
			$keys[8] => $this->getCpocon(),
			$keys[9] => $this->getApocon(),
			$keys[10] => $this->getTipcon(),
			$keys[11] => $this->getTelcon(),
			$keys[12] => $this->getFaxcon(),
			$keys[13] => $this->getEmacon(),
			$keys[14] => $this->getUrlcon(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiconrepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRifcon($value);
				break;
			case 1:
				$this->setRepcon($value);
				break;
			case 2:
				$this->setNitcon($value);
				break;
			case 3:
				$this->setNomcon($value);
				break;
			case 4:
				$this->setNaccon($value);
				break;
			case 5:
				$this->setDircon($value);
				break;
			case 6:
				$this->setCodpar($value);
				break;
			case 7:
				$this->setCiucon($value);
				break;
			case 8:
				$this->setCpocon($value);
				break;
			case 9:
				$this->setApocon($value);
				break;
			case 10:
				$this->setTipcon($value);
				break;
			case 11:
				$this->setTelcon($value);
				break;
			case 12:
				$this->setFaxcon($value);
				break;
			case 13:
				$this->setEmacon($value);
				break;
			case 14:
				$this->setUrlcon($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiconrepPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRifcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRepcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNitcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNaccon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDircon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodpar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCiucon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCpocon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setApocon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipcon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTelcon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFaxcon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEmacon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUrlcon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CiconrepPeer::DATABASE_NAME);

		if ($this->isColumnModified(CiconrepPeer::RIFCON)) $criteria->add(CiconrepPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(CiconrepPeer::REPCON)) $criteria->add(CiconrepPeer::REPCON, $this->repcon);
		if ($this->isColumnModified(CiconrepPeer::NITCON)) $criteria->add(CiconrepPeer::NITCON, $this->nitcon);
		if ($this->isColumnModified(CiconrepPeer::NOMCON)) $criteria->add(CiconrepPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(CiconrepPeer::NACCON)) $criteria->add(CiconrepPeer::NACCON, $this->naccon);
		if ($this->isColumnModified(CiconrepPeer::DIRCON)) $criteria->add(CiconrepPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(CiconrepPeer::CODPAR)) $criteria->add(CiconrepPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(CiconrepPeer::CIUCON)) $criteria->add(CiconrepPeer::CIUCON, $this->ciucon);
		if ($this->isColumnModified(CiconrepPeer::CPOCON)) $criteria->add(CiconrepPeer::CPOCON, $this->cpocon);
		if ($this->isColumnModified(CiconrepPeer::APOCON)) $criteria->add(CiconrepPeer::APOCON, $this->apocon);
		if ($this->isColumnModified(CiconrepPeer::TIPCON)) $criteria->add(CiconrepPeer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(CiconrepPeer::TELCON)) $criteria->add(CiconrepPeer::TELCON, $this->telcon);
		if ($this->isColumnModified(CiconrepPeer::FAXCON)) $criteria->add(CiconrepPeer::FAXCON, $this->faxcon);
		if ($this->isColumnModified(CiconrepPeer::EMACON)) $criteria->add(CiconrepPeer::EMACON, $this->emacon);
		if ($this->isColumnModified(CiconrepPeer::URLCON)) $criteria->add(CiconrepPeer::URLCON, $this->urlcon);
		if ($this->isColumnModified(CiconrepPeer::ID)) $criteria->add(CiconrepPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CiconrepPeer::DATABASE_NAME);

		$criteria->add(CiconrepPeer::ID, $this->id);

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

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setRepcon($this->repcon);

		$copyObj->setNitcon($this->nitcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setNaccon($this->naccon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCiucon($this->ciucon);

		$copyObj->setCpocon($this->cpocon);

		$copyObj->setApocon($this->apocon);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setTelcon($this->telcon);

		$copyObj->setFaxcon($this->faxcon);

		$copyObj->setEmacon($this->emacon);

		$copyObj->setUrlcon($this->urlcon);


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
			self::$peer = new CiconrepPeer();
		}
		return self::$peer;
	}

} 