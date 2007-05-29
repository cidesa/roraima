<?php


abstract class BaseFcaliinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcatfis;


	
	protected $coduso;


	
	protected $anovig;


	
	protected $valorm;


	
	protected $porvf;


	
	protected $aliter;


	
	protected $alicon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcatfis()
	{

		return $this->codcatfis; 		
	}
	
	public function getCoduso()
	{

		return $this->coduso; 		
	}
	
	public function getAnovig()
	{

		return $this->anovig; 		
	}
	
	public function getValorm()
	{

		return number_format($this->valorm,2,',','.');
		
	}
	
	public function getPorvf()
	{

		return number_format($this->porvf,2,',','.');
		
	}
	
	public function getAliter()
	{

		return number_format($this->aliter,2,',','.');
		
	}
	
	public function getAlicon()
	{

		return number_format($this->alicon,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcatfis($v)
	{

		if ($this->codcatfis !== $v) {
			$this->codcatfis = $v;
			$this->modifiedColumns[] = FcaliinmPeer::CODCATFIS;
		}

	} 
	
	public function setCoduso($v)
	{

		if ($this->coduso !== $v) {
			$this->coduso = $v;
			$this->modifiedColumns[] = FcaliinmPeer::CODUSO;
		}

	} 
	
	public function setAnovig($v)
	{

		if ($this->anovig !== $v) {
			$this->anovig = $v;
			$this->modifiedColumns[] = FcaliinmPeer::ANOVIG;
		}

	} 
	
	public function setValorm($v)
	{

		if ($this->valorm !== $v) {
			$this->valorm = $v;
			$this->modifiedColumns[] = FcaliinmPeer::VALORM;
		}

	} 
	
	public function setPorvf($v)
	{

		if ($this->porvf !== $v) {
			$this->porvf = $v;
			$this->modifiedColumns[] = FcaliinmPeer::PORVF;
		}

	} 
	
	public function setAliter($v)
	{

		if ($this->aliter !== $v) {
			$this->aliter = $v;
			$this->modifiedColumns[] = FcaliinmPeer::ALITER;
		}

	} 
	
	public function setAlicon($v)
	{

		if ($this->alicon !== $v) {
			$this->alicon = $v;
			$this->modifiedColumns[] = FcaliinmPeer::ALICON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcaliinmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcatfis = $rs->getString($startcol + 0);

			$this->coduso = $rs->getString($startcol + 1);

			$this->anovig = $rs->getString($startcol + 2);

			$this->valorm = $rs->getFloat($startcol + 3);

			$this->porvf = $rs->getFloat($startcol + 4);

			$this->aliter = $rs->getFloat($startcol + 5);

			$this->alicon = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcaliinm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcaliinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcaliinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcaliinmPeer::DATABASE_NAME);
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
					$pk = FcaliinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcaliinmPeer::doUpdate($this, $con);
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


			if (($retval = FcaliinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcaliinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcatfis();
				break;
			case 1:
				return $this->getCoduso();
				break;
			case 2:
				return $this->getAnovig();
				break;
			case 3:
				return $this->getValorm();
				break;
			case 4:
				return $this->getPorvf();
				break;
			case 5:
				return $this->getAliter();
				break;
			case 6:
				return $this->getAlicon();
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
		$keys = FcaliinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcatfis(),
			$keys[1] => $this->getCoduso(),
			$keys[2] => $this->getAnovig(),
			$keys[3] => $this->getValorm(),
			$keys[4] => $this->getPorvf(),
			$keys[5] => $this->getAliter(),
			$keys[6] => $this->getAlicon(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcaliinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcatfis($value);
				break;
			case 1:
				$this->setCoduso($value);
				break;
			case 2:
				$this->setAnovig($value);
				break;
			case 3:
				$this->setValorm($value);
				break;
			case 4:
				$this->setPorvf($value);
				break;
			case 5:
				$this->setAliter($value);
				break;
			case 6:
				$this->setAlicon($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcaliinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcatfis($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCoduso($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnovig($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValorm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorvf($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAliter($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAlicon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcaliinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcaliinmPeer::CODCATFIS)) $criteria->add(FcaliinmPeer::CODCATFIS, $this->codcatfis);
		if ($this->isColumnModified(FcaliinmPeer::CODUSO)) $criteria->add(FcaliinmPeer::CODUSO, $this->coduso);
		if ($this->isColumnModified(FcaliinmPeer::ANOVIG)) $criteria->add(FcaliinmPeer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(FcaliinmPeer::VALORM)) $criteria->add(FcaliinmPeer::VALORM, $this->valorm);
		if ($this->isColumnModified(FcaliinmPeer::PORVF)) $criteria->add(FcaliinmPeer::PORVF, $this->porvf);
		if ($this->isColumnModified(FcaliinmPeer::ALITER)) $criteria->add(FcaliinmPeer::ALITER, $this->aliter);
		if ($this->isColumnModified(FcaliinmPeer::ALICON)) $criteria->add(FcaliinmPeer::ALICON, $this->alicon);
		if ($this->isColumnModified(FcaliinmPeer::ID)) $criteria->add(FcaliinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcaliinmPeer::DATABASE_NAME);

		$criteria->add(FcaliinmPeer::ID, $this->id);

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

		$copyObj->setCodcatfis($this->codcatfis);

		$copyObj->setCoduso($this->coduso);

		$copyObj->setAnovig($this->anovig);

		$copyObj->setValorm($this->valorm);

		$copyObj->setPorvf($this->porvf);

		$copyObj->setAliter($this->aliter);

		$copyObj->setAlicon($this->alicon);


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
			self::$peer = new FcaliinmPeer();
		}
		return self::$peer;
	}

} 