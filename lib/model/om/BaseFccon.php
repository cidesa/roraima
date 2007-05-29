<?php


abstract class BaseFccon extends BaseObject  implements Persistent {


	
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


	
	protected $codmun;


	
	protected $codedo;


	
	protected $codpai;


	
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
	
	public function getCodmun()
	{

		return $this->codmun; 		
	}
	
	public function getCodedo()
	{

		return $this->codedo; 		
	}
	
	public function getCodpai()
	{

		return $this->codpai; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FcconPeer::RIFCON;
		}

	} 
	
	public function setRepcon($v)
	{

		if ($this->repcon !== $v) {
			$this->repcon = $v;
			$this->modifiedColumns[] = FcconPeer::REPCON;
		}

	} 
	
	public function setNitcon($v)
	{

		if ($this->nitcon !== $v) {
			$this->nitcon = $v;
			$this->modifiedColumns[] = FcconPeer::NITCON;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = FcconPeer::NOMCON;
		}

	} 
	
	public function setNaccon($v)
	{

		if ($this->naccon !== $v) {
			$this->naccon = $v;
			$this->modifiedColumns[] = FcconPeer::NACCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = FcconPeer::DIRCON;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = FcconPeer::CODPAR;
		}

	} 
	
	public function setCiucon($v)
	{

		if ($this->ciucon !== $v) {
			$this->ciucon = $v;
			$this->modifiedColumns[] = FcconPeer::CIUCON;
		}

	} 
	
	public function setCpocon($v)
	{

		if ($this->cpocon !== $v) {
			$this->cpocon = $v;
			$this->modifiedColumns[] = FcconPeer::CPOCON;
		}

	} 
	
	public function setApocon($v)
	{

		if ($this->apocon !== $v) {
			$this->apocon = $v;
			$this->modifiedColumns[] = FcconPeer::APOCON;
		}

	} 
	
	public function setTipcon($v)
	{

		if ($this->tipcon !== $v) {
			$this->tipcon = $v;
			$this->modifiedColumns[] = FcconPeer::TIPCON;
		}

	} 
	
	public function setTelcon($v)
	{

		if ($this->telcon !== $v) {
			$this->telcon = $v;
			$this->modifiedColumns[] = FcconPeer::TELCON;
		}

	} 
	
	public function setFaxcon($v)
	{

		if ($this->faxcon !== $v) {
			$this->faxcon = $v;
			$this->modifiedColumns[] = FcconPeer::FAXCON;
		}

	} 
	
	public function setEmacon($v)
	{

		if ($this->emacon !== $v) {
			$this->emacon = $v;
			$this->modifiedColumns[] = FcconPeer::EMACON;
		}

	} 
	
	public function setUrlcon($v)
	{

		if ($this->urlcon !== $v) {
			$this->urlcon = $v;
			$this->modifiedColumns[] = FcconPeer::URLCON;
		}

	} 
	
	public function setCodmun($v)
	{

		if ($this->codmun !== $v) {
			$this->codmun = $v;
			$this->modifiedColumns[] = FcconPeer::CODMUN;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = FcconPeer::CODEDO;
		}

	} 
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = FcconPeer::CODPAI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcconPeer::ID;
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

			$this->codmun = $rs->getString($startcol + 15);

			$this->codedo = $rs->getString($startcol + 16);

			$this->codpai = $rs->getString($startcol + 17);

			$this->id = $rs->getInt($startcol + 18);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fccon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcconPeer::DATABASE_NAME);
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
					$pk = FcconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcconPeer::doUpdate($this, $con);
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


			if (($retval = FcconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodmun();
				break;
			case 16:
				return $this->getCodedo();
				break;
			case 17:
				return $this->getCodpai();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcconPeer::getFieldNames($keyType);
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
			$keys[15] => $this->getCodmun(),
			$keys[16] => $this->getCodedo(),
			$keys[17] => $this->getCodpai(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodmun($value);
				break;
			case 16:
				$this->setCodedo($value);
				break;
			case 17:
				$this->setCodpai($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcconPeer::getFieldNames($keyType);

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
		if (array_key_exists($keys[15], $arr)) $this->setCodmun($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodedo($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodpai($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcconPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcconPeer::RIFCON)) $criteria->add(FcconPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcconPeer::REPCON)) $criteria->add(FcconPeer::REPCON, $this->repcon);
		if ($this->isColumnModified(FcconPeer::NITCON)) $criteria->add(FcconPeer::NITCON, $this->nitcon);
		if ($this->isColumnModified(FcconPeer::NOMCON)) $criteria->add(FcconPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcconPeer::NACCON)) $criteria->add(FcconPeer::NACCON, $this->naccon);
		if ($this->isColumnModified(FcconPeer::DIRCON)) $criteria->add(FcconPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcconPeer::CODPAR)) $criteria->add(FcconPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FcconPeer::CIUCON)) $criteria->add(FcconPeer::CIUCON, $this->ciucon);
		if ($this->isColumnModified(FcconPeer::CPOCON)) $criteria->add(FcconPeer::CPOCON, $this->cpocon);
		if ($this->isColumnModified(FcconPeer::APOCON)) $criteria->add(FcconPeer::APOCON, $this->apocon);
		if ($this->isColumnModified(FcconPeer::TIPCON)) $criteria->add(FcconPeer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(FcconPeer::TELCON)) $criteria->add(FcconPeer::TELCON, $this->telcon);
		if ($this->isColumnModified(FcconPeer::FAXCON)) $criteria->add(FcconPeer::FAXCON, $this->faxcon);
		if ($this->isColumnModified(FcconPeer::EMACON)) $criteria->add(FcconPeer::EMACON, $this->emacon);
		if ($this->isColumnModified(FcconPeer::URLCON)) $criteria->add(FcconPeer::URLCON, $this->urlcon);
		if ($this->isColumnModified(FcconPeer::CODMUN)) $criteria->add(FcconPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(FcconPeer::CODEDO)) $criteria->add(FcconPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(FcconPeer::CODPAI)) $criteria->add(FcconPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(FcconPeer::ID)) $criteria->add(FcconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcconPeer::DATABASE_NAME);

		$criteria->add(FcconPeer::ID, $this->id);

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

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);


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
			self::$peer = new FcconPeer();
		}
		return self::$peer;
	}

} 