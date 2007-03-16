<?php


abstract class BaseForotrcrepre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codparegr;


	
	protected $monpre;


	
	protected $codtip;


	
	protected $observ;


	
	protected $nomparegr;


	
	protected $codpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getCodparegr()
	{

		return $this->codparegr;
	}

	
	public function getMonpre()
	{

		return $this->monpre;
	}

	
	public function getCodtip()
	{

		return $this->codtip;
	}

	
	public function getObserv()
	{

		return $this->observ;
	}

	
	public function getNomparegr()
	{

		return $this->nomparegr;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = ForotrcreprePeer::CODCAT;
		}

	} 
	
	public function setCodparegr($v)
	{

		if ($this->codparegr !== $v) {
			$this->codparegr = $v;
			$this->modifiedColumns[] = ForotrcreprePeer::CODPAREGR;
		}

	} 
	
	public function setMonpre($v)
	{

		if ($this->monpre !== $v) {
			$this->monpre = $v;
			$this->modifiedColumns[] = ForotrcreprePeer::MONPRE;
		}

	} 
	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = ForotrcreprePeer::CODTIP;
		}

	} 
	
	public function setObserv($v)
	{

		if ($this->observ !== $v) {
			$this->observ = $v;
			$this->modifiedColumns[] = ForotrcreprePeer::OBSERV;
		}

	} 
	
	public function setNomparegr($v)
	{

		if ($this->nomparegr !== $v) {
			$this->nomparegr = $v;
			$this->modifiedColumns[] = ForotrcreprePeer::NOMPAREGR;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = ForotrcreprePeer::CODPRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForotrcreprePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcat = $rs->getString($startcol + 0);

			$this->codparegr = $rs->getString($startcol + 1);

			$this->monpre = $rs->getFloat($startcol + 2);

			$this->codtip = $rs->getString($startcol + 3);

			$this->observ = $rs->getString($startcol + 4);

			$this->nomparegr = $rs->getString($startcol + 5);

			$this->codpre = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forotrcrepre object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForotrcreprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForotrcreprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForotrcreprePeer::DATABASE_NAME);
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
					$pk = ForotrcreprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForotrcreprePeer::doUpdate($this, $con);
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


			if (($retval = ForotrcreprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForotrcreprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodparegr();
				break;
			case 2:
				return $this->getMonpre();
				break;
			case 3:
				return $this->getCodtip();
				break;
			case 4:
				return $this->getObserv();
				break;
			case 5:
				return $this->getNomparegr();
				break;
			case 6:
				return $this->getCodpre();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForotrcreprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodparegr(),
			$keys[2] => $this->getMonpre(),
			$keys[3] => $this->getCodtip(),
			$keys[4] => $this->getObserv(),
			$keys[5] => $this->getNomparegr(),
			$keys[6] => $this->getCodpre(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForotrcreprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodparegr($value);
				break;
			case 2:
				$this->setMonpre($value);
				break;
			case 3:
				$this->setCodtip($value);
				break;
			case 4:
				$this->setObserv($value);
				break;
			case 5:
				$this->setNomparegr($value);
				break;
			case 6:
				$this->setCodpre($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForotrcreprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodparegr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtip($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObserv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomparegr($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodpre($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForotrcreprePeer::DATABASE_NAME);

		if ($this->isColumnModified(ForotrcreprePeer::CODCAT)) $criteria->add(ForotrcreprePeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForotrcreprePeer::CODPAREGR)) $criteria->add(ForotrcreprePeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(ForotrcreprePeer::MONPRE)) $criteria->add(ForotrcreprePeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(ForotrcreprePeer::CODTIP)) $criteria->add(ForotrcreprePeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(ForotrcreprePeer::OBSERV)) $criteria->add(ForotrcreprePeer::OBSERV, $this->observ);
		if ($this->isColumnModified(ForotrcreprePeer::NOMPAREGR)) $criteria->add(ForotrcreprePeer::NOMPAREGR, $this->nomparegr);
		if ($this->isColumnModified(ForotrcreprePeer::CODPRE)) $criteria->add(ForotrcreprePeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(ForotrcreprePeer::ID)) $criteria->add(ForotrcreprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForotrcreprePeer::DATABASE_NAME);

		$criteria->add(ForotrcreprePeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodparegr($this->codparegr);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setObserv($this->observ);

		$copyObj->setNomparegr($this->nomparegr);

		$copyObj->setCodpre($this->codpre);


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
			self::$peer = new ForotrcreprePeer();
		}
		return self::$peer;
	}

} 