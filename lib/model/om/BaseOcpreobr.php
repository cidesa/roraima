<?php


abstract class BaseOcpreobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codobr;


	
	protected $codpar;


	
	protected $canobr;


	
	protected $cancon;


	
	protected $canconfin;


	
	protected $adipar;


	
	protected $cosuni;


	
	protected $cosunifin;


	
	protected $codpre;


	
	protected $monpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodobr()
	{

		return $this->codobr;
	}

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getCanobr()
	{

		return $this->canobr;
	}

	
	public function getCancon()
	{

		return $this->cancon;
	}

	
	public function getCanconfin()
	{

		return $this->canconfin;
	}

	
	public function getAdipar()
	{

		return $this->adipar;
	}

	
	public function getCosuni()
	{

		return $this->cosuni;
	}

	
	public function getCosunifin()
	{

		return $this->cosunifin;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getMonpre()
	{

		return $this->monpre;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodobr($v)
	{

		if ($this->codobr !== $v) {
			$this->codobr = $v;
			$this->modifiedColumns[] = OcpreobrPeer::CODOBR;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = OcpreobrPeer::CODPAR;
		}

	} 
	
	public function setCanobr($v)
	{

		if ($this->canobr !== $v) {
			$this->canobr = $v;
			$this->modifiedColumns[] = OcpreobrPeer::CANOBR;
		}

	} 
	
	public function setCancon($v)
	{

		if ($this->cancon !== $v) {
			$this->cancon = $v;
			$this->modifiedColumns[] = OcpreobrPeer::CANCON;
		}

	} 
	
	public function setCanconfin($v)
	{

		if ($this->canconfin !== $v) {
			$this->canconfin = $v;
			$this->modifiedColumns[] = OcpreobrPeer::CANCONFIN;
		}

	} 
	
	public function setAdipar($v)
	{

		if ($this->adipar !== $v) {
			$this->adipar = $v;
			$this->modifiedColumns[] = OcpreobrPeer::ADIPAR;
		}

	} 
	
	public function setCosuni($v)
	{

		if ($this->cosuni !== $v) {
			$this->cosuni = $v;
			$this->modifiedColumns[] = OcpreobrPeer::COSUNI;
		}

	} 
	
	public function setCosunifin($v)
	{

		if ($this->cosunifin !== $v) {
			$this->cosunifin = $v;
			$this->modifiedColumns[] = OcpreobrPeer::COSUNIFIN;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = OcpreobrPeer::CODPRE;
		}

	} 
	
	public function setMonpre($v)
	{

		if ($this->monpre !== $v) {
			$this->monpre = $v;
			$this->modifiedColumns[] = OcpreobrPeer::MONPRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcpreobrPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codobr = $rs->getString($startcol + 0);

			$this->codpar = $rs->getString($startcol + 1);

			$this->canobr = $rs->getFloat($startcol + 2);

			$this->cancon = $rs->getFloat($startcol + 3);

			$this->canconfin = $rs->getFloat($startcol + 4);

			$this->adipar = $rs->getString($startcol + 5);

			$this->cosuni = $rs->getFloat($startcol + 6);

			$this->cosunifin = $rs->getFloat($startcol + 7);

			$this->codpre = $rs->getString($startcol + 8);

			$this->monpre = $rs->getFloat($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocpreobr object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcpreobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcpreobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcpreobrPeer::DATABASE_NAME);
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
					$pk = OcpreobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcpreobrPeer::doUpdate($this, $con);
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


			if (($retval = OcpreobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcpreobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodobr();
				break;
			case 1:
				return $this->getCodpar();
				break;
			case 2:
				return $this->getCanobr();
				break;
			case 3:
				return $this->getCancon();
				break;
			case 4:
				return $this->getCanconfin();
				break;
			case 5:
				return $this->getAdipar();
				break;
			case 6:
				return $this->getCosuni();
				break;
			case 7:
				return $this->getCosunifin();
				break;
			case 8:
				return $this->getCodpre();
				break;
			case 9:
				return $this->getMonpre();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcpreobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodobr(),
			$keys[1] => $this->getCodpar(),
			$keys[2] => $this->getCanobr(),
			$keys[3] => $this->getCancon(),
			$keys[4] => $this->getCanconfin(),
			$keys[5] => $this->getAdipar(),
			$keys[6] => $this->getCosuni(),
			$keys[7] => $this->getCosunifin(),
			$keys[8] => $this->getCodpre(),
			$keys[9] => $this->getMonpre(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcpreobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodobr($value);
				break;
			case 1:
				$this->setCodpar($value);
				break;
			case 2:
				$this->setCanobr($value);
				break;
			case 3:
				$this->setCancon($value);
				break;
			case 4:
				$this->setCanconfin($value);
				break;
			case 5:
				$this->setAdipar($value);
				break;
			case 6:
				$this->setCosuni($value);
				break;
			case 7:
				$this->setCosunifin($value);
				break;
			case 8:
				$this->setCodpre($value);
				break;
			case 9:
				$this->setMonpre($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcpreobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodobr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanobr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCancon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanconfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdipar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCosuni($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCosunifin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonpre($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcpreobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcpreobrPeer::CODOBR)) $criteria->add(OcpreobrPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(OcpreobrPeer::CODPAR)) $criteria->add(OcpreobrPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcpreobrPeer::CANOBR)) $criteria->add(OcpreobrPeer::CANOBR, $this->canobr);
		if ($this->isColumnModified(OcpreobrPeer::CANCON)) $criteria->add(OcpreobrPeer::CANCON, $this->cancon);
		if ($this->isColumnModified(OcpreobrPeer::CANCONFIN)) $criteria->add(OcpreobrPeer::CANCONFIN, $this->canconfin);
		if ($this->isColumnModified(OcpreobrPeer::ADIPAR)) $criteria->add(OcpreobrPeer::ADIPAR, $this->adipar);
		if ($this->isColumnModified(OcpreobrPeer::COSUNI)) $criteria->add(OcpreobrPeer::COSUNI, $this->cosuni);
		if ($this->isColumnModified(OcpreobrPeer::COSUNIFIN)) $criteria->add(OcpreobrPeer::COSUNIFIN, $this->cosunifin);
		if ($this->isColumnModified(OcpreobrPeer::CODPRE)) $criteria->add(OcpreobrPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OcpreobrPeer::MONPRE)) $criteria->add(OcpreobrPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(OcpreobrPeer::ID)) $criteria->add(OcpreobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcpreobrPeer::DATABASE_NAME);

		$criteria->add(OcpreobrPeer::ID, $this->id);

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

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCanobr($this->canobr);

		$copyObj->setCancon($this->cancon);

		$copyObj->setCanconfin($this->canconfin);

		$copyObj->setAdipar($this->adipar);

		$copyObj->setCosuni($this->cosuni);

		$copyObj->setCosunifin($this->cosunifin);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonpre($this->monpre);


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
			self::$peer = new OcpreobrPeer();
		}
		return self::$peer;
	}

} 