<?php


abstract class BaseOcdatste extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedste;


	
	protected $nomste;


	
	protected $codste;


	
	protected $dirste;


	
	protected $telste;


	
	protected $faxste;


	
	protected $emaste;


	
	protected $cedrep;


	
	protected $nomrep;


	
	protected $dirrep;


	
	protected $telrep;


	
	protected $faxrep;


	
	protected $emarep;


	
	protected $codpai;


	
	protected $codedo;


	
	protected $codmun;


	
	protected $codpar;


	
	protected $codsec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCedste()
	{

		return $this->cedste;
	}

	
	public function getNomste()
	{

		return $this->nomste;
	}

	
	public function getCodste()
	{

		return $this->codste;
	}

	
	public function getDirste()
	{

		return $this->dirste;
	}

	
	public function getTelste()
	{

		return $this->telste;
	}

	
	public function getFaxste()
	{

		return $this->faxste;
	}

	
	public function getEmaste()
	{

		return $this->emaste;
	}

	
	public function getCedrep()
	{

		return $this->cedrep;
	}

	
	public function getNomrep()
	{

		return $this->nomrep;
	}

	
	public function getDirrep()
	{

		return $this->dirrep;
	}

	
	public function getTelrep()
	{

		return $this->telrep;
	}

	
	public function getFaxrep()
	{

		return $this->faxrep;
	}

	
	public function getEmarep()
	{

		return $this->emarep;
	}

	
	public function getCodpai()
	{

		return $this->codpai;
	}

	
	public function getCodedo()
	{

		return $this->codedo;
	}

	
	public function getCodmun()
	{

		return $this->codmun;
	}

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getCodsec()
	{

		return $this->codsec;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCedste($v)
	{

		if ($this->cedste !== $v) {
			$this->cedste = $v;
			$this->modifiedColumns[] = OcdatstePeer::CEDSTE;
		}

	} 
	
	public function setNomste($v)
	{

		if ($this->nomste !== $v) {
			$this->nomste = $v;
			$this->modifiedColumns[] = OcdatstePeer::NOMSTE;
		}

	} 
	
	public function setCodste($v)
	{

		if ($this->codste !== $v) {
			$this->codste = $v;
			$this->modifiedColumns[] = OcdatstePeer::CODSTE;
		}

	} 
	
	public function setDirste($v)
	{

		if ($this->dirste !== $v) {
			$this->dirste = $v;
			$this->modifiedColumns[] = OcdatstePeer::DIRSTE;
		}

	} 
	
	public function setTelste($v)
	{

		if ($this->telste !== $v) {
			$this->telste = $v;
			$this->modifiedColumns[] = OcdatstePeer::TELSTE;
		}

	} 
	
	public function setFaxste($v)
	{

		if ($this->faxste !== $v) {
			$this->faxste = $v;
			$this->modifiedColumns[] = OcdatstePeer::FAXSTE;
		}

	} 
	
	public function setEmaste($v)
	{

		if ($this->emaste !== $v) {
			$this->emaste = $v;
			$this->modifiedColumns[] = OcdatstePeer::EMASTE;
		}

	} 
	
	public function setCedrep($v)
	{

		if ($this->cedrep !== $v) {
			$this->cedrep = $v;
			$this->modifiedColumns[] = OcdatstePeer::CEDREP;
		}

	} 
	
	public function setNomrep($v)
	{

		if ($this->nomrep !== $v) {
			$this->nomrep = $v;
			$this->modifiedColumns[] = OcdatstePeer::NOMREP;
		}

	} 
	
	public function setDirrep($v)
	{

		if ($this->dirrep !== $v) {
			$this->dirrep = $v;
			$this->modifiedColumns[] = OcdatstePeer::DIRREP;
		}

	} 
	
	public function setTelrep($v)
	{

		if ($this->telrep !== $v) {
			$this->telrep = $v;
			$this->modifiedColumns[] = OcdatstePeer::TELREP;
		}

	} 
	
	public function setFaxrep($v)
	{

		if ($this->faxrep !== $v) {
			$this->faxrep = $v;
			$this->modifiedColumns[] = OcdatstePeer::FAXREP;
		}

	} 
	
	public function setEmarep($v)
	{

		if ($this->emarep !== $v) {
			$this->emarep = $v;
			$this->modifiedColumns[] = OcdatstePeer::EMAREP;
		}

	} 
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = OcdatstePeer::CODPAI;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = OcdatstePeer::CODEDO;
		}

	} 
	
	public function setCodmun($v)
	{

		if ($this->codmun !== $v) {
			$this->codmun = $v;
			$this->modifiedColumns[] = OcdatstePeer::CODMUN;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = OcdatstePeer::CODPAR;
		}

	} 
	
	public function setCodsec($v)
	{

		if ($this->codsec !== $v) {
			$this->codsec = $v;
			$this->modifiedColumns[] = OcdatstePeer::CODSEC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcdatstePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->cedste = $rs->getString($startcol + 0);

			$this->nomste = $rs->getString($startcol + 1);

			$this->codste = $rs->getString($startcol + 2);

			$this->dirste = $rs->getString($startcol + 3);

			$this->telste = $rs->getString($startcol + 4);

			$this->faxste = $rs->getString($startcol + 5);

			$this->emaste = $rs->getString($startcol + 6);

			$this->cedrep = $rs->getString($startcol + 7);

			$this->nomrep = $rs->getString($startcol + 8);

			$this->dirrep = $rs->getString($startcol + 9);

			$this->telrep = $rs->getString($startcol + 10);

			$this->faxrep = $rs->getString($startcol + 11);

			$this->emarep = $rs->getString($startcol + 12);

			$this->codpai = $rs->getString($startcol + 13);

			$this->codedo = $rs->getString($startcol + 14);

			$this->codmun = $rs->getString($startcol + 15);

			$this->codpar = $rs->getString($startcol + 16);

			$this->codsec = $rs->getString($startcol + 17);

			$this->id = $rs->getInt($startcol + 18);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocdatste object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcdatstePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcdatstePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcdatstePeer::DATABASE_NAME);
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
					$pk = OcdatstePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcdatstePeer::doUpdate($this, $con);
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


			if (($retval = OcdatstePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdatstePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedste();
				break;
			case 1:
				return $this->getNomste();
				break;
			case 2:
				return $this->getCodste();
				break;
			case 3:
				return $this->getDirste();
				break;
			case 4:
				return $this->getTelste();
				break;
			case 5:
				return $this->getFaxste();
				break;
			case 6:
				return $this->getEmaste();
				break;
			case 7:
				return $this->getCedrep();
				break;
			case 8:
				return $this->getNomrep();
				break;
			case 9:
				return $this->getDirrep();
				break;
			case 10:
				return $this->getTelrep();
				break;
			case 11:
				return $this->getFaxrep();
				break;
			case 12:
				return $this->getEmarep();
				break;
			case 13:
				return $this->getCodpai();
				break;
			case 14:
				return $this->getCodedo();
				break;
			case 15:
				return $this->getCodmun();
				break;
			case 16:
				return $this->getCodpar();
				break;
			case 17:
				return $this->getCodsec();
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
		$keys = OcdatstePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedste(),
			$keys[1] => $this->getNomste(),
			$keys[2] => $this->getCodste(),
			$keys[3] => $this->getDirste(),
			$keys[4] => $this->getTelste(),
			$keys[5] => $this->getFaxste(),
			$keys[6] => $this->getEmaste(),
			$keys[7] => $this->getCedrep(),
			$keys[8] => $this->getNomrep(),
			$keys[9] => $this->getDirrep(),
			$keys[10] => $this->getTelrep(),
			$keys[11] => $this->getFaxrep(),
			$keys[12] => $this->getEmarep(),
			$keys[13] => $this->getCodpai(),
			$keys[14] => $this->getCodedo(),
			$keys[15] => $this->getCodmun(),
			$keys[16] => $this->getCodpar(),
			$keys[17] => $this->getCodsec(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdatstePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedste($value);
				break;
			case 1:
				$this->setNomste($value);
				break;
			case 2:
				$this->setCodste($value);
				break;
			case 3:
				$this->setDirste($value);
				break;
			case 4:
				$this->setTelste($value);
				break;
			case 5:
				$this->setFaxste($value);
				break;
			case 6:
				$this->setEmaste($value);
				break;
			case 7:
				$this->setCedrep($value);
				break;
			case 8:
				$this->setNomrep($value);
				break;
			case 9:
				$this->setDirrep($value);
				break;
			case 10:
				$this->setTelrep($value);
				break;
			case 11:
				$this->setFaxrep($value);
				break;
			case 12:
				$this->setEmarep($value);
				break;
			case 13:
				$this->setCodpai($value);
				break;
			case 14:
				$this->setCodedo($value);
				break;
			case 15:
				$this->setCodmun($value);
				break;
			case 16:
				$this->setCodpar($value);
				break;
			case 17:
				$this->setCodsec($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdatstePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedste($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomste($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodste($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirste($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelste($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFaxste($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmaste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCedrep($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNomrep($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDirrep($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTelrep($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFaxrep($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setEmarep($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodpai($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodedo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodmun($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodpar($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodsec($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcdatstePeer::DATABASE_NAME);

		if ($this->isColumnModified(OcdatstePeer::CEDSTE)) $criteria->add(OcdatstePeer::CEDSTE, $this->cedste);
		if ($this->isColumnModified(OcdatstePeer::NOMSTE)) $criteria->add(OcdatstePeer::NOMSTE, $this->nomste);
		if ($this->isColumnModified(OcdatstePeer::CODSTE)) $criteria->add(OcdatstePeer::CODSTE, $this->codste);
		if ($this->isColumnModified(OcdatstePeer::DIRSTE)) $criteria->add(OcdatstePeer::DIRSTE, $this->dirste);
		if ($this->isColumnModified(OcdatstePeer::TELSTE)) $criteria->add(OcdatstePeer::TELSTE, $this->telste);
		if ($this->isColumnModified(OcdatstePeer::FAXSTE)) $criteria->add(OcdatstePeer::FAXSTE, $this->faxste);
		if ($this->isColumnModified(OcdatstePeer::EMASTE)) $criteria->add(OcdatstePeer::EMASTE, $this->emaste);
		if ($this->isColumnModified(OcdatstePeer::CEDREP)) $criteria->add(OcdatstePeer::CEDREP, $this->cedrep);
		if ($this->isColumnModified(OcdatstePeer::NOMREP)) $criteria->add(OcdatstePeer::NOMREP, $this->nomrep);
		if ($this->isColumnModified(OcdatstePeer::DIRREP)) $criteria->add(OcdatstePeer::DIRREP, $this->dirrep);
		if ($this->isColumnModified(OcdatstePeer::TELREP)) $criteria->add(OcdatstePeer::TELREP, $this->telrep);
		if ($this->isColumnModified(OcdatstePeer::FAXREP)) $criteria->add(OcdatstePeer::FAXREP, $this->faxrep);
		if ($this->isColumnModified(OcdatstePeer::EMAREP)) $criteria->add(OcdatstePeer::EMAREP, $this->emarep);
		if ($this->isColumnModified(OcdatstePeer::CODPAI)) $criteria->add(OcdatstePeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcdatstePeer::CODEDO)) $criteria->add(OcdatstePeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcdatstePeer::CODMUN)) $criteria->add(OcdatstePeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(OcdatstePeer::CODPAR)) $criteria->add(OcdatstePeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcdatstePeer::CODSEC)) $criteria->add(OcdatstePeer::CODSEC, $this->codsec);
		if ($this->isColumnModified(OcdatstePeer::ID)) $criteria->add(OcdatstePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcdatstePeer::DATABASE_NAME);

		$criteria->add(OcdatstePeer::ID, $this->id);

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

		$copyObj->setCedste($this->cedste);

		$copyObj->setNomste($this->nomste);

		$copyObj->setCodste($this->codste);

		$copyObj->setDirste($this->dirste);

		$copyObj->setTelste($this->telste);

		$copyObj->setFaxste($this->faxste);

		$copyObj->setEmaste($this->emaste);

		$copyObj->setCedrep($this->cedrep);

		$copyObj->setNomrep($this->nomrep);

		$copyObj->setDirrep($this->dirrep);

		$copyObj->setTelrep($this->telrep);

		$copyObj->setFaxrep($this->faxrep);

		$copyObj->setEmarep($this->emarep);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodsec($this->codsec);


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
			self::$peer = new OcdatstePeer();
		}
		return self::$peer;
	}

} 